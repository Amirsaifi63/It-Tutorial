<!-- PRIVACY CONTAINT  -->
<?php  include "header.php" ?>
<?php  include "sidebar.php" ?>
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ckeditor privacy</h1>
        </div><!-- /.col -->
        
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">

        <form action="privacydata.php" method="post">
        <?php include "config.php";
                $sql="select * from privacy";
                $result=mysqli_query($conn ,$sql);
                $row=mysqli_fetch_assoc($result);
                ?>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
      <!-- FETCH PRIVACY CONTAINT -->
             <?php echo $row['description'];?>
           
            </textarea>
            <button type="submit" name="submit">submit</button>

            <script>
            
                CKEDITOR.replace('editor1');
            </script>
        </form>
</section>
</div>
<?php  include "footer.php" ?>

<?php  
include "config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['submit']))
  {


$description=$_POST["editor1"];
$sql1 = "UPDATE privacy SET description='".$description."' WHERE id=1";
    $result=mysqli_query($conn,$sql1);
   
  }
}
?>
