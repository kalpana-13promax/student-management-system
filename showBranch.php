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

      <?php
$conn = mysqli_connect('localhost','root','','regform');
$sel="select * from insertBranch";
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
                     <td>Add Branch</td>
                      <td>Date</td>
                      <td>Edit</td>
                      <td>Delete</td>
                    </tr>
        <?php
    while($data = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $data['id'];?></td>
            <td><?php echo $data['Add_Branch'];?></td>
            <td><?php echo $data['Date'];?></td>
             <td>
                <a href="editregform.php?$idd=<?php echo $data['id']?>">
                    Edit
                </a>
            </td>
            <td>
                <a href="deleteregform.php?$idd=<?php echo $data['id']?>">delete</a>
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