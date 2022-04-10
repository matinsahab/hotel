<?php 
		session_start();
	if (!isset($_SESSION['sadmin'])) {
		header('location: logout.php');
	}
	require('conn.php');
	if (isset($_POST['item-name'])) {
		$ina = $_POST['item-name'];
		$iqu = $_POST['item-quantity'];
		$date = $_POST['date'];
		$ipr = $_POST['item-price'];
		$command = "INSERT INTO `inventory` (`item-name`, `item-quantity`, `date`, `item-price`) VALUES ('$ina', '$iqu', '$date', '$ipr')";
		$query = mysqli_query($con,$command);
		if ($query) {
			echo "<p style='color:green;'>Successfully Inserted</p>";
		}
	}
	include('admintop.php');
 ?>
 <form class="container" method="post" style="margin-top: 20px;">
  <h1 style="color: red; margin-bottom: 30px;">Inventory</h1>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Item Name</label>
      <input type="text" class="form-control" name="item-name" id="">
    </div>
    <div class="form-group col-md-4">
      <label for="">Item Quantity</label>
      <input type="text" class="form-control" name="item-quantity" id="">
    </div>
    <div class="form-group col-md-4">
      <label for="">Date</label>
      <input type="date" class="form-control" name="date" id="">
    </div>
    <div class="form-group col-md-4">
      <label >Price</label>
      <input type="text" class="form-control" name="item-price" >
    </div>
</div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>	
</body>

