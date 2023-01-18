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
      $riwayat = $this->eventModel->getRiwayatEventPegawai();
      $index = 1;
      $event = [];

      foreach ($riwayat as $v) {
        $event[$index] = $this->eventModel->getById($v->id_event);
        $index++;
      }

      // delete duplicate array event data
      $result = array();
      foreach ($event as $key => $value) {
        if (!in_array($value, $result))
          $result[$key] = $value;
      }

      $data = [
        'title' => 'Riwayat Event',
        'riwayat' => $riwayat,
        'event' => $result
      ];

      $this->view('riwayat/index', $data);
    }
  }

  public function detail($id = '', $params = '', $id2 = '')
  {
    $event = $this->eventModel->getById($id);
    if ($event) {
      //if cover not available
      if ($event->cover) {
        $event->cover = $event->cover;
      } else {
        $event->cover = 'noimage.jpg';
      }

      if ($_SESSION['level'] == 'peserta') {
        $riwayat = $this->eventModel->getRiwayatPesertaByIdEvent($id);
        if ($riwayat) {
          $data = [
            'title' => 'Data Pendaftaran Event',
            'riwayat' => $riwayat,
            'event' => $event
          ];

          $this->view('riwayat/data_peserta', $data);
        } else {
          return redirect('riwayat');
        }
      } else {
        if ($params == 'peserta') {
          $peserta = $this->eventModel->getPesertaDelegasiById($id2);
          $data = [
            'title' => 'Data Peserta Pendaftaran Event',
            'event' => $event,
            'peserta' => $peserta
          ];

          $this->view('riwayat/data_delegasi', $data);
        } else {
          $peserta = $this->eventModel->getRiwayatPesertaDelegasiByIdEvent($id);
          if ($peserta) {
            //replace new line on text mysql to <br> html
            $event->deskripsi = preg_replace("/\r\n|\r|\n/", '<br/>', $event->deskripsi);

            $data = [
              'title' => 'Data Pendaftaran Event',
              'event' => $event,
              'peserta' => $peserta
            ];

            $this->view('riwayat/detail_delegasi', $data);
          } else {
            return redirect('riwayat');
          }
        }
      }
    } else {
      return redirect('riwayat');
    }
  }
}
