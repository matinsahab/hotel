<?php 
	session_start();
	require('conn.php');
	include('cashiertop.php');
	if (isset($_GET['hid'])) {
		# code...
	$c = $_GET['n'];
	$command = "SELECT * FROM `passenger-details` ORDER BY `passenger-id` DESC LIMIT $c";
	$query = mysqli_query($con, $command);
	}
	if (!isset($_GET['hid'])) {
		# code...
	$command = "SELECT * FROM `passenger-details` ORDER BY `passenger-id` DESC LIMIT 20";  /**20 IS THE LIMIT OF ROOMS CAN BE TAKEN BY PASSENGERS IN A NIGHT (MAXIMUM) **/
	$query = mysqli_query($con, $command);
	}
if (isset($_GET['update'])) {
echo '<h4 style="">Customer Updated</h4>';
}
?>
 <html>
 <head>
 	<title>All Passengers</title>
 </head>
 <body>
<div class="container" style="margin-top: 50px; margin-bottom: 20px;">
<table class="table table-borderless table-dark">
	<?php if (mysqli_num_rows($query) > 0) { ?>
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
      </tr>
  <?php }} ?>
  </tbody>
</table>
	<form>
  <span>Display </span><input type="number" value="20" style="width: 80px; text-align: center; border: 1px solid black; border-radius: 5px;" min="1" max="200" name="n"> <span>Customers</span>
  <input type="hidden" name="hid">
  <input type="submit" class="btn btn-danger">
</form>
</div>

 </body>
 </html>