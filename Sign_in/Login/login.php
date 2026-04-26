<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/theme.css">
    <link rel="stylesheet" href="../../CSS/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SocialGram · Login</title>
</head>

<body>

    <div class="wrapper">
        <form method="post" id="loginForm">
            <h1>Login</h1>
            <div class="inputbox">
                <input type="text" name="username" required id="username">
                <label for="username">Username</label>
                <i class='bx bxs-user'></i>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required>
                <label for="password">Password</label>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="forget-remember">
                <label><input type="checkbox" name="remember">Remember Me</label>
                <a href="forgotPassword.php">Forgot Password?</a>
            </div>

            <button class="btn" name="input" value="Submit">Login</button>

            <div class="register-link">
                <p>Don't Have Account? <a href="../Register/register.php">Register</a></p>
            </div>
        </form>
        <div id="response"></div>
    </div>



    <?php
    session_start();
    include('../../Connection/Connection.php');

    

    if (isset($_COOKIE['user_id'])) {
        header("Location: ../../layout/home.php");
        exit();
    }

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        
        if ($row = mysqli_fetch_array($result)) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            if (isset($_POST['remember'])) {
                // Buat cookie yang tahan 30 hari
                setcookie('user_id', $row['id'], time() + (86400 * 30), "/"); //1 hari
                setcookie('username', $row['username'], time() + (86400 * 30), "/");
            }
            if ($row['password'] === $password && $row['role'] === "admin") {
                $location = "Location: ../Admin/adminInterface.php";
                header($location);
                exit();
            } else if ($row['status'] === "block") {

                $query = "SELECT * FROM blocked_acc WHERE user_id = '" . $row['id'] . "'";
                $result = mysqli_query($connection, $query);
                if ($line = mysqli_fetch_array($result)) {
                    $reason = $line['reason'];
                    echo "<script>document.getElementById('response').innerText = 'Your Account Has Been Blocked: $reason';</script>";
                    
                }

            } else if ($row['password'] === $password) {
                $location = "Location: ../../layout/home.php";
                header($location);
                exit();
            }
            else {
                echo "<script>document.getElementById('response').innerText = 'Password Salah';</script>";
            }
        } else {
            echo "<script>document.getElementById('response').innerText = 'Username tidak ditemukan';</script>";
        }
    }

    ?>
</body>

</html>