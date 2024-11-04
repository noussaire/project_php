<?php
   $db = new PDO('mysql:host=localhost;dbname=prgphp;charset=utf8', 'root', '');
   if (!$db) {
       die("Connection failed: " . mysqli_connect_error());
       }
 
?>