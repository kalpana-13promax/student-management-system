<?php
$conn = mysqli_connect("localhost","root","","regform");
$id = $_REQUEST['$idd'];
$sel = "select * from addStudent1 where id='$id' ";
$r= mysqli_query($conn,$sel);
$result= mysqli_fetch_array($r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
include('include/header.php');
?>
</head>
<body>
  <div class="container-scroller">
   <?php
    include('include/navbar.php');?>
    <div class="container-fluid page-body-wrapper">
     <?php
    include('include/sidebar.php');
     ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="dashboard-header d-flex flex-column grid-margin">
            <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom pb-3 mb-3">
              <div class="d-flex align-items-center">
                <h4 class="mb-0 font-weight-bold">Edit Student Record</h4>
                <button class="btn btn-inverse-info tx-12 btn-sm btn-rounded mx-3">Enterprise</button>
                <div class="d-none d-md-flex">
                  <p class="text-muted mb-0 tx-13 cursor-pointer">Home</p>
                  <i class="mdi mdi-chevron-right text-muted"></i>
                  <p class="text-muted mb-0 tx-13 cursor-pointer">Dashboard</p>
                </div>
              </div>
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
        <form action="#" class="forms-sample" method="POST">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
           <div class="form-group">
            <label for="exampleInputUsername1">Name</label>
            <input type="text" name = "A" class= "form-control" id="exampleInputUsername1" value="<?php echo $result['name']; ?>">
</div>
            <div class="form-group">
               <label for="exampleInputUsername1">Email</label>
            <input type="email" name = "B" class= "form-control" id="exampleInputUsername1" value="<?php echo $result['email']; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Mobile number</label>
            <input type="number" class= "form-control" id="exampleInputUsername1"  name = "D" value="<?php echo $result['mobile_number']; ?>">
           </div>
            <div class="form-group">
            <label for="exampleInputUsername1">Email</label>
            <input type="text" class= "form-control" id="exampleInputUsername1" name = "E" value="<?php echo $result['year']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">DOB</label>
            <input type="text" class= "form-control" id="exampleInputUsername1" name = "F" value="<?php echo $result['dob']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">Month</label>
            <input type="number" class= "form-control" id="exampleInputUsername1" name = "G" value="<?php echo $result['month']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">Fee</label>
            <input type="number" class= "form-control" id="exampleInputUsername1" name = "H" value="<?php echo $result['fee']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">State</label>
            <input type="text" class= "form-control" id="exampleInputUsername1" name = "I" value="<?php echo $result['state']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">City</label>
            <input type="text" class= "form-control" id="exampleInputUsername1" name = "J" value="<?php echo $result['city']; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputUsername1">Address</label>
            <input type="text" class= "form-control" id="exampleInputUsername1" name = "K" value="<?php echo $result['address']; ?>">
           </div>
            <input type="submit" class="btn btn-primary mr-2" name="submit">
        </form>

    <?php

    if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['A'];
    $email = $_POST['B'];
    $year = $_POST['C'];
    $number = $_POST['E'];
    $dob = $_POST['F'];
    $month = $_POST['G'];
    $fee = $_POST['H'];
    $state = $_POST['I'];
    $city = $_POST['J'];
    $address = $_POST['K'];

    $updat= "update addStudent1 set 
        name='$name', 
        email='$email',
        year='$year',
        mobile_number='$number',
        dob='$dob',
        month='$month',
        fee='$fee',
        state='$state',
        city='$city',
        address='$address' where id=$id";

    if(mysqli_query($conn,$updat)){
        echo "data is update";
    }
    else{
        echo "not update data";
    }
}  
?>
                </div>
            </div>
            </div>
        <?php
            include('include/footer.php');
        ?>
        </div>
        </div>
    </div>
    <?php include('include/script.php'); ?>
  
</body>
</html>

<!-- <?php  
session_start();
if(isset($_SESSION['name']))
{
    header('location: insertStudent.php');
    exit();
}
?> -->

