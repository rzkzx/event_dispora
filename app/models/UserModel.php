
<?php
class UserModel
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }

  public function login($username, $password)
  {
    $this->db->query('SELECT * FROM users WHERE username = :username');
    $this->db->bind(':username', $username);

    $row = $this->db->single();

    $hash_password = $row->password;

    if (password_verify($password, $hash_password)) {
      return $row;
    } else {
      return false;
    }
  }

  public function checkUsername($username)
  {
    $this->db->query('SELECT * FROM users WHERE username = :username');
    $this->db->bind(':username', $username);

    $row = $this->db->single();
    if ($row) {
      return true;
    } else {
      return false;
    }
  }

  public function getAll()
  {
    $this->db->query('SELECT * FROM users ORDER BY id DESC');
    $row = $this->db->resultSet();

    return $row;
  }

  public function getUserInstansi()
  {
    $level = 'peserta';

    $this->db->query('SELECT * FROM users WHERE level_user != :level ORDER BY id DESC');
    $this->db->bind(':level', $level);
    $row = $this->db->resultSet();

    return $row;
  }

  public function getUserPeserta()
  {
    $this->db->query('SELECT * FROM user_peserta ORDER BY id DESC');

    $row = $this->db->resultSet();

    return $row;
  }

  public function getUserById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function getByLogin()
  {
    $query = "SELECT * FROM users WHERE username = :username";
    $this->db->query($query);
    $this->db->bind(':username', $_SESSION['username']);

    $row = $this->db->single();

    return $row;
  }

  public function getPesertaLogged()
  {
    $this->db->query('SELECT * FROM user_peserta WHERE id_user = :id');
    $this->db->bind(':id', $_SESSION['user_id']);

    $row = $this->db->single();

    return $row;
  }

  public function getPesertaByIdUser($id)
  {
    $this->db->query('SELECT * FROM user_peserta WHERE id_user = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function add($data, $file)
  {
    $this->db->query('SELECT * FROM users WHERE username = :username');
    $this->db->bind(':username', $data['username']);

    $row = $this->db->single();
    if ($row) {
      return 400;
    }

    $temp = $file['tmp_name'];
    $size = $file['size'];

    if ($file["name"]) {
      $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
      $nama_file = rand(100, 100000) . '-' . $data['username'] . '.' . $file_extension;;

      if ($size < 3000 * 1000) { //3mb
        move_uploaded_file($temp, "../public/assets/images/user/" . $nama_file);
      } else {
        return 401;
      }
    } else {
      $nama_file = NULL;
    }

    $query = "INSERT INTO users (username, level_user, nama, password, jabatan, foto) 
    VALUES (:username, :level_user, :nama, :password, :jabatan, :foto)";

    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('level_user', $data['level']);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
    $this->db->bind('jabatan', $data['jabatan']);
    $this->db->bind('foto', $nama_file);

    if ($this->db->execute()) {
      return 200;
    } else {
      return 0;
    }
  }

  public function addPeserta($data, $file)
  {
    $this->db->query('SELECT * FROM users WHERE username = :username');
    $this->db->bind(':username', $data['username']);

    $row = $this->db->single();
    if ($row) {
      return 400;
    }

    $temp = $file['tmp_name'];
    $size = $file['size'];

    if ($file["name"]) {
      $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
      $nama_file = rand(100, 100000) . '-' . $data['username'] . '.' . $file_extension;;

      if ($size < 3000 * 1000) { // 3mb
        move_uploaded_file($temp, "../public/assets/images/user/" . $nama_file);
      } else {
        return 401;
      }
    } else {
      $nama_file = NULL;
    }

    $query = "INSERT INTO users (username, level_user, nama, password, foto) 
    VALUES (:username, :level_user, :nama, :password, :foto)";

    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('level_user', 'peserta');
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
    $this->db->bind('foto', $nama_file);
    $this->db->execute();
    $id = $this->db->lastInsertId();

    $query = "INSERT INTO user_peserta (id_user, nama, nik, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat_ktp, alamat_dom, pendidikan, pekerjaan, no_hp, foto) 
    VALUES (:id_user, :nama, :nik, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_ktp, :alamat_dom, :pendidikan, :pekerjaan, :no_hp, :foto)";

    $this->db->query($query);
    $this->db->bind('id_user', $id);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nik', $data['nik']);
    $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
    $this->db->bind('tempat_lahir', $data['tempat_lahir']);
    $this->db->bind('tanggal_lahir', $data['tgl_lahir']);
    $this->db->bind('alamat_ktp', $data['alamat_ktp']);
    $this->db->bind('alamat_dom', $data['alamat_dom']);
    $this->db->bind('pendidikan', $data['pendidikan']);
    $this->db->bind('pekerjaan', $data['pekerjaan']);
    $this->db->bind('no_hp', $data['no_hp']);
    $this->db->bind('foto', $nama_file);

    if ($this->db->execute()) {
      return 200;
    } else {
      return 0;
    }
  }

  public function changePassword($data)
  {
    $query = "SELECT * FROM users WHERE username = :username";
    $this->db->query($query);
    $this->db->bind(':username', $_SESSION['username']);

    $user = $this->db->single();
    if ($user) {
      if (password_verify($data['password'], $user->password)) {
        $query = "UPDATE users SET password=:password WHERE username=:username";
        $this->db->query($query);
        $this->db->bind(':username', $_SESSION['username']);
        $this->db->bind(':password', password_hash($data['newPassword'], PASSWORD_DEFAULT));

        $this->db->execute();
        return $this->db->rowCount();
      } else {
        return 0;
      }
    } else {
      return 0;
    }
  }

  public function editPasswordPengguna($id, $data)
  {
    $query = "SELECT * FROM users WHERE id = :id";
    $this->db->query($query);
    $this->db->bind(':id', $id);

    $user = $this->db->single();
    if ($user) {
      $query = "UPDATE users SET password=:password WHERE id=:id";
      $this->db->query($query);
      $this->db->bind(':id', $id);
      $this->db->bind(':password', password_hash($data['newPassword'], PASSWORD_DEFAULT));

      $this->db->execute();
      return $this->db->rowCount();
    } else {
      return 0;
    }
  }

  public function changeProfile($data, $files)
  {
    $newAvatarName = $_SESSION['foto'];
    if ($files['avatar']['size'] > 0) {
      $file_extension = pathinfo($files['avatar']['name'], PATHINFO_EXTENSION);
      $allowed_extension = array(
        "png",
        "jpg",
        "jpeg"
      );

      if (!in_array($file_extension, $allowed_extension)) {
        return false;
      }

      $newAvatarName = rand(100, 100000) . '-' . $_SESSION['username'] . '.' . $file_extension;;

      if ($files['avatar']['size'] < 2000 * 1000) {
        if ($_SESSION['foto'] == NULL) {
          move_uploaded_file($files['avatar']['tmp_name'], "../public/assets/images/user/" . $newAvatarName);
        } else {
          if (unlink("../public/assets/images/user/" . $_SESSION['foto'])) {
            move_uploaded_file($files['avatar']['tmp_name'], "../public/assets/images/user/" . $newAvatarName);
          }
        }
      } else {
        return false;
      }
    }

    $query = "UPDATE users SET nama=:nama,jabatan=:jabatan,foto=:foto WHERE username=:username";
    $this->db->query($query);
    $this->db->bind(':username', $_SESSION['username']);
    $this->db->bind(':nama', $data['nama']);
    $this->db->bind(':jabatan', $data['jabatan']);
    $this->db->bind(':foto', $newAvatarName);

    if ($this->db->execute()) {
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['jabatan'] = $data['jabatan'];
      $_SESSION['foto'] = $newAvatarName;

      return true;
    } else {
      return false;
    }
  }

  public function changeProfilePeserta($data, $files)
  {
    $newAvatarName = $_SESSION['foto'];
    if ($files['avatar']['size'] > 0) {
      $file_extension = pathinfo($files['avatar']['name'], PATHINFO_EXTENSION);
      $allowed_extension = array(
        "png",
        "jpg",
        "jpeg"
      );

      if (!in_array($file_extension, $allowed_extension)) {
        return false;
      }

      $newAvatarName = rand(100, 100000) . '-' . $_SESSION['username'] . '.' . $file_extension;;

      if ($files['avatar']['size'] < 2000 * 1000) {
        if ($_SESSION['foto'] == NULL) {
          move_uploaded_file($files['avatar']['tmp_name'], "../public/assets/images/user/" . $newAvatarName);
        } else {
          if (unlink("../public/assets/images/user/" . $_SESSION['foto'])) {
            move_uploaded_file($files['avatar']['tmp_name'], "../public/assets/images/user/" . $newAvatarName);
          }
        }
      } else {
        return false;
      }
    }

    $query = "UPDATE users SET nama=:nama,foto=:foto WHERE username=:username";
    $this->db->query($query);
    $this->db->bind(':username', $_SESSION['username']);
    $this->db->bind(':nama', $data['nama']);
    $this->db->bind(':foto', $newAvatarName);
    $this->db->execute();

    $query = "UPDATE user_peserta SET nama=:nama,nik=:nik, jenis_kelamin=:jenis_kelamin, tempat_lahir=:tempat_lahir, tanggal_lahir=:tanggal_lahir, alamat_ktp=:alamat_ktp, alamat_dom=:alamat_dom, pendidikan=:pendidikan, pekerjaan=:pekerjaan, no_hp=:no_hp,foto=:foto WHERE id_user=:id_user";
    $this->db->query($query);
    $this->db->bind(':id_user', $_SESSION['user_id']);
    $this->db->bind(':nama', $data['nama']);
    $this->db->bind(':nik', $data['nik']);
    $this->db->bind(':jenis_kelamin', $data['jenis_kelamin']);
    $this->db->bind(':tempat_lahir', $data['tempat_lahir']);
    $this->db->bind(':tanggal_lahir', $data['tanggal_lahir']);
    $this->db->bind(':alamat_ktp', $data['alamat_ktp']);
    $this->db->bind(':alamat_dom', $data['alamat_dom']);
    $this->db->bind(':pendidikan', $data['pendidikan']);
    $this->db->bind(':pekerjaan', $data['pekerjaan']);
    $this->db->bind(':no_hp', $data['no_hp']);
    $this->db->bind(':foto', $newAvatarName);

    if ($this->db->execute()) {
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['foto'] = $newAvatarName;

      return true;
    } else {
      return false;
    }
  }

  public function delete($id)
  {
    $query = "SELECT * FROM users WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $user = $this->db->single();

    if ($user->foto) {
      if (unlink("../public/assets/images/user/" . $user->foto)) {
        $query = "DELETE FROM users WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
      } else {
        return false;
      }
    } else {
      $query = "DELETE FROM users WHERE id=:id";
      $this->db->query($query);
      $this->db->bind('id', $id);
      $this->db->execute();

      return $this->db->rowCount();
    }
  }
}
