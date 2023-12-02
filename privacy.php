<!-- START PRIVACY PAGE -->
<?php include "header.php"; ?>

        <?php
            include "admin/config.php";
            $sql="select * from privacy";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result); 
        ?>   
<!-- ALL PRIVACY CONTAINT  -->
        <?php echo $row['description'];?>
    

<?php include "footer.php"; ?>