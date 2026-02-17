<?php
$conn = mysqli_connect("localhost","root","","regform");

$id=$_REQUEST['$idd'];

$del = "delete from moderninsert where id=$id";
if(mysqli_query($conn, $del)){
    echo "<Script>
    alert('Record deleted successfully');
    window.location='showmodernfile.php';
    </script>";
}
else{
    echo "data in not delete";
}

?>