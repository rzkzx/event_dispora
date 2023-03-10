<?php
class Event extends Controller
{

  public function __construct()
  {
    // check if user not login will redirect back to login page
    if (!Middleware::isLoggedIn()) {
      return redirect('admin/login');
    }

    // check auth back access
    if (!Middleware::backAuth()) {
      return redirect('beranda');
    }

    //new model instance
    $this->eventModel = $this->model('EventModel');
  }

  // Agenda Event Controller
  public function index()
  {
    // get data all event
    $event = $this->eventModel->get();

    $data = [
      'title' => 'Agenda Event',
      'menu' => 'Event',
      'submenu' => 'Agenda Event',
      'event' => $event
    ];


    // call view
    $this->view('admin/event/index', $data);
  }


  // Detail Event Controller
  public function detail($id = '', $params = '', $idpeserta = '')
  {
    // get data event with id
    $event = $this->eventModel->getById($id);

    if ($event) {
      if ($params == 'peserta') {
        if ($event->jenjang == 'Umum') {
          $peserta = $this->eventModel->getPesertaUmumById($idpeserta);
        } else {
          $peserta = $this->eventModel->getPesertaDelegasiById($idpeserta);
        }

        if ($peserta) {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $jenjang = $event->jenjang;
            if ($this->eventModel->konfirmasiPeserta($jenjang, $idpeserta, $_POST['status'])) {
              setFlash('Berhasil konfirmasi Peserta', 'success');
            } else {
              setFlash('Gagal konfirmasi Peserta', 'danger');
            }
          } else {
            $data = [
              'title' => 'Detail Peserta Event',
              'menu' => 'Event',
              'submenu' => 'Agenda Event',
              'event' => $event,
              'peserta' => $peserta,
            ];

            $this->view('admin/event/detail_peserta', $data);
          }
        } else {
          return redirect('admin/event/detail/' . $id);
        }
      } else {
        $peserta = $this->eventModel->getPesertaByEvent($id);

        $data = [
          'title' => 'Detail Event',
          'menu' => 'Event',
          'submenu' => 'Agenda Event',
          'event' => $event,
          'peserta' => $peserta,
        ];

        //replace new line on text mysql to <br> html
        $data['event']->deskripsi = preg_replace("/\r\n|\r|\n/", '<br/>', $data['event']->deskripsi);

        //check event have a cover
        if ($data['event']->cover) {
          $data['event']->cover = $data['event']->cover;
        } else {
          $data['event']->cover = 'noimage.jpg';
        }

        $this->view('admin/event/detail', $data);
      }
    } else {
      return redirect('admin/event');
    }
  }


  // Buat Event Controller
  public function add()
  {
    $data = [
      'title' => 'Buat Event',
      'menu' => 'Event',
      'submenu' => 'Buat Event'
    ];

    //if event get posted by submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if (empty($_POST['nama']) || empty($_POST['jenis']) || empty($_POST['jenjang']) || empty($_POST['deskripsi']) || empty($_POST['tanggal']) || empty($_POST['lokasi'])) {
        //load view with error
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('admin/event/add');
      } else {
        if ($this->eventModel->add($_POST, $_FILES['foto'])) {
          setFlash('Event terbaru berhasil ditambahkan.', 'success');
          return redirect('admin/event');
        } else {
          die('something went wrong');
        }
      }
    } else {
      $this->view('admin/event/add', $data);
    }
  }

  // Delete Event Controller
  public function delete($id = '')
  {
    //if event get posted by submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->eventModel->delete($id)) {
        setFlash('Berhasil menghapus Event', 'success');
      } else {
        setFlash('Gagal menghapus Event', 'danger');
      }
    } else {
      return redirect('admin/event');
    }
  }


  // Akhiri Event Button Controller
  public function akhiri($id = '')
  {
    //if event get posted by submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->eventModel->akhiri($id)) {
        setFlash('Event telah berakhir', 'success');
      } else {
        setFlash('Gagal mengakhiri Event', 'danger');
      }
    } else {
      return redirect('admin/event');
    }
  }


  // Edit Event Controller
  public function edit($id = '')
  {
    $data = [
      'title' => 'Edit Event',
      'menu' => 'Event',
      'submenu' => 'Agenda Event',
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //validate error free
      if (empty($_POST['nama']) || empty($_POST['jenis']) || empty($_POST['jenjang']) || empty($_POST['deskripsi']) || empty($_POST['tanggal']) || empty($_POST['lokasi'])) {
        //load view with error msg
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('admin/event/edit' . $_POST['id']);
      } else {
        //send data update to model
        if ($this->eventModel->update($_POST, $_FILES['foto'])) {
          setFlash('Data Event berhasil diperbarui.', 'success');
          return redirect('admin/event');
        } else {
          die('something went wrong');
        }
      }
    } else {
      $event = $this->eventModel->getById($id);

      // check event available
      if ($event) {
        // check event has ended
        if (!$event->aktif) {
          return redirect('admin/event');
        }

        $data['id'] = $id;
        $data['event'] = $event;

        // check if evnt doesn't have cover
        if ($data['event']->cover) {
          $data['event']->cover = $data['event']->cover;
        } else {
          $data['event']->cover = 'noimage.jpg';
        }

        $this->view('admin/event/edit', $data);
      } else {
        return redirect('admin/event');
      }
    }
  }
}
