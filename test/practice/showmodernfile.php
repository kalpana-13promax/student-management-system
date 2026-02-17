<?php

$conn = mysqli_connect("localhost","root","","regform");

$sel = "select * from moderninsert";
$r = mysqli_query($conn, $sel);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>show data</h1>
    <table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>password</th>
    <th>Mobile</th>
    <th>DOB</th>
    <th>Address</th>
    <th>Picture</th>
    <th>Edit</th>
    <th>delete</th>
  </tr>
  <?php
  while($result = mysqli_fetch_array($r)){?>
  <tr>
    <td><?php echo $result['id']; ?></td>
    <td><?php echo $result['name']; ?></td>
    <td><?php echo $result['email']; ?></td>
    <td><?php echo $result['password']; ?></td>
    <td><?php echo $result['number']; ?></td>
    <td><?php echo $result['dob']; ?></td>
    <td><?php echo $result['address']; ?></td>
    <td><img src="uploads/<?php echo $result['image']; ?>" height="100" width="100"></td>
    <td><a href="editfile.php?$idd=<?php  echo $result['id'];?>">Edit</a></td>
    <td><a href="deletefile.php?$idd=<?php  echo $result['id'];?>">Delete</a></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>