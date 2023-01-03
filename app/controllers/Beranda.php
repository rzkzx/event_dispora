<?php
class Beranda extends Controller
{

  public function __construct()
  {
    //new model instance
    $this->eventModel = $this->model('EventModel');
  }

  public function index()
  {
    $event = $this->eventModel->get(6);

    $data = [
      'title' => 'Beranda',
      'event' => $event
    ];

    $this->view('beranda/index', $data);
  }
}
