<?php
	include("connect.php");
	$name=$_POST ['name'];
	$mobile=$_POST['mobile'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassord'];
	$address=$_POST['address'];
	$image=$_FILES['name']['photo'];
	$tmp_name=$_FILES['tmp_name']['photo'];
	$role=$_POST['role'];
	
	if($password==$cpassord)
	{
		move_uploaded_file($tmp_name,"../uploads/$image");
		$insert = mysqli_query($connect," INSERT INTO user( name, mobile, password,address, photo, role, status, votes) VALUES ('$name', '$mobile', '$password', '$address', '$image', '$role', 0, 0)");
		if($insert)
		{
			echo '
			<script>
				alert(" Registration Successfull!!!");
				window.location="../";
			</script>
			';
		}
		else{
			echo '
			<script>
				alert("Some error occured!");
				window.location="register.html";
			</script>
			';
			
		
		
	}
	else{
		echo '
			<script>
				alert("Wrong Password!!");
				window.location="register.html";
			</script>
			';
	}
?>