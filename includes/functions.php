<?php 
class Calculation{
	public $no = 3;
	public function add ($a,$b){
		$c = $a + $b;
		echo $c;
	}
	public function subs ($a,$b){
		Calculation::multiply($a,$b);
	}
	public function multiply($a,$b){
		$c = $a * $b;
		echo $c;
	}
}




class DB{

public $conn;

function connectDB($query,$type){

	// Create connection
$conn = new mysqli($GLOBALS['server'], $GLOBALS['dbuser'], $GLOBALS['dbpass'],$GLOBALS['dbname']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	$results = $conn->query($query);

if($type == 'put'){

	if($results === TRUE){
		return "OK";
	}else{
		return "ERROR";
	}
}else{
	return $results;
}
} 

}

function putData($query,$type){
	DB::connectDB($query,$type);
}

}


?>