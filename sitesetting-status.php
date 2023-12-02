<?php
// SITESETTING STATUS CHANGE QUERY

include "config.php";
$id = $_POST['id'];
$sql="select * from Social_media_settings WHERE id=".$id;
$record=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($record);

if ($row['status'] == 1) 
{
    $sql = "UPDATE Social_media_settings SET `status`='0' WHERE id=".$id;

}
else
{
$sql = "UPDATE Social_media_settings SET `status`='1' WHERE id=".$id;
}

$run=mysqli_query($conn,$sql);

if($run)
{
    echo 1;
}
else{
    echo 0;
}

?>