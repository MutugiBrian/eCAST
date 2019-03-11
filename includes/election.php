<?php 
$ut = $_SESSION['utype'];
$electionid = $_GET['elecid'];
$electionname = $_GET['elecname'];
$uid = $_SESSION['uid'];
$dept = $_SESSION['elecdept'];


$date = date('d-m-Y', $timestamp);
$time = date('Gi.s', $timestamp);


//from here 


  $query = "SELECT * FROM elections WHERE id = ".$electionid." ";
   $dq = makequery($query);
       if($dq[0] == 'success'){
          $GLOBALS['ewa'] = $dq[1];
          $GLOBALS['ewa'] = $dq[1];
          $GLOBALS['elecs']  = $dq[1]->num_rows;
          }else{
          $GLOBALS['elecs'] = 0;
       }



       


//to here


  $query = "SELECT * FROM posts WHERE elecid = ".$electionid." AND posts.deleted = 0 ";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $GLOBALS['epa'] = $dq[1];
          $GLOBALS['epa'] = $dq[1];
          $GLOBALS['eposts']  = $dq[1]->num_rows;

        }else{
          $GLOBALS['eposts'] = 0;
       }

 $query = "SELECT a.*, a.id as aspid, u.*,p.* FROM aspirants a,usermaster u,posts p WHERE a.elecid = ".$electionid." AND a.deleted = 0 AND u.id = a.uid AND p.id = a.postid";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $GLOBALS['easpa'] = $dq[1];
          $GLOBALS['easpa'] = $dq[1];
          $GLOBALS['easpirants']  = $dq[1]->num_rows;

        }else{
          $GLOBALS['easpirants'] = 0;
       }


  if ($ut == 'institution'){

       if($dept == '' || $dept == 0){
$query = "SELECT * FROM usermaster WHERE institution = ".$uid." AND usermaster.deleted = 0 AND  usermaster.banned = 0";
       }else{
$query = "SELECT * FROM usermaster WHERE institution = ".$uid." AND department = ".$dept." AND usermaster.deleted = 0 AND  usermaster.banned = 0";
       }


  
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $GLOBALS['eva'] = $dq[1];
          $GLOBALS['eva'] = $dq[1];
          $GLOBALS['elecvoters']  = $dq[1]->num_rows;

        }else{
          $GLOBALS['elecvoters'] = 0;
       }


