<?php     

$con = mysqli_connect("localhost", "root", "", "ndere_boys" ) or die(mysqli_error());

$studentFName = mysqli_real_escape_string($con, $_POST['studentFName']);
$studentMName = mysqli_real_escape_string($con,$_POST['studentMName']);
$studentLName = mysqli_real_escape_string($con, $_POST['studentLName']);
$studentDOB = mysqli_real_escape_string($con,$_POST['studentDOB']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$studentCounty = mysqli_real_escape_string($con,$_POST['studentCounty']);
$formerInstitution = mysqli_real_escape_string($con,$_POST['formerInstitution']);
$classtoJoin = mysqli_real_escape_string($con,$_POST['classtoJoin']);
$parentName = mysqli_real_escape_string($con,$_POST['parentName']);
$mobileNumber = mysqli_real_escape_string($con,$_POST['mobileNumber']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$County = mysqli_real_escape_string($con,$_POST['County']);

mysqli_connect ("localhost","ndere_boys","") or die ('Error: ' . msqli_error());
mysqli_select_db ($con, "ndere_boys");

if ( $studentFName == "" || $studentMName == "" || $studentLName == ""|| $studentCounty == "" || $formerInstitution == "" || $classtoJoin == "" || $parentName == "" || $mobileNumber == "" || $email == "" || $County == "" )
{
Echo "Please fill the empty field!";
}
Else

$sql="insert into enrolment(studentFName, studentMName, studentLName, studentDOB, gender, studentCounty, formerInstitution, classJoin, parentName, mobileNumber, email, County ) values ('$studentFName','$studentMName', '$studentLName', '$studentDOB','$gender','$studentCounty','$formerInstitution','$classtoJoin','$parentName','$mobileNumber','$email','$County')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

echo "Record successfully inserted!<br>";
echo "Database updated with: '$studentFName','$studentMName', '$studentLName', '$studentDOB','$gender','$studentCounty','$formerInstitution','$classtoJoin','$parentName','$mobileNumber','$email','$County'<br>";
echo "You have updated database successfully!<a href=enrolment.html>Click Here to go back";


?>
