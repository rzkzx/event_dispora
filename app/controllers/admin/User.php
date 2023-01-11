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

  // Delete Event Controller
  public function delete($id = '')
  {
    //if event get posted by submit
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


  // Akhiri Event Button Controller
  public function akhiri($id = '')
  {
    //if event get posted by submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->eventModel->akhiri($id)) {
        setFlash('Event telah berakhir', 'success');
      } else {
        setFlash('Gagal mengakhiri Event', 'danger');
      }
    } else {
      return redirect('admin/event');
    }
  }


  // Edit Event Controller
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
        //load view with error msg
        setFlash('Form input tidak boleh kosong', 'danger');
        return redirect('admin/event/edit' . $_POST['id']);
      } else {
        //send data update to model
        if ($this->eventModel->update($_POST, $_FILES['foto'])) {
          setFlash('Data Event berhasil diperbarui.', 'success');
          return redirect('admin/event');
        } else {
          die('something went wrong');
        }
      }
    } else {
      $event = $this->eventModel->getById($id);

      // check event available
      if ($event) {
        // check event has ended
        if (!$event->aktif) {
          return redirect('admin/event');
        }

        $data['id'] = $id;
        $data['event'] = $event;

        // check if evnt doesn't have cover
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
