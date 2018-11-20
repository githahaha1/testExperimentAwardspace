<html>
<body>

<?php
$servername = "fdb22.awardspace.net";
$username = "2878656_testpractise";
$password = "t1234567";


try {
    $conn = new PDO("mysql:host=$servername;dbname=2878656_testpractise", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
           
    
    $sql = "INSERT INTO `Usersn` (`UserId`, `FirstName`, `LastName`, `Email`, `Passw`) VALUES (NULL, '".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["email"]."', '".$_POST["psw"]."');";
	$conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
$conn = null;	
	
?>


</body>
</html>