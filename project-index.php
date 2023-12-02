<?php
// PROJECT INDEX PAGE CONTAINT
// check login user

include "header.php";
include "sidebar.php";
?>

<!-- header for project -->
<!-- Content Header (Page header) -->
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">PROJECT DETAIL</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <button class="btn btn-success" id="addBtn">ADD PROJECT</button>
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
            <h5 class="modal-title" id="exampleModalLabel">ADD NEW PROJECT </h5>
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
              <label for="recipient-name" class="col-form-label">Description</label>
              <input type="text" class="form-control" id="description" name="description" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">CATEGORY _ID</label>
              <select name="category_id" id="category_id" class="form-control" aria-label="Default select example">
                <option selected>SELECT CATEGORY_ID</option>
                <?php include "config.php";
                $list = mysqli_query($conn, "select * from category order by id asc");
                while ($row_list = mysqli_fetch_assoc($list)) {   ?>
                  <option value="<?php echo $row_list['id'] ?>"><?php echo $row_list['id'] ?>
                  <?php } ?>
                  </option>
              </select>
            </div>
            <div class="modal-body">
              <label for="" class="col-form-label">CLIENT_ID</label>
              <select name="client_id" id="client_id" class="form-control" aria-label="Default select example">
                <option selected>SELECT CLIENT</option>
                <?php include "config.php";
                $list = mysqli_query($conn, "select * from client order by id asc");
                while ($row_list = mysqli_fetch_assoc($list)) {   ?>
                  <option value="<?php echo $row_list['id'] ?>">
                    <?php echo $row_list['id'] ?> <?php } ?>
                  </option>
              </select>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">HOUR</label>
              <input type="text" class="form-control" id="hour" name="hour" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">IMAGE</label>
              <input type="file" class="form-control" id="image" name="image" value=''>
            </div>
            <input type="hidden" class="form-control" id="project_id" name="project_id" value=''>
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
            <h5 class="modal-title" id="exampleModalLabel">PROJECT EDIT FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="myform1" enctype="multipart/form-data" class="myform1">
            <div class="modal-body">
              <input class="form-control" type="hidden" id="projectid" name="id" value='' aria-label="Disabled input example" readonly>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">NAME</label>
              <input type="text" class="form-control" id="name1" name="name" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">Description</label>
              <input type="text" class="form-control" id="description1" name="description" value=''>
            </div>
            <div class="modal-body">
              <label for="" class="col-form-label">CATEGORY_ID</label>
              <select name="category_id" id="category_id1" class="form-control" aria-label="Default select example">
                <option selected>SELECT CATEGORY</option>
                <?php include "config.php";

                $list = mysqli_query($conn, "select * from category order by id asc");
                while ($row_list = mysqli_fetch_assoc($list)) {
                  echo '<option value="' . $row_list['id'] . '">' . $row_list['id'] . '
                        </option>';
                } ?>
                </option>
              </select>
            </div>

            <div class="modal-body">
              <label for="" class="col-form-label">CLIENT_ID</label>
              <select name="client_id" id="client_id1" class="form-control" aria-label="Default select example">
                <option selected>SELECT CLIENT</option>
                <?php include "config.php";
                $list = mysqli_query($conn, "select * from client order by id asc");
                while ($row_list = mysqli_fetch_assoc($list)) {
                  echo '<option value="' . $row_list['id'] . '">' . $row_list['id'] . '
                    </option>';
                } ?>
                </option>
              </select>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">HOUR</label>
              <input type="text" class="form-control" id="hour1" name="hour" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">IMAGE</label>
              <input type="file" class="form-control" id="image1" name="image" value=''>
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
    <table id="example" class="table-datatable table-bordered  display responsive nowrap dataDisplay" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Description</th>
          <th>CATEGORY_ID</th>
          <th>CLIENT_ID</th>
          <th>HOUR</th>
          <th>IMAGE</th>
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
        url: "project-data.php",
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
          "data": 'description'
        },
        {
          "data": 'category_id'
        },
        {
          "data": 'client_id'
        },
        {
          "data": 'hour'
        },
        {
          "data": 'image'
        },

        {
          "data": 'action'
        },
      ]
    });

    //project save data    
    $("#myform").validate({
      // in 'rules' user have to specify all the constraints for respective fields
      rules: {
        name: {
          required: true,
          minlength: 3,
        },
        description: {
          required: true,
          minlength: 3,
        },
        hour: {
          required: true,

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

        name: {
          required: " Please enter a name",
          minlength: " Your name must be consist of at least 3 characters"
        },
        description: {
          required: " Please enter a description",
          minlength: " Your description must be consist of at least 3 characters"
        },
        hour: {
          required: " Please enter a time in hour",

        },

      },

      submitHandler: function(form) {
      let formImage = new FormData();
      var name = $("#name").val();
      var description = $("#description").val();
      var category_id = $("#category_id").val();
      var client_id = $("#client_id").val();
      var hour = $("#hour").val();
      var image = $("#image").val();
      // formImage.append('project_id', project_id);
      formImage.append('name', name);
      formImage.append('description', description);
      formImage.append('category_id', category_id);
      formImage.append('client_id', client_id);
      formImage.append('hour', hour);
      formImage.append('image', $('#image')[0].files[0]);
      $.ajax({
        url: 'project-add.php',
        type: 'POST',
        data: formImage,
        processData: false,
        contentType: false,
        success: function(data) {
          // console.log(data);
          if (data == 1) {
            $('#ModalNew').modal('toggle');

            // alert("Data Inserted Successfully");
            $("#example").DataTable().ajax.reload();

          } else {
        alert(data)
          }
        }
      });
    },
  });
    //project update form
    $("#myform1").validate({
      // in 'rules' user have to specify all the constraints for respective fields
      rules: {
        name: {
          required: true,
          minlength: 3,
        },
        description: {
          required: true,
          minlength: 3,
        },
        hour: {
          required: true,

        },


      },
      // in 'messages' user have to specify message as per rules
      messages: {
       

        name: {
          required: " Please enter a name",
          minlength: " Your name must be consist of at least 3 characters"
        },
        description: {
          required: " Please enter a description",
          minlength: " Your description must be consist of at least 3 characters"
        },
        hour: {
          required: " Please enter a time in hour",

        },

      },

      submitHandler: function(form) {
        let edit_id = $(this).attr('data-id');
        let formImage = new FormData();
        var id = $("#projectid").val();
        var name = $("#name1").val();
        var description = $("#description1").val();
        var category_id = $("#category_id1").val();
        var client_id = $("#client_id1").val();
        var hour = $("#hour1").val();
        var image = $("#image1").val();
        // alert(id);
        // formImage.append('project_id', project_id);
        formImage.append('id', id);
        formImage.append('name', name);
        formImage.append('description', description);
        formImage.append('category_id', category_id);
        formImage.append('client_id', client_id);
        formImage.append('hour', hour);
        formImage.append('image', $('#image1')[0].files[0]);


        $.ajax({
          url: 'project-update.php',
          type: 'POST',
          data: formImage,
          processData: false,
          contentType: false,
          success: function(data) {
            // console.log(data);
            if (data == 1) {

              
   
              $("#example").DataTable().ajax.reload();

            } else {
              alert('edit_operations not successfull');
            }
          }
        });
      },
    });

    // project open edit form with data
    $(document).on('click', '.edit_btn', function(e) {
      e.preventDefault();
      let edit_id = $(this).attr('data-id');
      $('#ModalNew1').modal('toggle');
      $('#projectid').val(edit_id);
      $name = $(this).parent().parent().find("td").eq(1).html();
      $('#name1').attr('value', $name);

      $description = $(this).parent().parent().find("td").eq(2).html();
      $('#description1').attr('value', $description);
      $category_id = $(this).parent().parent().find("td").eq(3).html();
      $("#category_id1 :selected").text($category_id);
      $client_id = $(this).parent().parent().find("td").eq(4).html();
      $("#client_id1 :selected").text($client_id);
      $hour = $(this).parent().parent().find("td").eq(5).html();
      $('#hour1').attr('value', $hour);
      $image = $(this).parent().parent().find("td").eq(6).html();
      $('#image1').text($image);
      // $('#image1').append($($image));

      $('#myform1').trigger('reset');
    });
    // project add  modal form open

    $('#addBtn').click(function(e) {
      e.preventDefault();
      $('#ModalNew').modal('toggle');
      $('#myform').trigger('reset');

    });

    // project delete ajax 
    $(document).on("click", ".delete_btn", function(e) {
      e.preventDefault();
      var result = confirm("do you want to delete this record ?");
      if (result) {
        var delete_id = $(this).attr("data-id");
        $.ajax({
          url: "project-delete.php",
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
        url: "project-status.php",
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

  });
</script>

<!--main content header close-->


<?php include "footer.php"; ?>