<?php
if (!isset($_SESSION['scashier'])) {
  header('location: logout.php');
}
  $page = $_SERVER['PHP_SELF'];
  $sec = "300"; /** EVERY 5 MINUTE THE PAGE WILL REFRESH IT SELFT BECAUSE OF TIME ACCURACY **/
  date_default_timezone_set('Asia/Kabul');
  ?>
  <html lang="en-US">
<body style="background-color: #e5e5e5;">
  <head>
  <meta charset="UTF-8">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script type="text/javascript" src="jsPDF-1.3.2/dist/jspdf.debug.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
<!--===============================================================================================-->
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
<!--===============================================================================================-->
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" style="color: red;">SINA HOTEL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cashier.php">Report</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Customer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="passenger.php">Add Customer</a>
          <a class="dropdown-item" href="findpassenger.php">Edit Customer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="allpassengers.php">All Customers</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          House Keeping
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="nhk.php?new">New Guest</a>
          <a class="dropdown-item" href="nhk.php?edit">Edit House Keepings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="cashier.php">All Guests</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="roomstatus.php">Room Status </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="account.php">
      <li class="nav-item">
        <a class="nav-link"  href="caccount.php">
          <?php echo '<span style="color: #17a2b8;  font-family: fantasy;">Hi </span>'.'<span style="color:#dc3545; font-family: fantasy;">'.$_SESSION['scashier'].'</span>'; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>      
    </form>
  </div>
</nav>
</html>