
<?php 
if(isset($_POST['loginsub'])){


  $reg = $_POST['reg'];
  $pass = $_POST['password'];
  $pass = md5($pass);



    // Create connection

  $conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
   
   if (mysqli_connect_errno($conn)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else{


   $sql = "SELECT * FROM usermaster WHERE regno = '$reg' AND password = '$pass'";
   
   if ($result = mysqli_query($conn,$sql)){
      $rowcount = mysqli_num_rows($result);
      if($rowcount >= 1){ 

          $log = "INSERT INTO `logs` (`id`, `user_reg`, `event`, `time`) VALUES (NULL, '".$reg."', 'LOGGED IN TO THE SYSTEM', CURRENT_TIMESTAMP)";
          $logresult = makequery($log);
        while($row = $result->fetch_assoc()) {

          

   $_SESSION['utype'] = $row["usertype"];
   $_SESSION['uid'] = $row["id"];


   if($_SESSION['utype'] == 'voter' || $_SESSION['utype'] == ''){

  $_SESSION['firstname'] = $row["firstname"];
  $_SESSION['lastname'] = $row["lastname"];

   }else{

  $_SESSION['iname'] =  $row["iname"];
  $_SESSION['iincharge'] =  $row["iincharge"];
  $_SESSION['initials'] = $row["initials"];

   }
 
  $_SESSION['regno'] = $row["regno"];
  $_SESSION['inst'] = $row["institution"];
  $_SESSION['email'] = $row["email"];
  $_SESSION['phone'] = $row["phoneno"];
  $_SESSION['loggedin'] = "TRUE";
  $loggedin = 'TRUE';



        }
        //if user exists?>
     <script type="text/javascript">
      window.location.href="?page=home";
    </script>

      <?php
      }else{
        //if no user fetched
        ?>

     <script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("wrong username or password", "ERROR")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
});

    $("#login").removeClass("was-validated");

   $(".is").addClass("is-invalid");
</script>



  
     <?php  }
   }else{
    //no results
    ?>




<script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("check details and try again", "ERROR")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
});

   $(".is").addClass("is-invalid");
</script>





    <?php
   }
   mysqli_close($conn);
 }}

// Check connection
/*    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
  $query = "SELECT * FROM usermaster WHERE phoneno = '$voterphone' AND password = '$voterpass'";
  $results = $conn->query($query);




  if($results->num_rows > 0){
    //WRITE USER ALREADY EXISTS ERROR CODE
    ?>


      <script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("", "USER ALREADY EXISTS")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "md-toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 2000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
});
</script>


     


     <?php
  }else{

  $message = "Success! You registered as : ".$voterfn." - ".$voterphone;
  $t = time();
  $query = "INSERT INTO `usermaster` (`id`, `firstname`, `lastname`,`password`, `institution`, `regno`, `email`, `phoneno`,`createdat`) VALUES (NULL, '$voterfn', '$voterln','$voterpass','$voterinst', '$voterregno' , '$voteremail', '$voterphone', '$t')";
  $pt = DB::putData($query,'put');
  if($pt === 'OK'){

  $_SESSION['utype'] = "voter";
  $_SESSION['fname'] = $firstname;
  $_SESSION['lname'] = $lastname;
  $_SESSION['inst'] = $voterinst;
  $_SESSION['regno'] = $voterregno;
  $_SESSION['inst'] = $voterinst;
  $_SESSION['email'] = $voteremail;
  $_SESSION['phone'] = $voterphone;
  $loggedin = 'TRUE';
    ?>




    <script type="text/javascript">
      window.location.href="index.php";
    </script>

   



  




    <?php

  }



  }



} */


  
?>
<style>
.far , .fas{
  font-size:23px !important;
}
.input-group-text{
background-color: <?php echo $dchex; ?> !important;
color:white;

}
.far{
    font-size:23px !important;
}
.ig{
    border-color:<?php echo $dchex; ?> !important;
    border-style:dotted !important;
}
.text-muted{
    font-size:11px !important;
}
.invalid-feedback{
    font-size:11px !important;
}
</style>

<div class="row p-0 m-0">
<div class="mt-5 px-lg-4 p-0 p-lg-2 col-md-12 col-lg-8 col-xl-8">


<!-- Default form register -->
<form class="text-center border border-light px-5 pt-5 rounded needs-validation" style="min-height:90vh;" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="login" novalidate>

    <p class="h4 mb-4 font-weight-bold" style="
