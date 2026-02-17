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
    include('include/sidebar.php'); ?>

      <?php
$conn = mysqli_connect('localhost','root','','regform');
$sel="select * from addStudent1";
$result = mysqli_query($conn,$sel);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic Show Table</h4>
                  <div class="table-responsive">
                  <table class="table">
                    <tr>
                     <td>Id</td>
                     <td>Name</td>
                      <td>Email</td>
                      <td>Branch</td>
                      <td>Mobile Number</td>
                      <td>Year</td>
                      <td>Date of Birth</td>
                      <td>Month</td>
                      <td>Fee</td>
                      <td>State</td>
                      <td>City</td>
                      <td>Address</td>
                      <td>Edit</td>
                      <td>Delete</td>
                    </tr>
        <?php
    while($data = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $data['id'];?></td>
            <td><?php echo $data['name'];?></td>
            <td><?php echo $data['email'];?></td>
            <td><?php echo $data['branch'];?></td>
            <td><?php echo $data['mobile_number'];?></td>
            <td><?php echo $data['year'];?></td>
            <td><?php echo $data['dob'];?></td>
            <td><?php echo $data['month'];?></td>
            <td><?php echo $data['fee'];?></td>
            <td><?php echo $data['state'];?></td>
            <td><?php echo $data['city'];?></td>
            <td><?php echo $data['address'];?></td>
             <td>
                <a href="editstudent.php?$idd=<?php echo $data['id']?>">
                    Edit
                </a>
            </td>
            <td>
                <a href="deletestudent.php?$idd=<?php echo $data['id']?>">delete</a>
            </td>
        </tr>
        <?php
}
?>
    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <?php include('include/script.php'); ?>
</body>
</html>