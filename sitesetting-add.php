
<?php
//  CREATE SITE SETTING QUERY 

include "config.php";
if(isset($_POST) && isset($_FILES)) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $url = $_POST['url'];
  $description = $_POST['description'];   

  $image = $_FILES['image'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  $sql1 = "insert into Social_media_settings (name,url,icon,description) values 
    ('".$name."','".$url."','".$image_name."','".$description."')";
    mysqli_query($conn,$sql1);
    // FILE UPLOAD 
    if(move_uploaded_file($image_tmp, __DIR__ . "/upload/" . $image_name))
    {
        echo 1;
    }
    else{
        echo  0;
    }

}

