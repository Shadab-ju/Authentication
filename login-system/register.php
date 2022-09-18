<?php
if (isset($_POST['submit'])) {
    include_once "./connection.php";
    $isValidate = !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['confirm_password']);
    if ($isValidate) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if ($password === $confirm_password) {
            $password = md5($password);
            $check = mysqli_query($con, "select `email` from `users` where `email`='$email'");
            if (mysqli_num_rows($check) > 0) {
                echo "<div>email already exist</div>";
            } else {
                $query = "insert into users(`name`,`email`,`phone`,`password`) value('$name','$email','$phone','$password')";
                $res = mysqli_query($con, $query);
                if ($res) {
                    echo "User has been registered";
                } else {
                    echo "error";
                }
            }
        } else {
            echo "<div>Password does not match.</div>";
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
    <title>Register</title>
    <link rel="stylesheet" href="./css/register.css">
</head>



<body>
    <nav class="header">
        <div>
            <img src="./logo.jpg" alt="logo" class="logo">
        </div>
        <div class="login-link">
            <a href="./login.php">Login</a>
        </div>
    </nav>
    <div class="main">
        <div class="register">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <h1 style="text-align: center;">Register</h1>
                <div class="input">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" autocomplete="off">
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" autocomplete="off">
                </div>
                <div class="input">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" autocomplete="off">
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off">
                </div>
                <div class="input">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm_password" autocomplete="off">
                </div>
                <div class="input">
                    <input type="submit" value="Register" name="submit">
                </div>

            </form>
        </div>
    </div>

</body>

</html>