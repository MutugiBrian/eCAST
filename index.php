<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 0); 
include 'includes/strings.php';
include 'includes/functions.php';
include 'includes/getdata.php';
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>
		<?php echo $sn; ?> - <?php echo $ss; ?>
	</title>
<link rel="icon" type="image/png" href="images/logo/<?php echo $sicon ; ?>"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/mdb.css">
<link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<link href="css/addons/datatables.min.css" rel="stylesheet">


  <!-- Font Awesome --><link rel="stylesheet" type="text/css" href="css/style.css">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

<style type="text/css">
@media (max-width:801px) {
.navbar  {
  min-height: 12% !important;
}

}
a {

	color: white;
}
.sn {

	font-size:23px !important;
	/*font-weight:bold;*/
}
.<?php echo $dc; ?>{
	background-color: <?php echo $dchex; ?> !important; 
}
.ig{
    border-color:<?php echo $dchex; ?> !important;
    border-style:dotted !important;
}
</style>
</head>


<body class="hidden-sn " style="background-color:  <?php echo $mainbg; ?> !important;">

  <!--Double navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav <?php echo $dc; ?>">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li>
          <div class="logo-wrapper" style="height:160px;">
            <a href="?"><img src="images/logo/<?php echo $slogo ; ?>" class="img-fluid flex-center img-circle  waves-light" ></a>
          </div>
        </li>
        <!--/. Logo -->
        <!--Social-->
        
        <!--/Social-->
        <!--Search Form-->
        <li class="sn text-center text-bold">
          <!-- <form class="search-form" role="search">
            <div class="form-group md-form mt-0 pt-1 waves-light">
              <input type="text" class="form-control" placeholder="Search">
            </div>
          </form> -->
          <?php echo $sn; ?>
        </li>
        <!--/.Search Form-->
        <li>
          <ul class="social">
<!--             <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a></li>
            <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
            <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>
            <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li> -->
            
          </ul>
        </li>
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <?php 

            if(isset($_SESSION['phone'])){
              //if user has logged in ?>




            <?php 
            if($_SESSION['utype'] == 'institution'){ 
            ?>
            <li><a class="collapsible-header waves-effect arrow-r" href="?page=logs"><i class="fas fa-cogs"></i> <?php echo $slogs; ?>
            </a>
            </li>
            <?php }?>



            <li><a class="collapsible-header waves-effect arrow-r" href="?page=logout"><i class="fas fa-power-off" style="color: red !important;"></i> LOG OUT</a>
            </li>

            





            <?php }else{ 
              //if user not logged in?>
            <li><a href="?page=login"class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> <?php echo $login; ?></i></a>
              
            </li>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> <?php echo $register; ?><i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="?page=voterregister" class="waves-effect"><?php echo $asvoter; ?></a>
                  </li>
                  <li><a href="?page=instregister" class="waves-effect"><?php echo $asinstitution; ?></a>
                  </li>
                  <!-- <li><a href="#" class="waves-effect"><?php echo $asobserver; ?></a>
                  </li> -->
                </ul>
              </div>
            </li>
            <?php } ?>
        
           
          </ul>
        </li>
        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav <?php echo $dc; ?>" style="min-height:9%;">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>
      <!-- Breadcrumb-->
     <!--  <div class="breadcrumb-dn mr-auto">
        <p><?php echo $sn ; ?></p>
      </div> -->
      <div class="nav navbar-nav nav-flex-icons ml-auto sn" >
       <?php echo $sn ; ?>
      </div>
    </nav>
    <!-- /.Navbar -->
  </header>
  <!--/.Double navigation-->

  <!--Main Layout-->
  <main class="mx-0 px-0 py-0">
  <?php 
  $page = $_GET['page'];
  $loginid = @SESSION['loginid'];
  if(isset($page)){

    if($page == 'home' || $page == '' || !file_exists('includes/'.$page.'.php')){

      if(isset($loginid)){  
      include 'includes/home.php';
      }else{  
      include 'includes/landing.php';
      }

    }else{

      include 'includes/'.$page.'.php';

    }



  }else{
    if($_SESSION['loggedin']){
      include 'includes/home.php';
    }else{
      include 'includes/landing.php';
    }

    }
  

  ?>
  </main>
  <!--Main Layout-->

</body>





<!-- end of project -->


<!-- JS IMPORTS -->

  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>

  <!-- END OF JS IMPORTS -->

  <!-- JS RAW START -->
<script type="text/javascript">
// SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar);

</script>



<!-- JS RAW END -->

</body>



</html>