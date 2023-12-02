

<?php
include "config.php";
// HEADER add data
if(isset($_POST) && isset($_FILES)) {

  $favicon = $_POST['favicon'];
  $title = $_POST['title'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];   

  $image = $_FILES['image'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  $sql1 = "insert into header_settings (logo_image,favicon,title,email,contact,address) values 
    ('".$image_name."','".$favicon."','".$title."','".$email."','".$contact."','".$address."')";
    mysqli_query($conn,$sql1);



    if(move_uploaded_file($image_tmp, __DIR__ . "/upload/" . $image_name))
    {
        echo 1;
    }
    else{
        echo  0;
    }

}