<?php if(isset($hex3)){ ?>
color:<?php echo $hex3; ?> !important;
<?php }?>"><?php echo $sn; ?> LOGIN</p>
    <div class="border  p-2 rounded mb-4 ig card " >

    <div class="form-group ">
      <label for="phoneno" style="font-size:13px;">REGISTRATION No.</label>
      <div class="col-auto">
      <!-- Default input -->
        <label class="sr-only" for="email">Reg No.</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-user" ></i></div>
        </div>
        <input type="text" class="form-control py-0 is" id="reg" name="reg"  placeholder="Enter Reg No." required>
        <div class="invalid-feedback">
          Please enter your Reg No.
        </div>
      </div>
    </div>
    </div>

    <div class="form-group ">
      <label for="phoneno" style="font-size:13px;">PASSWORD</label>
      <div class="col-auto">
      <!-- Default input -->
        <label class="sr-only" for="email">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-key"></i></div>
        </div>
        <input type="password" class="form-control py-0 is" id="password" name="password"  placeholder="Enter Password" required>
        <div class="invalid-feedback">
          Please enter your password.
        </div>
      </div>
    </div>
    </div>



<center>
<button type="submit" name="loginsub" id="loginsub" class="btn btn-success btn-lg btn-rounded text-lg font-weight-bold py-0 mx-0 z-depth-1" style="margin:0px !important;width:180px !important;<?php if(isset($dchex) & isset($hex3) ){ ?>
background-color:<?php echo $hex3; ?> !important;
<?php } ?>"><i class="fas fa-check fa-2x pr-2"
        aria-hidden="true" style="font-size: 20px;<?php if(isset($dchex) & isset($hex3) ){ ?>
color:<?php echo $dchex; ?>
<?php } ?>"></i><br />
LOG IN</button>
</center>

    </div>


<!-- Button trigger modal -->


     









    <!-- Sign up button -->
  


    

    <!-- Terms of service -->
    <p>Enter <em>REGISTRATION</em> and <em>PASSWORD</em> to log in</p>

</form>
<!-- Default form register -->
</div>

<div class="col  p-3" >

<div class="m-xl-5 border border-light" style="min-height:90vh;
<?php if(isset($dchex)){ ?>
border-color:<?php echo $dchex; ?> !important">
<?php }else{ echo '>'; } ?>

CAMPAIGN / ADs SECTION

</div>

</div>
</div>
<script>
  function testagain(){
    var pn = $("#phoneno").val().length;
    if (pn !== 9){
      alert("phone number must be 9 numbers");
      return false
    }
  }
</script>
<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {


        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');

        var pn = $("#phoneno").val().length;
        if (pn !== 9){
        $("#voterreg").removeClass("was-validated"); 
        $("#phoneno").removeClass("is-valid"); 
        $("#phoneno").addClass("is-invalid");
        event.preventDefault();
        event.stopPropagation();
        }else{

        $("#phoneno").removeClass("is-invalid"); 
        $("#phoneno").addClass("is-valid");

        }





        var pw = $("#password").val().length;
        if (pw < 8){
        $("#voterreg").removeClass("was-validated"); 
        $("#password").removeClass("is-valid"); 
        $("#password").addClass("is-invalid");
        event.preventDefault();
        event.stopPropagation();
        }else{

        $("#password").removeClass("is-invalid"); 
        $("#password").addClass("is-valid");

        var passc = $("#passc").val();
        var pass = $("#password").val();

        if(passc !== pass){

        $("#passchelp").html("Confirmation and password dont match");

        $("#voterreg").removeClass("was-validated"); 
        $("#password").removeClass("is-valid"); 
        $("#password").addClass("is-invalid");
         $("#passc").removeClass("is-valid"); 
        $("#passc").addClass("is-invalid");
        event.preventDefault();
        event.stopPropagation();


        }

        }
    

        }, false);
        




    });
  }, false);
})();


</script>

<script type="text/javascript">
function test(){

   var pn = $("#phoneno").val().length;
        if (pn !== 9){
        $("#phoneno").removeClass("is-valid"); 
        $("#phoneno").addClass("is-invalid");
        }else{

        if(pn === 9){


         $('#phoneno').keypress(function(){


         if($(this).val().length < 9){
           return true;
        
         }else{
          return false;
        
         }

       
        

        }); 


        }

        $("#phoneno").removeClass("is-invalid"); 
        $("#phoneno").addClass("is-valid");

        }

}


</script>
