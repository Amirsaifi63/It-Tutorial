<!-- START TERM  -->
<?php  include "header.php";?>
<?php include "admin/config.php";
$sql="select * from term";
$result=mysqli_query($conn ,$sql);
$row=mysqli_fetch_assoc($result);

?>
<!-- TERM CONTAINT -->
<?php echo $row['description'];?>
<!-- END CONTAINT -->
<?php  
include "footer.php";
?>
<!-- END TERM -->