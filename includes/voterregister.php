
<?php if(isset($_POST['voterregsubmit'])){

  $voterfn = $_POST['firstname'];
  $voterln = $_POST['lastname'];
  $voteremail = $_POST['email'];
  $voterpass = $_POST['password'];
  $voterphone = $_POST['phoneno'];
  $voterinst = $_POST['institution'];
  $voterregno = $_POST['regno'];
  $voterpass = $_POST['password'];




    // Create connection

      $conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
   
   if (mysqli_connect_errno($conn)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else{
   $sql = "SELECT * FROM usermaster WHERE phoneno = '$voterphone' AND password = '$voterpass'";
   
   if ($result = mysqli_query($conn,$sql)){
      $rowcount = mysqli_num_rows($result);
      if($rowcount >= 1){ 
        //if user exists?>


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
        //insert user


  $t = time();
  $sql= "INSERT INTO `usermaster` (`id`, `usertype`, `firstname`, `lastname`,`password`, `institution`, `regno`, `email`, `phoneno`,`createdat`) VALUES (NULL,'voter','$voterfn', '$voterln','$voterpass','$voterinst', '$voterregno' , '$voteremail', '$voterphone', '$t')";
   
   if ($result = mysqli_query($conn,$sql)){


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
   }else{
    //no results
    ?>




 <script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("please try again", "ERROR")

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
   }
   mysqli_close($conn);
 }

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


  

}
?>
<style>
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
<form class="text-center border border-light px-5 pt-5 rounded needs-validation" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="voterreg" novalidate>

    <p class="h4 mb-4 font-weight-bold" style="
<?php if(isset($hex3)){ ?>
color:<?php echo $hex3; ?> !important;
<?php }?>"><?php echo $sn; ?> voter registrations</p>

    <div class="border border-slight p-3 rounded mb-4 ig" >

    <div class="form-row">
        <div class="col-lg-6 col-sm-12 col-xl-6 col-md-6 m-0">
            <!-- First name -->
             <div class="">
      <!-- Default input -->
      <label class="sr-only" for="firstname">Firstname</label>
      <div class="input-group mb-4">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-user"></i></div>
        </div>
        <input type="text" class="form-control py-0" id="firstname" name="firstname" placeholder="Firstname" required>
        <div class="invalid-feedback">
          Please enter your firstname.
        </div>
      </div>
    </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-xl-6 col-md-6 m-0">
            <!-- Last name -->
           <div class="">
      <!-- Default input -->
      <label class="sr-only" for="lastname">Lastname</label>
      <div class="input-group mb-4">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-user"></i></div>
        </div>
        <input type="text" class="form-control py-0" id="lastname" name="lastname"  placeholder="Lastname" required>
        <div class="invalid-feedback">
          Please enter your lastname.
        </div>
      </div>
    </div>
        </div>
    </div>

    <!-- E-mail -->

    <div class="">
      <!-- Default input -->
      <label class="sr-only" for="email">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-envelope" ></i></div>
        </div>
        <input type="email" class="form-control py-0" id="email" name="email"  placeholder="Email" required>
        <div class="invalid-feedback">
          Please enter your email.
        </div>
      </div>
    </div>

  </div>

     
    <div class="border border-slight p-2 rounded mb-4 ig" >
    <div class="form-group ">
      <label for="phoneno" style="font-size:13px;">Phone Number</label>
      <div class="col-auto">
      <!-- Default input -->
      <label class="sr-only" for="phoneno">phone number</label>
      <div class="input-group ">
        <div class="input-group-prepend" style="background-color:white !important;">
          <div class="input-group-text font-weight-bold" style="background-color:white !important;color:<?php echo $dchex; ?>;">+254</div>
        </div>
        <input type="number" class="form-control py-0 " onkeyup="return test()" id="phoneno" name="phoneno" length="9" placeholder="- - - - - - - - - " required>
        <div class="invalid-feedback">
          Please enter last 9 digits for phone number.
        </div>
      </div>
    </div>
    </div>
    </div>
    

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="existmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: red !important;color:white !important;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">USER ALREADY EXISTS!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>


     

    <div class="border border-slight p-3 rounded mb-4 ig" >
      <!-- Default input -->
      <label class="sr-only" for="Institution">Institution</label>
      <div class="input-group mb-4" id="si">
        <div class="input-group-prepend">
          <div class="input-group-text" ><i class="fas fa-landmark"></i></div>
        </div>
        <select class="browser-default custom-select" id="institution" name="institution" style="font-size: 17px;" required>
  <option value="" selected>Choose your Institution</option>
  <option value="TUK">Technical University of Kenya</option>
  <option value="UoN">University of Nairobi</option>
  <option value="KU">Kenyatta University</option>
     </select>
     <div class="invalid-feedback">
          Please select your institution.
        </div>
      </div>
    


    <div class="">
      <!-- Default input -->
      <label class="sr-only" for="regno">Registration/Admn. Number</label>
      <div class="input-group ">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-address-card"></i></div>
        </div>
        <input type="text" class="form-control py-0" id="regno" name="regno"  placeholder="Registration/Admn. Number" required>
        <div class="invalid-feedback">
          Please enter your Reg/Admin. number.
        </div>
      </div>
    </div>

    </div>



    <div class="border border-slight p-3 rounded mb-4 ig" >


        <div class="form-row">
        <div class="col-lg-6 col-sm-12 col-xl-6 col-md-6 m-0">
            <!-- First name -->
             <div class="">
      <!-- Default input -->
      <label class="sr-only" for="password">Password</label>
      <div class="input-group ">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-key"></i></div>
        </div>
<input type="password" id="password" name="password" class="form-control" onkeyup="return pw()" placeholder="Password" aria-describedby="passwordHelpBlock" min-length="9" max-length="9" required>
<div class="invalid-feedback">
          Please set your password.
        </div>
 <small id="passwordHelpBlock" class="form-text text-muted">
  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters,
  or emoji.
</small>

      </div>
    </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-xl-6 col-md-6 m-0">
             <!-- First name -->
             <div class="">
      <!-- Default input -->
      <label class="sr-only" for="passc">Confirm Password</label>
      <div class="input-group ">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-key"></i></div>
        </div>
<input type="password" id="passc" class="form-control"  placeholder="Confirm Password" aria-describedby="passwordHelpBlock" required>
<div id="passchelp"  class="invalid-feedback">
          Please confirm your password.
        </div>
<small class="form-text text-muted">
  Your password confirmation must match the set password.
</small>

      </div>
    </div>
        </div>
    </div>


    </div>








    <!-- Sign up button -->
    <center>


<button type="submit" name="voterregsubmit" id="voterregsubmit" class="btn btn-success btn-lg btn-rounded text-lg font-weight-bold" style="width:60% !important;<?php if(isset($dchex) & isset($hex3) ){ ?>
background-color:<?php echo $hex3; ?> !important;
<?php } ?>"><i class="fas fa-check fa-2x pr-2"
        aria-hidden="true" style="font-size: 20px;<?php if(isset($dchex) & isset($hex3) ){ ?>
color:<?php echo $dchex; ?>
<?php } ?>"></i>SIGN UP</button>
    </center>


    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank"><span style="
<?php if(isset($dchex)){ ?>
color:<?php echo $dchex; ?> !important;
<?php }?> "> terms of service</span></a>

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
