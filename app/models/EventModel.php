
<?php
class EventModel
{
  private $db;
  private $table = 'detail_event';
  private $daftarUmum = 'form_pendaftaran';
  private $daftarDelegasi = 'form_daftardelegasi';

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

  public function getUmum($limit = '')
  {
    $jenjang = 'Umum';
    if ($limit > 0) {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE jenjang=:jenjang ORDER BY id DESC LIMIT ' . $limit);
      $this->db->bind('jenjang', $jenjang);
    } else {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE jenjang=:jenjang ORDER BY id DESC');
      $this->db->bind('jenjang', $jenjang);
    }

    $result = $this->db->resultSet();

    return $result;
  }

  public function getKhusus($limit = '')
  {
    $jenjang = 'Khusus';
    if ($limit > 0) {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE jenjang=:jenjang ORDER BY id DESC LIMIT ' . $limit);
      $this->db->bind('jenjang', $jenjang);
    } else {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE jenjang=:jenjang ORDER BY id DESC');
      $this->db->bind('jenjang', $jenjang);
    }

    $result = $this->db->resultSet();

    return $result;
  }

  public function getByAktif($limit = '')
  {
    if ($limit > 0) {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE aktif IS TRUE ORDER BY id DESC LIMIT ' . $limit);
    } else {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE aktif IS TRUE ORDER BY id DESC');
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

  public function daftarUmum($id_peserta, $data, $files)
  {
    $file_identitas = $files['identitas'];
    $file_syarat = $files['syarat'];

    if ($file_identitas["name"]) {
      $file_extension = pathinfo($file_identitas['name'], PATHINFO_EXTENSION);
      $identitas = rand(100, 100000) . '-' . $data['nik'] . '.' . $file_extension;;

      if ($file_identitas['size'] < 50000 * 1000) {
        move_uploaded_file($file_identitas['tmp_name'], "../public/assets/file/identitas/" . $identitas);
      } else {
        return 0;
      }
    } else {
      $identitas = NULL;
    }

    if ($file_syarat["name"]) {
      $file_extension = pathinfo($file_syarat['name'], PATHINFO_EXTENSION);
      $syarat = rand(100, 100000) . '-' . $data['nik'] . '.' . $file_extension;;

      if ($file_syarat['size'] < 50000 * 1000) {
        move_uploaded_file($file_syarat['tmp_name'], "../public/assets/file/syarat/" . $syarat);
      } else {
        return 0;
      }
    } else {
      $syarat = NULL;
    }

    $query = "INSERT INTO " . $this->daftarUmum . " (id_event, id_peserta, nama, nik, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat_ktp, alamat_dom, pendidikan, pekerjaan, no_hp, upload_identitas, berkas_syarat) 
    VALUES (:id_event, :id_peserta, :nama, :nik, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_ktp, :alamat_dom, :pendidikan, :pekerjaan, :no_hp, :upload_identitas, :berkas_syarat)";

    $this->db->query($query);
    $this->db->bind('id_event', $data['event_id']);
    $this->db->bind('id_peserta', $id_peserta);
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
    $this->db->bind('upload_identitas', $identitas);
    $this->db->bind('berkas_syarat', $syarat);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function daftarDelegasi($data, $files)
  {
    $file_identitas = $files['identitas'];
    $file_syarat = $files['syarat'];

    if ($file_identitas["name"]) {
      $file_extension = pathinfo($file_identitas['name'], PATHINFO_EXTENSION);
      $identitas = rand(100, 100000) . '-' . $data['nik'] . '.' . $file_extension;;

      if ($file_identitas['size'] < 50000 * 1000) {
        move_uploaded_file($file_identitas['tmp_name'], "../public/assets/file/identitas/" . $identitas);
      } else {
        return 0;
      }
    } else {
      $identitas = NULL;
    }

    if ($file_syarat["name"]) {
      $file_extension = pathinfo($file_syarat['name'], PATHINFO_EXTENSION);
      $syarat = rand(100, 100000) . '-' . $data['nik'] . '.' . $file_extension;;

      if ($file_syarat['size'] < 50000 * 1000) {
        move_uploaded_file($file_syarat['tmp_name'], "../public/assets/file/syarat/" . $syarat);
      } else {
        return 0;
      }
    } else {
      $syarat = NULL;
    }

    $query = "INSERT INTO " . $this->daftarDelegasi . " (id_pegawai, id_event, asal_daerah, nama, nik, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat_ktp, alamat_dom, pendidikan, pekerjaan, no_hp, email, upload_identitas, berkas_syarat) 
    VALUES (:id_pegawai, :id_event, :asal_daerah, :nama, :nik, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_ktp, :alamat_dom, :pendidikan, :pekerjaan, :no_hp, :email, :upload_identitas, :berkas_syarat)";

    $this->db->query($query);
    $this->db->bind('id_pegawai', $_SESSION['user_id']);
    $this->db->bind('id_event', $data['event_id']);
    $this->db->bind('asal_daerah', $data['asal_daerah']);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nik', $data['nik']);
    $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
    $this->db->bind('tempat_lahir', $data['tempat_lahir']);
    $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
    $this->db->bind('alamat_ktp', $data['alamat_ktp']);
    $this->db->bind('alamat_dom', $data['alamat_dom']);
    $this->db->bind('pendidikan', $data['pendidikan']);
    $this->db->bind('pekerjaan', $data['pekerjaan']);
    $this->db->bind('no_hp', $data['no_hp']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('upload_identitas', $identitas);
    $this->db->bind('berkas_syarat', $syarat);
    $this->db->execute();

    return $this->db->rowCount();
  }

  // Get Data Peserta
  public function getPesertaByEvent($id)
  {
    $this->db->query('SELECT * FROM ' . $this->daftarUmum . ' WHERE id_event=:id_event ORDER BY id DESC');
    $this->db->bind('id_event', $id);
    $result = $this->db->resultSet();

    return $result;
  }
}
