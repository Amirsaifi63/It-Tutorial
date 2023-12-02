<?php
// logout login user with all session variable
session_start();
session_unset();
session_destroy();
header("Location:login.php");
?>