 <?php
  session_start();
  
  $db = new mysqli("localhost","root","1234","user");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>