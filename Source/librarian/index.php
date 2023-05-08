<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="includes/images/libraryhub.png" type="image/x-icon">
    <link rel="stylesheet" href="includes/css/main.css">
    <title>OSDOCOLS</title>
    <!-- <style>

    </style> -->
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
    <div class=" space">
        <div class= "title">
            <h1>One School Division Office <br>of Calapan Online Library System</h1>
            <button class="logbot"onclick="window.location.href = 'login.php';">Log in</button>
        </div>
            <!-- <div class="homelogo">
                <img src="includes/images/homepic.png " alt="Login Illustration">
            </div> -->
    </div>
    <script >
        function toggleMobileMenu(menu) {
            menu.classList.toggle('open');
        }
    </script>
  </body>
</html>
