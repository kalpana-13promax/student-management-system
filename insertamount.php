<?php
$conn = mysqli_connect("localhost","root","","regform");

// if(isset($_POST['submit'])){

$branch = $_POST['branch_model'];
$fee = $_POST['fee_model'];
$amount = $_POST['amount_model'];

$insert = "insert into feeamount(branch, feetype, feeamount) 
values('$branch', '$fee','$amount')";

if(mysqli_query($conn, $insert)){
    echo "<script>
    alert('fee submitted successfully');
    window.location.href = 'addfee.php';
    </script>";
}
else {
    echo "form not submit";
}
// }



$conn->close();


?>