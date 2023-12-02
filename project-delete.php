

<?php
// project DELETE QUERY
include "config.php";
$id = $_POST['id'];
$sql1="select * from project WHERE id=".$id;
$record=mysqli_query($conn,$sql1);
$row = mysqli_fetch_assoc($record);
// print_r($sql);
if ($row['is_deleted'] == 0) 
{
    $sql = "UPDATE project SET `is_deleted`='1' WHERE id=".$id;
}
else
{
$sql = "UPDATE project SET `is_deleted`='0' WHERE id=".$id;

}
// print_r($sql);
$run=mysqli_query($conn,$sql);

if($run)
{
    echo 1;
}
else{
    echo 0;
}

?>