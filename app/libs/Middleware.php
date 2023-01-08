<?php
class Middleware extends Controller
{
  public static function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }

  public static function backAuth()
  {
    if (isset($_SESSION['level']) && ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'panitia')) {
      return true;
    }
    return false;
  }

  public static function frontAuth()
  {
    if (isset($_SESSION['level']) && ($_SESSION['level'] == 'peserta' || $_SESSION['level'] == 'pegawai')) {
      return true;
    }
    return false;
  }

  public static function isAdmin()
  {
    if (isset($_SESSION['level']) && ($_SESSION['level'] == 'admin')) {
      return true;
    }
    return false;
  }
}
