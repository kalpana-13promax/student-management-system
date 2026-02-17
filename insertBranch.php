<?php
$conn = mysqli_connect("localhost","root","","regform");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $addBranch = $_POST['A']; 
    $date      = $_POST['B'];

    $check = "SELECT * FROM insertbranch WHERE Add_Branch='$addBranch' AND Date='$date'";
    $result = mysqli_query($conn, $check) or die("Query Error: " . mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        // Duplicate found
        echo "<script>
            alert('Ye Branch + Date already exist karta hai.');
            window.location.href='addBranch.php';
        </script>";
    } else {
        // Insert new record
        $insert = "INSERT INTO insertbranch(Add_Branch, `Date`) VALUES ('$addBranch', '$date')";
        if(mysqli_query($conn, $insert)){
            echo "<script>
                alert('Branch submitted successfully!');
                window.location.href='addBranch.php';
            </script>";
        } else {
            die("Insert Error: " . mysqli_error($conn));
        }
    }

$conn->close();
?>
