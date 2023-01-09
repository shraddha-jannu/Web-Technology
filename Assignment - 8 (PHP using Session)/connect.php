<?php
    $conn = mysqli_connect("localhost", "root", "root", "WT");

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
        . mysqli_connect_error());
    }

    // Taking all 5 values from the form data(input)
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phoneNum'];
    $password = $_POST['password'];

    // database insert SQL code
    $sql = "INSERT INTO `registration` (`name`, `username`, `email`, `phoneNum`, `password`) VALUES ('$name', '$username', '$email', '$phoneNum','$password')";

    $rs = mysqli_query($conn, $sql);

	if($rs)
	{
		include 'Profile.php';
		//echo "Done";
	}
	else{
		echo"not done";
	}

?>