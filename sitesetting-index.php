
<?php
// SITE SETTING INDEX PAGE

// check login user

include "header.php";
include "sidebar.php";
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">SITESETTING DETAIL</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <button class="btn btn-success" id="addBtn">ADD SITESETTING</button>
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
            <h5 class="modal-title" id="exampleModalLabel">CREATE SITESETTING FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="myform" enctype="multipart/form-data" class="myform">

            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">NAME</label>
              <input type="text" class="form-control" id="name" name="name" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">URL</label>
              <input type="text" class="form-control" id="url" name="url" value=''>
            </div>

            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">ICON</label>
              <input type="file" class="form-control" id="image" name="image" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">DESCRIPTION</label>
              <input type="text" class="form-control" id="description" name="description" value=''>
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
            <h5 class="modal-title" id="exampleModalLabel">SITESETTING EDIT FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="myform1" enctype="multipart/form-data" class="myform1">
            <div class="modal-body">
              <input class="form-control" type="hidden" id="sitesettingid" name="id" value='' aria-label="Disabled input example" readonly>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">NAME</label>
              <input type="text" class="form-control" id="name1" name="name" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">URL</label>
              <input type="text" class="form-control" id="url1" name="url" value=''>
            </div>

            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">ICON</label>
              <input type="file" class="form-control" id="image1" name="image" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">DESCRIPTION</label>
              <input type="text" class="form-control" id="description1" name="description" value=''>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary update"  name="submit" id="update">Save
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
          <th>NAME</th>
          <th>URL</th>
          <th>ICON</th>
          <th>DESCRIPTION</th>
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
// SITESETTING DATATABLE 
        $('.dataDisplay').DataTable({
          ajax: {
            url: "sitesetting-data.php",
            type: "GET",
            dataSrc: "",
          },
          columns: [{
              "data": 'id'
            },

            {
              "data": 'name'
            },
            {
              "data": 'url'
            },
            {
              "data": 'icon'
            },
            {
              "data": 'description'
            },

            {
              "data": 'status'
            },
            {
              "data": 'action'
            },
          ]
        });
        // SITESETTING  MODATA FORM OPEN
        $('#addBtn').click(function(e) {
          e.preventDefault();
          $('#ModalNew').modal('toggle');
          $('#myform').trigger('reset');

        });
        // FATCH EDIT DATA 
        $(document).on('click', '.edit_btn', function(e) {
          e.preventDefault();
          let edit_id = $(this).attr('data-id');
          $('#ModalNew1').modal('toggle');
          $('#sitesettingid').val(edit_id);
          $name = $(this).parent().parent().find("td").eq(1).html();
          $('#name1').attr('value', $name);

          $url = $(this).parent().parent().find("td").eq(2).html();
          $('#url1').attr('value', $url);

          $image = $(this).parent().parent().find("td").eq(3).html();
          $('#image1').text($image);

          $description = $(this).parent().parent().find("td").eq(4).html();
          $("#description1").attr('value', $description);
        });


  // VALIDATION OF SITESETTING ADD MODAL AND WITH AJAX
        $("#myform").validate({
            // in 'rules' user have to specify all the constraints for respective fields
            rules: {
              name: {
                required: true,
                minlength: 3,
              },
              url: {
                required: true,

              },
              description: {
                required: true,
                minlength: 3,
              },

              image: {
                required: true,
                extension: "jpg|jpeg|png|ico|bmp"
              },


            },
              // in 'messages' user have to specify message as per rules
              messages: {
                image: {
                  required: "Please upload file.",
                  extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
                },

                name: {
                  required: " Please enter a name",
                  minlength: " Your name must be consist of at least 3 characters"
                },
                description: {
                  required: " Please enter a description",
                  minlength: " Your description must be consist of at least 3 characters"
                },
                url: {
                  required: " Please enter a url",

                },
              },            

           submitHandler: function(form) {
          let formImage = new FormData();
          var image = $("#image").val();
          var name = $("#name").val();
          var url = $("#url").val();
          var description = $("#description").val();

          formImage.append('name', name);
          formImage.append('url', url);
          formImage.append('description', description);
          formImage.append('image', $('#image')[0].files[0]);

          $.ajax({
            url: 'sitesetting-add.php',
            type: 'POST',
            data: formImage,
            processData: false,
            contentType: false,
            success: function(data) {
              // console.log(data);
              if (data == 1) {
                $('#ModalNew').modal('toggle');

                $("#example").DataTable().ajax.reload();
              } else {
                alert("Data not Inserted Successfully");
              }
            }
          });
        },
      });      

        // SITESETTING  delete ajax 
        $(document).on("click", ".delete_btn", function(e) {
          e.preventDefault();
          var result = confirm("Want to delete?");
          if (result) { 

            var delete_id = $(this).attr("data-id");
            $.ajax({
              url: "sitesetting-delete.php",
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
// STATUS CHANGE AJAX JQUERY
        $(document).on("click", ".status_btn", function(e) {
          e.preventDefault();
          var status = $(this).attr("data-id");
          $.ajax({
            url: "sitesetting-status.php",
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
        // UPDATA DATA AJAX AND VALIDATION
        $("#myform1").validate({

            rules: {
              name: {
                required: true,
                minlength: 3,
              },
              url: {
                required: true,

              },
              description: {
                required: true,
                minlength: 3,
              },

              // image1: {
                // required: true,
              //   extension: "jpg|jpeg|png|ico|bmp"
              // },


            },
              // in 'messages' user have to specify message as per rules
              messages: {
                // image1: {
                  // required: "Please upload file.",
                //   extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
                // },

                name: {
                  required: " Please enter a name",
                  minlength: " Your name must be consist of at least 3 characters"
                },
                description: {
                  required: " Please enter a description",
                  minlength: " Your description must be consist of at least 3 characters"
                },
                url: {
                  required: " Please enter a url",

                },
              },           

              submitHandler: function(form) {
                let edit_id = $(this).attr('data-id');
                let formImage = new FormData();
                var id = $("#sitesettingid").val();
                var name = $("#name1").val();
                var url = $("#url1").val();
                var description = $("#description1").val();
                var image = $("#image1").val();

                formImage.append('id', id);
                formImage.append('name', name);
                formImage.append('url', url);
                formImage.append('description', description);
                formImage.append('image', $('#image1')[0].files[0]);

                $.ajax({
                  url: 'sitesetting-update.php',
                  type: 'POST',
                  data: formImage,
                  processData: false,
                  contentType: false,
                  success: function(data) {
                    // console.log(data);
                    if (data == 1) {
             
                      $('#ModalNew1').modal('toggle');

                      alert("Data Inserted Successfully");
                      $("#example").DataTable().ajax.reload();

                    } else {
                      alert(data);
                    }
                  }

                });
            
            },
          });
        
        });
</script>
<?php include "footer.php"; ?>