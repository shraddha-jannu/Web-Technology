<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "1234", "WT");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$fullname = $_REQUEST['fullname'];
		$mobile = $_REQUEST['mobile'];
		$address = $_REQUEST['address'];
		$purpose = $_REQUEST['purpose'];
		$vehicle = $_REQUEST['vehicle'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO EPass VALUES ('$fullname',
			'$mobile','$address','$purpose','$vehicle')";
		
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
