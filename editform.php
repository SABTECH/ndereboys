<?php
	include('connect.php');
	$id=$_GET['id'];
	//$result = $db->prepare("SELECT * FROM customer_registration WHERE ID= :userid");
	$result = $db->prepare("SELECT * FROM enrolment WHERE enr_id = :userid");
	//$result = $db->bindParam(':userid',$id);
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
Edit Form<br>
<input type="text" name="studentMName" value="<?php echo $row['studentFName']; ?>" /><br>
studentFName<br>
<input type="text" name="studentMName" value="<?php echo $row['studentMName']; ?>" /><br>
studentMName<br>
<input type="text" name="studentLName" value="<?php echo $row['studentLName']; ?>" /><br>
studentLName<br>
<input type="text" name="studentDOB" value="<?php echo $row['studentDOB']; ?>" /><br>
studentDOB<br>
<input type="text" name="gender" value="<?php echo $row['gender']; ?>" /><br>gender<br>
<input type="text" name="studentCounty" value="<?php echo $row['studentCounty']; ?>" /><br>
studentCounty<br>


<input type="text" name="formerInstitution" value="<?php echo $row['formerInstitution']; ?>" /><br>
formerInstitution<br>
<input type="text" name="classtoJoin" value="<?php echo $row['classJoin']; ?>" /><br>
classJoin<br>

<input type="text" name="parentName" value="<?php echo $row['parentName']; ?>" /><br>
parentName<br>

<input type="text" name="mobileNumber" value="<?php echo $row['mobileNumber']; ?>" /><br>
mobileNumber<br>

<input type="text" name="email" value="<?php echo $row['email']; ?>" /><br>
email<br>

<input type="text" name="County" value="<?php echo $row['County']; ?>" /><br>
County<br>

<input type="submit" value="Save" />
</form>
<?php
	}
?>