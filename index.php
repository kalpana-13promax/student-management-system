
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
                <h4 class="mb-0 font-weight-bold">Welcome dashboard</h4>
                <button class="btn btn-inverse-info tx-12 btn-sm btn-rounded mx-3">Enterprise</button>
                <div class="d-none d-md-flex">
                  <p class="text-muted mb-0 tx-13 cursor-pointer">Home</p>
                  &nbsp;<ion-icon name="home-outline"></ion-icon>&nbsp;
                  <p class="text-muted mb-0 tx-13 cursor-pointer">Dashboard</p>
                </div>
              </div>
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
    header('location:login.php');
    exit();
}

?>

