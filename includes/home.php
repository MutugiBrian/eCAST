<?php 
$ut = $_SESSION['utype'];

if(isset($_POST['newelec'])){ 


   $elecname = $_POST['elecname'];
   $deptid = $_POST['deptid2'];


   $elecstartT = $_POST['elecstarttime'];
  $elecendT = $_POST['elecendtime'];
    $elecstartD = $_POST['elecstart'];
  $elecendD = $_POST['elecend'];


$d = sprintf('%s %s', $elecstartD, $elecstartT);
$dt = DateTime::createFromFormat('d-m-Y H:i',  $d);
$elecstart = $dt->getTimestamp();

$d = sprintf('%s %s', $elecendD, $elecendT);
$dt = DateTime::createFromFormat('d-m-Y H:i',  $d);
$elecend = $dt->getTimestamp();


  $elecannounce = strtotime($_POST['elecannounce']);
  $uid = $_SESSION['uid'];
  $now = time();


  $query = "INSERT INTO `elections` (`id`, `instid`,`deptid`, `name`, `startdate`, `enddate`, `announcedate`, `createdby`, `createdat`, `updatedat`) VALUES (NULL, '".$uid."','".$deptid."', '".$elecname."', '".$elecstart."', '".$elecend."', '".$elecannounce."', ".$uid.", '".$now."', '".$now."')";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?home";
  Command: toastr["success"]("", "NEW ELECTION CREATED")

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
  endpost(); 
}else{
  ?>

   <script type="text/javascript">
  $(document).ready(function(){

    window.location.href = "?home";
  Command: toastr["error"]("", "ERROR CREATING ELECTION")

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
  endpost();
}
?>

<?php

}

if(isset($_POST['newdep'])){
  $depname = $_POST['depname'];
  $dephod = $_POST['dephod'];
  $depemail = $_POST['depemail'];
  $depphone = $_POST['depphone'];
  $uid = $_SESSION['uid'];


  $query = "INSERT INTO `departments` ( `instid`,`name`, `hod`, `hodemail`, `hodphone`, `createdby`, `updatedby`) VALUES (  ".$uid.",'".$depname."', '".$dephod."', '".$depemail."', '".$depphone."', ".$uid.", ".$uid.")";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?home";
  Command: toastr["success"]("", "NEW DEPARTMENT CREATED")

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
  endpost(); 
}else{
  ?>

   <script type="text/javascript">
  $(document).ready(function(){

    window.location.href = "?home";
  Command: toastr["error"]("", "ERROR")

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
  endpost();
}
?>

<?php
}

if(isset($_POST['deldep'])){

    $deptid = $_POST['deptid'];
  $query = "UPDATE `departments` SET `deleted` = '1' WHERE `departments`.`id` = '".$deptid."' ";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?home";
  Command: toastr["success"]("", "DEPARTMENT DELETED")

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
  endpost(); 
}else{
  ?>

   <script type="text/javascript">
  $(document).ready(function(){

    window.location.href = "?home";
  Command: toastr["error"]("", "ERROR")

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
  endpost();
}
?>

<?php


}


if(isset($_POST['delelec'])){

    $elecid = $_POST['elecid'];
  $query = "UPDATE `elections` SET `deleted` = '1' WHERE `elections`.`id` = '".$elecid."' ";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?home";
  Command: toastr["success"]("", "ELECTION DELETED")

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
  endpost(); 
}else{
  ?>

   <script type="text/javascript">
  $(document).ready(function(){

    window.location.href = "?home";
  Command: toastr["error"]("", "ERROR DELETING ELECTION")

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
  endpost();
}
?>

<?php


}


if($ut == 'institution'){







?>
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.ab{
 border-color:<?php echo $hex3; ?> !important;
 color:<?php echo $hex3; ?> !important;
}
.mb{
 border-color:<?php echo $dchex; ?> !important;
 color:<?php echo $dchex; ?> !important;
}
.mbd{
 border-color:red !important;
 color:red !important;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
a.h{
color: <?php echo $dchex; ?> !important; 
}
.mi{
color: <?php echo $dchex; ?> !important;  
}
.cf .card-body .fas{
  color : <?php echo $dchex; ?> !important;
}
.cf .card-body .far{
  color : <?php echo $dchex; ?> !important;
}
@media(min-width: 801px){
 .ac{
  font-size:75px;
} 
.dl{
  font-size:15px;
}
}
@media(max-width: 801px){
 .ac{
  font-size:25px;
} 
}
.af{
  color:<?php echo $hex3; ?> !important;
  font-weight:bold;
;
}
  </style>



 <div class="modal fade" id="deletedepartmentform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" 
style="border-color:red!important;border-width: 3px !important;"
>
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 font-weight-bold">DELETE DEPARTMENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 h6">
      ARE YOU SURE YOU WANT TO DELETE <span id="deptname" style="color: red !important;"></span> ?
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <form id="deletedpt" action="" method="post">
          <input type="hidden" name="deptid" id="deptid"/>
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb" data-dismiss="modal">NO <i class="fas fa-paper-plane-o ml-1"></i></button>
        <button class="btn btn-outline-danger waves-effect my-0 z-depth-0 mbd" type="submit" name="deldep" id="deldep">YES <i class="fas fa-paper-plane-o ml-1"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteelectionform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" 
style="border-color:red!important;border-width: 3px !important;"
>
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 font-weight-bold">DELETE ELECTION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 h6">
      ARE YOU SURE YOU WANT TO DELETE <span id="elecname" style="color: red !important;"></span> ?
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <form id="deleteelec" action="" method="post">
          <input type="hidden" name="elecid" id="elecid"/>
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb" data-dismiss="modal">NO <i class="fas fa-paper-plane-o ml-1"></i></button>
        <button class="btn btn-outline-danger waves-effect my-0 z-depth-0 mbd" type="submit" name="delelec" id="delelec">YES <i class="fas fa-paper-plane-o ml-1"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>


  <div class="modal fade" id="newelectionform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">CREATE ELECTION</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="" id="newelection" name="newelection" class="needs-validation">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-vote-yea prefix mi"></i>
          <input type="text" id="elecname" name="elecname"  class="form-control" required>
          <label data-error="wrong" data-success="right" for="form3">ELECTION NAME</label>
        </div>

          
          
          <?php
        $dna->data_seek(0); 
           if ($dna->num_rows > 0) {
            ?>
            <div class="md-form mb-5">
          <i class="fas fa-building prefix mi"></i>
            <select class="mdb-select ml-5" id="deptid2" name="deptid2">
          <option value="0">ALL DEPARTMENTS</option>
          <?php 
          while($row = $dna->fetch_array()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          ?>
          <option value="<?php echo$row['id']?>"><?php echo$row['name']?></option>

          <?php
          }
          ?>
             </select>
           </div>

          <?php
          } 
          ?>
        

        <div class="row">
         <div class="md-form mb-5 col">
          <i class="fas fa-hourglass-start prefix mi"></i>
          <input type="date" id="elecstart" name="elecstart" class="form-control datepicker edp" required>
          <label data-error="wrong" data-success="right" for="form3">START DATE</label>
        </div>
         <div class="md-form mb-5 col">
          <i class="far fa-clock prefix mi"></i>
       <input type="text" id="elecstarttime" name="elecstarttime" class="form-control timepicker" >
     <label data-error="wrong" data-success="right" for="form3">START TIME</label>

        </div>


      </div>
       
       <div class="row">
         <div class="md-form mb-5 col">
          <i class="fas fa-hourglass-end prefix mi"></i>
          <input type="date" id="elecend" name="elecend" class="form-control datepicker edp" required>
          <label data-error="wrong" data-success="right" for="form3">END DATE</label>
        </div>
         <div class="md-form mb-5 col">
          <i class="far fa-clock prefix mi"></i>
       <input type="text" id="elecendtime" name="elecendtime" class="form-control timepicker">
     <label data-error="wrong" data-success="right" for="form3">END TIME</label>

        </div>
      </div>



         <div class="md-form mb-5">
          <i class="fas fa-bullhorn prefix mi"></i>
          <input type="text" id="elecannounce" name="elecannounce" class="form-control datepicker edp" required>
          <label data-error="wrong" data-success="right" for="form3">ANNOUNCEMENT DATE</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb" type="submit" name="newelec" id="newelec">CREATE <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>


    </form>
    <script type="text/javascript">
      $(newelec).click(function (){

        var sd = $(elecstart).val();
        var ed = $(elecend).val();
        var ea = $(elecannounce).val();
        var en = $(elecname).val();

        if(sd === '' || ed === ''|| ea === ''){

           Command: toastr["error"]("", "fill in all fields")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "md-toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 100,
  "extendedTimeOut": 100,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


return false;

        }else{
          /*alert(sd);*/
         $(newelection).submit();
        }
      });
    </script>
    </div>
  </div>
</div>

   <div class="modal fade" id="newdepartmentform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">CREATE DEPARTMENT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="" id="newdepartment" name="newdepartment" class="needs-validation">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-building prefix mi"></i>
          <input type="text" id="depname" name="depname"  class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="form3">DEPARTMENT NAME</label>
        </div>

         <div class="md-form mb-5">
          <i class="fas fa-user prefix mi"></i>
          <input type="text" id="dephod" name="dephod" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="form3">HEAD OF DEPARTMENT / DIRECTOR</label>
        </div>

         <div class="md-form mb-5">
          <i class="fas fa-envelope prefix mi"></i>
          <input type="email" id="depemail" name="depemail" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="form3">H.O.D EMAIL</label>
        </div>
         <div class="md-form mb-5">
          <i class="fas fa-phone prefix mi"></i>
          <input type="text" id="depphone" name="depphone" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="form3">H.O.D PHONE NUMBER</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb" type="submit" name="newdep" id="newdep">CREATE <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </form>
    </div>
  </div>
</div>



   <div class="modal fade" id="newelectionform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">CREATE ELECTION</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="POST" action="" id="newelection" name="newelection" class="needs-validation">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="form3" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form3">ELECTION NAME</label>
        </div>

         <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="date" id="form3" class="form-control " required>
          <label data-error="wrong" data-success="right" for="form3">START DATE</label>
        </div>

         <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="date" id="form3" class="form-control" required>
          <label data-error="wrong" data-success="right" for="form3">END DATE</label>
        </div>

         <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="date" id="form3" class="form-control" required>
          <label data-error="wrong" data-success="right" for="form3">RESULTS DATE</label>
        </div>

      </div>
    </form>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb">CREATE <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </div>
  </div>
</div>



    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn" style="margin-top:80px !important;">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="?" class="h">ADMIN PANEL</a>
         
          </h4>


          <?php 
          //var_dump($enac);
          ?>

          <h4 class="d-flex mb-2 mb-sm-0 pt-1">
            <!-- Default input -->
            <?php if($ut == 'institution') { 
              echo $_SESSION['iname'];
          }else{
            echo 'Welcome, '.$_SESSION['firstname'];
          }?>
          </h4>

        </div>

      </div>
      <!-- Heading -->


     <div class="container-fluid  ">
      <div class="row mb-3 text-center cf">
     
     <?php
      if($_SESSION['utype'] == 'voter' ||  $_SESSION['utype'] == '' ) {
     ?>
     <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-university"></i> 5
          </div>
          <div class="card-footer text-center af">
          INSTITUTIONS
          </div>
        </div>
      </div>



     <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
          <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-fist-raised"></i> 0
          </div>
          <div class="card-footer text-center af">
          ASPIRATIONS
          </div>
        </div>
      </div>


      <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
          <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-check-square"></i> 3
          </div>
          <div class="card-footer text-center af">
          ONGOING ELECTIONS
          </div>
        </div>
      </div>


       <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image ">
          <div class="card-body text-center ac">
           <i class="far fa-calendar-check"></i> 1
          </div>
          <div class="card-footer text-center af">
          COMING ELECTIONS
          </div>
        </div>
      </div>


       <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image">
          <div class="card-body text-center ac">
            <i class="fas fa-archive"></i> 2
          </div>
          <div class="card-footer text-center af">
          ENDED ELECTIONS
          </div>
        </div>
      </div>


       <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image">
          <div class="card-body text-center ac">
            <i class="fas fa-bell"></i> 9
          </div>
          <div class="card-footer text-center af">
          ANNOUNCEMENTS
          </div>
        </div>
      </div>

    <?php }elseif($_SESSION['utype'] == 'institution'){ ?>



         <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image ">
          <div class="card-body text-center ac">
          <i class="fas fa-users"></i> <?php echo $voters; ?>
          </div>
          <div class="card-footer text-center af">
          VOTER<?php if($voters>1){echo"S";}?>
          </div>
        </div>
      </div>

        <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image">
          <div class="card-body text-center ac">
            <i class="fas fa-building"></i> <?php echo $departments; ?>
          </div>
          <div class="card-footer text-center af">
          DEPARTMENT<?php if($departments>1){echo"S";}?>
          </div>
        </div>
      </div>




     <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
          <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-fist-raised"></i> 10
          </div>
          <div class="card-footer text-center af">
          ASPIRANTS
          </div>
        </div>
      </div>


      <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
          <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-check-square"></i> <?php echo $ongoingelections; ?>
          </div>
          <div class="card-footer text-center af">
          ONGOING ELECTION<?php if($ongoingelections>1){echo"S";}?>
          </div>
        </div>
      </div>


       <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image ">
          <div class="card-body text-center ac">
           <i class="far fa-calendar-check"></i> <?php echo $upcomingelections; ?>
          </div>
          <div class="card-footer text-center af">
          UPCOMING ELECTION<?php if($upcomingelections>1){echo"S";}?>
          </div>
        </div>
      </div>


       <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image">
          <div class="card-body text-center ac">
            <i class="fas fa-archive"></i> <?php echo $endedelections; ?>
          </div>
          <div class="card-footer text-center af">
          ENDED ELECTION<?php if($endedelections>1){echo"S";}?>
          </div>
        </div>
      </div>


     


    <?php } ?>



      </div>
    </div>



    <hr />


    <?php if($_SESSION['utype'] == 'institution'){ ?> 

   <div class="container-fluid  ">
      <div class="row mb-3 text-center cf card-deck">

  
    <!--    <div class="card border border-success col-12 col-lg-6 col-xl-6" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      ACTIONS  <span class="text-right float-right" style="float:right"><i class="fas fa-cog"></i></span>
    </div>
    <div class="card-body">
    <div class="row text-center d-flex align-items-center">
    <center>
    <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2" data-toggle="modal" data-target="#newelectionform"> CREATE NEW ELECTION </button>
     <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2"> CREATE ELECTION POST </button>
      <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2"> END ELECTION </button>
       <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2"> MAKE ANNOUNCEMENT </button>


    </center>
    </div>
    <hr />
    </div>
    </div> -->




       <div class="card border border-success col-12 col-lg-6 col-xl-6" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      DEPARTMENTS  <span class="text-right float-right" style="float:right"><i class="fas fa-building"></i></span>
    </div>
    <div class="card-body">
    <div class=" text-left list-group list-group-flush">


      <?php

       $dna->data_seek(0); 
      if ($dna->num_rows > 0) {
        while($row = $dna->fetch_assoc()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          ?>
          <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl"><?php echo $row["name"]; ?> 
          <span class="badge badge-primary badge-pill pull-right"><?php echo $row["voters"]; ?></span>
          <a style="color:red !important;right:0;" onclick="deletedept(<?php echo $row["id"];?>,'<?php echo $row["name"];?>')"><i class="fas fa-trash-alt float-right" style="color:red !important;"></i></a>
          </div>
          <?php
          }
        }else{?>

            <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO DEPARTMENTS CREATED YET
          </div>

        <?php }

       ?>


     
     
    </div>
     <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2" data-toggle="modal" data-target="#newdepartmentform" style="float: right;width: 200px;"> CREATE NEW DEPARTMENT </button> 
    
    </div>
    </div>




       <div class="card border border-success col-12 col-lg-6 col-xl-6" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      ELECTIONS  <span class="text-right float-right" style="float:right"><i class="fas fa-vote-yea"></i></span>
    </div>
    <div class="card-body">
    <div class=" text-left list-group list-group-flush">


      <?php


      if ($enac->num_rows > 0) {
        while($row = $enac->fetch_assoc()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          ?>
          <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl">
            <a href="?page=election&elecid=<?php echo $row["id"];?>&elecname=<?php echo $row["name"]; ?>&elecdept=<?php echo $row["deptid"]; ?>" style="color:black !important;"><?php echo $row["name"]; ?>
            </a> 
          <span class="badge badge-primary badge-pill pull-right"><?php echo $row["voters"]; ?></span>
          <a style="color:red !important;right:0;" onclick="deleteelec(<?php echo $row["id"];?>,'<?php echo $row["name"];?>')"><i class="fas fa-trash-alt float-right" style="color:red !important;"></i></a>
          </div>
          <?php
          }
        }else{?>

            <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO ELECTIONS CREATED YET
          </div>

        <?php }

       ?>


     
     
    </div>
     <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2" data-toggle="modal" data-target="#newelectionform" style="float: right;width: 200px;"> CREATE NEW ELECTION </button> 
    
    </div>
    </div>




</div>
</div>









    <?php } ?>


     
      


      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <canvas id="myChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
          <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header text-center">
              Pie chart
            </div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="pieChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">

              <!-- List group links -->
              <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action waves-effect h">Sales
                  <span class="badge badge-success badge-pill pull-right">22%
                    <i class="fas fa-arrow-up ml-1"></i>
                  </span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect h">Traffic
                  <span class="badge badge-danger badge-pill pull-right">5%
                    <i class="fas fa-arrow-down ml-1"></i>
                  </span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect h">Orders
                  <span class="badge badge-primary badge-pill pull-right">14</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect h">Issues
                  <span class="badge badge-primary badge-pill pull-right">123</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect h">Messages
                  <span class="badge badge-primary badge-pill pull-right">8</span>
                </a>
              </div>
              <!-- List group links -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <!-- Table  -->
              <table class="table table-hover">
                <!-- Table head -->
                <thead class="blue-grey lighten-4">
                  <tr>
                    <th>#</th>
                    <th>Lorem</th>
                    <th>Ipsum</th>
                    <th>Dolor</th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Cell 1</td>
                    <td>Cell 2</td>
                    <td>Cell 3</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Cell 4</td>
                    <td>Cell 5</td>
                    <td>Cell 6</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Cell 7</td>
                    <td>Cell 8</td>
                    <td>Cell 9</td>
                  </tr>
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table  -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <!-- Table  -->
              <table class="table table-hover">
                <!-- Table head -->
                <thead class="blue lighten-4">
                  <tr>
                    <th>#</th>
                    <th>Lorem</th>
                    <th>Ipsum</th>
                    <th>Dolor</th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Cell 1</td>
                    <td>Cell 2</td>
                    <td>Cell 3</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Cell 4</td>
                    <td>Cell 5</td>
                    <td>Cell 6</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Cell 7</td>
                    <td>Cell 8</td>
                    <td>Cell 9</td>
                  </tr>
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table  -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Line chart</div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="lineChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Radar Chart</div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="radarChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Doughnut Chart</div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="doughnutChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Horizontal Bar Chart</div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="horizontalBar"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Google map</div>

            <!--Card content-->
            <div class="card-body">
              <!--Google map-->
              <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
                <iframe src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                  style="border:0" allowfullscreen></iframe>
              </div>

              <!--Google Maps-->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!--Section: Modals-->
            <section>

              <!-- Frame Modal Top Info-->
              <div class="modal fade top" id="frameModalTopInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                      <div class="row d-flex justify-content-center align-items-center">

                        <p class="pt-3 pr-2">Lorem ipsum dolor sit amet, consectetur
                          adipisicing elit. Impedit nisi quo
                          provident fugiat reprehenderit nostrum quos..</p>

                        <a role="button" class="btn btn-info h">Get it now
                          <i class="far fa-gem ml-1"></i>
                        </a>
                        <a role="button" class="btn btn-outline-info waves-effect h" data-dismiss="modal">No,
                          thanks</a>
                      </div>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Frame Modal Bottom Success-->

              <!-- Frame Modal Bottom Success-->
              <div class="modal fade bottom" id="frameModalBottomSuccessDemo" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-frame modal-bottom modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body">
                      <div class="row d-flex justify-content-center align-items-center">

                        <p class="pt-3 pr-2">Lorem ipsum dolor sit amet, consectetur
                          adipisicing elit. Impedit nisi quo
                          provident fugiat reprehenderit nostrum quos..</p>

                        <a role="button" class="btn btn-success h">Get it now
                          <i class="far fa-gem ml-1"></i>
                        </a>
                        <a role="button" class="btn btn-outline-success waves-effect h" data-dismiss="modal">No, thanks</a>
                      </div>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Frame Modal Bottom Success-->

              <!-- Side Modal Top Right Success-->
              <div class="modal fade right" id="sideModalTRSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Success</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-success h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-success waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Side Modal Top Right Success-->

              <!-- Side Modal Top Left Info-->
              <div class="modal fade left" id="sideModalTLInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-top-left modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Info</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <img src="https://mdbootstrap.com/wp-content/uploads/2016/11/admin-dashboard-bootstrap.jpg" alt="Material Design for Bootstrap - dashboard"
                        class="img-fluid">

                      <div class="text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt
                          vero illo
                          error eveniet cum.
                        </p>
                      </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-info h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-info waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Side Modal Top Left Info-->

              <!-- Side Modal Bottom Right Danger-->
              <div class="modal fade right" id="sideModalBRDangerDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading">Modal Danger</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-3">
                          <p></p>
                          <p class="text-center">
                            <i class="fas fa-shopping-cart fa-4x"></i>
                          </p>
                        </div>

                        <div class="col-9">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga,
                            molestiae
                            provident temporibus sunt earum.</p>
                          <h2>
                            <span class="badge">v52gs1</span>
                          </h2>
                        </div>
                      </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-danger h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-danger waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Side Modal Bottom Right Danger-->

              <!-- Side Modal Bottom Left Warning-->
              <div class="modal fade left" id="sideModalBLWarningDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-side modal-bottom-left modal-notify modal-warning" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading">Modal Warning</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-3 text-center">
                          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg" alt="Michal Szymanski - founder of Material Design for Bootstrap"
                            class="img-fluid z-depth-1-half rounded-circle">
                          <div style="height: 10px"></div>
                          <p class="title mb-0">Jane</p>
                          <p class="text-muted " style="font-size: 13px">Consultant</p>
                        </div>

                        <div class="col-9">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga,
                            molestiae
                            provident temporibus sunt earum.</p>
                          <p class="card-text">
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing
                              elit.</strong>
                          </p>
                        </div>
                      </div>


                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-warning h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-warning waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Side Modal Bottom Left Warning-->

              <!--Modal Form Login with Avatar Demo-->
              <div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                  <!--Content-->
                  <div class="modal-content">

                    <!--Header-->
                    <div class="modal-header">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" class="rounded-circle img-responsive"
                        alt="Avatar photo">
                    </div>
                    <!--Body-->
                    <div class="modal-body text-center mb-1">

                      <h5 class="mt-1 mb-2">Maria Doe</h5>

                      <div class="md-form ml-0 mr-0">
                        <input type="password" type="text" id="form1" class="form-control ml-0">
                        <label for="form1" class="ml-0">Enter password</label>
                      </div>

                      <div class="text-center mt-4">
                        <button class="btn btn-cyan">Login
                          <i class="fas fa-sign-in-alt ml-1"></i>
                        </button>
                      </div>
                    </div>

                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!--Modal Form Login with Avatar Demo-->

              <!--Modal: Login / Register Form Demo-->
              <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--Modal: Login / Register Form Demo-->

              <!-- Central Modal Large Info-->
              <div class="modal fade" id="centralModalLGInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Info</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                      <img src="https://mdbootstrap.com/wp-content/uploads/2016/11/admin-dashboard-bootstrap.jpg" alt="Material Design for Bootstrap - dashboard"
                        class="img-fluid">

                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                      <a role="button" class="btn btn-info h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-info waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Central Modal Large Info-->

              <!-- Central Modal Fluid Success-->
              <div class="modal fade" id="centralModalFluidSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fluid modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Success</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                      <a role="button" class="btn btn-success h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-success waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Central Modal Fluid Success-->

              <!-- Full Height Modal Right Success Demo-->
              <div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Success</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-success h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-success waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Full Height Modal Right Success Demo-->

              <!-- Full Height Modal Left Info Demo-->
              <div class="modal fade left" id="fluidModalLeftInfoDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-left modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Success</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                          iusto nulla
                          aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                          eius
                          non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                        </p>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <a role="button" class="btn btn-info h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-info waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Full Height Modal Right Info Demo-->

              <!-- Full Height Modal Top Warning Demo-->
              <div class="modal fade top" id="fluidModalTopWarningDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-top modal-notify modal-warning" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Warning</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                      <a role="button" class="btn btn-warning h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-warning waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Full Height Modal Top Warning Demo-->

              <!-- Full Height Modal Bottom Danger Demo-->
              <div class="modal fade bottom" id="fluidModalBottomDangerDemo" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-full-height modal-bottom modal-notify modal-danger" role="document">
                  <!--Content-->
                  <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                      <p class="heading lead">Modal Danger</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                      </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                      <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                      </div>
                      <ul class="list-group z-depth-0">
                        <li class="list-group-item justify-content-between">
                          Cras justo odio
                          <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Dapibus ac facilisis in
                          <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                          Morbi leo risus
                          <span class="badge badge-primary badge-pill">1</span>
                        </li>
                      </ul>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer">
                      <a role="button" class="btn btn-danger h">Get it now
                        <i class="far fa-gem ml-1"></i>
                      </a>
                      <a role="button" class="btn btn-outline-danger waves-effect h" data-dismiss="modal">No,
                        thanks</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!-- Full Height Modal Bottom Danger Demo-->

            </section>
            <!--Section: Modals-->

            <!-- Card header -->
            <div class="card-header">Modals</div>

            <!--Card content-->
            <div class="card-body">

              <div class="text-center mb-5">
                <p class="lead">Click buttons below to launch modals demo</p>
              </div>

              <!-- First row-->
              <div class="row">

                <!--First column-->
                <div class="col-md-3">
                  <h5 class="text-center mb-3">Frame Modal</h5>

                  <img src="https://mdbootstrap.com/img/brandflow/modal4.jpg" alt="MDB graphics" class="img-fluid z-depth-1">
                  <div class="text-center">
                    <h5 class="my-3">Position</h5>

                    <a class="btn btn-primary btn-sm h" data-toggle="modal" data-target="#frameModalTopInfoDemo"
                      data-backdrop="false">Top</a>
                    <br>
                    <a class="btn btn-primary btn-sm h" data-toggle="modal" data-target="#frameModalBottomSuccessDemo"
                      data-backdrop="false">Bottom</a>
                  </div>
                </div>
                <!--First column-->

                <!--Second column-->
                <div class="col-md-3">
                  <h5 class="text-center mb-3">Side Modal</h5>

                  <img src="https://mdbootstrap.com/img/brandflow/modal3.jpg" alt="MDB graphics" class="img-fluid z-depth-1">
                  <div class="text-center">
                    <h5 class="my-3">Position</h5>

                    <a class="btn btn-primary btn-sm h" data-toggle="modal" data-target="#sideModalTRSuccessDemo"
                      data-backdrop="false">Top Right</a>
                    <br>
                    <a class="btn btn-primary btn-sm h" data-toggle="modal" data-target="#sideModalTLInfoDemo">Top
                      Left</a>
                    <br>
                    <a class="btn btn-primary btn-sm h" data-toggle="modal" data-target="#sideModalBRDangerDemo">Bottom
                      Right</a>
                    <br>
                    <a class="btn btn-primary btn-sm h" data-toggle="modal" data-target="#sideModalBLWarningDemo">Bottom
                      Left</a>
                  </div>
                </div>
                <!--Second column-->

                <!--Third column-->
                <div class="col-md-3">
                  <h5 class="text-center mb-3">Central Modal</h5>

                  <img src="https://mdbootstrap.com/img/brandflow/modal2.jpg" alt="MDB graphics" class="img-fluid z-depth-1">
                  <div class="text-center">
                    <h5 class="my-3">Size</h5>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLoginAvatarDemo">Small
                    </button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLRFormDemo">Medium
                    </button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#centralModalLGInfoDemo">Large
                    </button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#centralModalFluidSuccessDemo">Fluid
                    </button>
                  </div>
                </div>
                <!--Third column-->

                <!--Fourth column-->
                <div class="col-md-3">
                  <h5 class="text-center mb-3">Fluid Modal</h5>

                  <img src="https://mdbootstrap.com/img/brandflow/modal1.jpg" alt="MDB graphics" class="img-fluid z-depth-1">
                  <div class="text-center">
                    <h5 class="my-3">Position</h5>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalRightSuccessDemo">Right</button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalLeftInfoDemo">Left</button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalTopWarningDemo">Top</button>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalBottomDangerDemo">Bottom</button>
                  </div>
                </div>
                <!--Fourth column-->

              </div>
              <!-- /.First row-->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
        role="button">Download
        MDB
        <i class="fas fa-download ml-2"></i>
      </a>
      <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start
        free tutorial
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
        <i class="fab fa-google-plus mr-3"></i>
      </a>

      <a href="https://dribbble.com/mdbootstrap" target="_blank">
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/mdbootstrap" target="_blank">
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/mdbootstrap/" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });


    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2,
            data: [65, 59, 80, 81, 56, 55, 40]
          },
          {
            label: "My Second dataset",
            backgroundColor: [
              'rgba(0, 137, 132, .2)',
            ],
            borderColor: [
              'rgba(0, 10, 130, .7)',
            ],
            data: [28, 48, 40, 19, 86, 27, 90]
          }
        ]
      },
      options: {
        responsive: true
      }
    });


    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
      type: 'radar',
      data: {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [{
          label: "My First dataset",
          data: [65, 59, 90, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        }, {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 96, 27, 100],
          backgroundColor: [
            'rgba(0, 250, 220, .2)',
          ],
          borderColor: [
            'rgba(0, 213, 132, .7)',
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true
      }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

  </script>

  <!--Google Maps-->
  <script src="https://maps.google.com/maps/api/js"></script>
  <script>
    // Regular map
    function regular_map() {
      var var_location = new google.maps.LatLng(40.725118, -73.997699);

      var var_mapoptions = {
        center: var_location,
        zoom: 14
      };

      var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "New York"
      });
    }

    // Initialize maps
    google.maps.event.addDomListener(window, 'load', regular_map);

    new Chart(document.getElementById("horizontalBar"), {
      "type": "horizontalBar",
      "data": {
        "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
        "datasets": [{
          "label": "My First Dataset",
          "data": [22, 33, 55, 12, 86, 23, 14],
          "fill": false,
          "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
            "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
          ],
          "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
            "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
            "rgb(201, 203, 207)"
          ],
          "borderWidth": 1
        }]
      },
      "options": {
        "scales": {
          "xAxes": [{
            "ticks": {
              "beginAtZero": true
            }
          }]
        }
      }
    });

  </script>
  <script type="text/javascript">
    function deletedept(id,name){
      $(deptname).html(name);
      $(deptid).val(id);
      $("#deletedepartmentform").modal();
    
    }

    function deleteelec(id,name){
      $(elecname).html(name);
      $(elecid).val(id);
      $("#deleteelectionform").modal();
    
    }


