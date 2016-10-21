<?php
 session_start();
 unset($_SERVER['no']);
 session_destroy();
 header('location:login.php');
 ?>

