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
/*.mi{
color: <?php echo $dchex; ?> !important;  
}*/
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
table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
  bottom: .5em;
}
  </style>



 <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn" style="margin-top:80px !important;">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="?" class="h">ADMIN PANEL</a>
            <span>/</span>
            <span><?php echo $logn; ?></span>
          </h4>


          <h4 class="d-flex mb-2 mb-sm-0 pt-1" id="cdt">
          activity
          </h4>



        </div>

      </div>
      <!-- Heading -->
  </div>






   <div class="container-fluid  ">

   </div>



    <hr />


    <?php if($_SESSION['utype'] == 'institution'){ ?> 

   <div class="container-fluid  ">
      <div class="row mb-3 text-center cf card-deck mx-1">



      	       <div class="card border border-success" <?php if(isset($dchex)){ ?>
style="border-color:<?php echo $dchex; ?> !important;border-width: 3px !important;"

<?php } ?>>
    <div class=" card-header font-weight-bold text-left" style="font-size:18px;background-color: white !important;color:<?php echo $dchex; ?> !important;">
     SYSTEM LOGS <span class="text-right float-right" style="float:right"><i class="fas fa-cogs"></i></span>
    </div>
    <div class="card-body">
    <div class=" text-left list-group list-group-flush ">



    	<table id="dtBasicExample"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>USER
      </th>
      <th>EVENT
      </th>
      <th>TIME
      </th>
    </tr>
  </thead>
  <tbody>




      <?php

       $logs->data_seek(0); 
      if ($logs->num_rows > 0) {
        while($row = $logs->fetch_assoc()){
          /*  $GLOBALS['dn'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];*/
          ?>
          <tr>
          <td><?php echo $row["user_reg"]; ?></td>
          <td><?php echo $row["event"]; ?></td>
          <td><?php echo $row["time"]; ?></td>
          </div>
          </tr>
          <?php
          }
        }else{?>

            <div class="row mx-1 list-group-item list-group-item-action font-weight-bold dl" style="color:red;"> NO EVENTS IN THE SYSTEM
          </div>

        <?php }

       ?>
  </tbody>
  <tfoot>

  </tfoot>
</table>






     
     
    </div>
    
    </div>
    </div>


  </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
<?php } ?>

  	
