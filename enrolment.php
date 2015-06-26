<?php     

$con = mysqli_connect("localhost", "root", "", "ndere_boys" ) or die(mysqli_error());

$studentFName = mysqli_real_escape_string($con, $_POST['studentFName']);
$studentMName = mysqli_real_escape_string($con,$_POST['studentMName']);
$studentLName = mysqli_real_escape_string($con, $_POST['studentLName']);
$studentDOB = mysqli_real_escape_string($con,$_POST['studentDOB']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
//$gender = isset($con, $_POST['gender']);

//$gender = enum($con , $_POST['0','1']);
$studentCounty = mysqli_real_escape_string($con,$_POST['studentCounty']);
$formerInstitution = mysqli_real_escape_string($con,$_POST['formerInstitution']);
$classtoJoin = mysqli_real_escape_string($con,$_POST['classtoJoin']);
$parentName = mysqli_real_escape_string($con,$_POST['parentName']);
$mobileNumber = mysqli_real_escape_string($con,$_POST['mobileNumber']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$County = mysqli_real_escape_string($con,$_POST['County']);

//$image = addslashes(file_get_contents($_FILE['image']['tmp_name']));
//<img src="data:image/png;base64,'.base64_encode($row['image']).'">
//<img src="<?php echo $row[" images_path"];="" ?="">" alt="" />" >
//<input name="Upload Now" type="submit" value="Upload Image">
   

mysqli_connect ("localhost","ndere_boys","") or die ('Error: ' . msqli_error());
mysqli_select_db ($con, "ndere_boys");

if ( $studentFName == "" || $studentMName == "" || $studentLName == ""|| $studentDOB == "" || $gender == "" || $studentCounty == "" || $formerInstitution == "" || $classtoJoin == "" || $parentName == "" || $mobileNumber == "" || $email == "" || $County == "" )
{
Echo "Please fill the empty field!";
}
Else

$mysql_query="insert into enrolment(studentFName, studentMName, studentLName, studentDOB, gender, studentCounty, formerInstitution, classJoin, parentName, mobileNumber, email, County ) values ('$studentFName','$studentMName', '$studentLName','$studentDOB','$gender','$studentCounty','$formerInstitution','$classtoJoin','$parentName','$mobileNumber','$email','$County')";

if (!mysqli_query($con,$mysql_query)) {
  die('Error: ' . mysqli_error($con));
}

echo "Record successfully inserted!<br>";
echo "Database updated with: '$studentFName','$studentMName','$studentLName','$studentDOB','$gender','$studentCounty','$formerInstitution','$classtoJoin','$parentName','$mobileNumber','$email','$County'<br>";
echo "You have updated database successfully!<a href=enrolment.html>Click Here to go back";


?>
<table border="1" cellspacing="0" cellpadding="2" >
<thead>
	<tr>
		
		<th> studentFName </th>
		<th> studentMName </th>
		<th> studentLName </th>
		<th> studentDOB</th>
        <th> gender </th>
		<th> studentCounty </th>
		<th> formerInstitution </th>
        <th> classJoin </th>
		<th> parentName </th>
		<th> mobileNumber </th>
        <th> email </th>
        <th> County </th>
	</tr>
</thead>
<tbody>
	<?php
		//include('assets/php/mysqli_connect.php');
		//$con = mysqli_connect("localhost", "root", "", "ndere_boys" ) or die(mysqli_error());
		//include dirname('connect.php');
		$db = new PDO('mysql:host=localhost;dbname=ndere_boys','root','');

		//include(connect.php);
		//$query = "SELECT * FROM customer_registration ORDER BY ID DESC";
		//$result = $db->prepare("SELECT * FROM customer_registration WHERE ID = LAST_INSERT_ID()");
		//SELECT LAST_INSERT_ID() as ID FROM customer_registration;
		//$result = $db->prepare("SELECT * FROM customer_registration ORDER BY ID DESC");
		//$result = $db->prepare("SELECT LAST_INSERT_ID() as ID FROM customer_registration ");
		
		//confirm edit ID************************************************************
		$result = $db->prepare("SELECT * FROM enrolment ORDER BY enr_id DESC LIMIT 1");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		
		<td><?php echo $row['studentFName']; ?></td>
		<td><?php echo $row['studentMName']; ?></td>
        <td><?php echo $row['studentLName']; ?></td>
        <td><?php echo $row['studentDOB']; ?></td>
        <td><?php echo $row['gender']; ?></td>
		<td><?php echo $row['studentCounty']; ?></td>
        <td><?php echo $row['formerInstitution']; ?></td>
        <td><?php echo $row['classJoin']; ?></td>
		<td><?php echo $row['parentName']; ?></td>
        <td><?php echo $row['mobileNumber']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['County']; ?></td>
       
		<td><a href="editform.php?id=<?php echo $row['enr_id']; ?>"> Edit </a></td>
        
        
	</tr>
	<?php
		}
	?>
</tbody>
</table>