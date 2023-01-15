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
    if (Middleware::backAuth()) {
      return redirect('admin');
    }

    //new model instance
    $this->userModel = $this->model('UserModel');
  }

  // Profil User Controller
  public function index()
  {
    if ($_SESSION['level'] == 'peserta') {
      $user = $this->userModel->getPesertaLogged();

      $data = [
        'title' => 'Profil Peserta',
        'user' => $user
      ];
      $this->view('profil/peserta', $data);
    } else {
      $user = $this->userModel->getByLogin();

      $data = [
        'title' => 'Profil Pegawai',
        'user' => $user
      ];
      $this->view('profil/pegawai', $data);
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
      return redirect('profil');
    }
  }

  public function changeProfile()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['nama']) || empty($_POST['jabatan'])) {
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('profil');
      }
      if ($this->userModel->changeProfile($_POST, $_FILES)) {
        setFlash('Berhasil memperbarui data anda', 'success');
        return redirect('profil');
      } else {
        setFlash('Gagal memperbarui data anda', 'danger');
        return redirect('profil');
      }
    } else {
      return redirect('profil');
    }
  }

  public function changeProfilePeserta()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['nama']) || empty($_POST['nik']) || empty($_POST['jenis_kelamin']) || empty($_POST['tempat_lahir']) || empty($_POST['tanggal_lahir']) || empty($_POST['alamat_ktp']) || empty($_POST['alamat_dom']) || empty($_POST['pendidikan']) || empty($_POST['pekerjaan']) || empty($_POST['no_hp'])) {
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('profil');
      }
      if ($this->userModel->changeProfilePeserta($_POST, $_FILES)) {
        setFlash('Berhasil memperbarui data anda', 'success');
        return redirect('profil');
      } else {
        setFlash('Gagal memperbarui data anda', 'danger');
        return redirect('profil');
      }
    } else {
      return redirect('profil');
    }
  }
}
