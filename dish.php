<?php 
		session_start();
	if (!isset($_SESSION['sadmin'])) {
		header('location: logout.php');
	}
	require('conn.php');
	include('admintop.php');

	// ************************************ ADDING A DISH - SECTION **********************************

	if (isset($_GET['add'])) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$price = $_POST['price'];
		$command = "INSERT INTO `dishes` (`dish-name`, `dish-price`) VALUES ('$name', '$price')";
		$query = mysqli_query($con,$command);
		if ($query) {
			echo "<p style='color:green;'>Successfully Inserted</p>";
		}
	}
 ?>
 <form class="container" method="post" style="margin-top: 20px;">
  <h1 style="color: red; margin-bottom: 30px;">Dishes</h1>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Dish Name</label>
      <input type="text" class="form-control" name="name" id="">
    </div>
    <div class="form-group col-md-4">
      <label >Dish Price</label>
      <input type="text" class="form-control" name="price" >
    </div>
</div>
  <button type="submit" class="btn btn-primary">Add to Menu</button>
</form>	
</body>
	<?php } ?>







	<!-- ****************************************	 DISH 	***************************************** -->
<?php
	if (isset($_GET['edit'])) {
	if (isset($_POST['name'])) {
		$d = $_POST['name'];
		$command = "SELECT * FROM `dishes`
		WHERE `dish-id` LIKE '%$d%'
		OR `dish-name` LIKE '%$d%'
		OR `dish-price` LIKE '%$d%'";
		$query = mysqli_query($con, $command);
	}
 ?>
 <!-- **** SEARCHING FORM **** -->
 <form class="container" method="post" style="margin-top: 20px;">
 <h1 style="color: red; margin-bottom: 30px;">Find - Update - Delete Dish</h1>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">ID - Name - Price</label>
      <input type="text" class="form-control" name="name" id="" required="">
      <input type="hidden" name="cool">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
</form>

<!-- **** SEARCH RESULTS DISPLAIED IN TABLE ***** -->

<div class="container" style="margin-top: 50px">
<table class="table table-borderless table-dark">
	<?php if (isset($_POST['cool'])) {?>
				<?php if (mysqli_num_rows($query) > 0) {$y =1; ?>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Dish Name</th>
      <th scope="col">Dish Price</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
	<?php while ($row = mysqli_fetch_assoc($query)) {
	 ?>
      <tr>
        <td><?php echo $row['dish-id']; ?></td>
        <td><?php echo $row['dish-name']; ?></td>
        <td><?php echo $row['dish-price']; ?></td>
  		<td><a href="updatepassenger.php?id=<?php echo $row['passenger-id'];?>">Edit</a></td>
  		<td><a href="updatepassenger.php?id=<?php echo $row['passenger-id'];?>">Delete</a></td>
<?php $y++; ?>
  <?php }} ?>
      </tr>
  </tbody>
</table>
</div>
	<?php }} ?>
	
