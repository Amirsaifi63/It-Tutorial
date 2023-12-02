
<?php  include "header.php" ?>
<!-- TERM CKEDITOR UPDATE DATA -->

<?php  include "sidebar.php" ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ckeditor term</h1>
        </div><!-- /.col -->        
      </div>
    </div>
  </div>
  <section class="content">
        <form action="termdata.php" method="post">
                <?php include "config.php";
                $sql="select * from term";
                $result=mysqli_query($conn ,$sql);
                $row=mysqli_fetch_assoc($result);
                ?>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
           <!-- TERM DATA FATCH-->
             <?php echo $row['description'];?>
           
            </textarea>
            <button type="submit" name="submit">submit</button>

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
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
$sql1 = "UPDATE term SET description='".$description."' WHERE id=1";
    $result=mysqli_query($conn,$sql1);
   
  }
}
?>
<!-- END TERM EDITOR -->
