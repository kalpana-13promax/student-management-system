<?php
$conn = mysqli_connect("localhost", "root", "", "regform");

$id = $_GET['id'];

$delete = "DELETE FROM fees WHERE id='$id'";
mysqli_query($conn, $delete);

header("Location: showfee.php"); // redirect back
?>
