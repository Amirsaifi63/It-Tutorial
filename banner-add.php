
<?php
include "config.php";
// BANNER add data
if(isset($_POST) && isset($_FILES)) {

  $id = $_POST['id'];
  $title = $_POST['title'];   
  $description = $_POST['description'];   

  $image = $_FILES['image'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  $sql1 = "insert into banner (image,title,description) values 
    ('".$image_name."','".$title."','".$description."')";
    mysqli_query($conn,$sql1);
    if(move_uploaded_file($image_tmp, __DIR__ . "/upload/" . $image_name))
    {
        echo 1;
    }
    else{
        echo  0;
    }

}

