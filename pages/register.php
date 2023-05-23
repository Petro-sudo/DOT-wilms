
<!-- Navigation -->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Log book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <div style="text-align:left">
    <div class="">
      <h1 style="background-color:#182C39; color:white; text-align:center">WELCOME TO THE DEPARTMENT OF TRANSPORT!!!
      </h1>
      <p style="color:#182C39; font-size:18px;text-align:center;"></p>
    </div>
</head>

<body class="body">
  <!-- Page Content -->
  <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

  <div class="container">
    <div class="row">
      <div class="col-lg-6">


        <h2 style="margin-left: 40%;">Registration</h2>
        <form action="" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="name">Name</label><br>
            <input type="text" class="form-control" id="name" placeholder="Enter Username" name="name">
          </div>
          <br>
          <div class="form-group">
            <label for="surname">Surname</label><br>
            <input type="text" class="form-control" id="surname" placeholder="Enter Surname" name="surname">
          </div>
          <br>
          <div class="form-group">
            <label for="email">ID Number</label><br>
            <input type="text" class="form-control" id="id_number" placeholder="Enter ID Number" name="id_number">
          </div>
          <br>
          <div class="form-group">
            <label for="perselNo">Persel Number (Mentor)</label><br>
            <input type="text" class="form-control" id="perselNo" placeholder="Mentor Persel Number" name="perselNo">
          </div>
          <br>
          <div class="form-group">
            <label for="email">Email Address</label><br>
            <input type="text" class="form-control" id="email" placeholder="Enter email Address" name="email">
          </div>
          <br>
          <div class="form-group">
            <label for="cellNo">Contact Number</label><br>
            <input type="number" class="form-control" id="cellNo" placeholder="Enter Contact Numbers" name="cellNo">
          </div>
          <br>
          <div class="form-group">
            <label for="role">Role:</label><br>
            <select class="form-control" name="role">
              <option value="">Select Role</option>
              <option value="Intern">Intern</option>
              <option value="Mentor">Mentor</option>
              <option value="HR">HR</option>
            </select>
          </div>
          <br>
          <div class="form-group">
            <label for="pwd">Password</label><br>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
          </div>
          <br>
          <div class="form-group">
            <label for="cpwd">Confirm Password</label><br>
            <input type="password" class="form-control" id="cpwd" placeholder="Enter same password" name="cpwd">
          </div>
          <br>
          <div class="form-group">
            <p>Already have account ?<a href="login.php"> Login</a></p>
            <button type="submit" class="btn btn-primary" name="register"
              style="margin-left: 45%; margin-top: 20px;">Register</button>
          </div>
        </form>


      </div>
    </div>

  </div>

</body>

</html>
<?php
include "database.php"; 

if (isset($_POST['register'])) {
  //echo "registered";
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $id_number = $_POST['id_number'];
  $perselNo = $_POST['perselNo'];
  $email = $_POST['email'];
  $cellNo = $_POST['cellNo'];
  $role = $_POST['role'];
  $pwd = $_POST['pwd'];
  $cpwd = $_POST['cpwd'];
  //upload an image
  // $image = $_FILES['image']['name'];
  // $tmp_image = $_FILES['image']['tmp_name'];

  // move_uploaded_file($tmp_image, "images/$image");
  // if ($image == "") {
  //   $image = "user_default.jpg";
  // }
  $validName = "/^[a-zA-Z ]*$/";
  $validEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
  $uppercasePassword = "/(?=.*?[A-Z])/";
  $lowercasePassword = "/(?=.*?[a-z])/";
  $digitPassword = "/(?=.*?[0-9])/";
  $spacesPassword = "/^$|\s+/";
  $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
  $minEightPassword = "/.{8,}/";

  if ($name == "" || $surname == "" || $id_number == "" || $email == "" || $cellNo == "" || $role == "" || $pwd == "" || $cpwd == "") {
    # code...
    echo "**ALL FIELDS MANDATORY";
  } elseif (strlen($cellNo) != 10) {
    # code...
    echo "**PhoneNo Must Contain Of 10 bits";
  } elseif (strlen($id_number) != 13) {
    # code...
    echo "**ID Number Must Contain Of 13 bits";
  } elseif (!preg_match($validEmail, $email)) {
    echo "Invalid Email Address";
  } elseif (!preg_match($uppercasePassword, $pwd) || !preg_match($lowercasePassword, $pwd) || !preg_match($digitPassword, $pwd) || !preg_match($symbolPassword, $pwd) || !preg_match($minEightPassword, $pwd) || preg_match($spacesPassword, $pwd)) {
    echo " *Password must be at least one uppercase letter";
    echo " *Lowercase letter";
    echo " *Digit, a special character with no spaces";
    echo " *Minimum 8 of length";
  } elseif ($cpwd != $pwd) {
    echo "Confirm Password doest Matched";
  } else {
    $select = mysqli_query($con, "SELECT `email` FROM `register` WHERE `email` = '" . $_POST['email'] . "'");
    if (mysqli_num_rows($select)) {
      echo "This email is already being used";
    }
    $query = "INSERT INTO register(name, surname, id_number, perselNo, email, cellNo, pwd, role) VALUES('$name', '$surname', '$id_number', '$perselNo', '$email', '$cellNo', '$pwd', '$role') ";

    $register_user = mysqli_query($con, $query);

    if (!$register_user) {
      die("Query Failed" . mysqli_error($con));
    }


  }

}

?>