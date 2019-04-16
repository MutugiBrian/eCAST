
<?php if(isset($_POST['voterregsubmit'])){




//upload image

    $target_dir = "images/uploads/profileimages/";
    $now = time();
$target_file = $target_dir.$now.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
         $imageerr =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
         $imageerr =  "File is not an image.";
        $uploadOk = 0;

    }
}



// Check if file already exists
if (file_exists($target_file)) {
     $imageerr =  "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
     $imageerr =  "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
     $imageerr =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $imageerr =  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $imageerr =  "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        $uploadOk = 1;
}else {
         $imageerr =  "Sorry, there was an error uploading your file.";
          $uploadOk = 0;
    }
}

///end of uploading image




















if($uploadOk == 1){

  $voterfn = $_POST['firstname'];
  $voterln = $_POST['lastname'];
  $voteremail = $_POST['email'];
  $voterpass = $_POST['password'];
  $voterphone = $_POST['phoneno'];
  $voterinst = $_POST['institution'];
  $voterregno = $_POST['regno'];
  $voterpass = $_POST['password'];
  $voterpass = md5($voterpass);
  $department = $_POST['department'];







    // Create connection

      $conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
   
   if (mysqli_connect_errno($conn)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else{
   $sql = "SELECT * FROM usermaster WHERE regno = '$voterregno' ";
   
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
  $log = "INSERT INTO `logs` (`id`, `user_reg`, `event`, `time`) VALUES (NULL, '".$voterregno."', 'CREATED AN ACCOUNT IN THE SYSTEM AS A VOTER', CURRENT_TIMESTAMP)";
  $logresult = makequery($log);
   
  $sql= "INSERT INTO `usermaster` (`id`, `usertype`, `firstname`, `lastname`,`image`,`password`, `institution`,`department`, `regno`, `email`, `phoneno`,`createdat`) VALUES (NULL,'voter','$voterfn', '$voterln','$target_file','$voterpass','$voterinst','$department', '$voterregno' , '$voteremail', '$voterphone', '$t')";
   
   if ($result = mysqli_query($conn,$sql)){


      $_SESSION['utype'] = "voter";
  $_SESSION['fname'] = $firstname;
  $_SESSION['lname'] = $lastname;
  $_SESSION['firstname'] = $firstname;
  $_SESSION['lastname'] = $lastname;
  $_SESSION['inst'] = $voterinst;
  $_SESSION['regno'] = $voterregno;
  $_SESSION['inst'] = $voterinst;
  $_SESSION['email'] = $voteremail;
  $_SESSION['phone'] = $voterphone;
  $loggedin = 'TRUE';
   $_SESSION['loggedin'] = "TRUE";

   $to = "+254".$voterphone;
   $m  = "Hello ".$firstname.", Welcome to eCAST online voting system.You've been successfully registered as a voter.We are free,fair and fast.";
   sendmessage($to,$m);


       
   $sql = "SELECT * FROM usermaster WHERE regno = '$voterregno' AND password = '$voterpass'";
   
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

}else{ ?>


 <script type="text/javascript">
  $(document).ready(function(){
  Command: toastr["error"]("failed to upload picture", "ERROR")

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


<?php }

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


  <?php /*var_dump($_POST);*/ ?>
<!-- Default form register -->
<form class="text-center border border-light px-5 pt-5 rounded needs-validation" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="voterreg" enctype="multipart/form-data" novalidate>

    <p class="h4 mb-4 font-weight-bold" style="
<?php if(isset($hex3)){ ?>
color:<?php echo $hex3; ?> !important;
<?php }?>"><?php echo $sn; ?> voter registrations</p>

    <div class="border border-slight p-3 rounded mb-4 ig" >

      <?php /*echo $imageFileType;*/ ?>

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


<div class="md-form">
  <div class="file-field">
    <div class="btn btn-primary btn-sm float-left" style="background-color: <?php echo $dchex; ?> !important;">
      <span>Set Picture</span>
      <input type="file" id="image" name="image"  accept='image/*' >
    </div>
    <div class="file-path-wrapper">
      <input class="file-path " type="text" placeholder="Upload your profile picture" readonly required>
       <div class="invalid-feedback">
          Please upload your profile picture.
        </div>
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


      <select class="mdb-select md-form">
  <option value="" disabled selected>Choose your option</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>

      <div class="input-group mb-4" id="si">
        <div class="input-group-prepend">
          <div class="input-group-text" ><i class="fas fa-landmark"></i></div>
        </div>
        <select class="browser-default custom-select mdb-select"  searchable="Search here.." id="institution" name="institution" style="font-size: 17px;" required>
          <option value="" selected>Choose your Institution</option>
          <?php 
          if ($ina->num_rows > 0) {
        while($row = $ina->fetch_assoc()){
          ?>
           <option value="<?php echo $row["id"]; ?>"><?php echo $row["iname"]; ?></option>
        <?php }} ?>
     </select>






     <div class="invalid-feedback">
          Please select your institution.
        </div>
      </div>


      <div class="input-group mb-4" id="sd" style="display: none;">
        <div class="input-group-prepend">
          <div class="input-group-text" ><i class="fas fa-building"></i></div>
        </div>
        <select class="browser-default custom-select mdb-select"  searchable="Search here.." id="department" name="department" style="font-size: 17px;" required>
          <option value="" selected>Choose your Department </option>
          
     </select>






     <div class="invalid-feedback">
          Please select your department.
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
<input type="password" id="passc" class="form-control"  placeholder="Confirm Password" aria-describedby="ch" min-length="9" max-length="9"  required>
<div id="passchelp"  class="invalid-feedback">
          Please confirm your password.
        </div>
<small id="ch"class="form-text text-muted">
   Please confirm your password.
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

           var pc = $("#image").val();
        if(!pc.match(/(?:gif|jpg|png|bmp)$/)){
          $("#image").removeClass("is-valid"); 
           $("#image").removeClass("valid"); 
          $("#image").addClass("invalid");
           event.preventDefault();
        event.stopPropagation();
        }else{

          $("#image").addClass("is-valid"); 
           $("#image").addClass("valid"); 
          $("#image").removeClass("invalid");

        }

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
       /*var pc = $("#pic").val();
        if(!pc.match(/(?:gif|jpg|png|bmp)$/)){
          $("#pic").removeClass("is-valid"); 
          $("#pic").addClass("is-invalid");
           event.preventDefault();
        event.stopPropagation();
        }
        alert(pc);*/
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
<script type="text/javascript">
 $('.mdb-select').materialSelect();




   $(document).ready(function() {



 });
</script>
<script type="text/javascript">
    $('#institution').change(function() {

    instid = $('#institution').val();

//alert(instid);

if(instid === ''){
  $("#sd").css("display","none");
}else{
  $("#department option").remove();
     var nc = 'ajax/getdepartments.php?instid=' + instid;
     $('#department').load('ajax/getdepartments.php?instid=' + instid);
 $('#department').load('ajax/getdepartments.php?instid=' + instid);
 wto = setTimeout(function() {
  
   $('#department').material_select('destroy');   
$('#department').load('ajax/getdepartments.php?instid=' + instid);
$('#department').material_select();
$('#department').load('ajax/getdepartments.php?instid=' + instid);
    
}, 500);
 $("#sd").css("display","flex");
}



 /* $(function () {
        $.ajax({
            url: 'ajax/getdepartments.php?instid=' + instid,
            dataType: "html",
            type: "GET",
            success: function (data) {
                alert(data);
            },
            error(jqXHR, textStatus, errorThrown) {
                alert(errorThrown)
            }
        });
    });*/
   

  });
</script>
