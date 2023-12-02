<?php
// HEADER INDEX
// check login user

include "header.php";
include "sidebar.php";
?>

<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">HEADER DETAIL</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <button class="btn btn-success" id="addBtn">ADD HEADER</button>
            </li>

          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <!-- project add button -->


    <!-- /* project add modal form */ -->
    <div class="modal fade" id="ModalNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="ModalNew">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CREATE HEADER FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="myform" enctype="multipart/form-data" class="myform">
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">LOGO IMAGE</label>
              <input type="file" class="form-control" id="image" name="image" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">FAVICON</label>
              <input type="text" class="form-control" id="favicon" name="favicon" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">TITLE</label>
              <input type="text" class="form-control" id="title" name="title" value=''>
            </div>

            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">EMAIL</label>
              <input type="text" class="form-control" id="email" name="email" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">CONTACT_NUMBER</label>
              <input type="text" class="form-control" id="contact" name="contact" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">ADDRESS</label>
              <input type="text" class="form-control" id="address" name="address" value=''>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary save-button" name="submit" id="save-form">Save
                changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- project edit form -->
    <div class="modal fade" id="ModalNew1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="ModalNew">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">HEADER EDIT FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="myform1" enctype="multipart/form-data" class="myform1">
            <div class="modal-body">
              <input class="form-control" type="hidden" id="headerid" name="id" value='' aria-label="Disabled input example" readonly>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">LOGO IMAGE</label>
              <input type="file" class="form-control" id="image1" name="image" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">FAVICON</label>
              <input type="text" class="form-control" id="favicon1" name="favicon" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">TITLE</label>
              <input type="text" class="form-control" id="title1" name="title" value=''>
            </div>

            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">EMAIL</label>
              <input type="text" class="form-control" id="email1" name="email" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">CONTACT_NUMBER</label>
              <input type="text" class="form-control" id="contact1" name="contact" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">ADDRESS</label>
              <input type="text" class="form-control" id="address1" name="address" value=''>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary update" name="submit" id="update">Save
                changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- project datatable -->
    <table id="example" class="table-datatable table-bordered dataDisplay" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>FAVICON</th>
          <th>TITLE</th>
          <th>EMAIL</th>
          <th>CONTACT</th>
          <th>ADDRESS</th>
          <th>LOGO IMAGE</th>
          <th>STATUS</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="datadisplay"></tbody>
    </table>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <!-- project datatable end  -->
</div>
<!-- main containt header close -->
<style>
  .error {
    color: blueviolet
  }
