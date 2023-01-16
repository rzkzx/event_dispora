<?php
class Dashboard extends Controller
{

  public function __construct()
  {
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

  public function index()
  {
    //show event aktif
    $event = $this->eventModel->getByAktif(5);

    //get data event
    $countEvent = count($this->eventModel->get());
    $eventAktif = count($this->eventModel->getByAktif());
    $eventSelesai = count($this->eventModel->getBySelesai());

    //get data peserta
    $umum = $this->eventModel->getAllPesertaUmum();
    $khusus = $this->eventModel->getAllPesertaDelegasi();
    $jumlahPeserta = count($umum) + count($khusus);

    $data = [
      'title' => 'Dashboard',
      'menu' => 'Dashboard',
      'event' => $event,
      'countEvent' => $countEvent,
      'jumlahPeserta' => $jumlahPeserta,
      'eventAktif' => $eventAktif,
      'eventSelesai' => $eventSelesai
    ];

    $this->view('admin/dashboard/index', $data);
  }
}
