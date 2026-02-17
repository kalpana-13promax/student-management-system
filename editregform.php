<?php
$conn = mysqli_connect("localhost","root","","regform");
$id = $_REQUEST['$idd'];
$sel = "select * from insertBranch where id='$id' ";
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
                <h4 class="mb-0 font-weight-bold">Edit Branch</h4>
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
          <label for="exampleInputUsername1">Edit Branch Name</label>
          <input type="text" class= "form-control" id="exampleInputUsername1" name = "A" value="<?php echo $result['Add_Branch']; ?>">
      </div>
      <div class="form-group">
           <label for="exampleInputUsername1">Date</label>
            <input type="Date" name = "B" class= "form-control" id="exampleInputUsername1" value="<?php echo $result['Date']; ?>">
          </div>
          <button  class="btn btn-primary mr-2" type="submit" name="submit">Submit</button>
        </form>

    <?php

    if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $Add_Branch = $_POST['A'];
    $Date = $_POST['B'];

    $updat= "update insertBranch set Add_Branch='$Add_Branch', date='$Date' where id=$id";

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

<?php  
session_start();
if(isset($_SESSION['username']))
{
    header('location: insertBranch.php');
    exit();
}
?>

