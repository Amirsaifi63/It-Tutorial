
<?php
// MAIN INDEX PAGE OF IT PROFESSIONAL


include "header.php";
include "sidebar.php";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-danger">IT Professional Deshboard</h2>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?PHP INCLUDE "config.php";
                $sql="SELECT * FROM project ORDER BY id";
                 $result=mysqli_query($conn,$sql);       
                $rowcount=mysqli_num_rows($result);
                ?>
        <div class="row">
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $rowcount;?></h3>

                <p>PROJECT</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="project-index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <?PHP INCLUDE "config.php";
                $sql="SELECT * FROM client ORDER BY id";
                 $result=mysqli_query($conn,$sql);       
                $rowcount=mysqli_num_rows($result);
                ?>
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $rowcount;?></h3>

                <p>CLIENT</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="client-index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <?PHP INCLUDE "config.php";
                $sql="SELECT * FROM category ORDER BY id";
                 $result=mysqli_query($conn,$sql);       
                $rowcount=mysqli_num_rows($result);
                ?>
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $rowcount;?></h3>

                <p>CATEGORY</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="category-index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
</div>
    </section>
    <!-- /.content -->
</div>
<?php
include "footer.php";?>