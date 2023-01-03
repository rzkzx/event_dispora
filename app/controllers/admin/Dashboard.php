<?php
class Dashboard extends Controller
{

  public function __construct()
  {
    if (!Middleware::isLoggedIn()) {
      return redirect('admin/login');
    }

    //new model instance
    $this->eventModel = $this->model('EventModel');
  }

  public function index()
  {
    $event = $this->eventModel->get(5);
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
