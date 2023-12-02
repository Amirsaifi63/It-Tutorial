
<?php
// add category
include "config.php";
$name= $_POST['name'];
$description=$_POST['description'];
 
    $sql1 = "insert into category (name,description) values 
    ('".$name."','".$description."')";

    $run_query = mysqli_query($conn,$sql1);
    if($run_query)
    {
        echo 1;
    }
    else{
        echo 0;
    }

?>