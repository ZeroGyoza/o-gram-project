<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/theme.css">
    <link rel="stylesheet" href="../../CSS/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>SocialGram · Register</title>
</head>
<div class="wrapper">

    <!-- Wrapper Bio -->
    <div class="welcomeBack" id="wrap">
        <div class="in">
            <span class="bio">Be Your Own Voice</span><br>
            <span class="welcome">Say what's on your mind, in seconds.
                No filters. No limits. Just real-time expression.</span><br>
            <button class="btn" value="Submit" onclick="window.location.href='../Login/login.php'">Login</button>
        </div>
    </div>

    <!-- Wrapper Create -->
    <div class="create" id="wrap">

        <!-- Login with another -->
        <div class="createAccount">
            <span>Create Account</span>
            <div class="wrapIcon">
                <div class="icon">
                    <img src="../../Picture/ggl.jpg" class="google">
                </div>
                <div class="icon">
                    <img src="../../Picture/linkedin2.jpg" class="linkedln">
                </div>
            </div>
            <p>Or Use Your Email For Registration</p>
        </div>

        <!-- Form -->
        <div class="form">
            <form action="additional.php" method="get">
                <div class="inputbox">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="user" required placeholder="Create your username...">
                    <i class='bx bxs-user' id="user"></i>
                </div>
                <div class="inputbox">
                    <label for="password">Email</label>
                    <input type="email" name="email" required placeholder="Fill your email...">
                    <i class='bx  bx-envelope-open' id="email"></i>
                </div>
                <div class="inputbox">
                    <label for="password">Password</label>
                    <input type="text" name="password" required placeholder="Create your username...">
                    <i class='bx bxs-lock' id="pw"></i>
                </div>

                <button class="btn" name="button" value="Submit">Sign Up</button>
            </form>
        </div>
    </div>
</div>

<script>
    function focusInput() {
        document.getElementsByClassName("user")[0].focus();
    }
</script>
</body>

</html>