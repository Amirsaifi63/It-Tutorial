<?php session_start(); ?>
<?php

// update login user profile
include 'config.php';
if (isset($_POST)) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    //update user data
    $sql = "UPDATE users SET name='" . $name . "',email='" . $email . "',password='" . $password . "',mobile='" . $mobile . "' ,dob='" . $dob . "' ,address='" . $address . "'  WHERE id=" . $id;
    $result = mysqli_query($conn, $sql);
    if (isset($result) ) {
      echo 1;
    } else {
      echo 0;
    }
  }





?>