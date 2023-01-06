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
          return redirect('auth');
        } else {
          $loggedInUser = $this->userModel->login($data['username'], $data['password']);
          if ($loggedInUser) {
            //create session
            $this->createUserSession($loggedInUser);
          } else {
            setFlash('Username atau Password Salah', 'danger');
            return redirect('auth');
          }
        }
      } else {
        //init data f f
        $data = [
          'title' => 'Login Peserta',
          'username' => '',
          'password' => '',
        ];
        //load view
        $this->view('auth/login', $data);
      }
    }
  }

  public function register()
  {
    $data = [
      'title' => 'Daftar Akun Peserta',
    ];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      //validate error free
      if (empty($_POST['nama']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['nik']) || empty($_POST['jenis_kelamin']) || empty($_POST['tempat_lahir']) || empty($_POST['tgl_lahir']) || empty($_POST['alamat_dom']) || empty($_POST['alamat_ktp']) || empty($_POST['pendidikan']) || empty($_POST['pekerjaan']) || empty($_POST['no_hp'])) {
        //load view with error
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('auth/register');
      } else {
        //check validate password confirm
        if ($_POST['password'] != $_POST['passwordConf']) {
          setFlash('Password konfirmasi tidak sama', 'danger');
          return redirect('auth/register');
        } else {
          if ($this->userModel->addPeserta($_POST, $_FILES['foto'])) {
            setFlash('Berhasil daftar akun peserta silahkan login', 'success');
            return redirect('auth/login');
          } else {
            die('something went wrong');
          }
        }
      }
    } else {
      $this->view('auth/register', $data);
    }
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
    return redirect('profil');
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
    return redirect('auth/login');
  }
}
