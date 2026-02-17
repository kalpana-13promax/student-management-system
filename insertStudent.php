<?php

$conn = mysqli_connect("localhost","root","","regform");
$name = $_POST['A'];
$email = $_POST['B'];
$branch = $_POST['C'];
$number = $_POST['D'];
$year = $_POST['E'];
$dob = $_POST['F'];
$month = $_POST['G'];
$fee = $_POST['H'];
$state = $_POST['I'];
$city = $_POST['J'];
$address = $_POST['K'];

$insert ="insert into addStudent1(name, email, branch, mobile_number, year, dob, month, fee, state, city, address) values('$name','$email','$branch','$number','$year','$dob','$month','$fee','$state','$city','$address')";

if(mysqli_query($conn, $insert)){
    echo "<script>
    alert('submitted successfully');
    window.location.href = 'addStudent.php';
    </script>";
}
else {
    echo "form not submit";
}

$branches = mysqli_query($conn, "SELECT branch FROM addStudent1");

// 2. Ab addStudent1 me jo branch pehle se use ho chuki hai unhe nikaalo
$usedBranches = [];
$q = mysqli_query($conn, "SELECT DISTINCT branch FROM addStudent1");
while($row = mysqli_fetch_assoc($q)){
    $usedBranches[] = $row['branch'];
}

$conn->close();
?>