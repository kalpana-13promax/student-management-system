<?php
$conn = mysqli_connect("localhost", "root", "", "regform");
$id = $_REQUEST['$idd'];

$sel = "SELECT * FROM testtbl WHERE id=$id";
$r = mysqli_query($conn, $sel);

$result= mysqli_fetch_array($r);

if (isset($_POST['submit'])) {
$name = $_POST['A'];
$email = $_POST['B'];
$password = $_POST['C']; 
$number = $_POST['D'];
$branch = $_POST['E'];
// if (isset($_POST['F'])) {
//     $gender = $_POST['F'];  
//     echo "Selected Gender: " . $gender;
// } else {
//     echo "No gender selected!";
// } 
// $hobbies = "";
// if (isset($_POST['G']) && is_array($_POST['G'])) {
//     $hobbies = implode(", ", $_POST['G']);
// }
$description = $_POST['H'];

$updat = "UPDATE testtbl SET 
    name='$name', 
    email='$email', 
    password='$password', 
    number='$number', 
    branch='$branch', 
    -- gender='$gender', 
    -- hobby='$hobbies', 
    description='$description' 
    WHERE id=$id";

    echo $updat;

if (mysqli_query($conn, $updat)) {
        echo "<script>alert('Record updated successfully!'); 
        window.location='showform.php';
        </script>";
    } else {
        echo "not update data";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      /* background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c') no-repeat center center/cover; */
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .form-container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      width: 800px;
      box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
    }
    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: bold;
    }
    .btn-custom {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      color: #fff;
      font-weight: bold;
    }
    .btn-custom:hover {
      opacity: 0.9;
      color: #fff;
    }
  </style>
</head>
<body class="bg-light">
<div class="container my-5">
  <!-- <div class="card shadow"> -->
    <div class="card-header bg-warning text-center">
      <h3>Edit Student</h3>
    </div>
    <div class="form-container">
    <h2>Registration Form</h2>
    <form class="row g-3 needs-validation" action="" method="post" novalidate enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
      <!-- Name -->
      <div class="col-12">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name"  name="A" required pattern="[A-Za-z ]+" value="<?php echo $result['name']; ?>">
        <div class="invalid-feedback">Please enter a valid name (alphabets only).</div>
      </div>

      <!-- Email -->
      <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="B" required value="<?php echo $result['email']; ?>">
        <div class="invalid-feedback">Please enter a valid email.</div>
      </div>

      <!-- Password -->
      <div class="col-12">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="C" required minlength="6" value="<?php echo $result['password']; ?>">
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
      </div>

      <!-- Number -->
      <div class="col-12">
        <label for="number" class="form-label">Number</label>
        <input type="number" class="form-control" id="number" name="D" required pattern="[0-9]+" value="<?php echo $result['number']; ?>">
        <div class="invalid-feedback">Please enter digits only.</div>
      </div>

      <!-- Branch -->
      <div class="col-12">
        <label for="branch" class="form-label">Select your Branch</label>
        <select class="form-select" id="branch" name="E" required  value="<?php echo $result['branch']; ?>">
          <option value="">-- Select Branch --</option>
          <option value="CSE">CSE</option>
          <option value="IT">IT</option>
          <option value="ME">ME</option>
          <option value="ECE">ECE</option>
          <option value="CIVIL">CIVIL</option>
        </select>
        <div class="invalid-feedback">Please select a branch.</div>
      </div>

      <!-- Gender -->
      <div class="col-12">
        <label class="form-label">Gender</label><br>
        <div class="form-check form-check-inline">
          <input type="radio" name="F" value="Male" <?php if($result['gender']=='Male'){echo "checked";} ?>>
<label>Male</label>

<input type="radio" name="F" value="Female" <?php if($result['gender']=='Female'){echo "checked";} ?>>
<label>Female</label>

<input type="radio" name="F" value="Other" <?php if($result['gender']=='Other'){echo "checked";} ?>>
<label>Other</label>

        <div class="invalid-feedback d-block">Please select gender.</div>
      </div>

      <!-- Hobbies -->
      <div class="col-12">
        <label class="form-label">Choose your Hobbies</label><br>
        <?php $hobbiesArr = explode(", ", $result['hobbies']); ?>
<input type="checkbox" name="G[]" value="Reading" <?php if(in_array("Reading",$hobbiesArr)) echo "checked"; ?>> Reading
<input type="checkbox" name="G[]" value="Sports" <?php if(in_array("Sports",$hobbiesArr)) echo "checked"; ?>> Sports
<input type="checkbox" name="G[]" value="Music" <?php if(in_array("Music",$hobbiesArr)) echo "checked"; ?>> Music
      </div>

      <!-- Description -->
      <div class="col-12">
        <label for="description" class="form-label">Your Description</label>
        <textarea class="form-control" id="description"  rows="3" required name="H"><?php echo $result['description']; ?> </textarea>
        <div class="invalid-feedback">Please enter your description.</div>
      </div>

      <!-- Profile -->
      <div class="col-12">
        <label for="profile" class="form-label">Choose your Profile</label>
        <input type="file" class="form-control" id="profile" name="I" required value="<?php echo $result['profile']; ?>">
        <div class="invalid-feedback">Please upload your profile picture.</div>
      </div>

      <!-- Submit -->
      <div class="col-12">
        <button class="btn btn-custom w-100" type="submit" name="submit" value="Update">edit</button>
      </div>
    </form>
  </div>
  <!-- </div> -->
</div>
</body>
</html>