<?php
include("../Connection/Connection.php");
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
$footerColor = "#888888";

if ($bgcol == 1) {
  $backgroundColor = "#2b5876";
  $footerColor = "#ffffff";
} else if ($bgcol == 2) {
  $backgroundColor = "#ffffff";
  $footerColor = "#888888";
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
  <link rel="stylesheet" href="../CSS/rightbar.css" />
  <link rel="stylesheet" href="../CSS/reccomended.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="../CSS/midPost.css" />
  <link rel="stylesheet" href="../CSS/Posting.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../JS/ajaxlivesearch.js"></script>
  <style>
    :root {
      --background:
        <?php echo $backgroundColor; ?>
      ;
      --footer-text:
        <?php echo $footerColor; ?>
      ;
    }

    .footspan {
      color: var(--footer-text);
      transition: color 0.3s ease;
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

    <div class="sidebarOption active">
      <a class="nav-link">
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

  <div class="posts">
    <?php
    include('../Connection/Connection.php');

    // Get only bookmarked posts for the current user
    $query = "
    SELECT post.*, user.username, user.nickname, user.profilepic
    FROM bookmark
    JOIN post ON bookmark.post_id = post.post_id
    JOIN user ON post.user_id = user.id
    WHERE bookmark.user_id = '$id'
";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='posting_card'>";
      echo "  <div class='user-header'>";
      echo "    <div class='user-left'>";
      echo "      <img src='pfp/" . $row['profilepic'] . "' alt='Foto Profil'>";
      echo "      <div class='user-info'>";
      echo "        <p class='display-name'>" . $row['nickname'] . "</p>";
      echo "        <p class='username'>@" . $row['username'] . "</p>";
      echo "      </div>";
      echo "    </div>";
      echo "    <label class='follow-toggle'>";
      echo "      <input type='checkbox' hidden />";
      echo "      <span class='follow-btn'>Follow</span>";
      echo "    </label>";
      echo "  </div>";
      echo "  <img src='../Posting/" . $row['gambar'] . "' class='post-image'>";
      echo "  <span>" . $row['caption'] . "</span><br>";
      echo "  <div class='button_action'>";

      echo "    <label class='icon-toggle'>";
      echo "      <input type='checkbox' class='temporary' name='likes' hidden data-id='" . $row["post_id"] . "'>";
      echo "      <span class='fa-regular fa-heart'></span>";
      echo "      <span>" . $row["likes"] . "</span>";
      echo "    </label>";

      echo "    <label class='icon-toggle'>";
      echo "      <input type='checkbox' hidden>";
      echo "      <span class='fa-regular fa-comment'></span>";
      echo "      <span>" . $row["comment"] . "</span>";
      echo "    </label>";

      echo "    <label class='icon-toggle'>";
      echo "      <input type='checkbox' class='bookmark' hidden data-id='" . $row["post_id"] . "'>";
      echo "      <span class='fa-regular fa-bookmark'></span>";
      echo "      <span>" . $row["bookmarked"] . "</span>";
      echo "    </label>";

      echo "    <label class='icon-toggle'>";
      echo "      <input type='checkbox' hidden>";
      echo "      <span class='fa-solid fa-retweet'></span>";
      echo "    </label>";

      echo "  </div>";
      echo "</div>";
    }
    ?>
    <!--likes-->
    <script>
      $(document).ready(function () {
        $(".temporary").change(function () {
          let postId = $(this).data("id");
          let $countSpan = $(this).siblings("span").last();

          $.post("likes.php", { id: postId }, function (response) {
            $countSpan.text(response);
          });
        });
      });
    </script>
    <!--bookmark-->
    <script>
      $(document).ready(function () {
        $(".bookmark").change(function () {
          let postId = $(this).data("id");
          let $countSpan = $(this).siblings("span").last();
          $.post("bookmarking.php", { postid: postId }, function (response) {
            $countSpan.text(response);
          });
        });
      });
    </script>
  </div>

  <div class="rightbar">
    <!--search&follow-->
    <div id="user-data" data-user-id="<?= htmlspecialchars($id) ?>"></div>
    <form class="searchcontainer" action="#">
      <div class="search">
        <span class="material-icons"> search </span>
        <input class="search-input" id="searchin" type="search" name="search" placeholder="search">
      </div>
    </form>

    <div id="searchHint">

    </div>

    <div class="reccomended">
      <?php
      $query = "SELECT * FROM user ORDER BY RAND() LIMIT 3";
      $result = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_array($result)) {
        $followButton = "follow" . $row['id'];
        $tempid = $row["id"];
        echo "<a href='../layout/searchprofile.php?tempid=$tempid'>";
        echo "<div class='user-suggestion'>";
        echo "   <img src = 'pfp/" . $row['profilepic'] . "' alt='Profile 1' class = 'profile-img'>";
        echo "    <div class='user-info'>";
        echo "          <p class='display-name'>" . $row['nickname'] . "</p>";
        echo "          <p class='username'>" . $row['username'] . "</p>";
        echo "    </div>";
        echo "    <input type='checkbox' id='" . $followButton . "' class='follow-toggle hidden'>";
        echo "    <label for='" . $followButton . "' class='follow-btn' data-text='Follow' data-text-checked='Unfollow'></label>";
        echo "</div>";
        echo "</a>";
      }

      ?>
    </div>
    <hr>
    <div class="footer">
      <span class="footspan"> &copy; socialgram 2026</span>
    </div>
  </div>
</body>

</html>