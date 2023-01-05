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
}
