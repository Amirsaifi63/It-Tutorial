<?php 
// client datetable data
include "config.php";

$sql="SELECT `id`, `name`, `address`, `mobile`, `status` FROM `client` WHERE `is_deleted` = 0";

$record=mysqli_query($conn,$sql);
$rows = array();
$roww = [];
while($row = mysqli_fetch_assoc($record))
{
$roww['id']=$row['id'];
$roww['name']=$row['name'];
$roww['address']=$row['address'];
$roww['mobile']=$row['mobile'];
$roww['status']=$row['status'];

$roww['action']='
<button class="btn btn-success btn-sm rounded-2 edit_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-2x fa-edit"></i></button>
<button class="btn btn-danger btn-sm rounded-2 delete_btn " data-id="'.$row['id'].'" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-2x fa-trash"></i></button>
'.
($row['status']==1 ?
'<button class="btn btn-warning btn-sm rounded-2 status_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-2x fa-user"></i></button>' : 
'<button class="btn btn-info btn-sm rounded-2 status_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-2x fa-user"></i></button>');

array_push($rows,$roww);

}
echo json_encode($rows);
?>