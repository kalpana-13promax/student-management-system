<?php

$conn = mysqli_connect("sql212.infinityfree.com","if0_39824582","WVUtjMfa8SrJ","if0_39824582_regformmail");

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $number  = $_POST['number'];
    $address = $_POST['address'];

    $sql = "INSERT INTO mail (name, email, number, address) 
            VALUES ('$name', '$email', '$number', '$address')";

    if (mysqli_query($conn, $sql)) {
        $to = "anshuvishwakarm1111@gmail.com";
        $subject = "New User registration";
        $message = "A new user has registration : \n\n name: $name \n email: $email";

        if(mail($to, $subject, $message)){
            echo "<script>
             alert('Registration successfully!'); 
             window.location='index.php';
             </script>";
        }  
        else{
            echo "<script>
             alert('Registration not successfully mail not send!'); 
             window.location='index.php';
             </script>";
        }
    } else {
        echo "Error: data not insert";
    }
?>




?>