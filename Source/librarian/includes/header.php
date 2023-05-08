<?php
    include 'includes/connection.php';
    $not=0;
    $res = mysqli_query($link, "SELECT * FROM user WHERE roles='Admin'");
    if ($res) {
        $not = mysqli_num_rows($res);
    } else {
        echo "Error: " . mysqli_error($link);
    }
?>
 <link rel="shortcut icon" href="includes/images/libraryhub.png" type="image/x-icon">
<link rel="stylesheet" href="includes/css/sidebar.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

</style>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar open">
    <div class="logo-details">
    <i class="fas fa-book"></i>
      <span class="logo_name">OSDOCOLS</span>
    </div>
    <div class="profile">
					<div class="profile-pic ">
              <?php
                  $res = mysqli_query($link, "select * from user where user_id='".$_SESSION['user_id']."'");
                  while ($row = mysqli_fetch_array($res)){
                      ?><img src="<?php echo $row["photo"]; ?> " height="" width="" alt="something wrong" class="rounded-circle"></a> <?php
                  }
              ?>
					</div>
						<div class="profile-info text-center">
							<span>Welcome!</span>
							<h2>
						<?php 
							$res = mysqli_query($link, "SELECT * FROM user WHERE user_id='".$_SESSION['user_id']."'");
							while ($row = mysqli_fetch_array($res)){
							$name  =  $row["first_name"];
							echo $name;
							}
						?>
            </h2>
					</div>
				</div>
    <ul class="nav-links">
      <li>
        <a href="admin_dashboard.php">
          <i class='bx bx-tachometer' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="admin_dashboard.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <a href="profile.php">
          <i class='bx bx-user-circle' ></i>
          <span class="link_name <?php if($page=='profile'){ echo 'active';} ?>">Profile</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name <?php if($page=='profile'){ echo 'active';} ?>" href="profile.php">Profile</a></li>
        </ul>
      </li>
      <li>
        <a href="admin_book_management.php">
          <i class='bx bx-book-open' ></i>
          <span class="link_name <?php if($page=='bookin'){ echo 'active';} ?>">Book Inventory</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name <?php if($page=='bookin'){ echo 'active';} ?>" href="admin_book_management.php">Book Inventory</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-user-plus' ></i>
            <span class="link_name">Accounts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Accounts</a></li>
          <li><a href="#">Add Accounts</a></li>
          <li><a href="#">List of All Accounts</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-notepad' ></i>
            <span class="link_name">Reports</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Reports</a></li>
          <li><a href="#">List of Reports</a></li>
          <li><a href="#">List of All Reports</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-bell' ></i>
          <span class="link_name">Notification</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Notification</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-chat' ></i>
          <span class="link_name">Message</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Message</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
        <a href="logout.php">
          <i class='bx bx-log-out' ></i>
          <span class="link_name">Log out</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="logout.php">Log out</a></li>
        </ul>
      </li>
      <li>
  </li>
</ul>
  </div>
  <header class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <div class="header-profile">
            <ul>  
                <!-- <li class="icon">
                  <a href="notifadmin.php" ><i class="notif bx bx-bell"></i></a>
                  <span class="count" onclick="window.location='notifadmin.php'"><b><?php echo $not; ?></b></span>
                </li> -->
              <li class="dropdown">
                        <?php
                          $res = mysqli_query($link, "select photo from user where user_id='".$_SESSION['user_id']."'");
                          if ($row = mysqli_fetch_array($res)) {
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <img src="<?php echo $row['photo']; ?>" alt="User Photo">
                          <span>Admin</span>
                        </a>
                        <?php
                          }
                        ?>
                  <ul class="dropdown-menu">
                      <li class="user-header text-center">
                        <?php
                          $stmt = mysqli_prepare($link, "SELECT photo FROM user WHERE user_id = ?");
                          mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_id']);
                
                              if (mysqli_stmt_execute($stmt)) {
        
                              mysqli_stmt_bind_result($stmt, $photo);
    
                              if (mysqli_stmt_fetch($stmt)) {
                                echo '<img src="' . $photo . '" alt="">';
                              }
                              } else {
                              echo 'Error: ' . mysqli_error($link);
                              }
                          mysqli_stmt_close($stmt);
                          echo '<p>' . $_SESSION["user_id"] . '</p>';
                        ?>
                      </li>
                        <li class="user-footer">
                         <button class="btnlog">Log Out</button>
                        </li>														
                  </ul>
              </li>
            </ul>
    </div>
  </header>
  <script>
		let arrow = document.querySelectorAll(".arrow");
		for (var i = 0; i < arrow.length; i++) {
			arrow[i].addEventListener("click", (e)=>{
		let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
		arrowParent.classList.toggle("showMenu");
			});
		}
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".bx-menu");
		console.log(sidebarBtn);
		sidebarBtn.addEventListener("click", ()=>{
			sidebar.classList.toggle("close");
		});
  </script>
  
</body>
</html>