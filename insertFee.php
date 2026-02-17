<?php
$conn = mysqli_connect("localhost","root","","regform");

$year = $_POST['A'];
$branch = $_POST['B'];

$insert = "insert into insertBranch(Add_Branch, Date) values('$addBranch', '$Date')";

// Check for duplicate
$check_query = "SELECT * FROM insertBranch WHERE AddNewBranch = '$addBranch' AND Date = '$Date'";
$result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result) > 0) {
    // Duplicate found
    echo "<script>
        alert('Duplicate entry. This year and branch combination already exists.');
        window.location.href='addfees.php';
    </script>";
}

if(mysqli_query($conn, $insert)){
    echo "<script>
    alert('Branch submitted successfully');
    window.location.href = 'addBranch.php';
    </script>";
}
else {
    echo "form not submit";
}


$conn->close();


?>