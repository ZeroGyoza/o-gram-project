<!DOCTYPE html>
<html lang="en">
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
$bgcol = $row['bgcol'];

$backgroundColor = "#ffffff";
if ($bgcol == 1) {
  $backgroundColor = "#2b5876";
} else if ($bgcol == 2) {
  $backgroundColor = "#ffffff";
}
?>

<?php

include('../Connection/Connection.php');

if (isset($_POST['Save'])) {
  $displayName = $_POST['displayname'];
  $userName = $_POST['username'];
  $BioProfile = $_POST['bio-profile'];
  $banner = $_FILES['banner']['name'];
  $tempBanner = $_FILES['banner']['tmp_name'];
  $profilePicture = $_FILES['profilePic']['name'];
  $temporary = $_FILES['profilePic']['tmp_name'];

  move_uploaded_file($tempBanner, "../layout/banner/" . $banner);
  move_uploaded_file($temporary, "../layout/pfp/" . $profilePicture);

  $filepath = $profilePicture;
  $filepath2 = $banner;

  $update = "UPDATE user SET 
            username = '$userName', 
            nickname = '$displayName', 
            bio = '$BioProfile',
            bannerpic = '$filepath2',
            profilepic = '$filepath' WHERE id = '$id'";

  if (mysqli_query($connection, $update)) {

  }
}


?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SocialGram · Profile</title>
  <link rel="stylesheet" href="../CSS/theme.css" />
  <link rel="stylesheet" href="../CSS/profile.css" />
  <link rel="stylesheet" href="../CSS/sidebar.css" />
  <link rel="stylesheet" href="../CSS/rightbar.css" />
  <link rel="stylesheet" href="../CSS/search.css" />
  <link rel="stylesheet" href="../CSS/midPost.css" />
  <link rel="stylesheet" href="../CSS/Posting.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <style>
    :root {
      --background:
        <?php echo $backgroundColor; ?>
      ;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

    <div class="sidebarOption ">
      <a href="../layout/bookmark.php" class="nav-link">
        <span class="material-icons"> bookmark </span>
        <h2>Bookmarks</h2>
      </a>
    </div>

    <div class="sidebarOption active">
      <a class="nav-link">
        <span class="material-icons"> perm_identity </span>
        <h2>Profile</h2>
      </a>
    </div>

    <div class="sidebarOption">
      <a href="../layout/settings.php" class="nav-link">
        <span class="material-icons"> settings </span>
        <h2>Settings</h2>
      </a>
    </div>
  </div>

  <?php
  include("../Connection/Connection.php");
  $query = "SELECT * FROM user WHERE id = '$id'";
  $result = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_array($result)) {
    echo "<div class='profile-page'>";
    echo "<div class='profile-background2'>";
    echo "<div class='profile-banner2'><img src = 'banner/" . $row['bannerpic'] . "'>";
    echo "<a href='editProfile.php' class = 'edit-toggle2'>Edit Profile</a>";

    echo "<div class='user-header2'>";
    echo "<div class='user-left2'>";
    echo "<img src='pfp/" . $row['profilepic'] . "' alt='Foto Profile'>";
    echo "</div>";
    echo "<div class='user-info2'>";
    echo "<p class='display-name2'>" . $row['nickname'] . "</p>";
    echo "<p class='username2'>@" . $row['username'] . "</p>";
    echo "<p class = 'bio-profile'>" . $row['bio'] . "</p>";
    echo "<p class='joined-date2'>Joined " . date('F Y', strtotime($row['created_at'])) . "</p>";
    echo "</div>";

    echo "</div>";
    echo "</div>";

    $id2 = $row['id'];
    $query2 = "SELECT * FROM post WHERE user_id = '$id2'";
    $result2 = mysqli_query($connection, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {
      echo "<div class='posting_card'>";
      echo "  <div class='user-header'>";
      echo "    <div class='user-left'>";
      echo "      <img src = 'pfp/" . $row['profilepic'] . "' alt='Foto Profil'>";
      echo "        <div class='user-info'>";
      echo "          <p class='display-name'>" . $row['nickname'] . "</p>";
      echo "          <p class='username'>" . $row['username'] . "</p>";
      echo "      </div>";
      echo "    </div>";
      echo "   </div>";
      echo "  <img src = '../Posting/" . $row2['gambar'] . "' class='post-image'>";

      echo '<span>' . $row2['caption'] . '</span><br>
                <div class="button_action">
                
                  <label class="icon-toggle">
                    <input type="checkbox" name="likes" hidden>
                    <span class="fa-regular fa-heart"></span>
                    <span>' . $row2['likes'] . '</span>
                  </label>
  
                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <span class="fa-regular fa-comment"></span>
                     <span>' . $row2['comment'] . '</span>
                  </label>
                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <span class="fa-regular fa-bookmark"></span>
                     <span>' . $row2['bookmarked'] . '</span>
                  </label>
                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <span class="fa-solid fa-retweet"></span>
                  </label>
                </div>
              </div>';
    }
  }
  ?>
</body>

</html>