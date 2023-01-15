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

  public function detail($id = '')
  {
    $saran = $this->saranModel->getById($id);

    if ($saran) {
      //replace new line on text mysql to <br> html
      $saran->pesan = preg_replace("/\r\n|\r|\n/", '<br/>', $saran->pesan);

      $data = [
        'title' => 'Detail Kritik dan Tanya',
        'menu' => 'Saran',
        'saran' => $saran
      ];

      $this->view('admin/saran/detail', $data);
    } else {
      redirect('admin/saran/');
    }
  }
}
