<?php
// RESET PASSWORD QUERY

$id = $_POST["id"];
include "config.php";
if (isset($_POST)) {
    $result1 = mysqli_query($conn, "SELECT *from users WHERE id='" . $id . "'");
    $password=$_POST['password'];
    $newpassword=$_POST['newpassword'];
    $confirmpassword=$_POST['confirmpassword'];
    $row = mysqli_fetch_array($result1);
   
    if ($password == $row["password"] && $newpassword == $confirmpassword) {

        $sql="UPDATE users set password='" . $newpassword. "' WHERE id='" . $id . "'";

        mysqli_query($conn,$sql);      

         echo 1;
        }
        else{
        echo 0;
        }
}
