<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modern Form with Validation</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4));
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-container {
      background: #fff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 450px;
      transition: transform 0.3s;
    }
    .form-container:hover {
      transform: translateY(-5px);
    }
    .form-control:focus {
      border-color: #4facfe;
      box-shadow: 0 0 8px rgba(79,172,254,0.6);
    }
    .btn-custom {
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 10px;
      transition: 0.3s;
    }
    .btn-custom:hover {
      background: linear-gradient(135deg, #00f2fe, #4facfe);
      transform: scale(1.05);
    }
    .form-header {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-header h3 {
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <div class="form-header">
      <i class="fa-solid fa-user-circle fa-3x text-primary"></i>
      <h3 class="mt-2">Registration Form</h3>
    </div>
    <form id="myForm" novalidate action="insertmail.php" method="post">
      <!-- Name -->
      <div class="mb-3">
        <label class="form-label"><i class="fa-solid fa-user"></i> Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
        <div class="invalid-feedback">Please enter your name.</div>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label"><i class="fa-solid fa-envelope"></i> Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
        <div class="invalid-feedback">Please enter a valid email.</div>
      </div>

      <!-- Number -->
      <div class="mb-3">
        <label class="form-label"><i class="fa-solid fa-phone"></i> Number</label>
        <input type="tel" class="form-control" id="number" placeholder="Enter your mobile number" name="number" pattern="^[0-9]{10}$" required>
        <div class="invalid-feedback">Please enter a 10-digit number.</div>
      </div>

      <!-- Address -->
      <div class="mb-3">
        <label class="form-label"><i class="fa-solid fa-location-dot"></i> Address</label>
        <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" name="address" required></textarea>
        <div class="invalid-feedback">Please enter your address.</div>
      </div>

      <!-- Submit -->
      <div class="d-grid">
        <button type="submit" class="btn btn-custom">Submit</button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Validation Script -->
  <script>
    (function () {
      'use strict'
      const form = document.getElementById('myForm');

      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })()
  </script>
</body>
</html>
