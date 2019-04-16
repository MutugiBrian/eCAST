<?php 


function makequery($query){

  include 'includes/strings.php';

   $conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);

   if (mysqli_connect_errno($conn)){
       return $a = array('error', 'Failed to connect to MySQL: ' . mysqli_connect_error());
   }else{
   if ($result = mysqli_query($conn,$query)){
      $rowcount = mysqli_num_rows($result);
      return  $a = array('success',$result, $rowcount);
      unset($_POST);
    }else{
      return $a  = array('error', $query, mysqli_error($conn)); 
  }

  mysqli_close($conn);
}
}

function endpost(){
	   unset($_POST);
unset($_REQUEST);
$_POST = array();
$_REQUEST = array();

if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = '';
}

}

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