</style>
<script>
  $(document).ready(function() {

    // project  data table ajax
    $('.dataDisplay').DataTable({
      ajax: {
        url: "header-data.php",
        type: "GET",
        dataSrc: "",
      },
      columns: [{
          "data": 'id'
        },

        {
          "data": 'favicon'
        },
        {
          "data": 'title'
        },
        {
          "data": 'email'
        },
        {
          "data": 'contact'
        },
        {
          "data": 'address'
        },
        {
          "data": 'image'
        },

        {
          "data": 'status'
        },
        {
          "data": 'action'
        },
      ]
    });
    $('#addBtn').click(function(e) {
      e.preventDefault();
      $('#ModalNew').modal('toggle');
      $('#myform').trigger('reset');
    });
    $(document).on('click', '.edit_btn', function(e) {
      e.preventDefault();
      let edit_id = $(this).attr('data-id');
      $('#ModalNew1').modal('toggle');
      $('#headerid').val(edit_id);
      $favicon = $(this).parent().parent().find("td").eq(1).html();
      $('#favicon1').attr('value', $favicon);
      $title = $(this).parent().parent().find("td").eq(2).html();
      $('#title1').attr('value', $title);
      $email = $(this).parent().parent().find("td").eq(3).html();
      $("#email1").attr('value', $email);
      $contact = $(this).parent().parent().find("td").eq(4).html();
      $("#contact1").attr('value', $contact);
      $address = $(this).parent().parent().find("td").eq(5).html();
      $('#address1').attr('value', $address);
      $image = $(this).parent().parent().find("td").eq(6).html();
      $('#image1').text($image);

    });



   




    // project delete ajax 
    $(document).on("click", ".delete_btn", function(e) {
      e.preventDefault();
      var result = confirm("Want to delete?");
      if (result) {
        //Logic to delete the item


        var delete_id = $(this).attr("data-id");
        $.ajax({
          url: "header-delete.php",
          type: "POST",
          data: {
            'id': delete_id
          },
          success: function(data) {
            if (data == 1) {
              //  alert("Data Deleted Successfully");
              $("#example").DataTable().ajax.reload();
            } else {
              alert("error");
              alert(data);
            }
          }
        });
      }
    });

    $(document).on("click", ".status_btn", function(e) {
      e.preventDefault();
      var status = $(this).attr("data-id");
      $.ajax({
        url: "header-status.php",
        type: "POST",
        data: {
          'id': status
        },
        success: function(data) {
          if (data == 1) {
            //  alert("Data Deleted Successfully");
            $("#example").DataTable().ajax.reload();
          } else {
            alert("error");
            alert(data);
          }
        }
      });
    });
    $("#myform").validate({
      // in 'rules' user have to specify all the constraints for respective fields
      rules: {
        favicon: {
          required: true,
          minlength: 3,
        },
        title: {
          required: true,

        },
        email: {
          required: true,
          email: true,
        },
        contact: {
          required: true,
          minlength: 3,
        },
        address: {
          required: true,
          minlength: 3,
        },

        // image: {
        //   required: true,
        //   extension: "jpg|jpeg|png|ico|bmp"
        // }


      },
      // in 'messages' user have to specify message as per rules
      messages: {
        // image: {
        //   required: "Please upload file.",
        //   extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
        // },

        favicon: {
          required: " Please enter a favicon",
          minlength: " Your name must be consist of at least 3 characters"
        },
        address: {
          required: " Please enter a address",
          minlength: " Your description must be consist of at least 3 characters"
        },
        title: {
          required: " Please enter a title",

        },
        email: {
          required: " Please enter a email",
          email: "enter valid email address",

        },

      },
      submitHandler: function(form) {
  
      // let project_id = $(this).data('project_id');
      let formImage = new FormData();
      var image = $("#image").val();
      var favicon = $("#favicon").val();
      var title = $("#title").val();
      var email = $("#email").val();
      var contact = $("#contact").val();
      var address = $("#address").val();
      // formImage.append('project_id', project_id);
      formImage.append('favicon', favicon);
      formImage.append('title', title);
      formImage.append('email', email);
      formImage.append('contact', contact);
      formImage.append('address', address);
      formImage.append('image', $('#image')[0].files[0]);

      $.ajax({
        url: 'header-add.php',
        type: 'POST',
        data: formImage,
        processData: false,
        contentType: false,
        success: function(data) {
          // console.log(data);
          if (data == 1) {
  

            $("#example").DataTable().ajax.reload();

          } else {
            alert("Data not Inserted Successfully");


          }
        }
      });
    }
  });
    $("#myform1").validate({
      // in 'rules' user have to specify all the constraints for respective fields
      rules: {
        favicon: {
          required: true,
          minlength: 3,
        },
        title: {
          required: true,

        },
        email: {
          required: true,
          email: true,
        },
        contact: {
          required: true,
          minlength: 3,
        },
        address: {
          required: true,
          minlength: 3,
        },

        image: {
          required: true,
          extension: "jpg|jpeg|png|ico|bmp"
        }


      },
      // in 'messages' user have to specify message as per rules
      messages: {
        image: {
          required: "Please upload file.",
          extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
        },

        favicon: {
          required: " Please enter a favicon",
          minlength: " Your name must be consist of at least 3 characters"
        },
        address: {
          required: " Please enter a address",
          minlength: " Your description must be consist of at least 3 characters"
        },
        title: {
          required: " Please enter a title",

        },
        email: {
          required: " Please enter a email",
          email: "enter valid email address",

        },

      },
      submitHandler: function(form) {
      let edit_id = $(this).attr('data-id');
      let formImage = new FormData();
      var id = $("#headerid").val();
      var favicon = $("#favicon1").val();
      var title = $("#title1").val();
      var email = $("#email1").val();
      var contact = $("#contact1").val();
      var address = $("#address1").val();
      var image = $("#image1").val();

      formImage.append('id', id);
      formImage.append('favicon', favicon);
      formImage.append('title', title);
      formImage.append('email', email);
      formImage.append('contact', contact);
      formImage.append('address', address);
      formImage.append('image', $('#image1')[0].files[0]);
      $.ajax({
        url: 'header-update.php',
        type: 'POST',
        data: formImage,
        processData: false,
        contentType: false,
        success: function(data) {
          // console.log(data);
          if (data == 1) {
            $('#ModalNew1').modal('toggle');

            // alert("Data Inserted Successfully");
            $("#example").DataTable().ajax.reload();

          } else {
            alert(data);
          }
        }
      });
    }
  });

      });
  
</script>

<!--main content header close-->


<?php include "footer.php"; ?>