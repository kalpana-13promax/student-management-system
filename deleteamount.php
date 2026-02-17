<?php
$conn = mysqli_connect("localhost","root","","regform");

$id= $_REQUEST['$idd'];

$del = "delete from moderninsert where id=$id";
if(mysqli_query($conn, $del)){
    echo "delete record";
}else{
    echo "not delete record";
}

?>