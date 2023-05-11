<?php 
    session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    // $page = 'profile';
    include 'includes/header.php';
    include 'includes/connection.php'; 
 ?>
 
 <style>
.profile-content {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    margin: 30px 30px 0 30px;
    overflow-y: visible;
    margin-bottom: 30px;
  }
  
  .profile-content .photo {
    margin-bottom: 30px;
  }
  
  .profile-content .photo img {
    width: 100%;
    max-width: 200px;
    height: auto;
    border: 3px solid white;
    
  }
  
  .profile-content .uploadPhoto input[type="file"] {
    display: block;
    margin-bottom: 10px;
    font-size: 14px;
    max-width: 230px;
  }
  
  .profile-content .form-control {
    border-radius: 10px;
  }
  
  .profile-content .btn {
    margin-bottom: 30px;
    background-color: #09c372;
    border: none;
}
    .btn-save {
        background-color: #09c372;
        color: #fff;
        min-width: 100%;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        border: none;
    }

    .btn-save:hover {
        background-color: #1d1f1d;
    }
    .alert {
        width: 100%;
        max-width: 800px;
        margin-left: 30px;
        margin-right: 30px;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        font-weight: bold;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }


 </style>
  <section class="content">
  <div class="ontop"></div>
  <?php
    if (isset($_GET['Update'])) {
        if ($_GET['Update'] == 'success') {
            ?>
            <div class="alert alert-success">
                Update successful!
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger">
                Update failed. Please try again.
            </div>
            <?php
        }
    }
    ?>
  <div class="profile-content">
  <div class="row">
    <div class="col-md-3 p-2">
      <div class="photo">
        <?php
        $res = mysqli_query($link, "select * from user where user_id='".$_SESSION['user_id']."'");
        while ($row = mysqli_fetch_array($res)){
          ?><img src="<?php echo $row["photo"]; ?> " alt="Profile photo"> <?php
        }
        ?>
      </div>
      <div class="uploadPhoto">
        <div class="gap-30"></div>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="image" class="modal-mt" id="image">
          <div class="gap-30"></div>
          <input type="submit" class="modal-mt btn btn-primary" value="Upload Image" name="submit">
        </form>
      </div>
      <?php 
      if (isset($_POST["submit"])) {
        $image_name=$_FILES['image']['name'];
        $temp = explode(".", $image_name);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $imagepath="upload/".$newfilename;
        move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
        mysqli_query($link, "update user set photo='".$imagepath."' where user_id='".$_SESSION['user_id']."'");
        ?>
        <script type="text/javascript">
          window.location="profile.php";
        </script>
        <?php
      }
      ?>
    </div>
    <div class="col-md-8 ml-30">
      <div class="bg-light p-3 rounded">
        <?php
        $res5 = mysqli_query($link, "SELECT u.school_id, u.user_id, u.first_name, u.middle_name, u.last_name, u.contact_number, s.street, s.barangay 
        FROM user u 
        JOIN school s ON u.school_id = s.school_id 
        WHERE u.user_id = '{$_SESSION["user_id"]}'");
        while($row5 = mysqli_fetch_array($res5)){
          $school_id    = $row5['school_id'];
          $user_id      = $row5['user_id'];
          $contact_number = $row5['contact_number'];
          $first_name   = $row5['first_name'];
          $middle_name  = $row5['middle_name'];
          $last_name    = $row5['last_name'];
          $street       = $row5['street'];
          $barangay     = $row5['barangay'];
        }
        ?>
        <form class="row g-2 p-2" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
            <div class="col-md-12 pt-2">
                <label for="school_id"><h6>School ID*</h6></label>
                <input type="text" class="form-control" id="school_id" placeholder="School ID" name="school_id" value="<?php echo $school_id; ?>" disabled />
            </div>
            <div class="col-md-8 pt-2">
                <label for="user_id"><h6>User ID*</h6></label>
                <input type="text" class="form-control" id="user_id" placeholder="User ID" name="user_id" value="<?php echo $user_id; ?>" disabled />
            </div>
            <div class="col-md-4 pt-2">
                <label for="phone_number"><h6>Contact Number*</h6></label>
                <input type="text" class="form-control" id="phone_number" placeholder="Contact Number" name="contact_number" value="<?php echo $contact_number; ?>" required/>
            </div> 
            <div class="col-md-8 pt-2">
                <label for="first_name"><h6>First Name*</h6></label>
                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="<?php echo $first_name; ?>"required/>
            </div>
            <div class="col-md-4 pt-2">
                <label for="middle_name"><h6>Middle Name (Optional)</h6></label>
                <input type="text" class="form-control" id="middle_name" placeholder="Middle Name" name="middle_name" value="<?php echo $middle_name; ?>" required/>
            </div>
            <div class="col-md-12 pt-2">
                <label for="last_name"><h6>Last Name*</h6></label>
                <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="<?php echo $last_name; ?>" required/>
            </div>
            <div class="col-md-6 pt-2">
                <label for="street"><h6>Street*</h6></label>
                <input type="text" class="form-control" id="street" placeholder="Street" name="street" value="<?php echo $street; ?>" required/>
            </div>
            <div class="col-md-6 pt-2">
                <label for="barangay"><h6>Barangay*</h6></label>
                <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay" value="<?php echo $barangay; ?>" required/>
            </div>
                <div class="col-12 pt-2">
                        <input type="submit" value="Save" class="btn-save" name="update">
                </div>
        </form>
      </div> 
      <?php 
                  if (isset($_POST["update"])) {
                      $contact_number = $_POST['contact_number'];
                      $first_name = $_POST['first_name'];
                      $middle_name = $_POST['middle_name'];
                      $last_name = $_POST['last_name'];
                      $street = $_POST['street'];
                      $barangay = $_POST['barangay'];
                      $query = "UPDATE user 
                                JOIN school ON user.school_id = school.school_id
                                SET user.contact_number='$contact_number', user.first_name='$first_name', user.middle_name='$middle_name', user.last_name='$last_name', school.street='$street', school.barangay='$barangay' 
                                WHERE user.user_id='".$_SESSION['user_id']."'";
                      if (mysqli_query($link, $query)) {
                  ?>
                          <script type="text/javascript">
                          window.location="profile.php?Update=success";
                          </script>
                  <?php
                      } else {
                  ?>
                          <script type="text/javascript">
                          window.location="profile.php?Update=failed";
                          </script>
                  <?php
                      }
                  }
                  ?>
                    </div>
                  </div>
                </div>
              </div>

</section> 
  <?php include 'includes/footer.php'; ?>
    </div>    
  </div>
</div>

  </section>
  