<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c') no-repeat center center/cover;
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
<body>
  <div class="form-container">
    <h2>Registration Form</h2>
    <form class="row g-3 needs-validation" action="regform.php" method="post" novalidate enctype="multipart/form-data">

    <!-- Name -->
<div class="col-12">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="A" 
         required pattern="^[A-Za-z ]+$" 
         oninput="this.value = this.value.replace(/[^A-Za-z ]/g,'')">
  <div class="invalid-feedback">Please enter a valid name (alphabets only).</div>
</div>


      <!-- Email -->
      <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="B" required>
        <div class="invalid-feedback">Please enter a valid email.</div>
      </div>

      <!-- Password -->
      <div class="col-12">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="C" required minlength="6">
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
      </div>

      <!-- Number -->
      <div class="col-12">
  <label for="number" class="form-label">Number</label>
  <input type="text" class="form-control" id="number" name="D" 
         required pattern="^[0-9]{10}$" maxlength="10">
  <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
</div>

      <!-- Branch -->
      <div class="col-12">
        <label for="branch" class="form-label">Select your Branch</label>
        <select class="form-select" id="branch" name="E" required>
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
    <input class="form-check-input" type="radio" name="F" id="male" value="Male" required>
    <label class="form-check-label" for="male">Male</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="F" id="female" value="Female">
    <label class="form-check-label" for="female">Female</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="F" id="other" value="Other">
    <label class="form-check-label" for="other">Other</label>
  </div>
</div>


      <!-- Hobbies -->
      <div class="col-12">
  <label class="form-label">Choose your Hobbies</label><br>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="hobby1" name="G[]" value="PHP">
    <label class="form-check-label" for="hobby1">PHP</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="hobby2" name="G[]" value="Laravel">
    <label class="form-check-label" for="hobby2">Laravel</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="hobby3" name="G[]" value="Python">
    <label class="form-check-label" for="hobby3">Python</label>
  </div>
</div>


      <!-- Description -->
      <div class="col-12">
        <label for="description" class="form-label">Your Description</label>
        <textarea class="form-control" id="description" name="H" rows="3" required></textarea>
        <div class="invalid-feedback">Please enter your description.</div>
      </div>

      <!-- Profile -->
      <div class="col-12">
        <label for="profile" class="form-label">Choose your Profile</label>
        <input type="file" class="form-control" id="profile" name="Img" required>
        <div class="invalid-feedback">Please upload your profile picture.</div>
      </div>

      <!-- Submit -->
      <div class="col-12">
        <button class="btn btn-custom w-100" type="submit">Submit</button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Bootstrap Validation
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
