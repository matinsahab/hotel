<?php 
		ob_start();
		session_start();
	if (!isset($_SESSION['scashier'])) {
		header('location: logout.php');
	}
	require('conn.php');
	require('cashiertop.php');
if (isset($_POST['jow'])) {
		if ($_POST['jow'] == '') {
			header('location: cashier.php?empty');
		}
		$date4 = $_POST['jow'];
	  	$command4 = "SELECT `h`.`hk-id`, `p`.`name`, `p`.`father-name`, `p`.`province`, `p`.`district`,
  			   `p`.`telephone`, `h`.`passenger-count`, `p`.`tazkera`, `h`.`room-id` 
  			   FROM `passenger-details` AS `p`, `house-keeping` AS `h`, `room-specs` 
  			   AS `r` WHERE `h`.`date` LIKE '%$date4%' AND `p`.`passenger-id` = `h`.`passenger-id` 
  			   GROUP BY `h`.`hk-id`";
		$query4 = mysqli_query($con, $command4);?>
	
<center><h3 style="margin-top: 20px; padding: 0px;"><?php echo $date4; ?></h3></center>
<div class="container" style="margin-top: 20px" id="customers">
<table class="table table-borderless table-dark" id="tab_customers">
	<?php if (mysqli_num_rows($query4)) { ?>
  <thead>
    <tr>
      <th style="text-align: center;" scope="col">No</th>
      <th style="text-align: center;" scope="col">Name</th>
      <th style="text-align: center;" scope="col">Father Name</th>
      <th style="text-align: center;" scope="col">Province</th>
      <th style="text-align: center;" scope="col">District</th>
      <th style="text-align: center;" scope="col">Telephone</th>
      <th style="text-align: center;" scope="col">P.Count</th>
      <th style="text-align: center;" scope="col">Tazkera</th>
      <th style="text-align: center;" scope="col">Room No</th>
    </tr>
  </thead>
  <tbody><?php
           	if (mysqli_num_rows($query4) > 0)  $nn = 1;{
        	while ($f = mysqli_fetch_assoc($query4)){?>
      <tr style="text-align: center;">
  					<td><?php echo $nn;?></td>
  					<td><?php echo $f['name'];?></td>
  					<td><?php echo $f['father-name'];?></td>
  					<td><?php echo $f['province'];?></td>
  					<td><?php echo $f['district'];?></td>
  					<td><?php echo $f['telephone'];?></td>
  					<td><?php echo $f['passenger-count'];?></td>
  					<td><?php echo $f['tazkera'];?></td>
  					<td><?php echo $f['room-id'];?></td>
      </tr>
    <?php $nn++; }}}?>
  </tbody>
</table>
<form method="post">
  <div class="form-row">
    <div class="form-group col-md-4">
	<h4 style="margin-top: 50px;">Report of :</h4>
	<input  style="margin-top: 10px;" type="text" minlength="10" maxlength="10" class="form-control" placeholder="DD-MM-YYYY ex:(01-01-2020)" name="jow">
	<input style="margin-top: 10px;" type="submit" class="btn btn-danger" name="sub">
    </div>
</div>
</form>
</div>

<!-- HERE IS THE CODE TO DISPLAY THE REPORT OF PASSENGERS AT THE CURRENT DATE -->

<?php } elseif (!isset($_POST['jow'])) {
	$date = date("d-m-Y",strtotime('+1 day'));
    $date2 = date("d-m-Y",strtotime('+0'));
  	$command = "SELECT `h`.`hk-id`, `p`.`name`, `p`.`father-name`, `p`.`province`, `p`.`district`,
  			   `p`.`telephone`, `h`.`passenger-count`, `p`.`tazkera`, `h`.`room-id` 
  			   FROM `passenger-details` AS `p`, `house-keeping` AS `h`, `room-specs` 
  			   AS `r` WHERE `h`.`ex-date` ='$date' AND `p`.`passenger-id` = `h`.`passenger-id` 
  			   GROUP BY `h`.`hk-id`";
	$query = mysqli_query($con, $command);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>All Passengers</title>
 </head>
 <body>
<?php if (isset($_GET['del'])) {?>
	<h4>House Keeping Deleted</h4>
<?php } ?>
<center><h3 style="margin-top: 20px; padding: 0px;"><?php echo $date2; ?></h3></center>
<div class="container" style="margin-top: 20px" id="customers">
<table class="table table-borderless table-dark" id="tab_customers">
	<?php if (mysqli_num_rows($query)) { ?>
  <thead>
    <tr>
      <th style="text-align: center;" scope="col">No</th>
      <th style="text-align: center;" scope="col">Name</th>
      <th style="text-align: center;" scope="col">Father Name</th>
      <th style="text-align: center;" scope="col">Province</th>
      <th style="text-align: center;" scope="col">District</th>
      <th style="text-align: center;" scope="col">Telephone</th>
      <th style="text-align: center;" scope="col">P.Count</th>
      <th style="text-align: center;" scope="col">Tazkera</th>
      <th style="text-align: center;" scope="col">Room No</th>
    </tr>
  </thead>
  <tbody><?php
           	if (mysqli_num_rows($query) > 0)  $nn = 1;{
        	while ($f = mysqli_fetch_assoc($query)){?>
      <tr style="text-align: center;">
  					<td><?php echo $nn;?></td>
  					<td><?php echo $f['name'];?></td>
  					<td><?php echo $f['father-name'];?></td>
  					<td><?php echo $f['province'];?></td>
  					<td><?php echo $f['district'];?></td>
  					<td><?php echo $f['telephone'];?></td>
  					<td><?php echo $f['passenger-count'];?></td>
  					<td><?php echo $f['tazkera'];?></td>
  					<td><?php echo $f['room-id'];?></td>
      </tr>
    <?php $nn++; }}}?>
  </tbody>
</table>

<!-- THIS FORM SEND YOU TO REPORT PAGE AT THE CURRENT DATE -->

<form action="report.php" target="_blank">
<input style="margin-top: 10px; padding-right: 20px; padding-left: 20px;" type="submit" class="btn btn-warning" value="PDF" name="sub">
</form>

<!-- THIS FORM GETS THE REPORT OF PASSENGERS AT THE GIVEN DATE -->

<form method="post">
  <div class="form-row">
    <div class="form-group col-md-4">
	<h4 style="margin-top: 50px;">Report of :</h4>
	<input  style="margin-top: 10px;" type="text" maxlength="10" class="form-control" placeholder="DD-MM-YYYY ex:(01-01-2020)" name="jow"> 
	<input style="margin-top: 10px;" type="submit" class="btn btn-danger" name="sub"><?php if(isset($_GET['empty'])){ echo "<span style='color:red; font-size:20px; margin-left:10px;'>Please enter a date!</span>"; } ?>
    </div>
</div>
</form>
<!-- ********************************************************************************************* -->
</div>
 </body>
 </html>
<?php }
 ob_flush();
 ?>
