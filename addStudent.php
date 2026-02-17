<?php   

$conn = mysqli_connect("localhost","root","","regform");
$sel="select * from insertbranch";
$r= mysqli_query($conn,$sel);


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
                <h4 class="mb-0 font-weight-bold">Add Student</h4>
                <button class="btn btn-inverse-info tx-12 btn-sm btn-rounded mx-3">Enterprise</button>
                <div class="d-none d-md-flex">
                  <p class="text-muted mb-0 tx-13 cursor-pointer">Home</p>
                  <i class="mdi mdi-chevron-right text-muted"></i>
                  <p class="text-muted mb-0 tx-13 cursor-pointer">Dashboard</p>
                </div>
              </div>
    <!-- partial -->
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <form class="forms-sample needs-validation" action="insertStudent.php" method="post" enctype="multipart/form-data" novalidate>
              
              <!-- Name -->
              <div class="form-group">
                <label for="studentName">Name</label>
                <input type="text" class="form-control" id="studentName" placeholder="Username" name="A" required minlength="3">
                <div class="invalid-feedback">Please enter a valid name (min 3 characters).</div>
              </div>

              <!-- Email -->
              <div class="form-group">
                <label for="studentEmail">Email address</label>
                <input type="email" class="form-control" id="studentEmail" placeholder="Email" name="B" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>

              <!-- Branch -->
              <div class="form-group">
                <label for="branch">Branch</label>
                <select class="form-control" id="branch" name="C" required>
                  <option value="" selected disabled>--Please Select Branch--</option>
                  <?php
                  while($res = mysqli_fetch_array($r)) {
                  ?>
                      <option value="<?php echo $res['Add_Branch']; ?>">
                          <?php echo $res['Add_Branch']; ?>
                      </option>
                  <?php
                  }
                  ?>
                </select>
                <div class="invalid-feedback">Please select a branch.</div>
              </div>

              <!-- Mobile -->
              <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" pattern="[0-9]{10}" class="form-control" id="mobile" placeholder="Mobile number" name="D" required>
                <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
              </div>

              <!-- Year -->
              <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="year" placeholder="Year" name="E" required>
                <div class="invalid-feedback">Please enter year.</div>
              </div>

              <!-- DOB -->
              <div class="form-group">
                <label for="dob">DOB</label>
                <input type="date" class="form-control" id="dob" name="F" required>
                <div class="invalid-feedback">Please enter date of birth.</div>
              </div>

              <!-- Month -->
              <div class="form-group">
                <label for="month">Month</label>
                <input type="text" class="form-control" id="month" placeholder="Month" name="G" required>
                <div class="invalid-feedback">Please enter month.</div>
              </div>

              <!-- Fee -->
              <div class="form-group">
                <label for="fee">Fee</label>
                <input type="number" class="form-control" id="fee" placeholder="Fee" name="H" min="1" required>
                <div class="invalid-feedback">Please enter a valid fee amount.</div>
              </div>

              <!-- State -->
              <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" placeholder="State" name="I" required>
                <div class="invalid-feedback">Please enter state.</div>
              </div>

              <!-- City -->
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="City" name="J" required>
                <div class="invalid-feedback">Please enter city.</div>
              </div>

              <!-- Address -->
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Address" name="K" required>
                <div class="invalid-feedback">Please enter address.</div>
              </div>

              <!-- Submit -->
              <input type="submit" class="btn btn-primary mr-2" name="submit" value="Submit">

            </form>

          </div>
        </div>
      </div>
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

  <!-- Bootstrap Validation Script -->
<script>
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
// session_start();
// if(isset($_SESSION['name']))
// {
//     header('location: insertStudent.php');
//     exit();
// }
// ?> -->