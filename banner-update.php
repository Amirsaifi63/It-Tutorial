

<?php
include "config.php";
// BANNER add data
$id=$_POST['id'];


  $title = $_POST['title'];
  $description = $_POST['description'];

  $image = $_FILES['image'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  $sql="select * from banner where id=".$id;
  $res=mysqli_query($conn,$sql);
  $r=mysqli_fetch_assoc($res);
  
  if(isset($r['image']) && empty($image_name))
  {
 
    $sql1 = "UPDATE `banner` SET `title`='$title', `description`='$description' WHERE `id`=" . $id;
    $result=mysqli_query($conn,$sql1);
    if($result)
    {
        echo 1;
    }
    else{
        echo  0;
    }
}

    else
    {
        $sql1 = "UPDATE `banner` SET `title`='$title', `description`='$description', `image`='$image_name' WHERE `id`=" . $id;
        $result=mysqli_query($conn,$sql1);

    
        if(move_uploaded_file($image_tmp, __DIR__ . "/upload/" . $image_name))
        {
            echo 1;
        }
        else{
            echo  0;
        }
    }



?>




