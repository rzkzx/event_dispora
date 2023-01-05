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
}
