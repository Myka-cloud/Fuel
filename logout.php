<?php
 session_start();
unset($_SESSION['id']);
 header('Location:http://localhost/Panganiban/index.php');

unset($_SESSION['admin']);
 header('Location:http://localhost/Panganiban/index.php');
 
?>