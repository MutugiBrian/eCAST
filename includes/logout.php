<?php
ob_start();
session_start();


 $log = "INSERT INTO `logs` (`id`, `user_reg`, `event`, `time`) VALUES (NULL, '".$_SESSION["regno"]."', 'LOGGED OUT OF THE SYSTEM', CURRENT_TIMESTAMP)";
  $logresult = makequery($log);
ob_clean();
	session_destroy();
	echo "<script language=\"javascript\">window.location.href=\"index.php\";</script>";
	exit();
?>