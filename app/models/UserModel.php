
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

  public function add($data, $file)
  {
    $temp = $file['tmp_name'];
    $size = $file['size'];

    if ($file["name"]) {
      $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
      $nama_file = rand(100, 100000) . '-' . $data['username'] . '.' . $file_extension;;

      if ($size < 50000 * 1000) {
        move_uploaded_file($temp, "../public/assets/images/user/" . $nama_file);
      } else {
        return 0;
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
    $this->db->execute();

    return $this->db->rowCount();
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
        $this->db->bind(':password', password_hash($data['password_baru'], PASSWORD_DEFAULT));

        $this->db->execute();
        return $this->db->rowCount();
      } else {
        return 0;
      }
    } else {
      return 0;
    }
  }
}
