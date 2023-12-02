
<?php

include "config.php";

$id=$_POST['id'];
if(isset($_POST) && isset($_FILES))
{



  $id=$_POST['id'];
  $name = $_POST['name'];
  $url = $_POST['url'];  
  $description = $_POST['description'];

  $image = $_FILES['image'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  $sql="select * from Social_media_settings where id=".$id;
  $res=mysqli_query($conn,$sql);
  $r=mysqli_fetch_assoc($res);
  if(isset($r['icon']) && empty($image_name))
  {

    $sql1 = "UPDATE `Social_media_settings` SET `name`='$name', `url`='$url', 
     `description`='$description' 
    WHERE `id`=" . $id;
      $result =  mysqli_query($conn, $sql1);
if(isset($result))
    {
        echo 1;
    }
    else{
        echo  0;
    }
  }
  else
  {
    $sql1 = "UPDATE `Social_media_settings` SET `name`='$name', `url`='$url', 
    `icon`='$image_name', `description`='$description' 
    WHERE `id`=" . $id;
      $result =  mysqli_query($conn, $sql1);
    if(move_uploaded_file($image_tmp, __DIR__ . "/upload/" . $image_name))
    {
        echo 1;
    }
    else{
        echo  0;
    }
  }

}

?>



