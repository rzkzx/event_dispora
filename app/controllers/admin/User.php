<?php
class User extends Controller
{

  public function __construct()
  {
    // check if user not login will redirect back to login page
    if (!Middleware::isLoggedIn()) {
      return redirect('admin/login');
    }

    // check auth back access
    if (!Middleware::backAuth()) {
      return redirect('beranda');
    }

    //new model instance
    $this->userModel = $this->model('UserModel');
  }

  // Profil User Controller
  public function index()
  {
    $data = [
      'title' => 'Profil',
      'menu' => '',
      'submenu' => '',
    ];

    $this->view('admin/profil/index', $data);
  }

  // Akun Instansi Controller
  public function instansi()
  {
    if (Middleware::isAdmin()) {
      // get data all event
      $users = $this->userModel->getUserInstansi();

      $data = [
        'title' => 'Akun Instansi',
        'menu' => 'Pengguna',
        'submenu' => 'Akun Instansi',
        'users' => $users
      ];

      // call view
      $this->view('admin/pengguna/instansi', $data);
    } else {
      return redirect('admin/login');
    }
  }

  // Akun Instansi Controller
  public function peserta()
  {
    if (Middleware::isAdmin()) {
      // get data all event
      $users = $this->userModel->getUserPeserta();

      $data = [
        'title' => 'Akun Peserta',
        'menu' => 'Pengguna',
        'submenu' => 'Akun Peserta',
        'users' => $users
      ];

      // call view
      $this->view('admin/pengguna/peserta', $data);
    } else {
      return redirect('admin/login');
    }
  }

  // Tambah Akun Instansi Controller
  public function addinstansi()
  {
    if (Middleware::isAdmin()) {
      $data = [
        'title' => 'Tambahkan Akun Instansi',
        'menu' => 'Pengguna',
        'submenu' => 'Tambahkan Akun Instansi'
      ];

      //if event get posted by submit
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (empty($_POST['level']) || empty($_POST['nama']) || empty($_POST['jabatan']) || empty($_POST['username']) || empty($_POST['password'])) {
          //load view with error
          setFlash('Form input tidak boleh kosong', 'danger');
          return redirect('admin/user/addinstansi');
        } else {
          $registerStatusCode = $this->userModel->add($_POST, $_FILES['foto']);
          switch ($registerStatusCode) {
            case 400:
              setFlash('Username telah terdaftar', 'danger');
              return redirect('admin/user/addinstansi');
              break;
            case 401:
              setFlash('Size foto harus dibawah 3mb', 'danger');
              return redirect('admin/user/addinstansi');
              break;
            case 0:
              setFlash('Gagal mengirim ke database', 'danger');
              return redirect('admin/user/addinstansi');
              break;
            case 200:
              setFlash('Pengguna terbaru berhasil ditambahkan.', 'success');
              return redirect('admin/user/instansi');
              break;
            default:
              setFlash('Pengguna terbaru berhasil ditambahkan.', 'success');
              return redirect('admin/user/instansi');
              break;
          }
        }
      } else {
        $this->view('admin/pengguna/add_instansi', $data);
      }
    } else {
      return redirect('admin/login');
    }
  }

  // Tambah Akun Instansi Controller
  public function editInstansi($id = '')
  {
    if (Middleware::isAdmin()) {
      $data = [
        'title' => 'Perbarui Akun Instansi',
        'menu' => 'Pengguna',
        'submenu' => 'Akun Instansi'
      ];

      //if event get posted by submit
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (empty($_POST['newPassword']) || empty($_POST['confirmNewPassword'])) {
          $data['message'] = 'Form input tidak valid';
          $data['status'] = 'error';
          echo json_encode($data);
        }
        if ($_POST['newPassword'] !== $_POST['confirmNewPassword']) {
          $data['message'] = 'Konfirmasi password tidak sama';
          $data['status'] = 'error';
          echo json_encode($data);
        }
        if ($this->userModel->editInstansi($id, $_POST)) {
          $data['message'] = 'Berhasil perbarui password';
          $data['status'] = 'success';
          echo json_encode($data);
        } else {
          $data['message'] = 'Gagal memperbarui password';
          $data['status'] = 'error';
          echo json_encode($data);
        }
      } else {
        $user = $this->userModel->getUserById($id);

        if ($user) {
          $data['user'] = $user;

          $this->view('admin/pengguna/edit_instansi', $data);
        } else {
          return redirect('admin/user/instansi');
        }
      }
    } else {
      return redirect('admin/login');
    }
  }


  // Delete User Controller
  public function delete($id = '')
  {
    if (Middleware::isAdmin()) {
      //if event get posted by submit
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($this->userModel->delete($id)) {
          setFlash('Berhasil menghapus data user', 'success');
        } else {
          setFlash('Berhasil menghapus data user', 'danger');
        }
      } else {
        return redirect('admin/user/peserta');
      }
    } else {
      return redirect('admin');
    }
  }

  public function changePassword()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['password']) || empty($_POST['newPassword']) || empty($_POST['confirmNewPassword'])) {
        $data['message'] = 'Form input tidak valid';
        $data['status'] = 'error';
        echo json_encode($data);
      }
      if ($_POST['newPassword'] !== $_POST['confirmNewPassword']) {
        $data['message'] = 'Konfirmasi password tidak sama';
        $data['status'] = 'error';
        echo json_encode($data);
      }
      if ($this->userModel->changePassword($_POST)) {
        $data['message'] = 'Berhasil ganti password';
        $data['status'] = 'success';
        echo json_encode($data);
      } else {
        $data['message'] = 'Gagal memperbarui password anda';
        $data['status'] = 'error';
        echo json_encode($data);
      }
    } else {
      return redirect('admin/user');
    }
  }

  public function changeProfile()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['nama']) || empty($_POST['jabatan'])) {
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('admin/user');
      }
      if ($this->userModel->changeProfile($_POST, $_FILES)) {
        setFlash('Berhasil memperbarui data anda', 'success');
        return redirect('admin/user');
      } else {
        setFlash('Gagal memperbarui data anda', 'danger');
        return redirect('admin/user');
      }
    } else {
      return redirect('admin/user');
    }
  }
}
