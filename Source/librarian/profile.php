<?php 
    session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'profile';
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
    
  }
  
  .profile-content .uploadPhoto input[type="file"] {
    display: block;
    margin-bottom: 10px;
  }
  
  .profile-content .form-control {
    border-radius: 10px;
  }
  
  .profile-content .btn {
    border-radius: 12px;
    margin-bottom: 30px;
}
    .btn-save {
        background-color: #007bff;
        color: #fff;
        min-width: 100%;
        padding: 10px 20px;
        border-radius: 12px;
        font-size: 16px;
        cursor: pointer;
        border: none;
    }

    .btn-save:hover {
        background-color: #0069d9;
    }

 </style>
  <section class="content">
  <div class="ontop"></div>
  <div class="profile-content">
  <div class="row">
    <div class="col-md-3 p-">
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
        $res5 = mysqli_query($link, "select * from user where user_id='$_SESSION[user_id]' ");
        while($row5 = mysqli_fetch_array($res5)){
          $school_id    = $row5['school_id'];
          $user_id      = $row5['user_id'];
          $phone_number = $row5['phone_number'];
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
                <input type="text" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" value="<?php echo $phone_number; ?>" />
            </div> 
            <div class="col-md-8 pt-2">
                <label for="first_name"><h6>First Name*</h6></label>
                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="<?php echo $first_name; ?>"/>
            </div>
            <div class="col-md-4 pt-2">
                <label for="middle_name"><h6>Middle Name (Optional)</h6></label>
                <input type="text" class="form-control" id="middle_name" placeholder="Middle Name" name="middle_name" value="<?php echo $middle_name; ?>" />
            </div>
            <div class="col-md-12 pt-2">
                <label for="last_name"><h6>Last Name*</h6></label>
                <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="<?php echo $last_name; ?>" />
            </div>
            <div class="col-md-6 pt-2">
                <label for="street"><h6>Street*</h6></label>
                <input type="text" class="form-control" id="street" placeholder="Street" name="street" value="<?php echo $street; ?>" />
            </div>
            <div class="col-md-6 pt-2">
                <label for="barangay"><h6>Barangay*</h6></label>
                <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay" value="<?php echo $barangay; ?>" />
            </div>
                <div class="col-12 pt-2">
                        <input type="submit" value="Save" class="btn-save" name="update">
                </div>
        </form>
      </div> 
      <?php
      if (isset($_POST["update"])){
        $userId = $_SESSION["user_id"];
        $query = "UPDATE user SET phone_number='". $_POST['phone_number']."',first_name='". $_POST['first_name']."', middle_name='". $_POST['middle_name']."', last_name='". $_POST['last_name']."', street = '". $_POST['street']."', barangay ='". $_POST['barangay']."' WHERE user_id = $userId";
            if(mysqli_query($link, $query)){
                echo '<script type="text/javascript">
                window.location="profile.php?Update=success";
                </script>';
            }
      }
      ?>
    </div>    
  </div>
</div>

  </section>
  