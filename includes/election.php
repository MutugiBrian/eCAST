<?php 
$ut = $_SESSION['utype'];
$electionid = $_GET['elecid'];
$electionname = $_GET['elecname'];
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
          <input type="text" id="elecname" name="elecname"  class="form-control" required>
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
          alert(sd);
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
          //var_dump($ena);
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
          <i class="fas fa-user-tie"></i> 2
          </div>
          <div class="card-footer text-center af">
          POSTS
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

            <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO POSTS CREATED YET
          </div>

        <?php }

       ?>


     
     
    </div>
     <button type="button" class="btn btn-sm btn-outline-success waves-effect my-0 z-depth-0 ab my-2" data-toggle="modal" data-target="#newpostform" style="float: right;width: 200px;"> CREATE NEW POST </button> 
    
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
   
  </script>
