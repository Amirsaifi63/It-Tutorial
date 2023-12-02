<?php 
// displaying BANNER datatable 
include "config.php";
$sql="SELECT `id`,  `image`, `title`,  `description`, `status` FROM `banner` WHERE `is_deleted` = 0";
$record=mysqli_query($conn,$sql);
$rows = array();
$i=1;
$roww=[];
while($row = mysqli_fetch_assoc($record))
{
$roww['id']=$i;
$roww['image']='<img src="./upload/'.$row['image'].'" height="50px" width="50px">';
$roww['title']=$row['title'];
$roww['description']=$row['description'];
$roww['status']=$row['status'];
$roww['action']='
    <button class="btn btn-success btn-sm rounded-0 edit_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-2x fa-edit"></i></button>
    <button class="btn btn-danger btn-sm rounded-0 delete_btn " data-id="'.$row['id'].'" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-2x fa-trash"></i></button>
 '.
($row['status']==1 ?
   '<button class="btn btn-warning btn-sm rounded-0 status_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-2x fa-user"></i></button>' : 
   '<button class="btn btn-info btn-sm rounded-0 status_btn" type="button" data-id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-2x fa-user"></i></button>');

array_push($rows,$roww);
$i++;
}

echo json_encode($rows);
?>