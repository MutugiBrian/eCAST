
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
<form class="text-center border border-light px-5 pt-5 rounded needs-validation" novalidate>

    <p class="h4 mb-4 font-weight-bold" style="
<?php if(isset($hex3)){ ?>
color:<?php echo $hex3; ?> !important;
<?php }?>">Sign Up to <?php echo $sn; ?></p>

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
        <input type="text" class="form-control py-0" id="firstname"  placeholder="Firstname" required>
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
        <input type="text" class="form-control py-0" id="lastname"  placeholder="Lastname" required>
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
        <input type="email" class="form-control py-0" id="email"  placeholder="Email" required>
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
        <input type="number" class="form-control py-0" id="phoneno" length="9" placeholder="- - - - - - - - - " required>
        <div class="invalid-feedback">
          Please enter your phone number.
        </div>
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
        <input type="text" class="form-control py-0" id="regno"  placeholder="Registration/Admn. Number" required>
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
<input type="password" id="password" class="form-control"  placeholder="Password" aria-describedby="passwordHelpBlock" min-length="9" max-length="9" required>
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
<div class="invalid-feedback">
          Please confirm your password.
        </div>
<small id="passwordHelpBlock" class="form-text text-muted">
  Your password confirmation must match the set password.
</small>

      </div>
    </div>
        </div>
    </div>


    </div>








    <!-- Sign up button -->
    <center>


<button type="submit" class="btn btn-success btn-lg btn-rounded text-lg font-weight-bold" style="width:60% !important;<?php if(isset($dchex) & isset($hex3) ){ ?>
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
      }, false);
    });
  }, false);
})();
</script>