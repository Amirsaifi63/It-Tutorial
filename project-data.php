<?php 
// displaying project datatable 
include "config.php";
$sql="SELECT `id`, `name`, `description`, `category_id`, `client_id`, `hour`, `image`, `status` FROM `project` WHERE `is_deleted` = 0";
$record=mysqli_query($conn,$sql);
$rows = array();
$roww=[];
while($row = mysqli_fetch_assoc($record))
{
$roww['id']=$row['id'];
$roww['name']=$row['name'];
$roww['description']=$row['description'];
$roww['category_id']=$row['category_id'];
$roww['client_id']=$row['client_id'];
$roww['hour']=$row['hour'];
$roww['image']='<img  src="./upload/'.$row['image'].'" height="50px" width="50px">';
$roww['action']='
    <button class="btn btn-success btn-sm rounded-0 edit_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
    <button class="btn btn-danger btn-sm rounded-0 delete_btn " data-id="'.$row['id'].'" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
 '.
($row['status']==1 ?
   '<button class="btn btn-warning btn-sm rounded-0 status_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-user"></i></button>' : 
   '<button class="btn btn-info btn-sm rounded-0 status_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-user"></i></button>');

array_push($rows,$roww);
}
echo json_encode($rows);
?>