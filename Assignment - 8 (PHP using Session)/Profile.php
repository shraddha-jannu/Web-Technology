<?php
    //Create connection
    $conn = mysqli_connect('localhost', 'root', 'root','WT');
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET["var1"])){
        $nm = $_GET["var1"];
        $dbinfo = "SELECT name,username,email from registration WHERE username = '$nm'";
        $dbresult = mysqli_query($conn, $dbinfo);
        $rt = mysqli_fetch_assoc($dbresult);

        $name = $rt['name'];
        $username = $rt['username'];
        $email = $rt['email'];

        //echo $username;
        //echo $email;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profileStyle.css">
    <title>User Profile</title>
    <script>
        var b = localStorage.getItem("username");
        window.location.href = "Profile.php?var1=" + b;
    </script>
</head>

<body>
<div class="card">
        <img src="images/userProfile.jpg" alt="John">
        <h1><?php echo $username;?></h1>
        <div class="title">
            <h3><?php echo $name;?></h3>
            <h3><?php echo $email;?></h3>
        </div>
        <p><button onclick="location.href='Logout.php'">Log Out
            </button></p>

    </div>

</body>
</html>

