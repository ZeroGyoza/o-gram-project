<?php
session_start();
$id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/theme.css" />
    <link rel="stylesheet" href="../CSS/postingform.css">
    <title>SocialGram · New Post</title>
</head>
<body>
    <form method = "post" enctype="multipart/form-data" action="../layout/home.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        Caption 
        <input type = "text" name = "caption">
        Posting
        <input type = "file" name = "postPhoto" required>
        <input type = "submit" name = "upload">

    </form>

    
</body>
</html>