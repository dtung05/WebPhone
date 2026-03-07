 
 <?php 
   define('_DIR_ROOT',__DIR__); // đường dẫn vật lý trên server  
      $web_root = "";
      $foder = rtrim(dirname($_SERVER['SCRIPT_NAME']),'/');
   if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'off'){
      $web_root = "https://" . $_SERVER['HTTP_HOST'].$foder;
   }else{
      $web_root = "http://" . $_SERVER['HTTP_HOST'].$foder;
   }
   
   define('_WEB_ROOT',$web_root);
   require_once 'app/config/database.php'; // lưu cấu hình database
   global $db_config;
   require_once 'app/core/Connect.php';// gọi connect
  
   require_once 'app/core/Controller.php';
   Controller::init($db_config);
   require_once 'app/App.php';
    