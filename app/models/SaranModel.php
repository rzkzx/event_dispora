
<?php
class SaranModel
{
  private $db;
  private $table = 'form_saran';


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

  public function add($data)
  {
    $tanggal = date("Y-m-d");

    $query = "INSERT INTO " . $this->table . " (nama, email, no_hp, pesan, tanggal ) 
    VALUES (:nama, :email, :no_hp, :pesan, :tanggal)";


    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('no_hp', $data['no_hp']);
    $this->db->bind('pesan', $data['pesan']);
    $this->db->bind('tanggal', $tanggal);
    $this->db->execute();

    return $this->db->rowCount();
  }
}
