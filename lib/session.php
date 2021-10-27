<?php
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){
    $_SESSION[$key] = $val;
 }

 public static function get($key){
    if (isset($_SESSION[$key])) {
     return $_SESSION[$key];
    } else {
     return false;
    }
 }

 public static function checkSessionSite(){
    //self::init();
    if (self::get("login") == false) {
     //self::destroy();
     header("Location:".BASE_URL);
    }
 }
 public static function checkSessionAdmin(){
    //self::init();
    if (self::get("login_admin") == false) {
     //self::destroy();
     header("Location:".BASE_URL."admin/?action=login");
    }
 }
 public static function checkLoginAdmin(){
    //self::init();
    if (self::get("login_admin") == true) {
     header("Location:".BASE_URL."admin");
    }
 }


 public static function destroy(){
  session_destroy();
  header("Location:index.php");
 }
 public static function unset($key){
  if(self::get($key)) {
    unset($_SESSION[$key]);
  }

 }
}
?>