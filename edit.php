<?php
// configuration
//include('connect.php');
$db = new PDO('mysql:host=localhost;dbname=ndere_boys','root','');

//$conn = mysqli_connect("localhost", "root", "", "kephis" ) or die(mysqli_error());
// new data
//$name = $_POST['Name'];
$id=isset($_POST['enr_id']);
$studentFName =  isset($_POST['studentFName']);
$studentMName =  isset($_POST['studentMName']);
$studentLName =  isset($_POST['studentLName']);
$studentDOB=  isset($_POST['studentDOB']);
$gender =  isset($_POST['gender']);
$studentCounty =  isset($_POST['studentCounty']);
$formerInstitution =  isset($_POST['formerInstitution']);
$classtoJoin =  isset($_POST['classJoin']);
$parentName =  isset($_POST['parentName']);
$mobileNumber =  isset($_POST['mobileNumber']);
$email = isset($_POST['email']);
$County = isset($_POST['County']);
$id = isset($POST[':userid']);
//query
$sql = "UPDATE enrolment 
        SET studentFName=?, studentMName=?, studentLName=?, studentDOB=?,  gender=?, studentCounty=?, formerInstitution=?, classJoin=?, parentName=?, mobileNumber=?, email=?, County=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($id,$studentFName,$studentMName, $studentLName, $studentDOB,$gender,$studentCounty,$formerInstitution,$classtoJoin,$parentName,$mobileNumber,$email,$County));
//header("location: index.php");
 echo "Update complete <a href='index.html'>Click here to Exit</a>";
?>



		