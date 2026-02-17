<?php
$conn = mysqli_connect("localhost", "root", "", "regform");

    $id = $_REQUEST['$idd']; 
    $sql = "DELETE FROM testtbl WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo 
        "<script>
        // alert('Record deleted successfully!'); 
        window.location='showform.php';
        </script>";
    } else {
        echo "delete record: ";
    }
?>
