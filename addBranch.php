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
                <h4 class="mb-0 font-weight-bold">Add Branch</h4>
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

            <form class="forms-sample needs-validation" action="insertBranch.php" method="post" enctype="multipart/form-data" novalidate>
              
              <!-- Branch Name -->
              <div class="form-group">
                <label for="branchName">Branch Name</label>
                <input type="text" class="form-control form-control-lg" id="branchName" placeholder="Branch Name" name="A" required>
                <div class="invalid-feedback">Please enter branch name.</div>
              </div>

              <!-- Date -->
              <div class="form-group">
                <label for="branchDate">Date</label>
                <input type="date" class="form-control form-control-lg" id="branchDate" name="B" required>
                <div class="invalid-feedback">Please select a date.</div>
              </div>

              <!-- Submit Button -->
              <div class="mt-3">
                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Add Branch</button>
              </div>
            </form>

          </div>
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

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>
  
</body>
</html>

<!-- <?php  
session_start();
if(isset($_SESSION['username']))
{
    header('location: insertBranch.php');
    exit();
}
?> -->