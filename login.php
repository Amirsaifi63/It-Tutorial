<!-- ADMIN LOGIN PAGE -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IT-Professional| Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>
<style> 
.error{
  color:red;
}</style>
<body class="hold-transition login-page">

  <div class="login-box">
    <div class="login-logo">
      <!-- <a href="../../index2.html"><b>IT</b>Profetional</a> -->
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Signin  IT Professional</p>
        <form action="valid.php" id="loginform" method="post"autocomplete="off">
        <div class="modal-body">
              <label for="recipient-name" class="col-form-label">EMAIL</label>
              <input type="text" class="form-control" id="email" name="email" value=''>
            </div>
        
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">PASSWORD</label>
              <input type="password" class="form-control" id="password" name="password" value=''>
            </div>

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="logged_in">Sign In</button>
          </div>
          <!-- /.col -->
      </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>

</body>

</html>
<script>
  $(document).ready(function() {
    $("#loginform").validate({
      // in 'rules' user have to specify all the constraints for respective fields
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 2,
        },

      },
      // in 'messages' user have to specify message as per rules
      messages: {

        email: {
          required: " Please enter a email",
          email: " email should be email formate",
        },
        password: {
          required: " Please enter a password",
          minlength: " Your password must be consist of at least 2 characters"
        },
      }

    });
  });
</script>