<?php 
     session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    // $page = 'home';
    include 'includes/header.php';
    include 'includes/connection.php';
 ?>
 <style>
    form{
      margin-left: 35px;
    }
    .form-control option {
    color: #495057;
    background-color: #ffffff;
    height: 50px; /* added height property */
    line-height: 50px; /* added line-height property */
    }
    
  
</style>

  <section class="content">
            <div class="ontop"></div>
            <div class="col-md-5 ml-30 p-3">
                <div class="bg-light p-2 rounded">
                    <form class="col-10 ">
                    <div class="col-md-12 pt-2">
                        <label for="role"><h6>Role*</h6></label>
                        <div class="select-wrapper">
                            <select class="form-control" id="role" name="roles">
                            <option value="" disabled selected>Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="School librarian">School Librarian</option>
                            </select>
                            <div class="select-arrow"></div>
                        </div>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="user_id"><h6>User_id</h6></label>
                            <input type="text" class="form-control" id="user_id" placeholder="User ID" name="user_id" />
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="phone_number"><h6>Password*</h6></label>
                            <input type="text" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number"/>
                        </div> 
                        <div class="col-md-12 pt-2">
                            <label for="first_name"><h6>First Name*</h6></label>
                            <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name"/>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="middle_name"><h6>Middle Name (Optional)</h6></label>
                            <input type="text" class="form-control" id="middle_name" placeholder="Middle Name" name="middle_name"/>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="last_name"><h6>Last Name*</h6></label>
                            <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name"/>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="barangay"><h6>Phone Number*</h6></label>
                            <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay"/>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="barangay"><h6>School Name*</h6></label>
                            <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay"/>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="barangay"><h6>School ID*</h6></label>
                            <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay"/>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="street"><h6>Street*</h6></label>
                            <input type="text" class="form-control" id="street" placeholder="Street" name="street"/>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="barangay"><h6>Barangay*</h6></label>
                            <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay"/>
                        </div>
                        <div class="col-md-12 pt-2">
                            <label for="barangay"><h6>City*</h6></label>
                            <input type="text" class="form-control" id="barangay" placeholder="Barangay" name="barangay"/>
                        </div>
                        <div class="col-md-12 pt-2">
                                <input type="submit" value="Save" class="btn-save" name="update">
                        </div>
                    </form>
            </div>
  </section>