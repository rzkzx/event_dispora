<?php
class Saran extends Controller
{

  public function __construct()
  {
    //check auth login
    if (!Middleware::isLoggedIn()) {
      return redirect('admin/login');
    }

    // check auth back access
    if (!Middleware::backAuth()) {
      return redirect('beranda');
    }

    //new model instance
    $this->saranModel = $this->model('SaranModel');
  }

  public function index()
  {
    $saran = $this->saranModel->get();

    $data = [
      'title' => 'Kritik dan Tanya',
      'menu' => 'Saran',
      'saran' => $saran
    ];

    $this->view('admin/saran/index', $data);
  }
}
