<?php
session_start();
$id = $_SESSION['user_id'];
$temp = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<!--bgcheck-->
<?php
include('../Connection/Connection.php');

$query = mysqli_query($connection, "SELECT bgcol FROM user WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);
$bgcol = $row['bgcol'];

$backgroundColor = "#ffffff";
$primaryText = "#000000";
$secondaryText = "#65676b";

if ($bgcol == 1) {
  $backgroundColor = "#2b5876";
  $primaryText = "#ffffff";
  $secondaryText = "#d1d1d1";
} else if ($bgcol == 2) {
  $backgroundColor = "#ffffff";
}
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SocialGram</title>
  <link rel="stylesheet" href="../CSS/theme.css" />
  <link rel="stylesheet" href="../CSS/sidebar.css" />
  <link rel="stylesheet" href="../CSS/rightbar.css" />
  <link rel="stylesheet" href="../CSS/search.css" />
  <link rel="stylesheet" href="../CSS/Posting.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="../CSS/midPost.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!--googlejquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../JS/ajaxlivesearchpage.js"></script>
  <style>
    :root {
      --background:
        <?php echo $backgroundColor; ?>
      ;
      --primary-text:
        <?php echo $primaryText; ?>
      ;
      --secondary-text:
        <?php echo $secondaryText; ?>
      ;
    }

    body {
      background-color: var(--background);
    }

    .display-name {
      color: var(--primary-text);
      font-weight: bold;
    }

    .username {
      color: var(--secondary-text);
    }

    .footspan {
      color: var(--secondary-text);
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

    <div class="sidebarOption active">
      <a class="nav-link">
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

    <div class="sidebarOption">
      <a href="../layout/settings.php" class="nav-link">
        <span class="material-icons"> settings </span>
        <h2>Settings</h2>
      </a>
    </div>
  </div>

  <!-- posting -->

  <div class="posts">

    <form class="searchcontainer" action="">
      <a href="../Posting/PostingForm.php" class="createpost search" style="color: white;">Create Post</a>
      <div class="search">
        <span class="material-icons"> search </span>
        <input class="search-input long" id="searchin" type="search" placeholder="search">
      </div>
    </form>
    <div id="searchHint">
      <?php
      $query = "SELECT * FROM user ORDER BY RAND() LIMIT 5";
      $result = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_array($result)) {
        $followButton = "follow" . $row['id'];
        echo "<div class='user-suggestion'>";
        echo "   <img src = 'pfp/" . $row['profilepic'] . "' alt='Profile 1' class = 'profile-img'>";
        echo "    <div class='user-info'>";
        echo "          <p class='display-name'>" . $row['nickname'] . "</p>";
        echo "          <p class='username'>" . $row['username'] . "</p>";
        echo "    </div>";
        echo "    <input type='checkbox' id='" . $followButton . "' class='follow-toggle hidden'>";
        echo "    <label for='" . $followButton . "' class='follow-btn' data-text='Follow' data-text-checked='Unfollow'></label>";
        echo "</div>";
      }
      ?>
    </div>
  </div>

  <div class="rightbar">
    <hr class="headersearch">
    <div class="footersearch">

      <span class="footspan"> &copy; socialgram 2026</span>
    </div>
  </div>

</body>

</html>