<?php 	
ob_start();
session_start();
require('conn.php');
include('cashiertop.php');
if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$fName = $_POST['fName'];
	$gender = $_POST['gender'];
	$province = $_POST['province'];
	$village = $_POST['village'];
	$district = $_POST['district'];
	$phone = $_POST['phone'];
	$tazkera = $_POST['tazkera'];

	$command =	"INSERT INTO `passenger-details`
				(`name`, `father-name`, `gender`,
				 `province`, `district`, `village`, `telephone`, `tazkera`)
				VALUES ('$name','$fName','$gender','$province',
				'$village','$district','$phone','$tazkera')";
	$query = mysqli_query($con, $command);
	if($query) echo "Successfully Inserted Customer";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sina Hotel</title>
</head>
<body>
<form class="container" method="post" style="margin-top: 20px;">
 <h1 style="color: red; margin-bottom: 30px;">Add Customer</h1>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Full Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group col-md-4">
      <label for="">F/Name</label>
      <input type="text" class="form-control" name="fName">
    </div>
  	<div class="form-group col-md-4">
      <label for="inputState">Gender</label>
      <select id="inputState" name="gender" class="form-control">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
      </select>
    </div>
    <div class="form-group col-md-4">
		<label for="">Province</label>
			<select name="province" class="form-control">
			<script language="javascript">
			var states = new Array("Badakhshan", "Badghis", "Baghlan", "Balkh", "Bamian", "Daykondi", "Farah", "Faryab", "Ghazni", "Ghowr", "Helmand", "Herat", "Jowzjan", "Kabul", "Kandahar", "Kapisa", "Khost", "Konar", "Kondoz", "Laghman", "Lowgar", "Nangarhar", "Nimruz", "Nurestan", "Oruzgan", "Paktia", "Paktika", "Panjshir", "Parvan", "Samangan", "Sar-e Pol", "Takhar", "Vardak", "Zabol");
			for(var hi=0; hi<states.length; hi++)
        if (states[hi] === 'Kabul') {
          document.write("<option Selected value=\""+states[hi]+"\">"+states[hi]+"</option>");
        } else
			document.write("<option value=\""+states[hi]+"\">"+states[hi]+"</option>");
			</script>
			</select>
	</div>
    <div class="form-group col-md-4">
      <label for="">Village</label>
      <input type="text" class="form-control" name="village">
    </div>
    <div class="form-group col-md-4">
      <label for="">District</label>
      <input type="text" class="form-control" name="district">
    </div>
    <div class="form-group col-md-4">
      <label for="">Phone</label>
      <input type="number" class="form-control" name="phone">
    </div>
    <div class="form-group col-md-4">
      <label for="">Tazkera-Passport</label>
      <input type="text" class="form-control" name="tazkera" required>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Welcome In</button>
</form>
</body>
</html>