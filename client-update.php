
<?php
// CLIENT UPDATE
include 'config.php';
// client update data
$id = $_POST['id'];
	$name=$_POST['name'];
    $address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$sql="UPDATE client SET name='".$name."',address='".$address."',mobile='".$mobile."'  WHERE id=".$id;
	$result = mysqli_query($conn, $sql);
		if ($result)
		{
		echo 1;
		}
		else{
		echo 0;
		}
?>


