<?php
class Auth extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('UserModel');
  }

  public function index()
  {
    if (Middleware::isLoggedIn()) {
      return redirect('beranda');
    } else {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // process form
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),
        ];

        //make sure error are empty
        if (empty($data['username']) && empty($data['password'])) {
          setFlash('Username atau Password Salah', 'danger');
          return redirect('admin/login');
        } else {
          $loggedInUser = $this->userModel->login($data['username'], $data['password']);
          if ($loggedInUser) {
            //create session
            $this->createUserSession($loggedInUser);
          } else {
            setFlash('Username atau Password Salah', 'danger');
            return redirect('admin/login');
          }
        }
      } else {
        //init data f f
        $data = [
          'username' => '',
          'password' => '',
        ];
        //load view
        $this->view('login/index', $data);
      }
    }
    $this->view('login/index', $data);
  }

  //setting user section variable
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['nama'] = $user->nama;
    $_SESSION['username'] = $user->username;
    $_SESSION['level'] = $user->level_user;
    $_SESSION['jabatan'] = $user->jabatan;
    $_SESSION['foto'] = $user->foto;
    $_SESSION['waktu_login'] = date('Y-m-d H:i:s');
    return redirect('admin/dashboard');
  }

  //logout and destroy user session
  public function logout()
  {
    // add log user

    unset($_SESSION['user_id']);
    unset($_SESSION['nama']);
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    unset($_SESSION['jabatan']);
    unset($_SESSION['foto']);
    session_destroy();
    return redirect('admin/login');
  }
}
