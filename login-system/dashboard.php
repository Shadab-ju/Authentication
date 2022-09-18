<?php
session_start();
if (!empty($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
    header("location:./login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>

    <nav class="header">
        <div>
            <img src="./logo.jpg" alt="logo" class="logo">
        </div>
        <div class="logout-link">
            <a href="./logout.php">Logout</a>
        </div>
    </nav>
    <div class="main">
        <div class="sidebar">
            <a href="./usermangement.php">User Management</a>
        </div>
        <div class="articles">
            Welcome <span><?php echo $name; ?>!</span>
        </div>
    </div>

</body>

</html>