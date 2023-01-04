
<?php
class EventModel
{
  private $db;
  private $table = 'detail_event';


  public function __construct()
  {
    $this->db = new Database;
  }

  // Event
  public function get($limit = '')
  {
    if ($limit > 0) {
      $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT ' . $limit);
    } else {
      $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');
    }

    $result = $this->db->resultSet();

    return $result;
  }

  public function getById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
    $this->db->bind('id', $id);
    $row = $this->db->single();

    return $row;
  }

  public function add($data, $file)
  {
    $temp = $file['tmp_name'];
    $nama_file = rand(100, 100000) . '-' . $file['name'];
    $size = $file['size'];

    if ($file["name"]) {
      if ($size < 50000 * 1000) {
        move_uploaded_file($temp, "../public/assets/images/event/" . $nama_file);
      } else {
        return 0;
      }
    } else {
      $nama_file = NULL;
    }

    $query = "INSERT INTO " . $this->table . " (nama, jenis, jenjang, lokasi, tanggal, deskripsi, cover) 
    VALUES (:nama, :jenis, :jenjang, :lokasi, :tanggal, :deskripsi, :cover)";


    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('jenis', $data['jenis']);
    $this->db->bind('jenjang', $data['jenjang']);
    $this->db->bind('lokasi', $data['lokasi']);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('deskripsi', $data['deskripsi']);
    $this->db->bind('cover', $nama_file);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function delete($id)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $event = $this->db->single();

    if ($event->cover) {
      if (unlink("../public/assets/images/event/" . $event->cover)) {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
      } else {
        return false;
      }
    } else {
      $query = "DELETE FROM " . $this->table . " WHERE id=:id";
      $this->db->query($query);
      $this->db->bind('id', $id);
      $this->db->execute();

      return $this->db->rowCount();
    }
  }

  public function update($data, $file)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $event = $this->db->single();

    $newCover = $event->cover;
    if ($file['size'] > 0) {
      $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
      $allowed_extension = array(
        "png",
        "jpg",
        "jpeg"
      );

      if (!in_array($file_extension, $allowed_extension)) {
        return false;
      }

      $newCover = rand(100, 100000) . '-' . $file['name'];

      if ($file['size'] < 2000 * 1000) {
        if ($event->cover == NULL) {
          move_uploaded_file($file['tmp_name'], "../public/assets/images/event/" . $newCover);
        } else {
          if (unlink("../public/assets/images/event/" . $event->cover)) {
            move_uploaded_file($file['tmp_name'], "../public/assets/images/event/" . $newCover);
          } else {
            return false;
          }
        }
      } else {
        return false;
      }
    }

    $query = "UPDATE " . $this->table . " SET nama=:nama,jenis=:jenis,jenjang=:jenjang,lokasi=:lokasi,tanggal=:tanggal,deskripsi=:deskripsi,cover=:cover WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('jenis', $data['jenis']);
    $this->db->bind('jenjang', $data['jenjang']);
    $this->db->bind('lokasi', $data['lokasi']);
    $this->db->bind('tanggal', $data['tanggal']);
    $this->db->bind('deskripsi', $data['deskripsi']);
    $this->db->bind('cover', $newCover);
    $this->db->execute();

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function akhiri($id)
  {
    $query = "UPDATE " . $this->table . " SET aktif=:aktif WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->bind('aktif', FALSE);
    $this->db->execute();

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
