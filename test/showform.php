<?php
$conn = mysqli_connect("localhost", "root", "", "regform");

$sql = 'select * from testtbl';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Students</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
      <h3> Show Student Records</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped table-hover text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Number</th>
            <th>Branch</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Description</th>
            <th>Profile</th>
            <th>Edit</th>
            <th>delete</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          while($row = mysqli_fetch_array($result)){ ?>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['branch']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['hobbies']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
              <img src="uploads/<?php echo $row['profile']; ?>" alt="" height="300px"> 
            </td>
             <td>
                <a href="editform.php?$idd=<?php echo $row['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="deleteform.php?$idd=<?php echo $row['id']; ?>">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
