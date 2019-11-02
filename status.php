<?php 
    $status = '<label class="badge badge-info">'.$value['status'].'</label>';
if ($value['status']=="Processed") {
    $status = '<label class="badge badge-success">'.$value['status'].'</label>';
}
elseif($value['status']=="Raw material"){
    $status = '<label class="badge badge-warning">'.$value['status'].'</label>';
}
elseif($value['status']=="Under Process"){
    $status = '<label class="badge badge-primary">'.$value['status'].'</label>';
}
elseif($value['status']=="Shipped"){
    $status = '<label class="badge badge-secondary">'.$value['status'].'</label>';
}
 elseif($value['status']=="Cancelled"){
    $status = '<label class="badge badge-danger">'.$value['status'].'</label>';
}
 elseif($value['status']=="Disposed"){
    $status = '<label class="badge badge-dark">'.$value['status'].'</label>';
}
elseif($value['status']=="Rejected"){
    $status = '<label class="badge badge-light">'.$value['status'].'</label>';
}
elseif($value['status']=="Cancelled"){
    $status = '<label class="badge badge-light" style="background-color:#63864e">'.$value['status'].'</label>';
}
 elseif($value['status']=="Invoiced"){
    $status = '<label class="badge badge-light" style="background-color:#ffcaef">'.$value['status'].'</label>';
}
 ?>