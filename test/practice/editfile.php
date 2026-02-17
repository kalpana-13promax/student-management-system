<?php
$conn = mysqli_connect("localhost","root","","regform");

$id = $_REQUEST['$idd'];

$sel = "SELECT * FROM moderninsert WHERE id=$id";
$sql = mysqli_query($conn, $sel);

$r = mysqli_fetch_assoc($sql);

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];
$dob = $_POST['dob'];
$address = $_POST['address'];

$updat = "update moderninsert set 
        name='$name',
        email='$email',
        password='$password',
        number='$number',
        dob='$dob',
        address='$address'
        where id=$id";

if(mysqli_query($conn, $updat)){
    echo "record is update";
}
else{
    echo "record is not update";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {background: linear-gradient(120deg, #1a1a1a, #222831, #393e46);min-height: 100vh;display: flex;justify-content: center;align-items: center;font-family: 'Segoe UI', sans-serif;color: #e0e0e0;}
    .card {background: #2a2d35;border: none;border-radius: 16px;padding: 35px;box-shadow: 0 8px 20px rgba(0,0,0,0.6);width: 420px;}
    .form-control {background: #1f2229;border: 1px solid #3a3f47;color: #f5f5f5;border-radius: 12px;padding-left: 42px;height: 48px;}
    .input-icon {position: absolute;left: 14px;top: 50%;transform: translateY(-50%);color: #bbb;font-size: 16px;pointer-events: none;}
    .btn-gradient {background: linear-gradient(135deg, #0061ff, #60efff);border: none;border-radius: 12px;padding: 12px;font-weight: bold;font-size: 15px;color: #fff;text-transform: uppercase;margin-top: 10px;}
  </style>
</head>
<body>
  <div class="card">
     <img src="uploads/<?php echo $result['image']; ?>" height="100" width="100" value='<?php echo $r['image']; ?>'>
    <h3>Edit Account</h3>
    <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
      <div class="mb-3 position-relative">
        <i class="fa fa-user input-icon"></i>
        <input type="text" class="form-control" required name="name" value="<?php echo $r['name']; ?>">
      </div>
      <div class="mb-3 position-relative">
        <i class="fa fa-envelope input-icon"></i>
        <input type="email" class="form-control" required name="email" value="<?php echo $r['email']; ?>">
      </div>
      <div class="mb-3 position-relative">
        <i class="fa fa-lock input-icon"></i>
        <input type="password" class="form-control" required name="password" value="<?php echo $r['password']; ?>">
      </div>
      <div class="mb-3 position-relative">
        <i class="fa fa-phone input-icon"></i>
        <input type="number" class="form-control" required name="number" value="<?php echo $r['number']; ?>">
      </div>
      <div class="mb-3 position-relative">
        <i class="fa fa-calendar input-icon"></i>
        <input type="date" class="form-control" required name="dob" value="<?php echo date('Y-m-d', strtotime($r['dob'])); ?>">
      </div>
      <div class="mb-3 position-relative">
        <i class="fa fa-map-marker-alt input-icon"></i>
        <textarea name="address" class="form-control" required><?php echo $r['address']; ?></textarea>
      </div>
     
      <div class="mb-3 position-relative">
        <i class="fa fa-image input-icon"></i>
        <input type="file" class="form-control" name="Img">
      </div>
      <button type="submit" name="submit" class="btn btn-gradient w-100">Update</button>
    </form>
  </div>
</body>
</html>
