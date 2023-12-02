<?php
// CATEGORY INDEX PAGE
// session login user

include "header.php";
include "sidebar.php";
?>
 <!-- Content Header (Page header) -->

<div class="content-wrapper">
       <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Category </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <button class="btn btn-success" id="addBtn">ADD CATEGORY</button></li>
                
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header cloge-->
 <!-- Main content of category page-->
    <section class="content">
        <!-- add category button -->
        
 <!-- /*add category modal form*/ -->
        <div class="modal fade" id="ModalNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" class="ModalNew">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Client </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="myform" class="myform">
                        <div class="modal-body">
                            <label for="recipient-name" class="col-form-label">NAME</label>
                            <input type="text" class="form-control" id="name" name="name" value=''>
                        </div>
                        <div class="modal-body">
                            <label for="recipient-name" class="col-form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value=''>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary save-button"  name="submit"
                                id="save-button">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!-- edit category form -->
        <div class="modal fade" id="ModalNew1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" class="ModalNew">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="myform1" class="myform1">
                        <div class="modal-body">
                            <!-- hidden input for id -->
                            <input class="form-control" type="hidden" id="id" name="id" value=''
                                aria-label="Disabled input example" readonly>
                        </div>
                        <div class="modal-body">
                            <label for="recipient-name" class="col-form-label">NAME</label>
                            <input type="text" class="form-control" id="name1" name="name" value=''>
                        </div>
                        <div class="modal-body">
                            <label for="recipient-name" class="col-form-label">Description</label>
                            <input type="text" class="form-control" id="description1" name="description" value=''>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary update"  name="submit"
                                id="update">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!--datatable   -->
<div class="container margin='150'">
        <table id="example" class="table-datatable table-bordered dataDisplay display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="datadisplay"></tbody>
        </table>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<!-- datatable end -->
</div>
</div>
<!-- main containt div end -->
<style>.error{color:blueviolet}</style>
<script>
$(document).ready(function() {
//ajax of datatable
    $('.dataDisplay').DataTable({
        ajax: {
            url: "category-data.php",
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
                "data": 'action'
            },
        ]
    });
    $("#myform").validate(
        {
        // in 'rules' user have to specify all the constraints for respective fields
        rules: 
        {
          name: 
          {
            required: true,
            minlength: 3,
          },
      
          description: 
          {
            required: true,
            minlength: 3,
          }, 
          
              
        },
        // in 'messages' user have to specify message as per rules
        messages: 
        {
         

          name: 
          {
            required: " Please enter a name",
            minlength: " Your name must be consist of at least 3 characters"
          },
          description: 
          {
            required: " Please enter a description",
            minlength: " Your description must be consist of at least 3 characters"
          },
         
         
        },		
        
        submitHandler: function(form) {

        $('#ModalNew').modal('toggle');
        var name = $("#name").val();
        var description = $("#description").val();
        $.ajax({
            url: "category-add.php",
            type: "POST",
            data: {
                name: name,
                description: description,
            },
            success: function(data) {
                // console.log(data);
                if (data == 1) {
            $('#ModalNew').modal('toggle');

                    // alert("Data Inserted Successfully");
                    $("#example").DataTable().ajax.reload();
                } else {
                    alert("cant insert record record");
                    alert(data);
                }
            }
        });
    },
    });
// catagory edit form containt show


//category submit form on update
$("#myform1").validate(
        {
        // in 'rules' user have to specify all the constraints for respective fields
        rules: 
        {
          name: 
          {
            required: true,
            minlength: 3,
          },
      
          description: 
          {
            required: true,
            minlength: 3,
          }, 
          
              
        },
        // in 'messages' user have to specify message as per rules
        messages: 
        {
         

          name: 
          {
            required: " Please enter a name",
            minlength: " Your name must be consist of at least 3 characters"
          },
          description: 
          {
            required: " Please enter a description",
            minlength: " Your description must be consist of at least 3 characters"
          },
         
         
        },		
        
        submitHandler: function(form) {
  
        $('#ModalNew1').modal('toggle');
        var id = $("#id").val();
        var name = $("#name1").val();
        var description = $("#description1").val();
        $.ajax({
            url: "category-update.php",
            type: "post",
            data: {
                id: id,
                name: name,
                description: description,
            },
            success: function() {


                $('#example').DataTable().ajax.reload();        
                }
        });
    },
    });
    $(document).on('click', '.edit_btn', function(e) {
        e.preventDefault();
        let edit_id = $(this).attr('data-id');
        $('#ModalNew1').modal('toggle');
        $('#id').val(edit_id);
        $name = $(this).parent().parent().find("td").eq(1).html();
        $('#name1').attr('value', $name);
        $description = $(this).parent().parent().find("td").eq(2).html();
        $('#description1').attr('value', $description);       
        $('#myform1').trigger('reset');
    });
// add category open  modal form
    $('#addBtn').click(function(e) {
        e.preventDefault();
        $('#ModalNew').modal('toggle');
        $('#myform').trigger('reset');
    });
// category delete operation 
    $(document).on("click", ".delete_btn", function(e) {
        e.preventDefault();
 
         var result = confirm("do you want to delete this record ?");
if (result) {
        var delete_id = $(this).attr("data-id");
        $.ajax({
            url: "category-delete.php",
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
        });}
    }); 
    // status change
    $(document).on("click", ".status_btn", function(e) {
      e.preventDefault();
      var status = $(this).attr("data-id");
      $.ajax({
        url: "category-status.php",
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
<?php include "footer.php"; ?>