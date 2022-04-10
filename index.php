<?php  
ob_start();
session_start();
require('conn.php');
require('cashiertop.php');
if (!isset($_SESSION['scashier'])) {
	header('location: logout.php');
}
?>
<!DOCTYPE html>
<html>
<body>
<div class="d-flex justify-content-center" style="margin-top: 50px;">
  <div class="card inline" style="width: 18rem;">
  <img class="card-img-top" src="images/customer.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Customer</h5>
    <p class="card-text">Add a new passenger with all its data for it to be inserted as guest.</p>
    <a href="passenger.php" class="btn btn-info d-flex justify-content-center" style="margin-top: 5px;">Add Customer</a>
    <a href="findpassenger.php" class="btn btn-info d-flex justify-content-center" style="margin-top: 5px;">Edit Customer</a>
    <a href="allpassengers.php" class="btn btn-info d-flex justify-content-center" style="margin-top: 5px;">All Customers</a>
  </div>
</div>
  <div class="card inline" style="width: 18rem;">
  <img class="card-img-top" src="images/house.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">House Keepings</h5>
    <p class="card-text">See all the guests we are wellcomming for the night.</p>
    <a href="nhk.php?new" class="btn btn-danger d-flex justify-content-center" style="margin-top: 5px;">Add House Keepings</a>
    <a href="nhk.php?edit" class="btn btn-danger d-flex justify-content-center" style="margin-top: 5px;">Edit House Keepings</a>
    <a href="cashier.php" class="btn btn-danger d-flex justify-content-center" style="margin-top: 5px;">All House Keepings</a>
  </div>
</div>
  <div class="card inline" style="width: 18rem;">
  <img class="card-img-top" src="images/room.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Room Status</h5>
    <p class="card-text">Have a look about all the room status wheater they are free or not.</p>
    <a href="roomstatus.php" class="btn btn-info d-flex justify-content-center" style="margin-top: 5px;">Room Status</a>
    <a href="cashier.php" class="btn btn-info d-flex justify-content-center" style="margin-top: 5px;">Report</a>
    <a href="caccount.php" class="btn btn-warning d-flex justify-content-center" style="margin-top: 5px;">Account</a>
  </div>
</div>
</div>
</body>
</html>