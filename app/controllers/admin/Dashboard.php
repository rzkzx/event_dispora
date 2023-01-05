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
    $event = $this->eventModel->getByAktif(5);
    $countEvent = count($this->eventModel->get());

    $data = [
      'title' => 'Dashboard',
      'menu' => 'Dashboard',
      'event' => $event,
      'countEvent' => $countEvent
    ];

    $this->view('admin/dashboard/index', $data);
  }
}
