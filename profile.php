<?php
// ADMIN PROFILE UPDATE


include "config.php";
$id = 1;
$sql = "SELECT * FROM users WHERE id='" . $id . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
?>
<?php
include "header.php";
include "sidebar.php";
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pofile Update</h1>
        </div><!-- /.col -->
        <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="myform"method="POST" class="myform">

        <div class="modal-body">
          <label for="recipient-name" class="col-form-label">NAME</label>
          <input type="text" class="form-control" id="name" name="name" value='<?php echo $row['name']; ?>'>
        </div>
        <div class="modal-body">
          <label for="recipient-name" class="col-form-label">EMAIL</label>
          <input type="text" class="form-control" id="email" name="email" value='<?php echo $row['email']; ?>'>
        </div>
        <div class="modal-body">
          <label for="recipient-name" class="col-form-label">Password</label>
          <input type="text" class="form-control" id="password" name="password" value='<?php echo $row['password']; ?>'>
        </div>
        <div class="modal-body">
          <label for="Mobile" class="col-form-label">Mobile</label>
          <input type="text" class="form-control" id="mobile" name="mobile" value='<?php echo $row['mobile']; ?>'>
        </div>

        <div class="modal-body">
          <label for="dob" class="col-form-label">DOB</label>
          <input type="date" class="form-control" id="dob" name="dob" value='<?php echo $row['dob']; ?>'>
        </div>
        <div class="modal-body">
          <label for="address" class="col-form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" value='<?php echo $row['address']; ?>'>
        </div>
        <input type="hidden" class="form-control" id="id" name="id" value='<?php echo $row['id']; ?>'>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary save-button" name="submit" id="">submit</button>
    </div>
    </form>
</div>

</section>
<!-- /.content -->
</div>
<style>
  .error {
    color: brown;
  }
</style>
<script>
  // FORM VALIDATION AND AJAX
  $(document).ready(function() {
        $('#myform').validate({
              rules: {
                name: {
                  required: true,
                  minlength: 5
                },
                email: {
                  required: true,
                  email: true,
                },

                password: {
                  required: true,
                  minlength: 5
                },
                dob: {
                  required: true,
                },
                mobile: {
                  required: true,
                  minlength: 5,
                },

                address: {
                  required: true,
                  minlength: 5
                },
              },
                message: {
                  name: {
                    requred: "enter your name",
                    minlength: "name length shoud be 5 charactor",
                  },
                  email: {
                    requred: "enter your email",
                    email: "email should be email formate",
                  },
                  dob: {
                    requred: "enter your dob",
                  },
                  password: {
                    requred: "enter your password",
                    minlength: "name length shoud be 5 charactor",
                  },
                  address: {
                    requred: "enter your address",
                    minlength: "name length shoud be 5 charactor",
                  },
                  mobile: {
                    requred: "enter your mobile",
                    minlength: "name length shoud be 5 charactor",
                  },
                },


                submitHandler: function(form) {
                
                  var id = $("#id").val();
                  var name = $("#name").val();
                  var email = $("#email").val();
                  var dob = $("#dob").val();
                  var password = $("#password").val();
                  var address = $("#address").val();
                  var mobile = $("#mobile").val();
                  
                  
                  $.ajax({
                    url: 'profile-update.php',
                    type: 'POST',
                    data: 
                    {
                      id:id,
                      name:name,
                      email:email,
                      dob:dob,
                      password:password,
                      address:address,
                      mobile:mobile,                  
                    },                    
                 
                    success: function(data) {
                      if (data == 1) { 
             
                        window.location.replace('index.php')
                        // window.location.replace('www.google.co.in');                  

                      } else {
                        alert(data)
                      }
                    },
                  });
                
                },           
            });
          })
</script>
<?php include "footer.php"; ?>