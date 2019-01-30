<?php 
include 'includes/strings.php';
?>
<!DOCTYPE html>
<html>
<head>

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


  <!-- Font Awesome --><link rel="stylesheet" type="text/css" href="css/style.css">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

<style type="text/css">
a {

	color: white !important;
}
.sn {

	font-size:23px !important;
	/*font-weight:bold;*/
}
.<?php echo $dc; ?>{
	background-color: <?php echo $dchex; ?> !important; 
}
</style>
</head>


<body class="fixed-sn ">

  <!--Double navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav fixed <?php echo $dc; ?>">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li>
          <div class="logo-wrapper" style="height:160px;">
            <a href="#"><img src="images/logo/<?php echo $slogo ; ?>" class="img-fluid flex-center img-circle  waves-light" ></a>
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
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> <?php echo $login; ?></i></a>
              
            </li>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> <?php echo $register; ?><i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#" class="waves-effect"><?php echo $asvoter; ?></a>
                  </li>
                  <li><a href="#" class="waves-effect"><?php echo $asinstitution; ?></a>
                  </li>
                  <li><a href="#" class="waves-effect"><?php echo $asobserver; ?></a>
                  </li>
                </ul>
              </div>
            </li>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> <?php echo $contact; ?><i
                  class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#" class="waves-effect"><?php echo $contactinfo; ?></a>
                  </li>
                  <li><a href="#" class="waves-effect"><?php echo $writetous; ?></a>
                  </li>
                  <li><a href="#" class="waves-effect"><?php echo $faq; ?></a>
                  </li>
                </ul>
              </div>
            </li>
            <li><a class="waves-effect"><i class="fas fa-chevron-right"></i> <?php echo $about; ?></a>
            </li>
          </ul>
        </li>
        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav <?php echo $dc; ?>" style="min-height:8%;">
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
  <?php include 'includes/landing.php'; ?>
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