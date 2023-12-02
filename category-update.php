
<?php
// CATEGORY UPDATE
include 'config.php';

    $id = $_POST['id']; 

	$name=$_POST['name'];

    $description=$_POST['description'];
	//update user data
	$sql="UPDATE category SET name='".$name."',description='".$description."'  WHERE id=".$id;

	$result = mysqli_query($conn, $sql);

		if ($result) 
		{

			     echo 1;
				}
				else
				{
				echo 0;
		}

   
?>


