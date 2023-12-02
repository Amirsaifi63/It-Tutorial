<?php
// BANNER INDEX PAGE
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
          <h1 class="m-0">BANNER DETAIL</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"> 
                    <button class="btn btn-success" id="addBtn">ADD BANNER</button>
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
 

    <!-- /* BANNER add modal form */ -->
    <div class="modal fade" id="ModalNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="ModalNew">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">CREATE BANNER FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="myform" enctype="multipart/form-data" class="myform">
         
          <div class="modal-body">
              <label for="recipient-name" class="col-form-label">IMAGE</label>
              <input type="file" class="form-control" id="image" name="image" value=''>
            </div>

            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">TITLE</label>
              <input type="text" class="form-control" id="title" name="title" value=''>
            </div>       
          
        
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">DESCRIPTION</label>
              <input type="text" class="form-control" id="description" name="description" value=''>
            </div>
          

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary save-button"  name="submit" id="save-form">Save
                changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- BANNER edit form -->
    <div class="modal fade" id="ModalNew1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="ModalNew">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">BANNER EDIT FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="myform1" enctype="multipart/form-data"class="myform1">
            <div class="modal-body">
              <input class="form-control" type="hidden" id="bannerid" name="id" value='' aria-label="Disabled input example" readonly>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">IMAGE</label>
              <input type="file" class="form-control" id="image1" name="image" value=''>
            </div>

            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">TITLE</label>
              <input type="text" class="form-control" id="title1" name="title" value=''>
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

<!-- BANNER datatable -->
    <table id="example" class="table-datatable table-bordered dataDisplay display responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>IMAGE</th>
          <th>TITLE</th>
          <th width="400px">DESCRIPTION</th>
          <th>STATUS</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="datadisplay"></tbody>
    </table>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<!-- BANNER datatable end  -->
</div>
<style>.error{color:blueviolet}</style>
<!-- main containt header close -->
<script>
  $(document).ready(function() {
   
    // BANNER  data table ajax
    $('.dataDisplay').DataTable({
      ajax: {
        url: "banner-data.php",
        type: "GET",
        dataSrc: "",
      },
      columns: [
        {
          "data": 'id'
        },
       
        {
          "data": 'image'
        },
        {
          "data": 'title'
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
    $("#myform").validate(
        {
        // in 'rules' user have to specify all the constraints for respective fields
        rules: 
        {
          title: 
          {
            required: true,
            minlength: 3,
          },
      
          description: 
          {
            required: true,
            minlength: 3,
          }, 
          
          image: {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
        }

     
        },
        // in 'messages' user have to specify message as per rules
       
        // in 'messages' user have to specify message as per rules
        messages: 
        {
         

          title: 
          {
            required: " Please enter a title",
            minlength: " Your name must be consist of at least 3 characters"
          },
          description: 
          {
            required: " Please enter a description",
            minlength: " Your description must be consist of at least 3 characters"
          },
      
          image: {
            required: "Please upload file.",
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
        },
         
        },
      submitHandler: function(form){  
      let formImage = new FormData();     
      var image = $("#image").val();   
      var title = $("#title").val();
      var description = $("#description").val();
     
      formImage.append('title', title);
      formImage.append('description', description);
      formImage.append('image', $('#image')[0].files[0]);      

      $.ajax({
      url: 'banner-add.php',
      type: 'POST',
      data:formImage,   
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
    
    $('#addBtn').click(function(e) {
      e.preventDefault();
      $('#ModalNew').modal('toggle');
      $('#myform').trigger('reset');

    });
    $(document).on('click', '.edit_btn', function(e) {
      e.preventDefault();
      let edit_id = $(this).attr('data-id');
      $('#ModalNew1').modal('toggle');
      $('#bannerid').val(edit_id);
      $image = $(this).parent().parent().find("td").eq(1).html();
      $('#image1').text( $image);
      $title= $(this).parent().parent().find("td").eq(2).html();
      $('#title1').attr('value', $title);
      $description = $(this).parent().parent().find("td").eq(3).html();
      $('#description1').attr('value', $description);         

    });
   
    
    
      
    //BANNER update form
    $("#myform1").validate(
        {
        // in 'rules' user have to specify all the constraints for respective fields
        rules: 
        {
          title: 
          {
            required: true,
            minlength: 3,
          },
      
          description: 
          {
            required: true,
            minlength: 3,
          }, 
          
        //   image: {
        //     required: true,
        //     extension: "jpg|jpeg|png|ico|bmp"
        // }

     
        },

        messages: 
        {
         

          title: 
          {
            required: " Please enter a title",
            minlength: " Your name must be consist of at least 3 characters"
          },
          description: 
          {
            required: " Please enter a description",
            minlength: " Your description must be consist of at least 3 characters"
          },
      
        //   image: {
        //     required: "Please upload file.",
        //     extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
        // },
         
        },
      submitHandler: function(form){  
     
      let edit_id = $(this).attr('data-id');
      let formImage = new FormData();   
      var id = $("#bannerid").val();      
      var title = $("#title1").val();
      var description = $("#description1").val();
      var image = $("#image1").val();   
   
      formImage.append('id', id);
      formImage.append('title', title);
      formImage.append('description', description);
      formImage.append('image', $('#image1')[0].files[0]); 
  
      $.ajax({
      url: 'banner-update.php',
      type: 'POST',
      data:formImage,   
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
  },
});
  

   

 

    // BANNER delete ajax 
    $(document).on("click", ".delete_btn", function(e) {
      e.preventDefault();
      var result = confirm("Want to delete?");
         if (result) {
    //Logic to delete the item


      var delete_id = $(this).attr("data-id");
      $.ajax({
        url: "banner-delete.php",
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
// BANNER STATUS CHANGE 
    $(document).on("click", ".status_btn", function(e) {
      e.preventDefault();
      var status = $(this).attr("data-id");
      $.ajax({
        url: "banner-status.php",
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