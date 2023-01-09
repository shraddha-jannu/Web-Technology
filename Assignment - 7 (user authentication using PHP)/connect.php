<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "root", "WT");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$firstname = $_REQUEST['firstname'];
        $middlename = $_REQUEST['middlename'];
        $lastname = $_REQUEST['lastname'];
		$mobile = $_REQUEST['mobile'];
		$address = $_REQUEST['address'];
		$email = $_REQUEST['email'];
		$pass = $_REQUEST['pass'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO Student VALUES ('$firstname','$middlename', '$lastname',
			'$mobile','$address','$email','$pass')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully</h3>";

			
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
