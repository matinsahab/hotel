<?php  
ob_start();
session_start();
if (!isset($_SESSION['sadmin'])) {
	header('location: logout.php');
}
require('conn.php');
require('admintop.php');
if (isset($_GET['name'])) {
	$s = $_GET['name'];
	$t = $_GET['name1'];
$command = "SELECT `h`.`room-id`, SUM(`r`.`room-price`) AS `sum` FROM `house-keeping` AS `h`, `room-specs` AS `r` WHERE `h`.`room-id` = `r`.`room-id` AND `h`.`ex-date` BETWEEN '$s' AND '$t' GROUP BY `h`.`room-id`";
$query = mysqli_query($con,$command);
$command1 = "SELECT SUM(`r`.`room-price`) AS `total` FROM `house-keeping` AS `h`, `room-specs` AS `r` WHERE `h`.`room-id` = `r`.`room-id` AND `h`.`ex-date` BETWEEN '$s' AND '$t'";
$query1 = mysqli_query($con,$command1);
$row1 = mysqli_fetch_assoc($query1);	
?>
<!DOCTYPE html>
<html>
<body>
<div class="container" style="margin-top: 50px">
<table class="table table-borderless table-dark">
  <thead>
    <tr>
      <th style="text-align: center;" scope="col">Room ID</th>
      <th style="text-align: center;" scope="col">Room Price</th>
    </tr>
  </thead>
  <tbody>
	<?php while ($row = mysqli_fetch_assoc($query)) {
	 ?>
      <tr>
        <td style="text-align: center;"><?php echo $row['room-id']; ?></td>
        <td style="text-align: center;"><?php echo $row['sum']; ?></td>
  <?php } ?>
      </tr>
        <tr><td style="text-align: center; color: red;">Total</td>
        <td style="text-align: center; color: red;"><?php echo $row1['total']; ?></td></tr>
  </tbody>
</table>
<center><h3>From <?php echo '<span style="color:red;">'.$_GET['name'].'</span>'.' -- '.'<span style="color:red;">'.$_GET['name1'].'</span>'; ?></h3></center>
</div>
<?php } 
if (isset($_GET['name2'])) {
	$r = $_GET['name2'];
	$u = $_GET['name3'];
	$d = date('d-m-Y', strtotime('+1 day'));
	$command = "SELECT `h`.`passenger-id`, `p`.`name`, `h`.`room-id`, `h`.`type`, `h`.`passenger-count`, `h`.`ex-date`, `h`.`add-by` FROM `house-keeping` AS `h`, `passenger-details` AS `p` WHERE `h`.`passenger-id` = `p`.`passenger-id` AND `h`.`ex-date` BETWEEN '$u' AND '$d' AND `p`.`passenger-id` = '$r'";
	$query = mysqli_query($con,$command);
?>
<html>
<body>
<div class="container" style="margin-top: 50px">
<table class="table table-borderless table-dark">
        <?php if (mysqli_num_rows($query) > 0) {?>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Room ID</th>
      <th scope="col">Type</th>
      <th scope="col">Guests(No)</th>
      <th scope="col">Date</th>
      <th scope="col">Added By</th>
    </tr>
  </thead>
  <tbody>
  <?php while ($row = mysqli_fetch_assoc($query)) {
   ?>
      <tr>
        <td><?php echo $row['passenger-id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['room-id']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['passenger-count']; ?></td>
        <td><?php echo $row['ex-date']; ?></td>
        <td><?php echo $row['add-by']; ?></td>
  <?php }}} ?>
      </tr>
  </tbody>
</table>
</div>
</body>
</html>
<?php 
if (isset($_POST['user'])) {
	$u = $_POST['user'];
	$d = $_POST['date'];
	$t = date('d-m-Y',strtotime('+1 day'));
	$command = "SELECT `h`.`add-by`,`p`.`name`,`p`.`gender`,`p`.`province`,`p`.`telephone`,`p`.`tazkera` 
				FROM `house-keeping` AS `h`, `passenger-details` AS `p`
				WHERE `h`.`passenger-id` = `p`.`passenger-id` AND `h`.`add-by` = '$u' AND `h`.`ex-date` BETWEEN '$d' AND '$t'";
	$query = mysqli_query($con,$command);
?>
<html>
<body>
<div class="container" style="margin-top: 50px">
<table class="table table-borderless table-dark">
        <?php if (mysqli_num_rows($query) > 0) { $no = 1; ?>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Added By</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Province</th>
      <th scope="col">Telephone</th>
      <th scope="col">Tazkera</th>
    </tr>
  </thead>
  <tbody>
  <?php while ($row = mysqli_fetch_assoc($query)) {
   ?>
      <tr>
      	<td><?php echo $no; ?></td>
        <td><?php echo $row['add-by']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['province']; ?></td>
        <td><?php echo $row['telephone']; ?></td>
        <td><?php echo $row['tazkera']; ?></td>
  <?php $no++; }} ?>
      </tr>
  </tbody>
</table>
<center><h3><?php echo "From ".'<span style="color:red";>'.$d.'</span>'.' -- '.'<span style="color:red;">'.$t.'</span>'; ?></h3></center>
</div>
</body>
</html>
<?php } ?>