if(isset($_POST['delasp'])){

    $aspid = $_POST['delaspid'];
  $query = "UPDATE `aspirants` SET `deleted` = 1 WHERE `aspirants`.`id` = '".$aspid."' ";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?page=election&elecid=<?php echo $electionid; ?>&elecname=<?php echo $electionname; ?>";
  Command: toastr["success"]("", "ASPIRANT REMOVED")

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

    window.location.href = "?page=election&elecid=<?php echo $electionid; ?>&elecname=<?php echo $electionname; ?>";
  Command: toastr["error"]("", "ERROR REMOVING ASPIRANT")

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


if(isset($_POST['delpost'])){

    $postid = $_POST['postid'];
  $query = "UPDATE `posts` SET `deleted` = '1' WHERE `posts`.`id` = '".$postid."' ";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?page=election&elecid=<?php echo $electionid; ?>&elecname=<?php echo $electionname; ?>";
  Command: toastr["success"]("", "POST DELETED")

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

    window.location.href = "?page=election&elecid=<?php echo $electionid; ?>&elecname=<?php echo $electionname; ?>";
  Command: toastr["error"]("", "ERROR DELETING POST")

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



if(isset($_POST['newasp'])){ 

          
   $aspid = $_POST['aspid'];
   $aspslogan = $_POST['aspslogan'];
   $aspmanifesto = $_POST['aspmanifesto'];
   $asppost = $_POST['asppost'];
   $uid = $_SESSION['uid'];
   $now = time();


  $query = "
  INSERT INTO `aspirants` (`id`, `uid`, `slogan`, `manifesto`, `instid`, `elecid`, `postid`,`createdat`, `updatedat`) VALUES (NULL, ".$aspid.", '".$aspslogan."', '".$aspmanifesto."', ".$uid.", ".$electionid.", ".$asppost.", ".$now.", ".$now.");
  ";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?page=election&elecid=<?php echo $electionid; ?>&elecdept=<?php echo $dept; ?>&elecname=<?php echo $electionname; ?>";
  Command: toastr["success"]("", "NEW ASPIRANT ADDED")

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

    window.location.href = "?page=election&elecid=<?php echo $electionid; ?>&elecdept=<?php echo $dept; ?>&elecname=<?php echo $electionname; ?>";
  Command: toastr["error"]("", "ERROR ADDING ASPIRANT")

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









if(isset($_POST['newpost'])){ 

          
   $postname = $_POST['postname'];
   $deptid = $_POST['deptid2'];
    $uid = $_SESSION['uid'];
  $now = time();


  $query = "INSERT INTO `posts` (`id`, `name`, `instid`, `deptid`, `gender`, `createdat`, `updatedat`, `elecid`) VALUES (NULL, '".$postname."', ".$uid.", ".$deptid.", '', ".$now.", ".$now.", ".$electionid.")
  ";
  $qa = makequery($query);

  if($qa[0] == 'success'){

    

    ?>


     <script type="text/javascript">
  $(document).ready(function(){

 window.location.href = "?page=election&elecid=<?php echo $electionid; ?>&elecname=<?php echo $electionname; ?>";
  Command: toastr["success"]("", "NEW POST CREATED")

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

    window.location.href = "?page=election&elecid=<?php echo $electionid; ?>&elecname=<?php echo $electionname; ?>";
  Command: toastr["error"]("", "ERROR CREATING POST")

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




   <div class="modal fade" id="deletepostform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" 
style="border-color:red!important;border-width: 3px !important;"
>
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 font-weight-bold">DELETE POST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 h6">
      ARE YOU SURE YOU WANT TO DELETE <span id="postname" style="color: red !important;"></span> POST ?
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <form id="deletedpost" action="" method="post">
          <input type="hidden" name="postid" id="postid"/>
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb" data-dismiss="modal">NO <i class="fas fa-paper-plane-o ml-1"></i></button>
        <button class="btn btn-outline-danger waves-effect my-0 z-depth-0 mbd" type="submit" name="delpost" id="delpost">YES <i class="fas fa-paper-plane-o ml-1"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>


   <div class="modal fade" id="deleteaspform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" 
style="border-color:red!important;border-width: 3px !important;"
>
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 font-weight-bold">REMOVE ASPIRANT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 h6">
      ARE YOU SURE YOU WANT TO REMOVE <span id="aspname" style="color: red !important;"></span> AS AN ASPIRANT ?
      </div>
      <div class="modal-footer d-flex justify-content-center">
         <form id="deleteaspp" action="" method="post">
          <input type="hidden" name="delaspid" id="delaspid"/>
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb" data-dismiss="modal">NO <i class="fas fa-paper-plane-o ml-1"></i></button>
        <button class="btn btn-outline-danger waves-effect my-0 z-depth-0 mbd" type="submit" name="delasp" id="delasp">YES <i class="fas fa-paper-plane-o ml-1"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>




  <div class="modal fade" id="newaspirantform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">CREATE ASPIRANT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="" id="newaspirant" name="newaspirant" class="needs-validation">
      <div class="modal-body mx-3">



 <?php
        $eva->data_seek(0); 
           if ($eva->num_rows > 0) {
            ?>
            <div class="md-form mb-5">
          <i class="fas fa-fist-raised prefix mi"></i>
            <select class="mdb-select md-form ml-5" id="aspid" name="aspid" searchable="Search name or registration..">
          <option value="" selected disabled>SELECT ASPIRANT NAME</option>
          <?php 
          while($row = $eva->fetch_array()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          ?>
          <option value="<?php echo$row['id']?>"><?php echo$row['firstname']." ".$row['lastname']." - ".$row['regno'];?></option>

          <?php
          }
          ?>
             </select>
           </div>

          <?php
          }else{
          	?>
          	 <div class="md-form mb-5" style="color:red !important;">
               ERROR - NO POTENTIAL ASPIRANTS
          	 </div>

          	<?php
          }

           $epa->data_seek(0); 
          ?>


          
          
         <?php
        $epa->data_seek(0); 
           if ($epa->num_rows > 0) {
            ?>
            <div class="md-form mb-5">
          <i class="fas fa-user-tie prefix mi"></i>
            <select class="mdb-select ml-5" id="asppost" name="asppost" searchable="Search post..">
          <option value="" selected disabled>SELECT POST</option>
          <?php 
          while($row = $epa->fetch_array()){
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
          }else{?>
          	 <div class="md-form mb-5" style="color:red !important;">
               ERROR - NO POSTS
          	 </div>
          <?php }

           $epa->data_seek(0); 
          ?>

           <div class="md-form mb-5">
          <i class="fas fa-hand-spock prefix mi" style="font-size: 25px;"></i>
          <input type="text" id="aspslogan" name="aspslogan" class="form-control validate ml-5">
          <label data-error="wrong" data-success="right" for="form3" class="ml-5">SLOGAN</label>
        </div>

          <div class="form-group">
          <label for="manifesto" ><i class="fas fa-book-reader prefix mi" style="font-size: 25px;"></i><span class="h6 ml-4">MANIFESTO</span></label>
          <textarea class="form-control" id="aspmanifesto" name="aspmanifesto" rows="4"></textarea>
          </div>


        

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb" type="submit" name="newasp" id="newasp">CREATE <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>


    </form>
    <script type="text/javascript">
      $(newasp).click(function (){

        var sd = $("#aspid :selected").val();
        var ed = $("#asppost :selected").val();
        var ea = $("#aspslogan").val();
        var en = $("#aspmanifesto").val();

        if(sd === '' || ed === ''|| ea === '' || en === ''){

           Command: toastr["error"]("", "fill in all fields to continue")

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
        	//alert(ed);
         $(newaspirant).submit();
        }
      });
    </script>
    </div>
  </div>
</div>










  <div class="modal fade" id="newpostform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-success" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">CREATE POST</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="" id="newelection" name="newelection" class="needs-validation">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-vote-yea prefix mi"></i>
          <input type="text" id="postname" name="postname"  class="form-control" required>
          <label data-error="wrong" data-success="right" for="form3">POST NAME</label>
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
        


        

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-outline-success waves-effect my-0 z-depth-0 mb" type="submit" name="newpost" id="newpost">CREATE <i class="fas fa-paper-plane-o ml-1"></i></button>
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
         $(newelection).submit();
        }
      });
    </script>
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
            <span>/</span>
            <span><?php echo $electionname; ?></span>
          </h4>


          <?php 
          //var_dump($ewa);


        $ewa ->data_seek(0);
       if($ewa->num_rows > 0){
            while($row = $ewa->fetch_array()){

              $startstamp = $row['startdate'];
              $endstamp = $row['enddate'];

              $startdate = date('D M j Y', $startstamp);
               $starttime = date('H:i', $startstamp);

                $enddate = date('D M j Y', $endstamp);
               $endtime = date('H:i', $endstamp);
              
              $elecfrom = $startdate." ".$starttime;
              $electo = $enddate." ".$endtime.":00 GMT+0300 (East Africa Time)";



            }}
            $ewa ->data_seek(0);



          ?>

          <h4 class="d-flex mb-2 mb-sm-0 pt-1" id="cdt">
            <!-- Default input -->
            <?php
        /*     if($ut == 'institution') { 
              echo $_SESSION['iname'];
          }else{
            echo 'Welcome, '.$_SESSION['firstname'];
          }*/
          ?>


  <span class="mr-2"><span id="days" ></span><span id="ds"></span></span>
   <span class="mx-1"><span id="hours"></span><span id="hs"></span></span>
    <span class="mx-1"><span id="minutes"></span><span id="ms"></span></span>
    <span class="mx-1"><span id="seconds"></span><span id="ss"></span></span>




  <script type="text/javascript">
    var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {

  var dateEntered = new Date("<?php echo $electo ?>");
  var now = new Date();
  var difference = dateEntered.getTime() - now.getTime();

  if (difference <= 0) {

    // Timer done
    $(cdt).text("ELECTION ENDED");
    $(cdt).css("color", "red");

  
  } else {
    
    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    $("#days").text(days);
    $("#hours").text(hours);
    $("#minutes").text(minutes);
    $("#seconds").text(seconds);
    if(days !== 1){ $(ds).text("days")}else{$(ds).text("day")};
    if(hours !== 1){ $(hs).text("hours")}else{$(hs).text("hour")};
    if(minutes !== 1){ $(ms).text("minutes")}else{$(ms).text("minute")};
    if(seconds !== 1){ $(ss).text("seconds")}else{$(ss).text("second")}; 

    if(hours<6){
      $(cdt).css("color", "red");
    }

    
  }
}
  </script>
          </h4>



        </div>

      </div>
      <!-- Heading -->
  </div>






   <div class="container-fluid  ">
      <div class="row mb-3 text-center cf mx-1">


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
          <i class="fas fa-user-tie"></i> <?php echo $eposts; ?>
          </div>
          <div class="card-footer text-center af">
          POST<?php if($eposts > 1){echo "S";} ?>
          </div>
        </div>
      </div>




     <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
          <div class="card card-image ">
          <div class="card-body text-center ac">
            <i class="fas fa-fist-raised"></i> <?php echo $easpirants; ?>
          </div>
          <div class="card-footer text-center af">
          ASPIRANT<?php if($easpirants>1){echo "S";}?>
          </div>
        </div>
      </div>


      <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image ">
          <div class="card-body text-center ac">
          <i class="fas fa-check-square"></i> 8
          </div>
          <div class="card-footer text-center af">
          CASTED VOTES
          </div>
        </div>
      </div>

      <div class="col-4 col-xl-2 col-md-3 col-lg-2 col-sm-4 px-0  mb-2 p-2">
        <div class="card card-image ">
          <div class="card-body text-center ac">
          <i class="fas fa-hourglass-half"></i> 21
          </div>
          <div class="card-footer text-center af">
          HOURS LEFT
          </div>
        </div>
      </div>



      </div>
   </div>



    <hr />


    <?php if($_SESSION['utype'] == 'institution'){ ?> 

   <div class="container-fluid  ">
      <div class="row mb-3 text-center cf card-deck mx-1">



      	       <div class="card border border-success col-12 col-lg-6 col-xl-6" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      POSTS  <span class="text-right float-right" style="float:right"><i class="fas fa-user-tie"></i></span>
    </div>
    <div class="card-body">
    <div class=" text-left list-group list-group-flush ">


      <?php

       $epa->data_seek(0); 
      if ($epa->num_rows > 0) {
        while($row = $epa->fetch_assoc()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          ?>
          <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl"><?php echo $row["name"]; ?> 
          <span class="badge badge-primary badge-pill pull-right"><?php echo $row["aspirants"]; ?></span>
          <a style="color:red !important;right:0;" onclick="deletepost(<?php echo $row["id"];?>,'<?php echo $row["name"];?>')"><i class="fas fa-trash-alt float-right" style="color:red !important;"></i></a>
          </div>
          <?php
          }
        }else{?>

            <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO POSTS CREATED YET
          </div>

        <?php }
        $epa->data_seek(0);

       ?>


     
     
    </div>
     <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2" data-toggle="modal" data-target="#newpostform" style="float: right;width: 200px;"> CREATE NEW POST </button> 
    
    </div>
    </div>




     <div class="card border border-success col-12 col-lg-6 col-xl-6" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      ASPIRANTS  <span class="text-right float-right" style="float:right"><i class="fas fa-fist-raised"></i></span>
    </div>
    <div class="card-body">
    <div class=" text-left list-group list-group-flush ">


      <?php

       $easpa->data_seek(0); 
      if ($easpa->num_rows > 0) {
        while($row = $easpa->fetch_assoc()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          ?>
          <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl"><?php echo $row["firstname"]." ".$row["lastname"]." -  ";?>  
          <span class="badge badge-primary badge-pill pull-right"><?php echo $row["name"]; ?></span>
          <a style="color:red !important;right:0;" onclick="deleteasp(<?php echo $row["aspid"];?>,'<?php echo $row["firstname"]." ".$row["lastname"];?>')"><i class="fas fa-trash-alt float-right" style="color:red !important;"></i></a>
          </div>
          <?php
          }
        }else{?>

            <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO ASPIRANTS CREATED YET
          </div>

        <?php }
        $epa->data_seek(0);

       ?>


     
     
    </div>
     <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2" data-toggle="modal" data-target="#newaspirantform" style="float: right;width: 200px;"> CREATE NEW ASPIRANT </button> 
    
    </div>
    </div>





       </div>
    </div>

    <?php } ?>


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
  

    function deletepost(id,name){
      $(postname).html(name);
      $(postid).val(id);
      $("#deletepostform").modal();
    
    }

      function deleteasp(id,name){
      $(aspname).html(name);
      $(delaspid).val(id);
      $("#deleteaspform").modal();
    
    }



$('.edp').pickadate({
// An integer (positive/negative) sets it relative to today.
format: 'dd-mm-yyyy',
min: +1
// `true` sets it to today. `false` removes any limits.
});
$('#elecstarttime').pickatime({});
$('#elecendtime').pickatime({});
$("#deptid2").material_select();
$("#aspid").material_select();
$("#asppost").material_select();   
  </script>

<?php }else{ ?>

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
            <span>/</span>
            <span><?php echo $electionname; ?></span>
          </h4>


          <?php 
          //var_dump($ewa);


        $ewa ->data_seek(0);
       if($ewa->num_rows > 0){
            while($row = $ewa->fetch_array()){

              $startstamp = $row['startdate'];
              $endstamp = $row['enddate'];

              $startdate = date('D M j Y', $startstamp);
               $starttime = date('H:i', $startstamp);

                $enddate = date('D M j Y', $endstamp);
               $endtime = date('H:i', $endstamp);
              
              $elecfrom = $startdate." ".$starttime;
              $electo = $enddate." ".$endtime.":00 GMT+0300 (East Africa Time)";



            }}
            $ewa ->data_seek(0);



          ?>

          <h4 class="d-flex mb-2 mb-sm-0 pt-1" id="cdt">
            <!-- Default input -->
            <?php
        /*     if($ut == 'institution') { 
              echo $_SESSION['iname'];
          }else{
            echo 'Welcome, '.$_SESSION['firstname'];
          }*/
          ?>


  <span class="mr-2"><span id="days" ></span><span id="ds"></span></span>
   <span class="mx-1"><span id="hours"></span><span id="hs"></span></span>
    <span class="mx-1"><span id="minutes"></span><span id="ms"></span></span>
    <span class="mx-1"><span id="seconds"></span><span id="ss"></span></span>




  <script type="text/javascript">
    var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {

  var dateEntered = new Date("<?php echo $electo ?>");
  var now = new Date();
  var difference = dateEntered.getTime() - now.getTime();

  if (difference <= 0) {

    // Timer done
    $(cdt).text("ELECTION ENDED");
    $(cdt).css("color", "red");

  
  } else {
    
    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    hours %= 24;
    minutes %= 60;
    seconds %= 60;

    $("#days").text(days);
    $("#hours").text(hours);
    $("#minutes").text(minutes);
    $("#seconds").text(seconds);
    if(days !== 1){ $(ds).text("days")}else{$(ds).text("day")};
    if(hours !== 1){ $(hs).text("hours")}else{$(hs).text("hour")};
    if(minutes !== 1){ $(ms).text("minutes")}else{$(ms).text("minute")};
    if(seconds !== 1){ $(ss).text("seconds")}else{$(ss).text("second")}; 

    if(day === 0 && hours<6){
      $(cdt).css("color", "red");
    }

    
  }
}
  </script>
          </h4>



        </div>

      </div>
      <!-- Heading -->
  </div>








      <?php

       $epa->data_seek(0); 
      if ($epa->num_rows > 0) { ?>


         <div class="container-fluid" >
          <center>
      <div class="row pr-4 pl-4">

        <?php while($row = $epa->fetch_assoc()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          ?>
           <div class="card border border-success col-12 mb-3" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
      <?php echo $row["name"]; ?>   <span class="text-right float-right" style="float:right"><i class="fas fa-user-tie"></i></span>
    </div>
    <div class="card-body">
    <div class=" row">

  <?php 
  $postid = $row["id"];
  $query = "SELECT a.*, a.id as aspid, u.*,p.* FROM aspirants a,usermaster u,posts p WHERE p.id = ".$postid." AND a.deleted = 0 AND u.id = a.uid AND p.id = a.postid";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $asps = $dq[1];
          $aspno  = $dq[1]->num_rows;

          if($asps->num_rows > 0){
            while($r = $asps->fetch_array()){
              ?>




              <!-- Card -->
<div class="col-12 col-lg-4 col-xl-4 z-depth-0" >
<div class="card testimonial-card z-depth-0 " style="margin-top: 80px;height: 350px;position: relative;">

  <!-- Background color -->
  <!-- Avatar -->
  <div class="avatar mx-auto white z-depth-1">
    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle" alt="woman avatar" >
  </div>

  <!-- Content -->
  <div class="card-body z-depth-0">
    <!-- Name -->
    <span class="card-title" style="font-size: 18px;font-weight:bold;"><?php echo $r['firstname']." ".$r['lastname']; ?><span>
    <hr>
    <!-- Quotation -->
    <h6><i class="fas fa-quote-left"></i>  <?php echo $r['slogan']; ?></h6>
    <hr>
    <p style="font-size: 12px;font-weight:normal;">
      <?php echo $r['manifesto']; ?>
    </p>
  </div>
  <center>
  <button class="btn btn-success" style="width:50%;"><i class="fas fa-check"></i> ELECT</button>
  </center>

</div>
</div>
<!-- Card -->



          <?php  }
          }else{?>

             <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO ASPIRANTS YET
          </div>

         <?php }

        }else{
          ?>
           <div>NO ASPIRANTS</div>
      <?php }


  ?>







          <!-- <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl">
          <span class="badge badge-primary badge-pill pull-right"><?php echo $row["aspirants"]; ?></span>
          <a style="color:red !important;right:0;" onclick="deletepost(<?php echo $row["id"];?>,'<?php echo $row["name"];?>')"><i class="fas fa-trash-alt float-right" style="color:red !important;"></i></a>
          </div> -->
    </div>
  </div>
</div>



          <?php
          }?>
      </div>
    </center>
      </div>




        <?php }else{?>

            <div class="row list-group-item list-group-item-action font-weight-bold dl" style="color:red;margin-right: 20px !important;margin-left: 20px !important;"> NO POSTS CREATED YET
          </div>

        <?php }
        $epa->data_seek(0);

       ?>

      






<?php } ?>

  	
