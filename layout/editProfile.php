<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialGram · Edit Profile</title>
    <link rel="stylesheet" href="../CSS/theme.css" />
    <link rel = "stylesheet" href = "../CSS/EditProfile.css">
</head>
<body>
    <?php
        session_start();
        $id = $_SESSION['user_id'];
    ?>
    <form method = "post" enctype="multipart/form-data" action="../layout/profile.php">
        Display Name 
        <input type = "text" name = "displayname" required>
        Username
        <input type = "text" name = "username" required>
        Bio Profile
        <input type = "text" name = "bio-profile" alt = "No bio yet.">
        Banner
        <input type = "file" name = "banner">
        Profile picture
        <input type = "file" name = "profilePic">
        <a href = "../Sign_in/Login/newpassword.php">Change password</a>
        <input type = "submit" name = "Save">
    </form>
</body>
</html>
