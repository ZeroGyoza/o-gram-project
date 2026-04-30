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
      --background: <?php echo $backgroundColor; ?>;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <div class="sidebar">
    <a href="../layout/home.php?id=" class="svghover">
      <svg class="icon" fill="currentColor" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 264.564 264.564" xml:space="preserve" stroke="#50b7f5">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <g>
            <g>
              <path
                d="M132.281,264.564c51.24,0,92.931-41.681,92.931-92.918c0-50.18-87.094-164.069-90.803-168.891L132.281,0l-2.128,2.773 c-3.704,4.813-90.802,118.71-90.802,168.882C39.352,222.883,81.042,264.564,132.281,264.564z">
              </path>
            </g>
          </g>
        </g>
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
    $tempid = $_GET["tempid"];
    $query = "SELECT * FROM user WHERE id = '$tempid'";
    $result = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_array($result)) {

  echo "<div class='profile-page'>";
    echo "<div class='profile-background2'>";
      echo "<div class='profile-banner2'></div>";
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
    if (mysqli_num_rows($result2) > 0) {
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
                  </label>
                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <span class="fa-regular fa-bookmark"></span>
                  </label>
                  <label class="icon-toggle">
                    <input type="checkbox" hidden>
                    <span class="fa-solid fa-retweet"></span>
                  </label>
                </div>
              </div>';
      }
    } else {
      echo "<div class='posting_card'><p class='no-posts'>No posts yet.</p></div>";
    }
  }
  ?>
</body>

</html>