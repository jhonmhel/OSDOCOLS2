<?php
    include 'inc/connection.php';
    $not=0;
    $res = mysqli_query($link, "SELECT * FROM user WHERE roles='School Librarian'");
    if ($res) {
        $not = mysqli_num_rows($res);
    } else {
        echo "Error: " . mysqli_error($link);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>School Librarian</title>
	<link rel="shortcut icon" href="../../inc/images/libraryhub.png" type="image/x-icon">
	<link rel="stylesheet" href="inc/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="inc/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="inc/css/datatables.min.css">
	<link rel="stylesheet" href="inc/css/pro1.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.2/css/perfect-scrollbar.min.css" integrity="sha512-FzXksK/K5B5C5jj5/O5tnpPLCthPJ5arwZ2Jx4gb4e4Xul5zGg+AV5CJzS/j5tn8IPZ+LghZn1nHxhUDRJ+QaQ==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.2/perfect-scrollbar.min.js" integrity="sha512-iBUCGcyD7VZrzGdLpv7V27nkFTCGJ9tVzNtOugO7VrYZMQAT+0q3m6UfQ6UQJ6U1Y6z1X9gWmRVGpH0jJ5c5Pw==" crossorigin="anonymous"></script> -->

</head>
<style>
		body::-webkit-scrollbar {
		width: 0;
		}
</style>
<body>
	<div class="main-content "style=" height:100%">
		<div class="wrapper ">
			<div class="left-sidebar "style="width:285px; background-color: #1F8A70; height:100%; position:fixed; overflow-x: hidden;">
				<div class="p-title"style="background-color: #1F8A70">
                    <h3><a href="dashboard.php"><i class="fas fa-book"></i><span >OSDOCOLS</span></a></h3>
				</div>
				<div class="gap-40"></div>
				<div class="profile">
					<div class="profile-pic">
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
                  $name  =  $row["school_name"];
                  echo $name;
                }
                
              ?>
              
            </h2>
					</div>
				</div>
				<div class="gap-30"></div>
				<div class="sidebar-menu"style="padding-top:90px;">
					<h3>General</h3>
					<div class="border"></div>
	                <ul>
	                    <li class="menu <?php if($page=='home'){ echo 'active';} ?>">
      						<a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
    					</li>
    					
    					  <li class="menu <?php if($page=='profile'){ echo 'active';} ?>">
      						<a href="profile.php"><i class="fas fa-id-card"></i>Manage Profile</a>
    					</li>
	                    <li class="menu <?php if($page=='catalogue'){ echo 'active';} ?>">
      						<a href="catalogue_SL.php"><i class="fas fa-book"></i>Catalogue</a>
    					</li>
    					<li class="menu <?php if($page=='aqui'){ echo 'active';} ?>">
      						<a href="aquisition_SL.php"><i class="fas fa-upload"></i>Acquisition</a>
    					</li>
						<li class="menu <?php if($page=='manage_book'){ echo 'active';} ?>">
      						<a href="manage_books_SL.php"><i class="fas fa-list"></i>  Manage Books</a>
    					</li>
						<li class="menu <?php if($page=='att'){ echo 'active';} ?>">
      						<a href="attendance_SL.php"><i class="fas fa-address-book"></i>Attendance</a>
    					</li>
						<li class="menu menu-toggle1">
      						<a href="#"><i class="fas fa-list-alt"></i>Reports<span class="fa fa-chevron-down"></span></a>
      						<ul class="menus1">
									<li><a href="">List of most borrowed books</a></li>
									<li><a href="">List of lost books</a></li>
									<li><a href="">List of damage books</a></li>
									<li><a href="">List of weeded books</a></li>
									<li><a href="">List of discarded books</a></li>
      						</ul>
    					</li>
						<li class="menu <?php if($page=='stl'){ echo 'active';} ?>">
      						<a href="send-to-librarian.php"><i class="fas fa-file"></i>Send a message</a>
    					</li>
    				
				</div>
			</div>
			<div class="content">
				<div class="inner"style="background-color: #1F8A70; margin-left: -5px; position:fixed; z-index: 1">
					<div class="heading text-center">
					
					</div>
					<div class="header-profile text-right"style="position:fixed; margin-left: 780px">
						<ul>
                            <li class="icon">
                                <a href="notifications.php" ><i class="fas fa-bell"></i></a>
                                <span class="count" onclick="window.location='notifications.php'"><b><?php echo $not; ?></b></span>
                            </li>
							<li class="dropdown">
								<?php
									$res = mysqli_query($link, "select photo from user where user_id='".$_SESSION['user_id']."'");
									if ($row = mysqli_fetch_array($res)) {
									?>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="<?php echo $row['photo']; ?>" alt="User Photo">
										<span>School Librarian</span>
									</a>
									<?php
									}
									?>
								<ul class="dropdown-menu"style="
											background: rgba(0, 0, 0, 0.25);
											border-radius: 12px;
											box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
											backdrop-filter: blur(4.1px);
											-webkit-backdrop-filter: blur(4.1px);
											border: 1px solid rgba(0, 0, 0, 0.06);">
									<li class="user-header text-center">
									<?php
										// prepare and bind
										$stmt = mysqli_prepare($link, "SELECT photo FROM user WHERE user_id = ?");
										mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_id']);
										// execute the query
										if (mysqli_stmt_execute($stmt)) {
										// bind the result
										mysqli_stmt_bind_result($stmt, $photo);
										// fetch the result
										if (mysqli_stmt_fetch($stmt)) {
											echo '<img src="' . $photo . '" alt="">';
										}
										} else {
										echo 'Error: ' . mysqli_error($link);
										}
										// close the statement
										mysqli_stmt_close($stmt);
										echo '<p>' . $_SESSION["user_id"] . '</p>';
										//echo '<p>' . $_SESSION["user_id"] . '</p>';
									?>
									</li>

									<li class="user-footer">
										<ul>
											<li>
												<a href="logout.php"style="border-radius:12px;">logout</a>
											</li>
										</ul>
									</li>														
								</ul>
							</li>
						</ul>
					</div>															
				</div>
				<!-- <script>
				$(document).ready(function() {
				$('.left-sidebar').perfectScrollbar();({
					wheelSpeed: 2,
					wheelPropagation: true,
					minScrollbarLength: 20,
					theme: 'my-theme',
					scrollbarPosition: 'inside'
				});
				});

				</script> -->