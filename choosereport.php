<?php 
  session_start();
require('admintop.php');
require('conn.php');
$usercommand = "SELECT `username`,`user-level` FROM `user-account` WHERE `user-level` = 'Cashier'";
$userquery = mysqli_query($con,$usercommand);
?>
<div class="container-fluid">
  <h2 style="color: red; margin-top: 20px;">Get report of prices, customers and rooms.</h2>
  <div class="row">
    <div class="col-md-4">
 		<form class="container well" action="areport.php" style="margin-top: 20px;">
 		 <div class="form-row">
 		   <div class="form-group col-md-12">
 		     <label style="color: #17a2b8;">View incomes from date :</label>
 		     <input type="text" class="form-control" placeholder="01-01-2020" name="name" maxlength="10">
 		     <label style="color: #17a2b8;">To :</label>
  		     <input type="text" class="form-control" placeholder="01-02-2020" name="name1" maxlength="10">
    	   </div>
 		 </div>
  		<button type="submit" class="btn btn-info">view</button>
		</form>
    </div>
    <div class="col-md-4">
 		<form class="container well" action="areport.php" style="margin-top: 20px;">
 		 <div class="form-row">
 		   <div class="form-group col-md-12">
 		     <label style="color: #17a2b8;">Customer History :</label>
 		     <input type="text" class="form-control" placeholder="Customer's ID" name="name2" maxlength="4" required>
 		     <label style="color: #17a2b8;">From date :</label>
  		     <input type="text" class="form-control" placeholder="01-02-2020" name="name3" maxlength="10" required>
    	   </div>
 		 </div>
  		<button type="submit" class="btn btn-info">view</button>
		</form>
    </div>
    <div class="col-md-4">
 		<form class="container well" action="areport.php" method="post" style="margin-top: 20px;">
 		 <div class="form-row">
 		   <div class="form-group col-md-12">
 		     <label style="color: #17a2b8;">Customers registered by:</label>
      <select id="inputState" name="user" class="form-control">
        <option selected>Choose...</option>
        <?php while ($user = mysqli_fetch_assoc($userquery)) { ?>
        <option value="<?php echo $user['username'] ?>"><?php echo $user['username'].' - '.$user['user-level']; ?></option>
        <?php } ?>
      </select>
      <label style="color: #17a2b8;">From date:</label>
  		     <input type="text" class="form-control" placeholder="01-02-2020" name="date" maxlength="10">
    	   </div>
 		 </div>
  		<button type="submit" class="btn btn-info">view</button>
		</form>
    </div>
  </div>
</div>
 <form class="container-fluid" method="post" style="margin-top: 30px;">
 <h3 style="color: red; margin-bottom: 0px;">Search for Customer's ID</h3>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label style="color: #17a2b8;">ID - Name - Tazkera</label>
      <input type="text" class="form-control" name="search" required>
      <input type="hidden" name="cool">
    </div>
  </div>
  <button type="submit" class="btn btn-info">Search</button>
</form>
</body>
</html>

<?php if (isset($_POST['search'])) {
    $d = $_POST['search'];
    $command = "SELECT * FROM `passenger-details`
    WHERE `passenger-id` LIKE '%$d%'
    OR `tazkera` LIKE '%$d%'
    OR `name` LIKE '%$d%'";
    $query = mysqli_query($con, $command);
?>


<div class="container" style="margin-top: 50px">
<table class="table table-borderless table-dark">
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
<?php $y++; ?>
  <?php }} ?>
      </tr>
  </tbody>
</table>
</div>
  <?php } ?>