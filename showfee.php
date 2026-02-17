<?php
$conn = mysqli_connect("localhost", "root", "", "regform");

$sql = "select DISTINCT year from addStudent1";
$sql1 = "select * from insertbranch";

$result = mysqli_query($conn, $sql);
$r = mysqli_query($conn, $sql1);

$filteredData = [];
if (isset($_POST['submit'])) {
  $year = $_POST['year'] ?? '';
  $branch = $_POST['branch'] ?? '';
$query = "SELECT addstudent1.id, addstudent1.name, addstudent1.branch, addstudent1.year,
                 paidfee.fee, paidfee.totalfee, paidfee.paidfee, paidfee.duefee FROM addstudent1
          LEFT JOIN paidfee ON addstudent1.name = paidfee.name
          WHERE addstudent1.year = '$year' AND addstudent1.branch = '$branch'";

  $filteredData = mysqli_query($conn, $query);
}

// data dynamic ka 
$select = "SELECT feetype, feeamount FROM feeamout";
$result1 = mysqli_query($conn, $select);


// fee submit wala code 
if(isset($_POST['submit']))
{
    $id   = $_POST['modal_id'] ?? '';  
    $name = $_POST['student_name'] ?? '';

    if (isset($_POST['feetype']))
    {
        $feetypeArr = $_POST['feetype']; 
        $feetype = implode(",", $feetypeArr); 

        $totalfee   = $_POST['total_fee'];
        $paidamount = $_POST['paid_Amount'];
        $due        = $_POST['due_Amount'];
        $check = "SELECT id FROM paidfee WHERE id='$id'";
        $res = mysqli_query($conn, $check);

        if(mysqli_num_rows($res) > 0){
            // अगर id पहले से है → Update
            $sql = "UPDATE paidfee 
                    SET name='$name',
                        feetype='$feetype',
                        totalfee='$totalfee',
                        paidamount='$paidamount',
                        dueamount='$due'
                    WHERE id='$id'";
        } else {
            // अगर id नहीं है → Insert
            $sql = "INSERT INTO paidfee (id, name, fee, totalfee, paidfee, duefee) 
                    VALUES ('$id','$name','$feetype','$totalfee','$paidamount','$due')";
        }

        if(mysqli_query($conn, $sql))
        {
            echo "<script>
                alert('Student fee saved successfully');
                window.location.href='showfee.php'; 
            </script>";
        }
        else
        {
            echo "<script>
                alert('Error while saving student fee');
                window.location.href='showfee.php'; 
            </script>";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('include/header.php'); ?>
</head>

<body>
  <div class="container-scroller">
    <?php include('include/navbar.php'); ?>
    <div class="container-fluid page-body-wrapper">
            <?php include('include/sidebar.php'); ?>
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="dashboard-header d-flex flex-column grid-margin">
            <div class="d-flex align-items-center justify-content-between flex-wrap border-bottom pb-3 mb-3">
              <div class="d-flex align-items-center">
                <h4 class="mb-0 font-weight-bold">Add Student Fee Filter</h4>
                <button class="btn btn-inverse-info tx-12 btn-sm btn-rounded mx-3">Enterprise</button>
                <div class="d-none d-md-flex">
                  <p class="text-muted mb-0 tx-13 cursor-pointer">Home</p>
                  <i class="mdi mdi-chevron-right text-muted"></i>
                  <p class="text-muted mb-0 tx-13 cursor-pointer">Dashboard</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Filter Form -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4>Add Fee filter</h4>
                  <form class="forms-sample" action="" method="post">

                    <div class="form-group">
                      <label>Year</label>
                      <select class="form-control" name="year" required>
                        <option value="" selected disabled>--Please Select Year--</option>
                        <?php while ($res = mysqli_fetch_array($result)) { ?>
                          <option value="<?php echo $res['year']; ?>">
                            <?php echo $res['year']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Branch</label>
                      <select class="form-control" name="branch" required>
                        <option value="" selected disabled>--Please Select Branch--</option>
                        <?php while ($res = mysqli_fetch_array($r)) { ?>
                          <option value="<?php echo $res['Add_Branch']; ?>">
                            <?php echo $res['Add_Branch']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>

                    <input type="submit" class="btn btn-primary mr-2" name="submit" value="Filter">
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Filtered Data Show -->
          <?php if (isset($_POST['submit'])) { ?>
            <div class="row mt-4">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4>Filtered Students</h4>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Year</th>
                          <th>Branch</th>
                          <th>Fee Type</th>
                          <th>Total Fee</th>
                          <th>Paid Amount</th>
                          <th>Due Amount</th>
                          <th>Add Fee</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (mysqli_num_rows($filteredData) > 0) {
                          while ($row = mysqli_fetch_assoc($filteredData)) { ?>
                            <tr>
                              <td><?php echo $row['id']; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['year']; ?></td>
                              <td><?php echo $row['branch']; ?></td>
                              <td><?php echo $row['fee']; ?></td>
                              <td><?php echo $row['totalfee']; ?></td>
                              <td><?php echo $row['paidfee']; ?></td>
                              <td><?php echo $row['duefee']; ?></td>
                              <td>
                                <button type="submit" class="btn btn-primary" onclick="openmodal('<?php echo $row['id']; ?>','<?php echo $row['name']; ?>  ')">
                                  Add Fee
                                </button>
                              </td>
                            </tr>
                        <?php }
                        } else {
                          echo "<tr><td colspan='9' class='text-center'>No Record Found</td></tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
        <!-- modal -->
        <div class="modal fade" id="feeModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:white">Add Fee</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post">
                <div class="modal-body">
                  <input type="hidden" id="modal_id" name="id_modal" class="form-control">
                  <br>

                  <label for="branch_modal">Student Name</label>
                  <input type="text" name="student_name" class="form-control" id="student_modal" readonly style="color:black">
                  <br>
                                                                                                                                                                                       
                  <div class="form-group">
                    <label>Fee Type</label>
                    <select class="form-control" name="feetype[]" id="feetype" multiple onchange="updatetotalamount()">
                      <option value="" selected disabled>--Please Select Fee Type--</option>
                      <?php
                      if (mysqli_num_rows($result1) > 0) {
                        while ($row = mysqli_fetch_assoc($result1)) {
                          // feetype और amount निकाल रहे हैं
                          $feetype = $row['feetype'];
                          $amount = $row['feeamount'];

                          echo "<option value='$feetype' data-amount='$amount'>$feetype - ₹$amount</option>";
                        }
                      }
                      ?>
                    </select>

                  </div>


                  <label for="fee_modal">Total fee</label>
                  <input type="text" name="total_fee" class="form-control" id="total_fee" style="color:black" readonly>
                  <br>

                  <label for="amount">Enter Your Paid Amount</label>
                  <input type="text" placeholder="Enter Your Fee Amount" class="form-control" name="paid_Amount" id="amount_paid" style="color:black">
                  <br>

                  <label for="amount">Enter Your Due Amount</label>
                  <input type="text" placeholder="Enter Your Due Amount" class="form-control" name="due_Amount" id="amount_due" style="color:black">
                  <br>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <!-- script -->

        

        <!-- end script -->
        <?php include('include/footer.php'); ?>
      </div>
    </div>
  </div>

  <script>
     function openmodal(id, name)
      {
    document.getElementById("studentId").value = id;
    document.getElementById("studentName").innerText = name;

    // Modal ko show karo (agar Bootstrap 5 use kar rahe ho)
    var myModal = new bootstrap.Modal(document.getElementById('feeModal'));
    myModal.show();
     }

          function updatetotalamount() {
            let total = 0;
            let select = document.getElementById('feetype');

            for (let opt of select.selectedOptions) {
              total += +opt.dataset.amount;
            }

            document.getElementById('total_fee').value = total;
            calculator(); 
          }

          function calculator() {
            let totalamout = document.getElementById('total_fee').value;
            let paid = document.getElementById('amount_paid').value;
            let due = parseInt(totalamout) - parseInt(paid);
            document.getElementById('amount_due').value = due;
          }

        document.getElementById('amount_paid').addEventListener('input', calculator);
        </script>
  <?php include('include/script.php'); ?>
</body>

</html>