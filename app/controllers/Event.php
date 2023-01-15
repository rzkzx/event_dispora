<?php
class Event extends Controller
{

  public function __construct()
  {
    // if (Middleware::backAuth()) {
    //   return redirect('admin');
    // }

    //new model instance
    $this->eventModel = $this->model('EventModel');
    $this->userModel = $this->model('UserModel');
  }

  public function index()
  {
    $limit = 6;
    $total = count($event = $this->eventModel->getUmum());
    $totalPage = ceil($total / $limit);

    if (isset($_GET['page']) && $_GET['page'] > 1) {
      $page = $_GET['page'];
      $firstPage = ($page > 1) ? ($page * $limit) - $limit : 0;
      if ($page > $totalPage) {
        return redirect('event');
      } else {
        $event = $this->eventModel->getUmum($firstPage . ', ' . $limit);
      }
    } else {
      $event = $this->eventModel->getUmum($limit);
    }

    $data = [
      'title' => 'Event Umum',
      'event' => $event,
      'totalPage' => $totalPage
    ];

    $this->view('event/umum', $data);
  }

  public function khusus()
  {
    $limit = 6;
    $total = count($event = $this->eventModel->getKhusus());
    $totalPage = ceil($total / $limit);

    if (isset($_GET['page']) && $_GET['page'] > 1) {
      $page = $_GET['page'];
      $firstPage = ($page > 1) ? ($page * $limit) - $limit : 0;
      if ($page > $totalPage) {
        return redirect('event/khusus');
      } else {
        $event = $this->eventModel->getKhusus($firstPage . ', ' . $limit);
      }
    } else {
      $event = $this->eventModel->getKhusus($limit);
    }

    $data = [
      'title' => 'Event Khusus',
      'event' => $event,
      'totalPage' => $totalPage
    ];

    $this->view('event/khusus', $data);
  }

  public function detail($id = '')
  {
    // get data event with id
    $event = $this->eventModel->getById($id);

    if ($event) {
      $data = [
        'title' => 'Detail Event',
        'event' => $event,
      ];

      if ($_SESSION['level'] == 'peserta') {
        $data['pendaftaran'] = $this->eventModel->getRiwayatPesertaByIdEvent($event->id);
      }
      //replace new line on text mysql to <br> html
      $data['event']->deskripsi = preg_replace("/\r\n|\r|\n/", '<br/>', $data['event']->deskripsi);

      //check event have a cover
      if ($data['event']->cover) {
        $data['event']->cover = $data['event']->cover;
      } else {
        $data['event']->cover = 'noimage.jpg';
      }

      $this->view('event/detail', $data);
    } else {
      return redirect('event');
    }
  }

  public function pendaftaran($id = '')
  {
    if (Middleware::isLoggedIn()) {
      if (Middleware::frontAuth()) {
        $data = [
          'title' => 'Form Pendaftaran',
          'menu' => 'Event',
          'submenu' => 'Agenda Event',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $event = $this->eventModel->getById($_POST['event_id']);
          if ($event) {
            if ($event->jenjang == 'Umum' && $_SESSION['level'] != 'peserta') {
              return redirect('event/detail/' . $id);
            }
            if ($event->jenjang == 'Khusus' && $_SESSION['level'] != 'pegawai') {
              return redirect('event/detail/' . $id);
            }
            // check event has ended
            if (!$event->aktif) {
              return redirect('event/detail/' . $id);
            }

            if ($event->jenjang == 'Umum') { //validate error free
              if (empty($_POST['nama']) || empty($_POST['nik']) || empty($_POST['jenis_kelamin']) || empty($_POST['tempat_lahir']) || empty($_POST['tgl_lahir']) || empty($_POST['alamat_dom']) || empty($_POST['alamat_ktp']) || empty($_POST['pendidikan']) || empty($_POST['pekerjaan']) || empty($_POST['no_hp'])) {
                //load view with error msg
                setFlash('Form input tidak boleh kosong', 'danger');
                return redirect('event/pendaftaran/' . $_POST['event_id']);
              } else {
                // get peserta data
                $peserta = $this->userModel->getPesertaLogged();
                $id_peserta = $peserta->id;

                //send data insert to model
                if ($this->eventModel->daftarUmum($id_peserta, $_POST, $_FILES)) {
                  setFlash('Berhasil mendaftarkan diri', 'success');
                  return redirect('profil');
                } else {
                  die('something went wrong');
                }
              }
            } else {
              if (empty($_POST['nama']) || empty($_POST['nik']) || empty($_POST['asal_daerah']) || empty($_POST['jenis_kelamin']) || empty($_POST['tempat_lahir']) || empty($_POST['tanggal_lahir']) || empty($_POST['alamat_dom']) || empty($_POST['alamat_ktp']) || empty($_POST['pendidikan'])) {
                //load view with error msg
                setFlash('Form input tidak boleh kosong', 'danger');
                return redirect('event/pendaftaran/' . $_POST['event_id']);
              } else {
                //send data insert to model
                if ($this->eventModel->daftarDelegasi($_POST, $_FILES)) {
                  setFlash('Berhasil mendaftarkan peserta', 'success');
                  return redirect('event/pendaftaran/' . $_POST['event_id']);
                } else {
                  die('something went wrong');
                }
              }
            }
          } else {
            return redirect('event');
          }
        } else {
          $event = $this->eventModel->getById($id);
          $user = $this->userModel->getPesertaLogged();

          // check event available
          if ($event) {
            if ($event->jenjang == 'Umum' && $_SESSION['level'] != 'peserta') {
              return redirect('event/detail/' . $id);
            }
            if ($event->jenjang == 'Khusus' && $_SESSION['level'] != 'pegawai') {
              return redirect('event/detail/' . $id);
            }
            // check event has ended
            if (!$event->aktif) {
              return redirect('event/detail/' . $id);
            }

            $data['id'] = $id;
            $data['event'] = $event;
            $data['user'] = $user;

            if ($event->jenjang == 'Umum') {
              $checkPendaftaran = $this->eventModel->getRiwayatPesertaByIdEvent($event->id);
              if ($checkPendaftaran) {
                return redirect('event/detail/' . $id);
              } else {
                $this->view('event/daftar_umum', $data);
              }
            } else {
              $this->view('event/daftar_khusus', $data);
            }
          } else {
            return redirect('event');
          }
        }
      } else {
        return redirect('event/detail/' . $id);
      }
    } else {
      return redirect('auth');
    }
  }
}
