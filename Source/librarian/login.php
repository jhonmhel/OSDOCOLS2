<?php 
    session_start();
    include 'includes/connection.php';
 ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="includes/images/libraryhub.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/main.css">
    <title>OSDOCOLS</title>

  </head>
  <body>
    <header>
      <div id="brand"><a href="/">OSDOCOLS</a></div>
      <nav>
        <ul>
        <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li id="signup"><a href="search_catalog.php">Search</a></li>
    
        </ul>
      </nav>
      <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li id="signup"><a href="search_catalog.php">Search</a></li> 
        </ul>
      </div>
    </header>
    <div>
    <div class="login-form">
            <form class="form col-12 p-2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validate()">
                <h2>Log In</h2>
                <div id="alert-box" class="alert-box bx bx-bug"></div>
                <input type="text" class=""id="username" name="user_id" placeholder="User ID" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="submit" class="loginbot" value="LOG IN AN ACCOUNT" name="login">
            </form>
        </div>
    <?php 
        if (isset($_POST["login"])) {
            $count = 0;
            $user_id = mysqli_real_escape_string($link, $_POST["user_id"]);
            $password = mysqli_real_escape_string($link, $_POST["password"]);
            $res = mysqli_query($link, "SELECT * FROM user WHERE user_id='$user_id' AND passwords='$password'");
            $count = mysqli_num_rows($res);
            if ($count == 0) {
                // display an error message
                echo "<script>document.getElementById('alert-box').innerHTML = 'Invalid username or password'; document.getElementById('alert-box').classList.add('show');</script>";
            } else {
                $user = mysqli_fetch_assoc($res);
                if ($user["statuss"] == "INACTIVE") {
                    // display a message saying that the user is inactive
                    echo "<script>document.getElementById('alert-box').innerHTML = 'Sorry, your account is currently inactive'; document.getElementById('alert-box').classList.add('show');</script>";
                } else {
                    $_SESSION["user_id"] = $user["user_id"];
                    if ($user["roles"] == "Admin") {
                        header("Location: admin_dashboard.php");
                        exit();
                    } else if ($user["roles"] == "School Librarian") {
                        header("Location: user/school_librarian/dashboard.php");
                        exit();
                    }
                }
            }
        }
    ?>

    <script >
        function toggleMobileMenu(menu) {
            menu.classList.toggle('open');
        }
        function validate() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var alertBox = document.getElementById("alert-box");
        if (username.trim() === "" || password.trim() === "") {
            alertBox.innerHTML = "Please enter your User ID and Password.";
            alertBox.classList.add("show");
            return false;
        }
        return true;
    }
    </script>
  </body>
</html>
