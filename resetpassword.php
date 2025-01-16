<?php
session_start();
error_reporting(0);
include('includes/config.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Senior Citizen Updates and Information System  || Reset Password Page</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
 
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3 style="color:seagreen;">SCUIS</h3>
              <h4>Forgot Password</h4>
              <h6 class="font-weight-light">Reset your password.</h6>
              <form class="pt-3" method="post" name="changepassword" onsubmit="return checkpass();">
                <div class="form-group">
                  <input class="form-control form-control-lg border-left-0" type="password" required="" name="newpassword" placeholder="New Password">
                </div>
                <div class="form-group">
                  <input class="form-control form-control-lg border-left-0" type="password" name="confirmpassword" required="" placeholder="Confirm Your Password">
                </div>
                <div class="mt-3">
                   <button type="submit" name="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">Reset</button>
                </div>
               <div class="my-2 d-flex justify-content-between align-items-center">
                  
                  <a href="login.php" class="auth-link text-blue">Signin!!</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
