<?php
// delete category querying
include "config.php";
$id = $_POST['id'];

$sql = "DELETE FROM category WHERE id=".$id;
$run=mysqli_query($conn,$sql);

if($run)
{
    echo 1;
}
else{
    echo 0;
}

?>