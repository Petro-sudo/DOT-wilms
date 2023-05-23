<!-- <?php


 //include('validate-reg.php'); VALIDATE LATER 
 include_once('database.php'); 
  if (isset($_POST['submit'])) {
    
    $name = $con->real_escape_string($_POST['name']);
    $surname = $con->real_escape_string($_POST['surname']);
    $id_number = $con->real_escape_string($_POST['id_number']);
    $perselNum = $con->real_escape_string($_POST['perselNum']);
    $emailAddress = $con->real_escape_string($_POST['emailAddress']);
    $cellNumber = $con->real_escape_string($_POST['cellNumber']);
    $role     = $con->real_escape_string($_POST['role']);
    $password = $con->real_escape_string(md5($_POST['password']));
    //$cpassword = $con->real_escape_string(md5($_POST['cpassword']));
    
    $query  = "INSERT INTO register (name,surname,id_number,perselNum,emailAddress,cellNumber,password,role) VALUES ('$name','$surname','$id_number','$perselNum','$emailAddress','$cellNumber','$password','$role')";
    $result = $con->query($query);   
     if ($result==true) {
      header("Location:login.php");
      die();
    }else{
      $errorMsg  = "You are not Registred. Please Try again";
    }     }?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LogBook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body><div class="card text-center" style="padding:20px;">
  <h3>INTERNS’ LOG-BOOK</h3>
</div>
<br>
<div class="container">
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
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
          </div>
          <div class="form-group">  
            <label for="surname">Surname:</label>
            <input type="text" class="form-control" name="surname" placeholder="Enter Surname" required="">
          </div>
          <div class="form-group">  
            <label for="id_number">ID Number:</label>
            <input type="id_number" class="form-control" name="id_number" placeholder="Enter ID Number" required="">
          </div>
          <div class="form-group">
            <label for="perselNum">Persel Number:</label>
            <input type="text" class="form-control" name="perselNum" placeholder="Persel Number (Mentors)">
          </div>
          <div class="form-group">  
            <label for="emailAddress">Email Address:</label>
            <input type="text" class="form-control" name="emailAddress" placeholder="Enter UsernEmail Addressame" required="">
          </div>
          <div class="form-group">  
            <label for="celNum">Phone Number:</label>
            <input type="text" class="form-control" name="celNum" placeholder="Enter Phone Number" required="">
          </div>
          <div class="form-group">  
            <label for="role">Role:</label>
            <select class="form-control" name="role" required="">
              <option value="">Select Role</option>
              <option value="super_admin">Intern</option>
              <option value="admin">Mentor</option>
              <option value="manager">HR</option>
            </select>
          </div>
         
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>
          <div class="form-group">
            <label for="cpassword">Confirm Password:</label>
            <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required="">
          </div>

          <div class="form-group">
            <p>Already have account ?<a href="login.php"> Login</a></p>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html> -->