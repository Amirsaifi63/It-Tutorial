<!-- home page or index page start -->
<?php  include "header.php";?> 
  <!-- ======= Hero Section ======= -->
  <?php  
  include "admin/config.php";

$sql="SELECT `header`, `title` FROM `header_settings`";
$record=mysqli_query($conn,$sql);
$rows = array();
$row = mysqli_fetch_assoc($record);
  
  ?>
  <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
      <h1><?php echo $row['header']?></h1>
      <h2><?php echo $row['title']?></h2>
      <a href="about.php" class="btn-about">About Me</a>
    </div>
  </section><!-- End Hero -->
  <?php  include "footer.php";?> 
<!-- end index page -->