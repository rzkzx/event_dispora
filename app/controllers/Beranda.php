<?php
class Beranda extends Controller
{

  public function __construct()
  {
    if (Middleware::backAuth()) {
      return redirect('admin');
    }

    //new model instance
    $this->eventModel = $this->model('EventModel');
    $this->saranModel = $this->model('SaranModel');
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

  public function saran()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['no_hp']) || empty($_POST['pesan'])) {
        setFlash('Form tidak boleh kosong', 'success');
        return redirect('beranda');
      } else {
        if ($this->saranModel->add($_POST)) {
          setFlash('Pesan anda terkirim', 'success');
          return redirect('beranda');
        } else {
          setFlash('Gagal mengirim pesan', 'danger');
          return redirect('beranda');
        }
      }
    } else {
      return redirect('beranda');
    }
  }
}
