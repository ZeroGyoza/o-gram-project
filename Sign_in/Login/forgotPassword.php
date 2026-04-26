<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialGram · Reset Password</title>
    <link rel="stylesheet" href="../../CSS/theme.css">
    <link rel="stylesheet" href="../../CSS/passwordReset.css">
</head>

<body>

    <form method="post">
        <h1 class="sg-title">Reset Password</h1>

        <label class="sg-label" for="username">Username</label>
        <input id="username" type="text" name="username" required placeholder="Input your username...">

        <label class="sg-label" for="email">Email</label>
        <input id="email" type="email" name="email" required placeholder="Input your email...">

        <input type="submit" name="upload" value="Continue">
        <div id="response"></div>
        <a href="login.php">Back to Login</a>
    </form>
</body>

<?php
    if (isset($_POST['upload'])) {
        include('../../Connection/Connection.php');
    
        $username = $_POST['username'];
        $email = $_POST['email'];
    
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
    
            if ($row = mysqli_fetch_array($result)) {
                if ($row['username'] === $username && $row['email'] === $email) {
                    $location = "Location: newpassword.php?id=" . $row['id'];
                    header($location);
                    exit();
                } else {
                    echo "<script>document.getElementById('response').innerText = 'Data tidak valid';</script>";
                }
            } else {
                echo "<script>document.getElementById('response').innerText = 'Username tidak ditemukan';</script>";
            }
        
    
    }
?>

</html>