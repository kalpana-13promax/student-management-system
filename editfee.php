<?php
$conn = mysqli_connect("localhost", "root", "", "regform");

// Get ID from URL
$id = $_GET['id'];

$query = "SELECT * FROM fees WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

    $fee = $_POST['fee'];
    $totalfee = $_POST['totalfee'];
    $paidfee = $_POST['paidfee'];
    $duefee = $_POST['duefee'];

    $update = "UPDATE fees SET fee='$fee', totalfee='$totalfee',
               paidfee='$paidfee', duefee='$duefee' WHERE id='$id'";
    mysqli_query($conn, $update);

    header("Location: showfee.php"); 

?>