$('.edp').pickadate({
// An integer (positive/negative) sets it relative to today.
format: 'dd-mm-yyyy',
min: +1
// `true` sets it to today. `false` removes any limits.
})

$("#deptid2").material_select();
$('#elecstarttime').pickatime({});
$('#elecendtime').pickatime({
});
   
  </script>

  <?php }else{ 

      $query = "SELECT * FROM elections where instid = ".$_SESSION['inst']." AND elections.deleted = 0 ";
        $deq = makequery($query);
       if($deq[0] == 'success'){
          $GLOBALS['dna'] = $deq[1];
        }else{
           $GLOBALS['dna'] = '';
       }






    ?>






 <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.ab{
 border-color:<?php echo $hex3; ?> !important;
 color:<?php echo $hex3; ?> !important;
}
.mb{
 border-color:<?php echo $dchex; ?> !important;
 color:<?php echo $dchex; ?> !important;
}
.mbd{
 border-color:red !important;
 color:red !important;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
a.h{
color: <?php echo $dchex; ?> !important; 
}
.mi{
color: <?php echo $dchex; ?> !important;  
}
.cf .card-body .fas{
  color : <?php echo $dchex; ?> !important;
}
.cf .card-body .far{
  color : <?php echo $dchex; ?> !important;
}
@media(min-width: 801px){
 .ac{
  font-size:75px;
} 
.dl{
  font-size:15px;
}
}
@media(max-width: 801px){
 .ac{
  font-size:25px;
} 
}
.af{
  color:<?php echo $hex3; ?> !important;
  font-weight:bold;
;
}
  </style>



    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn" style="margin-top:80px !important;">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="?" class="h">HOME</a>
         
          </h4>


          <?php 
          //var_dump($enac);
          ?>

          <h4 class="d-flex mb-2 mb-sm-0 pt-1">
            <!-- Default input -->
            <?php 
            echo 'Welcome, '.$_SESSION['firstname'];
          ?>
          </h4>

        </div>

      </div>
    </div>







<div class="container-fluid ">
<div class="row mb-3 text-center cf  mx-1">
 <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-university"></i> 5
          </div>
          <div class="card-footer text-center af">
          INSTITUTIONS
          </div>
        </div>
      </div>



     <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
          <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-fist-raised"></i> 0
          </div>
          <div class="card-footer text-center af">
          ASPIRATIONS
          </div>
        </div>
      </div>


      <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
          <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-check-square"></i> 3
          </div>
          <div class="card-footer text-center af">
          ONGOING ELECTIONS
          </div>
        </div>
      </div>


       <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image ">
          <div class="card-body text-center ac">
           <i class="far fa-calendar-check"></i> 1
          </div>
          <div class="card-footer text-center af">
          COMING ELECTIONS
          </div>
        </div>
      </div>


       <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image">
          <div class="card-body text-center ac">
            <i class="fas fa-archive"></i> 2
          </div>
          <div class="card-footer text-center af">
          ENDED ELECTIONS
          </div>
        </div>
      </div>


       <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image">
          <div class="card-body text-center ac">
            <i class="fas fa-bell"></i> 9
          </div>
          <div class="card-footer text-center af">
          ANNOUNCEMENTS
          </div>
        </div>
      </div>
    </div>
  </div>



   <div class="container-fluid  ">
      <div class="row mb-3 text-center cf card-deck">

  
    <!--    <div class="card border border-success col-12 col-lg-6 col-xl-6" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      ACTIONS  <span class="text-right float-right" style="float:right"><i class="fas fa-cog"></i></span>
    </div>
    <div class="card-body">
    <div class="row text-center d-flex align-items-center">
    <center>
    <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2" data-toggle="modal" data-target="#newelectionform"> CREATE NEW ELECTION </button>
     <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2"> CREATE ELECTION POST </button>
      <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2"> END ELECTION </button>
       <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2"> MAKE ANNOUNCEMENT </button>


    </center>
    </div>
    <hr />
    </div>
    </div> -->




       <div class="card border border-success col-12 col-lg-6 col-xl-6" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      ELECTIONS  <span class="text-right float-right" style="float:right"><i class="fas fa-vote-yea"></i></span>
    </div>
    <div class="card-body">
    <div class=" text-left list-group list-group-flush">


      <?php

       $dna->data_seek(0); 
      if ($dna->num_rows > 0) {
        while($row = $dna->fetch_assoc()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          $now = time();
          ?>
          <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl">
            <a href="?page=election&elecid=<?php echo $row["id"];?>&elecname=<?php echo $row["name"]; ?>&elecdept=<?php echo $row["deptid"]; ?>" style="color:black !important;">

            <?php echo $row["name"]; ?> 
          
            <?php 
          if($row['enddate'] < $now){
            ?>

          <span class="badge badge-danger badge-pill pull-right">ENDED</span>


          <?php  
        }elseif($row['startdate'] > $now){
          ?>


          <a style="color:red !important;right:0;" onclick="deleteelec(<?php echo $row["id"];?>,'<?php echo $row["name"];?>')"><span class="badge  badge-primary badge-pill pull-right">UPCOMING</span></a>


          
          <?php
        }else{
        ?>
        <a style="color:red !important;right:0;" onclick="deleteelec(<?php echo $row["id"];?>,'<?php echo $row["name"];?>')"><span class="badge badge-success badge-pill pull-right">VOTE NOW !</span></a>





      <?php } ?>
         </a>
         </div>


        <?php
          }
        }else{?>

            <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO ELECTIONS YET
          </div>

        <?php }
      $dna->data_seek(0); 

       ?>


     
     
    </div>
    
    </div>
    </div>




       <div class="card border border-success col-12 col-lg-6 col-xl-6" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      ANNOUNCEMENTS  <span class="text-right float-right" style="float:right"><i class="fas fa-bullhorn"></i></span>
    </div>
    <div class="card-body">
    <div class=" text-left list-group list-group-flush">


      <?php


      if ($enac->num_rows > 0) {
        while($row = $enac->fetch_assoc()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/

          $now = time();

          ?>
          <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl">
            <a href="?page=election&elecid=<?php echo $row["id"];?>&elecname=<?php echo $row["name"]; ?>&elecdept=<?php echo $row["deptid"]; ?>" style="color:black !important;"><?php echo $row["name"]; ?>
            </a> 
          <span class="badge badge-primary badge-pill pull-right"><?php echo $row["voters"]; ?></span>

          <?php 
          if($row['enddate'] > $now){
            ?>

          <a style="color:red !important;right:0;color:red !important;">ENDED</a>


          <?php  }else{
          ?>


          <a style="color:red !important;right:0;" onclick="deleteelec(<?php echo $row["id"];?>,'<?php echo $row["name"];?>')"><i class="fas fa-trash-alt float-right" style="color:red !important;"></i></a>


          </div>
          <?php
        }
          }
        }else{?>

            <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO ANNOUNCEMENTS YET
          </div>

        <?php }

       ?>


     
     
    </div>
    </div>
    </div>




</div>
</div>







    <?php } ?>