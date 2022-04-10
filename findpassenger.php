<?php 
	session_start();
	$y;
	if(!((!isset($_SESSION['sadmin'])) || (!isset($_SESSION['scashier'])))){
		header('location: logout.php');
	}
	require('conn.php');
	include('cashiertop.php');
	if (isset($_POST['name'])) {
		$d = $_POST['name'];
		$command = "SELECT * FROM `passenger-details`
		WHERE `passenger-id` LIKE '%$d%'
		OR `tazkera` LIKE '%$d%'
		OR `name` LIKE '%$d%'";
		$query = mysqli_query($con, $command);
	}
 ?>
 <!-- **** SEARCHING FORM **** -->
 <form class="container" method="post" style="margin-top: 20px;">
 <h1 style="color: red; margin-bottom: 30px;">Find - Update Customer</h1>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">ID - Name - Tazkera</label>
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
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Province</th>
      <th scope="col">District</th>
      <th scope="col">Village</th>
      <th scope="col">Telephone</th>
      <th scope="col">Tazkera</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
	<?php while ($row = mysqli_fetch_assoc($query)) {
	 ?>
      <tr>
        <td><?php echo $row['passenger-id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['father-name']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['province']; ?></td>
        <td><?php echo $row['district']; ?></td>
        <td><?php echo $row['village']; ?></td>
        <td><?php echo $row['telephone']; ?></td>
        <td><?php echo $row['tazkera']; ?></td>
  		<td><a href="updatepassenger.php?id=<?php echo $row['passenger-id'];?>">Edit</a></td>
<?php $y++; ?>
  <?php }} ?>
      </tr>
  </tbody>
</table>
	<?php } ?>
</div>