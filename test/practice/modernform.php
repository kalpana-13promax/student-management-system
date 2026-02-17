<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Dark Form with Validation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(120deg, #1a1a1a, #222831, #393e46);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      color: #e0e0e0;
    }

    .card {
      background: #2a2d35;
      border: none;
      border-radius: 16px;
      padding: 35px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.6);
      width: 420px;
      animation: fadeIn 0.8s ease-in-out;
    }

    .card h3 {
      color: #ffffff;
      font-weight: 600;
      text-align: center;
      margin-bottom: 25px;
    }

    .form-control {
      background: #1f2229;
      border: 1px solid #3a3f47;
      color: #f5f5f5;
      border-radius: 12px;
      padding-left: 42px;
      height: 48px;
    }

    .form-control:focus {
      border-color: #0061ff;
      box-shadow: 0 0 6px rgba(0,97,255,0.4);
      background: #242731;
      color: #fff;
    }

    .form-control::placeholder {
      color: #999;
    }

    .input-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #bbb;
      font-size: 16px;
      pointer-events: none;
    }

    .btn-gradient {
      background: linear-gradient(135deg, #0061ff, #60efff);
      border: none;
      border-radius: 12px;
      padding: 12px;
      font-weight: bold;
      font-size: 15px;
      color: #fff;
      text-transform: uppercase;
      transition: all 0.3s ease-in-out;
      margin-top: 10px;
    }

    .btn-gradient:hover {
      background: linear-gradient(135deg, #60efff, #0061ff);
      transform: scale(1.03);
      box-shadow: 0 6px 18px rgba(0,97,255,0.5);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="card">
    <h3>Create Account</h3>
    <form class="needs-validation" novalidate action="moderninsert.php" method="post" enctype="multipart/form-data">
      <div class="mb-3 position-relative">
        <i class="fa fa-user input-icon"></i>
        <input type="text" class="form-control" placeholder="Firstname" required name="name">
        <div class="invalid-feedback">Please enter your Full Name.</div>
      </div>

      <div class="mb-3 position-relative">
        <i class="fa fa-envelope input-icon"></i>
        <input type="email" class="form-control" placeholder="Email" required name="email">
        <div class="invalid-feedback">Please enter a valid email address.</div>
      </div>

      <div class="mb-3 position-relative">
        <i class="fa fa-lock input-icon"></i>
        <input type="password" class="form-control" placeholder="Password" required minlength="6" name="password">
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
      </div>

       <div class="mb-3 position-relative">
        <i class="fa fa-phone input-icon"></i>
        <input type="number" maxlength="10" class="form-control" placeholder="Mobile number" required name="number">
        <div class="invalid-feedback">Please Enter your valid number.</div>
      </div>

      <div class="mb-3 position-relative">
        <i class="fa fa-calendar input-icon"></i>
        <input type="date" class="form-control" placeholder="Date Of Birth" required name="dob">
        <div class="invalid-feedback">Please Enter DOB.</div>
      </div>

      <div class="mb-3 position-relative">
        <i class="fa fa-map-marker-alt input-icon"></i>
        <!-- <input type="text" class="form-control" placeholder="Enter Your Address" required> -->
         <textarea class="form-control" placeholder="Address" rows="2" required name="address"></textarea>
        <div class="invalid-feedback">Please Enter Your Address.</div>
      </div>

        <div class="mb-3 position-relative">
        <i class="fa fa-image input-icon"></i>
        <input type="file" class="form-control" required name="Img">
        <div class="invalid-feedback">Please choose Your Profile Picture.</div>
      </div>

      <button type="submit" class="btn btn-gradient w-100">Register</button>
    </form>
  </div>

  <script>
    // Bootstrap custom validation
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
