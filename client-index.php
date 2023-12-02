<?php
// CLIENT INDEX
// session login 

include "config.php";
$a = 1;
$sql = "SELECT * FROM users WHERE id='" . $a . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

?>
<?php
include "header.php";
include "sidebar.php";
?>
  <!-- Content Header (Page header) -->

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Client</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">  <div class="user text-right">
      <button class="btn btn-success" id="addBtn">ADD CLIENT</button>
      </button>
    </div></li>
           
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <!-- add client button -->
  


<!-- /* client add modal form*/ -->
    <div class="modal fade" id="ModalNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="ModalNew">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New client </h5>
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
              <label for="recipient-name" class="col-form-label">ADDRESS</label>
              <input type="text" class="form-control" id="address" name="address" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">MOBILE</label>
              <input type="text" class="form-control" id="mobile" name="mobile" value=''>
            </div>
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary save-button"  name="submit" id="save-button">Save
                changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<!-- client edit form -->
    <div class="modal fade" id="ModalNew1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="ModalNew">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="myform1" class="myform1">
            <div class="modal-body">
              <input class="form-control" type="hidden" id="clientid" name="id" value='' >
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">NAME</label>
              <input type="text" class="form-control" id="name1" name="name" value=''>
            </div>      
           
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">ADDRESS</label>
              <input type="text" class="form-control" id="address1" name="address" value=''>
            </div>
            <div class="modal-body">
              <label for="recipient-name" class="col-form-label">MOBILE</label>
              <input type="text" class="form-control" id="mobile1" name="mobile" value=''>
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
<!-- client datatable list -->
    <table id="example" class="table-datatable table-bordered dataDisplay display responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>ADDRESS</th>
          <th>MOBILE</th>
          <th>STATUS</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="datadisplay"></tbody>
    </table>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<!-- datatable close -->
</div>
<!-- main containt div close -->
<style>.error{color:blueviolet}</style>
<script>
  $(document).ready(function() {
// client datatable ajax
        $('.dataDisplay').DataTable({
          ajax: {
            url: "client-data.php",
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
              "data": 'address'
            },
            {
              "data": 'mobile'
            },
            {
              "data": 'status'
            },
            {
              "data": 'action'
            },
          ]
        });
     
        // client submit form 
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
      
          address: 
          {
            required: true,
            minlength: 3,
          }, 
          
          mobile: {
            required: true,
                   }

     
        },
        // in 'messages' user have to specify message as per rules
        messages: 
        {
         

          name: 
          {
            required: " Please enter a name",
            minlength: " Your name must be consist of at least 3 characters"
          },
          address: 
          {
            required: " Please enter a address",
            minlength: " Your description must be consist of at least 3 characters"
          },
          mobile: 
          {
            required: " Please enter a mobile",
           
          },   
         
        },
        submitHandler: function(form) {
          var name=$("#name").val();
          var address = $("#address").val();
          var mobile = $("#mobile").val();    
            $.ajax({
              url: "client-add.php",
              type: "POST",
            data: {
                name: name,
                address: address,     
                mobile: mobile,               
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
  
   
  // clent updata data
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
      
          address: 
          {
            required: true,
            minlength: 3,
          }, 
          
          mobile: {
            required: true,
                   }

     
        },
        // in 'messages' user have to specify message as per rules
        messages: 
        {
         

          name: 
          {
            required: " Please enter a name",
            minlength: " Your name must be consist of at least 3 characters"
          },
          address: 
          {
            required: " Please enter a address",
            minlength: " Your description must be consist of at least 3 characters"
          },
          mobile: 
          {
            required: " Please enter a mobile",
           
          },   
         
        },
        submitHandler: function(form) {
          e.preventDefault();
          $('#ModalNew1').modal('toggle');
          var id = $("#clientid").val();
          var name=$("#name1").val();
          var address = $("#address1").val();
          var mobile = $("#mobile1").val();  
         
          $.ajax({
          url: "client-update.php",
          type:"post",
          data: $("#myform1").serialize(),
          success: function(){        
            $('#ModalNew1').modal('toggle');

              $('#example').DataTable().ajax.reload();           
            }         
         });
        },
        });
    // clent edit form open with filled data
        $(document).on('click', '.edit_btn', function (e) {
        e.preventDefault();
        let edit_id = $(this).attr('data-id');
        $('#ModalNew1').modal('toggle');
        $('#clientid').val(edit_id);
        $name = $(this).parent().parent().find("td").eq(1).html();
        $('#name1').attr('value',$name);
        $address = $(this).parent().parent().find("td").eq(2).html();
        $('#address1').attr('value',$address);
        $mobile = $(this).parent().parent().find("td").eq(3).html();
        $('#mobile1').attr('value',$mobile);
        $('#myform1').trigger('reset');     
      
      });
// client open  add  modal form
          $('#addBtn').click(function(e) {
            e.preventDefault();
            $('#ModalNew').modal('toggle');
            $('#myform').trigger('reset');
          });
   
    // client delete 
          $(document).on("click", ".delete_btn", function(e) {
            e.preventDefault();
            var result = confirm("Want to delete?");
if (result) {
            var delete_id = $(this).attr("data-id");
            $.ajax({
              url: "client-delete.php",
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
          // status change
       $(document).on("click", ".status_btn", function(e) {
      e.preventDefault();
      var status = $(this).attr("data-id");
      $.ajax({
        url: "client-status.php",
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