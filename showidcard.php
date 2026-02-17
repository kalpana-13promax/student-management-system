 <?php
$conn = mysqli_connect("localhost","root","","regform");

$sql = "select DISTINCT year from addStudent1";
$sql1= "select * from insertbranch";

$sql2 = "select * from paidfee";
$r2 = mysqli_query($conn, $sql2);

$result=mysqli_query($conn,$sql);
$r=mysqli_query($conn,$sql1);

$filteredData = [];
if(isset($_POST['submit'])){
  $year=$_POST['C'];
  $branch=$_POST['branch'];
  $query="select * from addStudent1 where year='$year' AND branch='$branch'";
  $filteredData= mysqli_query($conn, $query);
}

$select= "SELECT feetype, feeamount FROM feeamount";
$result1= mysqli_query($conn, $select);

// dynamic id card 

$studentid="select * from addstudent1";
$rid=mysqli_query($conn,$studentid);
$resid = mysqli_fetch_assoc($rid);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
include('include/header.php');
?>
<style>
    .id-card {
      width: 360px;
      height: 520px;
      border-radius: 18px;
      background: white;
      box-shadow: 0 12px 30px rgba(0,0,0,0.25);
      overflow: hidden;
      transition: 0.4s;
      position: relative;
    }
    .id-card:hover {
      transform: scale(1.05);
      box-shadow: 0 20px 45px rgba(0,0,0,0.35);
    }

    /* Header Banner */
    .header {
      background: linear-gradient(135deg,#1976d2,#2b2e4c);
      color: white;
      padding: 25px 15px 70px;
      text-align: center;
      position: relative;
    }
    .header h2 {
      margin: 0;
      font-size: 18px;
      font-weight: 700;
      letter-spacing: 0.5px;
    }
    .header small {
      font-size: 12px;
      opacity: 0.9;
    }

    /* Profile image */
    .profile-pic {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      border: 5px solid #fff;
      object-fit: cover;
      position: absolute;
      bottom: -55px;
      left: 50%;
      transform: translateX(-50%);
      box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }

    /* Details */
    .details {
      padding: 80px 20px 20px;
    }
    .details h3 {
      text-align: center;
      margin-bottom: 15px;
      color: #2b2e4c;
      font-weight: 700;
    }
    .details p {
      margin: 6px 0;
      font-size: 14px;
      display: flex;
      justify-content: space-between;
      border-bottom: 1px dotted #ccc;
      padding-bottom: 3px;
    }
    .details strong {
      color: #333;
      min-width: 120px;
    }

    .footer {
      background: #2b2e4c;
      color: white;
      text-align: center;
      font-size: 12px;
      padding: 8px;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
</style>
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
                <h4 class="mb-0 font-weight-bold">Add Student Fee Filter</h4>
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
                    <h4>Add Fee filter</h4>
                  <form class="forms-sample" action="#" method="post">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Year</label>
                      

                      <select class = "form-control" id="exampleInputEmail1" name="C">
                        <option value="" selected disabled>--Please Select Year--</option>
                        <?php
                        while($res = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $res['year']; ?>">
                                <?php echo $res['year']; ?>
                            </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Branch</label>
                      <select class = "form-control" id="exampleInputEmail1" name="branch">
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
                    
                    </div>
                    
                    <input type="submit" class="btn btn-primary mr-2" name="submit" value="Filter">
                  </form>
                </div>
              </div>
            </div>
          </div>

<?php if(isset($_POST['submit']))
  {
    ?>
<div class="row mt-4">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4>Student Filter Data</h4>
        <table class="table table-bordered">
          <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Branch</td>
            <td>Year</td>
           
            <td>Show ID Card</td>
          </tr>
          <tr>
            <?php while($row=mysqli_fetch_array($filteredData))
              {
                ?>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['branch'] ?></td>
                <td><?php echo $row['year'] ?></td>

                <td><button type="submit" class="btn btn-primary" onclick="openIdCard('<?php echo $row['id'] ?>','<?php echo $row['name'] ?>')">Show Id card</button></td>
            <?php } ?>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php }?>





  <!-- Front Side -->
<div class="modal fade" id="feemodal1" tabindex="-1" >
  <div class="modal-dialog">
  <div class="id-card">
    <form action="#">
    <div class="header">
      <h2>Sagar Group Of instituion. College</h2>
      <small> Lucknow - Ayodhya Road, Barabanki (U.P.) | Estd. 1996</small>
      <img src="images\png.png" alt="Student" class="profile-pic">
    </div>
    <div class="details">
      <h3><?php echo $resid['name']   ?></h3>
      <p><strong>ID NO:</strong><?php echo $resid['id']   ?></p>
      <p><strong>Branch:</strong><?php echo $resid['branch']   ?></p>
      <p><strong>Year:</strong><?php echo $resid['year']   ?></p>
      <p><strong>Father Name:</strong><?php echo $resid['name']   ?></p>
      <p><strong>Contact:</strong><?php echo $resid['mobile_number']   ?></p>
      <p><strong>Date:</strong><?php echo $resid['dob']   ?></p>

      <div class="barcode">
        <!-- <img src="barcode.png" alt="Barcode"> -->
        <p>Principal Signature</p>
      </div>
    </div>
    <div class="footer">
      If found please return it to the school.
    </div>
    </form>
  </div>
   </div>
  </div>

<!-- modal -->

  <script>


  function openIdCard(){
     var mymodal= new bootstrap.Modal(document.getElementById('feemodal1'));
      mymodal.show();
  }

    function openmodal(id, name){
      document.getElementById('modal_id').value = id;
      document.getElementById('student_model').value=name;

      var mymodal= new bootstrap.Modal(document.getElementById('feemodal'));
      mymodal.show();
    }
function updatetotalamount(){
    let total =0;
    let select= document.getElementById("feetype");


    ///select ke andar option value add akrna hai
    for(let opt of select.selectedOptions)
    {
      total+=+opt.dataset.amount;
    }
    document.getElementById("total_fee").value=total;
    calculator();
     //// paid and dues massage show
    //  let paid= document.getElementById("paid_amount").value || 0;
    //  document.getElementById("Due_amount").value=total-paid;
  }

  
  function calculator()
  {
    ///paid aur due msg show karana hai
    let totalamount= document.getElementById('total_fee').value
    let paid= document.getElementById('paid_amount').value
    let due =  parseInt(totalamount)- parseInt(paid);
    document.getElementById('Due_amount').value = due;
  }

document.getElementById('paid_amount').addEventListener('input',calculator);

</script>
     <?php
        include('include/footer.php');
       ?>
      </div>
    </div>
  </div>
  <?php include('include/script.php'); ?>
  
</body>
</html>