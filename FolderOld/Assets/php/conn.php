<?php 
    session_start();
    $ketnoi = mysqli_connect('localhost','root','','webphone');
    function redirect($url){
        header("location: $url");
        exit();
    }
  
  
?>