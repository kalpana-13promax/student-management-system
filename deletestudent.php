<?php
$conn = mysqli_connect("localhost","root","","regform");

$id = $_REQUEST['$idd'];

$del = "delete from addStudent1 where id=$id";
if(mysqli_query($conn, $del)){
    echo "<script>
    alert('data delete successfully');
    window.location.href= 'showStudent.php';
    </script>";
}
else{
    echo "not delete data";
}

?>