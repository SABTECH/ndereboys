<?php     
error_reporting(0);
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

function GetImageExtension($imagetype)
	     {
	       if(empty($imagetype)) return false;
	       switch($imagetype)
	       {
	           case 'image/bmp': return '.bmp';
	           case 'image/gif': return '.gif';
	           case 'image/jpeg': return '.jpg';
	           case 'image/png': return '.png';
	           default: return false;
	       }
	     }
	if (!empty($_FILES["uploadedimage"]["name"])) {
		
	    $destination_path = "assets/img/";
	    
	    $file_name=$_FILES["uploadedimage"]["name"];
		
		$temp_name=$_FILES["uploadedimage"]["tmp_name"];
        $imagetype=$_FILES["uploadedimage"]["type"];
	    $ext= GetImageExtension($imagetype);
	    $imagename=date("Y-m-d")."-".time().$ext;
			 
	    $target_path = $destination_path.basename($file_name);
	    
		$date = date("Y-m-d");
		
		move_uploaded_file($temp_name,$target_path);
	
$query_upload  = "insert into enrolment(studentFName, studentMName, studentLName, studentDOB, gender, studentCounty, formerInstitution, classJoin, parentName, mobileNumber, email, County,image, images_path, submission_date ) values ('$studentFName','$studentMName','$studentLName','$studentDOB','$gender','$studentCounty','$formerInstitution','$classtoJoin','$parentName','$mobileNumber','$email','$County','$temp_name', '$target_path', '$date')";

 mysqli_query($con,$query_upload) or die("error in $query_upload == ----> 
    ".mysqli_error($con)); 

echo "Record successfully inserted!<br>Update complete <a href='enrolment.html'>Click here to Exit</a>";

	}else{
exit ("Error While uploading image on the server.<br> Please Fill the empty fields!<br><a href='enrolment.html'>Click here to Exit</a>");
	}
	
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
        <th> images_path </th>
	</tr>
</thead>
<tbody>
	<?php
		
		$db = new PDO('mysql:host=localhost;dbname=ndere_boys','root','');
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

        <td><img src= "<?php echo $row['images_path']; ?>" ></td> 
        <td><a href="editform.php?id=<?php echo $row['enr_id']; ?>"> Edit </a></td>
           
	</tr>
    
	<?php
		}
	?>
   
  
</tbody>
</table>
 