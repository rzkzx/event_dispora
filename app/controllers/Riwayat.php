<?php
class Riwayat extends Controller
{

  public function __construct()
  {
    // check if user not login will redirect back to login page
    if (!Middleware::isLoggedIn()) {
      return redirect('auth/login');
    }

    // check auth back access
    if (Middleware::backAuth()) {
      return redirect('admin');
    }

    //new model instance
    $this->eventModel = $this->model('EventModel');
  }

  // Profil User Controller
  public function index()
  {
    if ($_SESSION['level'] == 'peserta') {
      $riwayat = $this->eventModel->getRiwayatEventPeserta();
      $index = 1;
      $event = [];

      foreach ($riwayat as $v) {
        $event[$index] = $this->eventModel->getById($v->id_event);
        $index++;
      }

      $data = [
        'title' => 'Riwayat Event',
        'riwayat' => $riwayat,
        'event' => $event
      ];
      $this->view('riwayat/index', $data);
    } else {

      $data = [
        'title' => 'Riwayat Event',
      ];
      $this->view('profil/pegawai', $data);
    }
  }
}
