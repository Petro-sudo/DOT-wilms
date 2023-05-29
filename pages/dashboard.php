<?php session_start();
// Include database connection file
include_once('db/database.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Log book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <div class="header">
        <div class="header-left">
            <img src="image/dotleft.jpg" alt="Cinque Terre" width="170" height="110">
        </div>
        <div class="header-right">
            <img src="image/ndpright.png" alt="Cinque Terre" width="120" height="120">
        </div>
    </div>
    <h1>Hi
        <?php echo ucwords($_SESSION['NAME']);
        echo " ";
        echo ucwords($_SESSION['SURNAME']); ?>
    </h1>
    <div class="header-right">
        <a href="logout.php"> Log out</a>
    </div>
</head>

<body>
    <?php if ($_SESSION['ROLE'] == 'Intern') { ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Weekly Date:Monday-Friday</th>
                        <th>hours Worked</th>
                        <th>Activity</th>
                        <th>Task Description</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" class="form-control" id="startDate" name="startDate"><input type="date"
                                class="form-control" id="endDate" name="endDate"></input></td>
                        <td><input type="number" class="form-control" id="hours" name="hours"></input></td>
                        <td><input type="text" class="form-control" id="activity" name="activity"></input></td>
                        <td><textarea type="text" class="form-control" id="task_description"
                                name="task_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="date" class="form-control" id="startDate" name="startDate"><input type="date"
                                class="form-control" id="endDate" name="endDate"></input></td>
                        <td><input type="number" class="form-control" id="hours" name="hours"></input></td>
                        <td><input type="text" class="form-control" id="activity" name="activity"></input></td>
                        <td><textarea type="text" class="form-control" id="task_description"
                                name="task_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="date" class="form-control" id="startDate" name="startDate"><input type="date"
                                class="form-control" id="endDate" name="endDate"></input></td>
                        <td><input type="number" class="form-control" id="hours" name="hours"></input></td>
                        <td><input type="text" class="form-control" id="activity" name="activity"></input></td>
                        <td><textarea type="text" class="form-control" id="task_description"
                                name="task_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="date" class="form-control" id="startDate" name="startDate"><input type="date"
                                class="form-control" id="endDate" name="endDate"></input></td>
                        <td><input type="number" class="form-control" id="hours" name="hours"></input></td>
                        <td><input type="text" class="form-control" id="activity" name="activity"></input></td>
                        <td><textarea type="text" class="form-control" id="task_description"
                                name="task_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="date" class="form-control" id="startDate" name="startDate"><input type="date"
                                class="form-control" id="endDate" name="endDate"></input></td>
                        <td><input type="number" class="form-control" id="hours" name="hours"></input></td>
                        <td><input type="text" class="form-control" id="activity" name="activity"></input></td>
                        <td><textarea type="text" class="form-control" id="task_description"
                                name="task_description"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="proof">Attach file as a proof of the activities you have done</label><br>
                        <input type="text" class="form-control" id="file" name="file" required></input>
                        <input type="file" name="file"><br><br>
                        <br />
                    </div>
                </div>
            </div>
            <br>
            <!-- <input type="save" id="button1" value="Save" />
            <input type="submit" id="button2" value="Submit" /> -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="intern" style="margin-left: 45%; margin-top: 20px;">Send
                    Report </button>
                    <button type="save" class="btn btn-secondary" name="intern" style="margin-right: 45%; margin-top: 20px;">Save
                    Report </button>
            </div>
        </form>
    <?php } ?>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
            //feather.replace();
    </script>
</body>
<div class="header">
    <div class="header-left">
        <img src="image/footer.png" alt="Cinque Terre" width="160%" height="110">
    </div>
</div>

</html>
<?php
include "db/database.php";

if (isset($_POST['intern'])) {
    $startDate = $_POST['startDate'];
    $hours = $_POST['hours'];
    $endDate = $_POST['endDate'];
    $activity = $_POST['activity'];
    $task_description = $_POST['task_description'];
    $name = $_FILES['file']['name'];

    if ($startDate == "" || $hours == "" || $endDate == "" || $activity == "" || $task_description == ""|| $name == "") {

        echo "**ALL FIELDS MANDATORY**";
    }
        
    $targetDir = "uploads/";
    $targetFile = $targetDir.basename($_FILES['file']['name']);
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
$extensions_arr= array("pdf","doc","docx");
if(in_array($fileType,$extensions_arr)){
   $query = "INSERT INTO intern(startDate,endDate, activity, task_description, hours, file) VALUES('$startDate', '$endDate', '$activity', '$task_description', '$hours', '$name')";
   $dashboard_user = mysqli_query($con, $query);
   if (!$dashboard_user) {
       die("Query Failed" . mysqli_error($con));
   }
   move_uploaded_file($_FILES['file']['tmp_name'],$targetDir.$name);
} else echo " file not pdf or doc ";


}

?>