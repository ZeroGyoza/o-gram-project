<?php
session_start();
$id = $_SESSION['user_id'];
$temp = $_SESSION['user_id'];
?>
<!--bgcheck-->
<?php
include('../Connection/Connection.php');

$query = mysqli_query($connection, "SELECT bgcol FROM user WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);
$bgcol = $row["bgcol"];

$backgroundColor = "#ffffff";
if ($bgcol == 1) {
  $backgroundColor = "#2b5876";
} else if ($bgcol == 2) {
  $backgroundColor = "#ffffff";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SocialGram</title>
  <link rel="stylesheet" href="../CSS/theme.css" />
  <link rel="stylesheet" href="../CSS/sidebar.css" />
  <link rel="stylesheet" href="../CSS/settings.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/midPost.css" />

  <style>
    :root {
      --background:
        <?php echo $backgroundColor; ?>
      ;
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <a href="../layout/home.php" class="svghover">
      <svg class="icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" stroke="#50b7f5"
        stroke-width="1">
        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
      </svg>
    </a>
    <div class="sidebarOption">
      <a href="../layout/home.php" class="nav-link">
        <span class="material-icons"> home </span>
        <h2>Home</h2>
      </a>
    </div>

    <div class="sidebarOption">
      <a href="../layout/search.php" class="nav-link">
        <span class="material-icons"> search </span>
        <h2>Explore</h2>
      </a>
    </div>

    <div class="sidebarOption">
      <a href="../layout/bookmark.php" class="nav-link">
        <span class="material-icons"> bookmark </span>
        <h2>Bookmarks</h2>
      </a>
    </div>

    <div class="sidebarOption">
      <a href="../layout/profile.php" class="nav-link">
        <span class="material-icons"> perm_identity </span>
        <h2>Profile</h2>
      </a>
    </div>

    <div class="sidebarOption active">
      <a class="nav-link">
        <span class="material-icons"> settings </span>
        <h2>Settings</h2>
      </a>
    </div>
  </div>

  <script>
    function changebackground(colorChoice) {
      var xmlhttp;
      let id = <?php echo json_encode($id) ?>;
      if (window.XMLHttpRequest != null) {
        xmlhttp = new XMLHttpRequest();
      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.documentElement.style.setProperty("--background", xmlhttp.responseText);
        }
      }
      xmlhttp.open("GET", "changeColor.php?colorChoice=" + colorChoice + "&id=" + id, true);
      xmlhttp.send();
    }
    //   function changebackground(themeId){
    //   if (themeId === 1) {
    //     document.body.style.background = 'linear-gradient(to right, #2b5876, #4e4376)';
    //   } else if (themeId === 2) {
    //     document.body.style.background = '#ffffff';
    //   } else if (themeId === 3) {
    //     document.body.style.background = '#1a1a1a';
    //   }
    // }
  </script>
  <div class="posts">
    <div class="settings">
      <div class="button-row">
        <span class="material-icons orb ">dark_mode</span>
        <button class="updatedata backgroundoption" onclick="changebackground(1)">Dark Theme</button>
      </div>
      <div class="button-row">
        <span class="material-icons orb ">light_mode</span>
        <button class="updatedata backgroundoption" onclick="changebackground(2)">Light Theme</button>
      </div>
      <div class="button-row">
        <span class="material-icons orb ">logout</span>
        <button class="updatedata backgroundoption" onclick="window.location.href='out.php'">Log Out</button>
      </div>

    </div>
  </div>
</body>

</html>