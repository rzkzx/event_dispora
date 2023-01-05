<?php
class Tentang extends Controller
{

  public function __construct()
  {
    //new model instance
  }

  public function index()
  {

    $data = [
      'title' => 'Tentang Dinas Pemuda dan Olahraga Provinsi Kalimantan Selatan',
    ];

    $this->view('tentang/index', $data);
  }
}
