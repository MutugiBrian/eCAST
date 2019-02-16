<?php 
include ('../includes/strings.php');

$instid = $_GET['instid'];
$query  = "SELECT * FROM departments WHERE instid = '$instid'";

$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);

   if (mysqli_connect_errno($conn)){
       return $a = array('error', 'Failed to connect to MySQL: ' . mysqli_connect_error());
   }else{
   if ($result = mysqli_query($conn,$query)){
      $rowcount = mysqli_num_rows($result);
      if ($result->num_rows > 0) {
      	 echo "<option value='' selected>Select your department</option>";
        while($row = $result->fetch_assoc()){

        echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
}else{
	echo "<option value='' selected>No Departments on Institution</option>";
}

    }else{
    echo "<option value='' selected>NO SUCCESS</option>";
  }
  mysqli_close($conn);
}



?>