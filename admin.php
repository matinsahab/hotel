<?php  
ob_start();
session_start();
require('conn.php');
require('admintop.php');
if (!isset($_SESSION['sadmin'])) {
	header('location: logout.php');
}
?>
<!DOCTYPE html>
<html>
<body>
<?php if (isset($_GET['add'])) {?>
  <h4><?php echo $_GET['add']; ?></h4>
<?php } ?>
<?php if (isset($_GET['notadd'])) {?>
  <h4><?php echo $_GET['notadd']; ?></h4>
<?php } ?>
<?php if (isset($_GET['user'])) {?>
  <h4><?php echo $_GET['user']; ?></h4>
<?php } ?>
<?php if (isset($_GET['aaccount'])) {?>
  <h4><?php echo $_GET['aaccount']; ?></h4>
<?php } ?>
<div class="d-flex justify-content-center" style="margin-top: 100px;">
  <div class="card inline" style="width: 18rem;">
  <img class="card-img-top" src="images/room.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Add Room</h5>
    <p class="card-text">Add a room here, the added rooms will be shown.</p>
    <a href="room.php?add" class="btn btn-danger d-flex justify-content-center" style="margin-top: 5px;">Add Room</a>
  </div>
</div>
  <div class="card inline" style="width: 18rem;">
  <img class="card-img-top" src="images/edit.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Edit Room</h5>
    <p class="card-text">If you want to change room's price, floor, washrooms.</p>
    <a href="room.php?edit" class="btn btn-danger d-flex justify-content-center" style="margin-top: 5px;">Edit Room</a>
  </div>
</div>
  <div class="card inline" style="width: 18rem;">
  <img class="card-img-top" src="images/account.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Create Account</h5>
    <p class="card-text">Make an account to cashier level for house keeping.</p>
    <a href="aaccount.php?add" class="btn btn-danger d-flex justify-content-center" style="margin-top: 5px;">Create Account</a>
  </div>
</div>
  <div class="card inline" style="width: 18rem;">
  <img class="card-img-top" src="images/report.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Report</h5>
    <p class="card-text">Have a look at all you made from the rooms.</p>
    <a href="choosereport.php" class="btn btn-danger d-flex justify-content-center" style="margin-top: 5px;">Report</a>
  </div>
</div>
</div>
</body>
</html>