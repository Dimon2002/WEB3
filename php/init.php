<?php
   try {
      $mysqli = new mysqli('localhost', 'root', '', 'csgonews');
    
      if ($mysqli->connect_error) {
        die("Не могу подключиться к базе данных");
      }
    
      session_start();
   } catch (Exception $e) {
      die("Не могу подключиться к базе данных");
   }
?>
