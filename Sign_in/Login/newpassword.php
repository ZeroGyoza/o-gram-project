<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
} else {
    $id = $_GET['id'];
}


if (isset($_POST['upload'])) {
    include('../../Connection/Connection.php');
    $confirm = $_POST['confirm'];
    $query = "SELECT * FROM user ";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_array($result)) {
        $changeQuery = "UPDATE user SET password = '$confirm' WHERE id = '$id' ";
        $result = mysqli_query($connection, $changeQuery);
    }

    $location = "Location: login.php";
    header($location);
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialGram · New Password</title>
    <link rel="stylesheet" href="../../CSS/theme.css">
    <link rel="stylesheet" href="../../CSS/passwordReset.css">
</head>

<body>

    <form method="post">
        <h1 class="sg-title">New Password</h1>

        <label class="sg-label" for="password">Password</label>
        <input id="password" type="password" name="password" required placeholder="Input your password...">

        <label class="sg-label" for="confirm">Confirm Password</label>
        <input id="confirm" type="password" name="confirm" required placeholder="Confirm your password...">

        <input type="submit" name="upload" onclick="Click()" value="Save">
        <div id="response"></div>
    </form>

    <script>
        function Click() {
            alert("Change Password Berhasil")
        }
    </script>
</body>


</html>