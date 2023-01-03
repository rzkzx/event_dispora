<?php
class Event extends Controller
{

  public function __construct()
  {
    if (!Middleware::isLoggedIn()) {
      return redirect('admin/login');
    }

    //new model instance
    $this->eventModel = $this->model('EventModel');
  }

  // Event Controller
  public function index()
  {
    $event = $this->eventModel->get();

    $data = [
      'title' => 'Agenda Event',
      'menu' => 'Event',
      'submenu' => 'Agenda Event',
      'event' => $event
    ];

    $this->view('admin/event/index', $data);
  }

  public function detail($id = '')
  {
    $event = $this->eventModel->getById($id);

    if ($event) {
      $data = [
        'title' => 'Detail Event',
        'menu' => 'Event',
        'submenu' => 'Agenda Event',
        'event' => $event
      ];

      $data['event']->deskripsi = preg_replace("/\r\n|\r|\n/", '<br/>', $data['event']->deskripsi);

      if ($data['event']->cover) {
        $data['event']->cover = $data['event']->cover;
      } else {
        $data['event']->cover = 'noimage.jpg';
      }

      $this->view('admin/event/detail', $data);
    } else {
      return redirect('admin/event');
    }
  }

  public function add()
  {
    $data = [
      'title' => 'Buat Event',
      'menu' => 'Event',
      'submenu' => 'Buat Event'
    ];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if (empty($_POST['nama']) || empty($_POST['jenis']) || empty($_POST['jenjang']) || empty($_POST['deskripsi']) || empty($_POST['tanggal']) || empty($_POST['lokasi'])) {
        //load view with error
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('admin/event/add');
      } else {
        if ($this->eventModel->add($_POST, $_FILES['foto'])) {
          setFlash('Event terbaru berhasil ditambahkan.', 'success');
          return redirect('admin/event');
        } else {
          die('something went wrong');
        }
      }
    } else {
      $this->view('admin/event/add', $data);
    }
  }

  public function delete($id = '')
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->eventModel->delete($id)) {
        setFlash('Berhasil menghapus Event', 'success');
      } else {
        setFlash('Gagal menghapus Event', 'danger');
      }
    } else {
      return redirect('admin/event');
    }
  }

  public function edit($id = '')
  {
    $data = [
      'title' => 'Edit Event',
      'menu' => 'Event',
      'submenu' => 'Agenda Event',
    ];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //validate error free
      if (empty($_POST['nama']) || empty($_POST['jenis']) || empty($_POST['jenjang']) || empty($_POST['deskripsi']) || empty($_POST['tanggal']) || empty($_POST['lokasi'])) {
        //load view with error
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('admin/event/edit' . $_POST['id']);
      } else {
        if ($this->eventModel->update($_POST, $_FILES['foto'])) {
          setFlash('Data Event berhasil diperbarui.', 'success');
          return redirect('admin/event');
        } else {
          die('something went wrong');
        }
      }
    } else {
      $event = $this->eventModel->getById($id);
      if ($event) {
        $data['id'] = $id;
        $data['event'] = $event;

        if ($data['event']->cover) {
          $data['event']->cover = $data['event']->cover;
        } else {
          $data['event']->cover = 'noimage.jpg';
        }

        $this->view('admin/event/edit', $data);
      } else {
        return redirect('admin/event');
      }
    }
  }
}
