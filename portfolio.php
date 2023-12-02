<!-- START PORTFOLLIO SECTION -->

<?php include "admin/config.php";
$sql = "SELECT `title`, `image`,`description` FROM `banner`";

$record = mysqli_query($conn, $sql);
$rows = array();
$row = mysqli_fetch_assoc($record); ?>
<style>
.portfolio-wrap 
{
    height: 300px;
    width: 300px;
}
</style>
<?php include "header.php";
?>
<main id="main">
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2><?php echo $row['title'] ?></h2>
                <p><?php echo $row['description'] ?></p>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container " data-aos="fade-up" data-aos-delay="200">
                <?php include "admin/config.php";
        $record = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($record)) {
          echo '    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="./admin/upload/' . $row['image'] . '" height="500px" width="500px"class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>' . $row["description"] . '</h4>
                  <p>' . $row["title"] . '</p>
                  <a href="./admin/upload/'.$row['image'] . '" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="'.$row["title"].'"><i class="bx bx-plus"></i></a>
                   </div>
              </div>
            </div>               
                ';
        }
        ?>
            </div>
        </div>
        </div>
    </section><!-- End Portfolio Section -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include "footer.php" ?>
<!-- end portfollio page -->