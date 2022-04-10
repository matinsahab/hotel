<?php
	session_start();
  ob_start();
	if(!((!isset($_SESSION['sadmin'])) || (!isset($_SESSION['scashier'])))){
		header('location: logout.php');
	}
	require('conn.php');
	include('cashiertop.php');
	if (isset($_POST['name'])) {
    $id4 = $_POST['yow'];
		$name = $_POST['name'];
		$fname = $_POST['father-name'];
		$gender = $_POST['gender'];
		$province = $_POST['province'];
		$district = $_POST['district'];
		$village = $_POST['village'];
		$telephone = $_POST['telephone'];
		$tazkera = $_POST['tazkera'];
		$update = "UPDATE `passenger-details` SET `name`='$name',`father-name`='$fname',`gender`='$gender',`province`='$province',`district`='$district',`village`='$village',`telephone`='$telephone',`tazkera`='$tazkera' WHERE `passenger-id` = '$id4'";
		$qupdate = mysqli_query($con, $update);
      if ($qupdate) {
        header('location: allpassengers.php?update');
    }
	}
if (isset($_GET['id'])) { 
      $id = $_GET['id'];
  $command = "SELECT * FROM `passenger-details` WHERE `passenger-id` = '$id'";
  $query = mysqli_query($con, $command);
  $fetch = mysqli_fetch_assoc($query);
  ?>
<form class="container" method="post" style="margin-top: 20px;">
 <h1 style="color: red; margin-bottom: 30px;">Update Customer</h1>
  <div class="form-row">
    <input type="hidden" value="<?php echo $fetch['passenger-id'] ?>" name="yow">
    <div class="form-group col-md-4">
      <label for="">Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $fetch['name']; ?>" id="">
    </div>
    <div class="form-group col-md-4">
      <label for="">F/Name</label>
      <input type="text" class="form-control" value="<?php echo $fetch['father-name']; ?>" name="father-name" id="">
    </div>
	<div class="form-group col-md-4">
      <label for="inputState">Gender</label>
      <select id="inputState" name="gender" class="form-control">
        <option selected value="<?php echo $fetch['gender']; ?>"><?php echo $fetch['gender']; ?></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
	<div class="form-group col-md-4">
      <label for="inputState">Province</label>
      <select id="inputState" name="province" class="form-control">
        <option selected value="<?php echo $fetch['province']; ?>"><?php echo $fetch['province']; ?></option>
            <option value="Orozgan">Orozgan</option>
            <option value="Baadghees">Baadghees</option>
            <option value="Baamyaan">Baamyaan</option>
            <option value="Badakhshaan">Badakhshaan</option>
            <option value="Baghlaan">Baghlaan</option>
            <option value="Balkh">Balkh</option>
            <option value="Parwan">Parwan</option>
            <option value="Paktiyaa">Paktiyaa</option>
            <option value="Paktikaa">Paktikaa</option>
            <option value="Panjshir">Panjshir</option>
            <option value="Takhar">Takhar</option>
            <option value="Jozjaan">Jozjaan</option>
            <option value="Khost">Khost</option>
            <option value="Daykondee">Daykondee</option>
            <option value="Zabul">Zabul</option>
            <option value="Sarepul">Sarepul</option>
            <option value="Samangaan">Samangaan</option>
            <option value="Ghazni">Ghazni</option>
            <option value="Ghor">Ghor</option>
            <option value="Faaryaab">Faaryaab</option>
            <option value="Farah">Farah</option>
            <option value="Kandahaar">Kandahaar</option>
            <option value="Kabul">Kabul</option>
            <option value="Kaapisaa">Kaapisaa</option>
            <option value="Kondoz">Kondoz</option>
            <option value="Konar">Konar</option>
            <option value="Laghmaan">Laghmaan</option>
            <option value="Logar">Logar</option>
            <option value="Nengarhaar">Nengarhaar</option>
            <option value="Noorestaan">Noorestaan</option>
            <option value="Nimroz">Nimroz</option>
            <option value="Wardak">Wardak</option>
            <option value="Herat">Herat</option>
            <option value="Helmand">Helmand</option> 
      </select>
    </div>
    <div class="form-group col-md-4">
      <label >District</label>
      <input type="text" class="form-control" value="<?php echo $fetch['district']; ?>" name="district" >
    </div>
    <div class="form-group col-md-4">
      <label for="">Village</label>
      <input type="text" class="form-control" value="<?php echo $fetch['village']; ?>" name="village">
    </div>
    <div class="form-group col-md-4">
      <label for="">Telephone</label>
      <input type="text" class="form-control" value="<?php echo $fetch['telephone']; ?>" name="telephone">
    </div>
    <div class="form-group col-md-4">
      <label for="">Tazkera</label>
      <input type="text" class="form-control" value="<?php echo $fetch['tazkera']; ?>" name="tazkera">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Update Customer</button>
</form>
<center>
  <?php } 
ob_flush();
?>