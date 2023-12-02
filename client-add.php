<?php
// add client date
include "config.php";
$name= $_POST['name'];
$address=$_POST['address'];
$mobile=$_POST['mobile'];
   $sql1 = "insert into client (name,address,mobile) values 
    ('".$name."','".$address."','".$mobile."')";

    $run_query = mysqli_query($conn,$sql1);
    if($run_query)
    {
        echo 1;
    }
    else{
        echo 0;
    }

?>