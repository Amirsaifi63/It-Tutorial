<!-- faq data page -->
<?php  include "header.php";?>
<?php include "admin/config.php";

$sql="select * from faq";
$result=mysqli_query($conn ,$sql);
$row=mysqli_fetch_assoc($result);?>

<!-- containt of faq  -->
<?php echo $row['description'];?>
<!-- end faq containt -->

<?php  
include "footer.php";
?>