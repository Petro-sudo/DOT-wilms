<?php
  session_start();
  if (isset($_SESSION['ID'])) {
      header("Location:dashboard.php");
      exit();
  }
  // Include database connectivity
    
  include "database.php";
  
  if (isset($_POST['submit'])) {     
     $errorMsg = ""; 
     $email = $_POST['email'];
     $pwd = $_POST['pwd'];
      
  if (!empty($username) || !empty($pwd)) {
        $query  = "SELECT * FROM register WHERE email = '$email' AND pwd = '$pwd'";
        $result = $con->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['reg_id'];
            $_SESSION['NAME'] = $row['name'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['SURNAME'] = $row['surname'];
            $_SESSION['ID_NUMBER'] = $row['id_number'];
            header("Location:dashboard.php");
            die();                              
        }else{
          echo "Username and Password is required";
        } 
    }
  }?>
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
<body><div class="card text-center" style="padding:20px;">
  <h3>Sign In</h3>
</div><br><div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">  
            <label for="email">Username:</label> 
            <input type="text" class="form-control" name="email" placeholder="Enter Email Address" >
          </div>
          <div class="form-group">  
            <label for="pwd">Password:</label> 
            <input type="password" class="form-control" name="pwd" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <p>Not registered yet ?<a href="register.php"> Register here</a></p>
            <input type="submit" name="submit" class="btn btn-success" value="Login"> 
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>


