<?php
class Event extends Controller
{

  public function __construct()
  {
    //new model instance
    $this->eventModel = $this->model('EventModel');
    $this->userModel = $this->model('UserModel');
  }

  public function index()
  {
    $event = $this->eventModel->get();

    $data = [
      'title' => 'Event Umum',
      'event' => $event
    ];

    $this->view('event/umum', $data);
  }

  public function khusus()
  {
    $event = $this->eventModel->get();

    $data = [
      'title' => 'Event Khusus',
      'event' => $event
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
        'event' => $event
      ];

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
    $data = [
      'title' => 'Form Pendaftaran',
      'menu' => 'Event',
      'submenu' => 'Agenda Event',
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //validate error free
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
      $event = $this->eventModel->getById($id);
      $user = $this->userModel->getPesertaLogged();

      // check event available
      if ($event) {
        // check event has ended
        if (!$event->aktif) {
          return redirect('event/detail/' . $id);
        }

        $data['id'] = $id;
        $data['event'] = $event;
        $data['user'] = $user;

        $this->view('event/daftar_umum', $data);
      } else {
        return redirect('event');
      }
    }
  }
}
