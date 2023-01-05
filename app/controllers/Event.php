<?php
class Event extends Controller
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
      'title' => 'Event',
      'event' => $event
    ];

    $this->view('beranda/index', $data);
  }
}
