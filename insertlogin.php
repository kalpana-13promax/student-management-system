<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['username']))
{
    header('location:index.php');
    exit();
}
$conn=mysqli_connect("localhost","root","","regform");
$username=$_POST['A'];
$password=$_POST['B'];



$sel="select * from login where username='$username' And password='$password'";
$r=mysqli_query($conn,$sel);
$res=mysqli_fetch_array($r);

 if($res)
    {
        $_SESSION['username']=$username;
        echo"
        <script>
        alert('login successfully');
        window.location.href='index.php';
        </script>";
    }    
    
    else{
        $checkusername = mysqli_query($conn, "select * from login where username = '$username'");
        
        if(mysqli_fetch_array($checkusername)){
        echo"
        <script>
        alert('username wrong');
        window.location.href='login.php';
        </script>
        ";
        }
        else{

        echo"
        <script>
        alert('password $ username both wrong');
        window.location.href='login.php';
        </script>";
        }
    }   



?>