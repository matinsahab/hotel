<?php 
ob_start();
session_start();
if (!isset($_SESSION['sadmin'])) {
	header('location: logout.php');
}
require('conn.php');
require('admintop.php');
if (isset($_GET['add'])) {
if (isset($_POST['user'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$pos = $_POST['pos'];
	$command = "SELECT `username` FROM `user-account` WHERE `username` = '$user'";
	$query = mysqli_query($con,$command);
	$num = mysqli_num_rows($query);
	if ($pass !== $cpass) {
		header('location: account.php?add=match');
		return $z;
	}
	elseif ($num == 1) {
		header('location: account.php?add=exist');
		return $z;
	}
	elseif (!isset($z)) {
	$command1 = "INSERT INTO `user-account` (`username`, `password`, `user-level`) 
				 VALUES ('$user', md5('$pass'), 'Cashier')";
	$query1 = mysqli_query($con,$command1);
	if ($query1) {
		header('location: admin.php?user=Username Created');
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
 <h1 style="color: red; margin-bottom: 30px;">Create Account</h1>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Username</label>
      <input type="text" class="form-control" name="user" value="" id="" required>
      <?php if(($_GET['add']) == ('exist')) echo '<label style="color: red;" for="">Username already exists.</label>';?>
    </div>
    <div class="form-group col-md-4">
      <label for="">Password</label>
      <input type="password" class="form-control" value="" name="pass" required>
    </div>
    <div class="form-group col-md-4">
      <label for="">Confirm Password</label>
      <input type="password" class="form-control" value="" name="cpass" required>
      <?php if(($_GET['add']) == ('match')) echo '<label style="color: red;" for="">Passwords did not match.</label>';?>
    </div>
    <div class="form-group col-md-4">
      <label for="">Position</label>
      <input type="text" class="form-control" value="Cashier" name="pos" readonly required>
    </div>
	</div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
</body>
</html>
<?php } 
// ****************************************** EDIT ACCOUNT ********************************
if (isset($_GET['all'])) {
	$command = "SELECT `user-id`,`username`,`user-level` FROM `user-account`";
	$query = mysqli_query($con,$command);
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>All Passengers</title>
 </head>
 <body>
<div class="container" style="margin-top: 50px">
<table class="table table-borderless table-dark">
	<?php if (mysqli_num_rows($query) > 0) { ?>
  <thead>
    <tr>
      <th style="text-align: center;" scope="col">User ID</th>
      <th style="text-align: center;" scope="col">Username</th>
      <th style="text-align: center;" scope="col">User Level</th>
    </tr>
  </thead>
  <tbody>
	<?php while ($row = mysqli_fetch_assoc($query)) {
	 ?>
      <tr>
        <td style="text-align: center;"><?php echo $row['user-id']; ?></td>
        <td style="text-align: center;"><?php echo $row['username']; ?></td>
        <td style="text-align: center;"><?php echo $row['user-level']; ?></td>
      </tr>
  <?php }} ?>
  </tbody>
</table>
</div>
 </body>
 </html>
<?php } ?>