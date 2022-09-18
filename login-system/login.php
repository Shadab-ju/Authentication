<?php
if (isset($_POST['submit'])) {
    include_once "./connection.php";
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $query = "select `name` from `users` where `email`='$email' and `password`='$password'";
        $res = mysqli_query($con, $query);
        if (mysqli_num_rows($res) > 0) {
            $record = mysqli_fetch_array($res);
            session_start();
            $_SESSION['name'] = $record['name'];
            header("location: ./dashboard.php");
        } else {
            echo "<div>Entered email or password is wrong!</div>";
        }
    } else {
        echo "<div>Some fields are empty but All fields are required!</div>";
    }
    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Log In</title>
</head>

<body>

    <nav class="header">
        <div>
            <img src="./logo.jpg" alt="logo" class="logo">
        </div>
        <div class="login-link">
            <a href="./register.php">Register</a>
        </div>
    </nav>

    <div class="main">
        <div class="login">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <h1 style="text-align: center;">Login</h1>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" autocomplete="off">
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off">
                </div>
                <div class="input">
                    <input type="submit" value="Login" name="submit">
                </div>

            </form>
        </div>
    </div>
</body>

</html>