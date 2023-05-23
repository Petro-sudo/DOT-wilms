<?php session_start();
// Include database connection file
include_once('database.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
} ?>
<!doctype html>
<html lang="en">

<head>
    <title>Log book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <div class="">
        <h1 style="background-color:#182C39; color:white; text-align:center">WELCOME TO THE DEPARTMENT OF TRANSPORT!!!
        </h1>
        <p style="color:#182C39; font-size:18px;text-align:center;"></p>
    </div>
</head>

<body>
    <div style="text-align:right">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Hi
                    <?php echo ucwords($_SESSION['NAME']); ?> Log out
                </a>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php if ($_SESSION['ROLE'] == 'intern') { ?>
            <?php } ?>
            <?php if ($_SESSION['ROLE'] == 'mentor') { ?>
            <?php } ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="table-responsive">
                    <?php
                    if ($_SESSION['ROLE'] == "HR") {
                        $query = "SELECT * FROM register";
                    } else {
                        $role = $_SESSION['ROLE'];
                        $query = "SELECT * FROM register WHERE role = '$role'";
                    }
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array()) {
                            ?>

                        <?php }
                    } else {
                        echo "<h2>No record found!</h2>";
                    } ?>
                </div>
            </main>
        </div>
    </div>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>