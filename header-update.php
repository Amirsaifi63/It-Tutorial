
<?php
//HEADER UPDATE

include "config.php";
$id = $_POST['id'];
// project add data
if (isset($_POST) && isset($_FILES)) {

  $id=$_POST['id'];

  $favicon = $_POST['favicon'];
  $title = $_POST['title'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $image = $_FILES['image'];
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  $sql="select * from header_settings where id=".$id;
  $res=mysqli_query($conn,$sql);
  $r=mysqli_fetch_assoc($res);
  if(isset($r['logo_image']) && empty($image_name))
  {


    $sql1 = "UPDATE `header_settings` SET `favicon`='$favicon', `title`='$title', 
  `email`='$email', `contact`='$contact', `address`='$address', 
    WHERE `id`=" . $id;
    $result1 =  mysqli_query($conn, $sql1);


    if ($result1) {
      echo 1;
    } 
    else {
      echo  0;
    }
  }
   else {
    $sql1 = "UPDATE `header_settings` SET `favicon`='$favicon', `title`='$title', 
  `email`='$email', `contact`='$contact', `address`='$address', 
  `logo_image`='$image_name'  WHERE `id`=" . $id;
    $result =  mysqli_query($conn, $sql1);


    if (move_uploaded_file($image_tmp, __DIR__ . "/upload/" . $image_name)) {
      echo 1;
    } else {
      echo  0;
    }
  }
}

?>




