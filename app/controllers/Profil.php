<?php
class Profil extends Controller
{

  public function __construct()
  {
    // check if user not login will redirect back to login page
    if (!Middleware::isLoggedIn()) {
      return redirect('auth/login');
    }

    // check auth back access
    if (!Middleware::frontAuth()) {
      return redirect('admin/login');
    }

    //new model instance
    $this->userModel = $this->model('UserModel');
  }

  // Profil User Controller
  public function index()
  {
    $data = [
      'title' => 'Profil Peserta',
      'menu' => '',
      'submenu' => '',
    ];

    $this->view('profil/index', $data);
  }
}
