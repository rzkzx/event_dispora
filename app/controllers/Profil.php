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
    $user = $this->userModel->getPesertaLogged();

    $data = [
      'title' => 'Profil Peserta',
      'user' => $user
    ];

    $this->view('profil/index', $data);
  }
}
