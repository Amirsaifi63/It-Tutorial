
<!-- about itprofessional pag -->
<?php include "header.php";?>
    <?php
    include "admin/config.php";
    $sql="select * from about";
    $result=mysqli_query($conn ,$sql);
    $row=mysqli_fetch_assoc($result);
    ?>
   <?php echo $row['description'];?>
  
<?php include "footer.php";?>
<!-- end about page -->