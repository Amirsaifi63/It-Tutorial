<!-- START RESUME  -->
<?php include "header.php";?>
<main id="main">
<!-- ======= Resume Section ======= -->
<section id="resume" class="resume">
  <div class="container" data-aos="fade-up">  
    <div class="row">
      <?php 
include "admin/config.php";
$sql="select * from resume";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
?>
<!-- RESUME CONTAINT -->
<?php echo $row['description'];?>
<!-- END RESUME CONTAINT -->
    </div>
  </div>
</section><!-- End Resume Section -->
</main><!-- End #main -->
<?php
include "footer.php";
?>