<?php
ob_start();
session_start();
require('conn.php');
require('cashiertop.php');
	if (isset($_POST['cash'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$pos = $_POST['pos'];
	if ($pass !== $cpass) {
		header('location: caccount.php?match');
		return $z;
	}
	elseif (!isset($z)) {
	$command1 = "UPDATE `user-account` SET `username` = '$user', `password` = md5('$pass'), `user-level` = 'Cashier' 
				 WHERE `username` = '$user'";
	$query1 = mysqli_query($con,$command1);
	if ($query1) {
		echo "<h4 style='color:green'>Updated</h4>";
	}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form class="container" method="post" style="margin-top: 20px;">
 <h1 style="color: red; margin-bottom: 30px;">Update My Account</h1>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Username</label>
      <input type="text" class="form-control" name="user" value="<?php echo $_SESSION['scashier']; ?>" id="" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="">New Password</label>
      <input type="password" class="form-control" value="" name="pass" id="" required>
    </div>
    <div class="form-group col-md-4">
      <label for="">Confirm Password</label>
      <input type="password" class="form-control" value="" name="cpass" id="" required>
      <?php if(isset($_GET['match'])) echo '<label style="color: red;" for="">Passwords did not match.</label>';?>
    </div>
    <div class="form-group col-md-4">
      <label for="">Position</label>
      <input type="text" class="form-control" value="Cashier" name="pos" readonly required>
      <input type="hidden" name="cash">
    </div>
	</div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>