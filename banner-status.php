<?php
// BANNER status change
include "config.php";
$id = $_POST['id'];
$sql="select * from banner WHERE id=".$id;
$record=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($record);
// print_r($sql);
if ($row['status'] == 1) 
{
    $sql = "UPDATE banner SET `status`='0' WHERE id=".$id;
    
    # code...
}
else
{
$sql = "UPDATE banner SET `status`='1' WHERE id=".$id;
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