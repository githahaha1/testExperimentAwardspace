<?php
header("Content-Type:application/json");
require "data.php";



switch($_SERVER['REQUEST_METHOD']){

case 'GET':
     if(!empty(isset($_GET['email'])))
        {
                $email=$_GET['email'];
                if(empty($email))
                {
                         response(200,"user Not Found",NULL);
                        
                }
                else
                {
                        $data = getUserByEmail($email); 	
                        echo $data;
                                       
                }
                
        }
        else
        {
                response(400,"Invalid Request",NULL);
        }
     break;
     
case 'DELETE':       
     $query = $_SERVER['QUERY_STRING'];
     if ( !empty( $query ) )
    {
        $deleteString="";    
        foreach( explode('&', $query ) as $param )
        {
            list($k, $v) = explode('=', $param);
            $k = urldecode($k);
            $v = urldecode($v);
            
            //$deleteString = $deleteString."'".$k."'='".$v."' and ";
            
            if($k=='email'){
                $result = deleteUserByEmail($v);
                if($result){
                     response(200,"Delete user ".$v."sucessful" ,NULL);   
                }else{
                     response(500,"Delete user ".$v."failed" ,$result); 
                }
            
            }
            
        }
        echo $query;
    }
     break;
case 'POST':       
     echo $_SERVER['REQUEST_METHOD'];
     break;          
case 'PATCH':       
     echo $_SERVER['REQUEST_METHOD'];
     break;      
     
defult:
     echo "unknown method";   


}


function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
        
        
	echo $json_response;
}


/*

if(!empty(isset($_GET['name'])))
{
	$name=$_GET['name'];
	$price = get_price($name);
        $something = $_GET['something'];
	
	if(empty($price))
	{
		response(200,"Product Not Found",NULL);
                
                
	}
	else
	{
		response(200,"Product Found",$price,$something);
	}
	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data,$something)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
        $response['something']=$something;
	
	$json_response = json_encode($response);
	echo $json_response;
}

*/