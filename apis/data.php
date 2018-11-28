<?php

$servername = "fdb22.awardspace.net";
$username = "2878656_testpractise";
$password = "t1234567";

function get_price($name)
{
	$products = [
		"book"=>20,
		"pen"=>10,
		"pencil"=>5
	];
	
	foreach($products as $product=>$price)
	{
		if($product==$name)
		{
			return $price;
			break;
		}
	}
}

function getUserByEmail($email){
        
        try {
        
                $sev=$GLOBALS['servername'];
                $user = $GLOBALS['username'];
                $pass = $GLOBALS['password'];
                
                 
                $dbh = new PDO("mysql:host=$sev;dbname=2878656_testpractise", $user, $pass);
                $stmt = $dbh->prepare("SELECT * FROM Usersn where Email = ?");
                $stmt->execute([$email]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return json_encode($row); 
                
				        
		}catch(PDOException $e)
		{
                        echo "Retrieved data failed: " . $e->getMessage();
		}

}

function deleteUserByEmail($email){
        
        try {
        
                $sev=$GLOBALS['servername'];
                $user = $GLOBALS['username'];
                $pass = $GLOBALS['password'];
                
                 
                $dbh = new PDO("mysql:host=$sev;dbname=2878656_testpractise", $user, $pass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM Usersn where Email = '".$email."'";
                $dbh->exec($sql);
		return true; 
				        
		}catch(PDOException $e)
		{
                        return $e->getMessage();
		}

}



