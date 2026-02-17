<?php
$conn = mysqli_connect("localhost", "root", "", "regform");

$name = $_POST['A'];
$email = $_POST['B'];
$password = $_POST['C']; 
$number = $_POST['D'];
$branch = $_POST['E'];
if (isset($_POST['F'])) {
    $gender = $_POST['F'];  // yaha string milegi
    echo "Selected Gender: " . $gender;
} else {
    echo "No gender selected!";
} 
$hobbies = "";
if (isset($_POST['G']) && is_array($_POST['G'])) {
    $hobbies = implode(", ", $_POST['G']);
}
$description = $_POST['H'];

$A=$_FILES['Img']['name'];
$B=$_FILES['Img']['size'];
$C=$_FILES['Img']['tmp_name'];
$D=$_FILES['Img']['type'];

$loc = "uploads/";


$ins = "INSERT INTO testtbl (name, email, password, number, branch, gender, hobbies, description, profile) VALUES('$name', '$email', '$password', '$number', '$branch', '$gender', '$hobbies', '$description','$A')";
    if(mysqli_query($conn, $ins)){
    move_uploaded_file($C,$loc.$A);
    echo "<script>
    alert('submitted successfully');
    window.location.href = 'form.php';
    </script>";
}
else {
    echo "form not submit";
}

mysqli_close($conn);
?>