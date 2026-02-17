<?php
$conn = mysqli_connect("localhost","root","","regform");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];
$dob = $_POST['dob'];
$address = $_POST['address'];

$A = $_FILES['Img']['name'];
$B=$_FILES['Img']['size'];
$C=$_FILES['Img']['tmp_name'];
$D=$_FILES['Img']['type'];

$ins = "insert into moderninsert(name, email, password, number, dob, address, image) 
values('$name','$email','$password','$number','$dob','$address','$A')";

$loc = "uploads/";



if(mysqli_query($conn, $ins)){
    if(move_uploaded_file($C, $loc.$A)){
        echo "Record successfully inserted & file uploaded";
    } else {
        echo "Record inserted but file upload failed!";
    }
}else{
    echo "Record not inserted!";
}

?>