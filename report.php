<?php session_start();
error_reporting(0);
include_once('includes/config.php');
$age=$_POST['age'];
$gender=$_POST['gender'];

if($_GET['del']){
$scid=$_GET['id'];
mysqli_query($con,"delete from tblseniorcitizen where ID ='$scid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-scdetails.php'</script>";
          }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdn.tailwindcss.com"></script>
  <title>Senior Citizen Updates and Information System || Manage Senior Citizen Details</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  
</head>
<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once('includes/header.php');?>
    <!-- partial -->
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
   &nbsp;
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Reports Age and Gender Senior Citizen </h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Report Age and Gender</p>
            </div>
          </li>
        </ul>
       
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
  
      <!-- partial:partials/_sidebar.html -->
     <?php include_once('includes/sidebar.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h4 class="card-title" style="padding-left: 20px; padding-top: 20px;">Report Age & Gender</h4>
                  <p class="card-description" style="padding-left: 20px;"> 
                    Reports Age and Gender for Senior Citizens!
                  </p>
                  <div class="table-responsive pt-3">
    <!-- Existing Form for Filtering -->
    <form method="POST" action="">
        <div>
            <span class="mx-3">Age:</span>
            <input type="number" name="age" class="text-lg bg-slate-100 border-2 border-black rounded-md px-3" required>
            Gender:
            <select name="gender" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <button type="submit" name="search" class="text-lg bg-slate-100 border-2 border-black rounded-md px-3">Search</button>
        </div>
    </form>

    <!-- Table to display results -->
    <table class="table table-striped project-orders-table">
        <thead>
            <tr>
                <th>#</th>
                <th>OSCA ID No.</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Added By</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Existing PHP code for displaying records
            if (isset($_POST['search'])) {
                $age = intval($_POST['age']);
                $gender = mysqli_real_escape_string($con, $_POST['gender']);
                $query = mysqli_query($con, "SELECT * FROM tblseniorcitizen WHERE ContactNumber='$age' AND Gender='$gender'");

                $cnt = 1;
                while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo htmlentities($cnt); ?></td>
                <td><?php echo htmlentities($row['RegistrationNumber']); ?></td>
                <td><?php echo htmlentities($row['Name']); ?></td>
                <td><?php echo htmlentities($row['DateofBirth']); ?></td>
                <td><?php echo htmlentities($row['ContactNumber']); ?></td>
                <td><?php echo htmlentities($row['Gender']); ?></td>
                <td><?php echo htmlentities($row['AddedBy']); ?></td>
                <td><?php echo htmlentities($row['RegitrationDate']); ?></td>
            </tr>
            <?php
                    $cnt++;
                }
            }
            ?>
        </tbody>
    </table>

    <!-- Print Button -->
    <button onclick="printReport()" class="flex flex-row gap-1 p-1 text-md bg-[#A9FF99] border-2 border-black rounded-md absolute right-5 top-0 mt-3"><svg width="25px" height="25px" viewBox="0 -2 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#FFFFFF"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>print</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-100.000000, -205.000000)" fill="#000000"> <path d="M130,226 C130,227.104 129.104,228 128,228 L125.858,228 C125.413,226.278 123.862,225 122,225 L110,225 C108.138,225 106.587,226.278 106.142,228 L104,228 C102.896,228 102,227.104 102,226 L102,224 C102,222.896 102.896,222 104,222 L128,222 C129.104,222 130,222.896 130,224 L130,226 L130,226 Z M122,231 L110,231 C108.896,231 108,230.104 108,229 C108,227.896 108.896,227 110,227 L122,227 C123.104,227 124,227.896 124,229 C124,230.104 123.104,231 122,231 L122,231 Z M108,209 C108,207.896 108.896,207 110,207 L122,207 C123.104,207 124,207.896 124,209 L124,220 L108,220 L108,209 L108,209 Z M128,220 L126,220 L126,209 C126,206.791 124.209,205 122,205 L110,205 C107.791,205 106,206.791 106,209 L106,220 L104,220 C101.791,220 100,221.791 100,224 L100,226 C100,228.209 101.791,230 104,230 L106.142,230 C106.587,231.723 108.138,233 110,233 L122,233 C123.862,233 125.413,231.723 125.858,230 L128,230 C130.209,230 132,228.209 132,226 L132,224 C132,221.791 130.209,220 128,220 L128,220 Z" id="print" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg> Print</button>
</div>

                
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include_once('includes/footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- Existing JavaScript -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<script src="js/dashboard.js"></script>

<!-- Custom JavaScript for Printing -->
<script>
function printReport() {
    const printContents = document.querySelector('.table-responsive').innerHTML;
    const originalContents = document.body.innerHTML;

    // Create a new window or tab for printing
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>

</body>

</html>

