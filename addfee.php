<?php

$conn = mysqli_connect("localhost", "root", "", "regform");

$sql1 = "select * from insertbranch";


$r = mysqli_query($conn, $sql1);
// modal code
if (isset($_POST['submit'])) {
    $branch = $_POST['f_branch'];
    $feetype = $_POST['f_fee_type'];
    $Amount = $_POST['Amount'];

    // Sirf branch check karega (date matter nahi karegi)
$check = "SELECT * FROM feeamout  WHERE branch='$branch'  AND feetype='$feetype' 
    AND feeamount='$Amount'";
$result = mysqli_query($conn, $check);

if(mysqli_num_rows($result) > 0){
    echo "<script>
        alert('This Branch and feetype already exists!');
        window.location.href = 'addfee.php';
    </script>";
} else {
    $insert = "INSERT INTO feeamout( branch, feetype, feeamount) VALUES ('$branch','$feetype','$Amount')";
    if(mysqli_query($conn, $insert)){
        echo "<script>
            alert('Fee submitted successfully');
            window.location.href = 'addfee.php';
        </script>";
    } else {
        echo "Form not submitted: " . mysqli_error($conn);
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
                                            <select class="form-control" name="feetype" required id="feetype">
                                                <option value="" selected disabled>--Please Select Fee Type--</option>
                                                <option value="Reg fee">Reg fee</option>
                                                <option value="Exam fee">Exam fee</option>
                                                <option value="Sem fee">Sem fee</option>
                                                <option value="Annual fee">Annual fee</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Branch</label>
                                            <select class="form-control" name="branch" required id="branch">
                                                <option value="" selected disabled>--Please Select Branch--</option>
                                                <?php while ($res = mysqli_fetch_array($r)) { ?>
                                                    <option value="<?php echo $res['Add_Branch']; ?>">
                                                        <?php echo $res['Add_Branch']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <button type="button" class="btn btn-primary" onclick="openmodal()">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filtered Data Show -->
                    <!-- Modal -->
                    <div class="modal fade" id="feemodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:white">Add Fee</h1>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <label for="branch_modal">Enter Your Branch</label>
                                        <input type="text" name="f_branch" class="form-control" id="branch_modal" readonly style="color:black">
                                        <br>

                                        <label for="fee_modal">Enter Your Fee Type</label>
                                        <input type="text" name="f_fee_type" class="form-control" id="fee_modal" readonly style="color:black">
                                        <br>

                                        <label for="amount">Enter Your Fee Amount</label>
                                        <input type="text" placeholder="Enter Your Fee Amount" class="form-control" name="Amount" id="amount" style="color:black">
                                        <br>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>

                <script>
                    function openmodal() {
                        let branch = document.getElementById("branch").value;
                        // alert(branch); 
                        let feetype = document.getElementById("feetype").value;

                        if (branch && feetype) {
                            document.getElementById("branch_modal").value = branch;
                            document.getElementById("fee_modal").value = feetype;
                            var mymodal = new bootstrap.Modal(document.getElementById('feemodal'));
                            mymodal.show();

                        } else {
                            alert("Please select the all field");
                        }
                    }
                </script>
                <?php include('include/footer.php'); ?>
            </div>
        </div>
    </div>
    <?php include('include/script.php'); ?>
</body>

</html>