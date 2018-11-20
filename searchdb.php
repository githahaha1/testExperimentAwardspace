<html>
<body>

<?php
$servername = "fdb22.awardspace.net";
$username = "2878656_testpractise";
$password = "t1234567";

$q = $_REQUEST["q"];

try {

        $dbh = new PDO("mysql:host=$servername;dbname=2878656_testpractise", $username, $password);
        $sth = $dbh->query("SELECT email FROM Usersn where Email = '$q'");
        $id = $sth->fetchColumn();
        
        if(strlen($id)>0){
             echo "exists";   
        }else{
             echo "none";
	}


/*
    $conn = new PDO("mysql:host=$servername;dbname=2878656_testpractise", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    
    
         $sss = 'sss';
	//$sql = "SELECT * FROM `Usersn` WHERE 1" ;
        $stmt = $conn->prepare("SELECT email FROM `Usersn` WHERE 'Email'!=:email");
        $stmt->bindParam(':email',$sss);
    $stmt->execute();
        
        while ($row = $stmt->fetch()) {
    print $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
  }
    
    */
        
        /*
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        
	if ($result->num_rows > 0) {
		echo "exists";
	}else{
		echo "Not exists";
	}
        */
        
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
$conn = null;	
	
?>


</body>
</html>