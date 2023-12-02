
<?php
// PROJECT ADD

include "config.php";
// project add data
if(isset($_POST['name']) && isset($_FILES['image'])) {

  $name = $_POST['name'];
  $description = $_POST['description'];
  $category_id = $_POST['category_id'];
  $client_id = $_POST['client_id'];
  $hour = $_POST['hour'];   
  $image = $_FILES['image'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  $sql1 = "insert into project (name,description,category_id,client_id,hour,image) values 
    ('".$name."','".$description."','".$category_id."','".$client_id."','".$hour."','".$image_name."')";
    mysqli_query($conn,$sql1);



    if(move_uploaded_file($image_tmp, __DIR__ . "/upload/" . $image_name))
    {
        echo 1;
    }
    else{
        echo  0;
    }

}

