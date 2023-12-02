<?php
// change password 

include "header.php";
include "sidebar.php";
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Password Reset</h1>
        </div><!-- /.col -->
       <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CHANGE PASSWORD FORM</h5>
          
        </div>
        <form id="myform" class="myform">
          <div class="modal-body">
            <input class="form-control" type="hidden" id="passwordid" name="id" value='<?php echo $_SESSION['id'] ?>' aria-label="Disabled input example" readonly>
          </div>
          <div class="modal-body">
            <label for="recipient-name" class="col-form-label">PASSWORD</label>
            <input type="text" class="form-control" id="password" name="password" value=''>
          </div>
          <div class="modal-body">
            <label for="recipient-name" class="col-form-label">NEW PASSWORD</label>
            <input type="text" class="form-control" id="newpassword" name="newpassword" value=''>
          </div>
          <div class="modal-body">
            <label for="recipient-name" class="col-form-label">CONFIRM PASSWORD</label>
            <input type="text" class="form-control" id="confirmpassword" name="confirmpassword" value=''>
          </div>
          <div class="modal-footer">

            <button type="submit" class="btn btn-primary save-button" name="submit" id="save-form">Save
              changes</button>
          </div>
        </form>
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<style>.error{color:brown;}</style>
<script>
  $(document).ready(function() {
        $('#myform').validate({
              rules: {
                password: {
                  required: true,
                  minlength: 5
                },
                confirmpassword: {
                  required: true,
                  minlength: 5,
                  equalTo: "#newpassword"
                },
              },
                submitHandler: function(form) {
                    var id = $("#passwordid").val();
                    var password = $("#password").val();
                    var newpassword = $("#newpassword").val();
                    var confirmpassword = $("#confirmpassword").val();
                    $.ajax({
                          url: 'resetpwd.php',
                          type: 'POST',
                          data: {
                            id: id,
                            password: password,
                            newpassword: newpassword,
                            confirmpassword: confirmpassword,
                          },
               
                          success: function(data) {
                            // console.log(data);
                            if (data == 1) {
                  
                              alert("password change successfully");
                            $('#myform').trigger('reset');


                            } else {
                              alert("cant insert record record");
                              alert(data);
                            }
                          }
                        });
                      },
                    });
                  });
</script>


<?php include "footer.php"; ?>