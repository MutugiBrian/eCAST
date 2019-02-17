<?php
if(isset($_SESSION['utype'])){
    

    $id  =  $_SESSION['uid'];
	if($_SESSION['utype'] == 'voter'){

	}elseif($_SESSION['utype'] == 'institution'){

    function getdepartmentno(){
        $query = "SELECT COUNT(*) FROM departments where instid = ".$_SESSION['uid']." AND departments.deleted = 0 ";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $row = $dq[1]->fetch_assoc();
          	$GLOBALS['da'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['departments'] = $row["COUNT(*)"];
          
        }else{
          $GLOBALS['departments'] = 0;
       }
    }

    function getupcomingelectionsno(){
    	$now = time();
        $query = "SELECT COUNT(*) FROM elections where instid = ".$_SESSION['uid']." AND elections.startdate > ".$now." AND elections.deleted = 0 ";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $row = $dq[1]->fetch_assoc();
          	$GLOBALS['da'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['upcomingelections'] = $row["COUNT(*)"];
          
        }else{
          $GLOBALS['upcomingelections'] = 0;
       }
    }

    function getongoingelectionsno(){
      $now = time();
        $query = "SELECT COUNT(*) FROM elections where instid = ".$_SESSION['uid']." AND elections.startdate < ".$now." AND elections.enddate >".$now." AND elections.deleted = 0";
        $doq = makequery($query);
       if($doq[0] == 'success'){
          $rowo = $doq[1]->fetch_assoc();
            $GLOBALS['dra'] = $rowo;
          $depts = $rowo["COUNT(*)"];
          $GLOBALS['ongoingelections'] = $rowo["COUNT(*)"];
          
        }else{
          $GLOBALS['ongoingelections'] = 0;
       }
    }

     function getendedelectionsno(){
      $now = time();
        $query = "SELECT COUNT(*) FROM elections where instid = ".$_SESSION['uid']." AND elections.startdate < ".$now." AND elections.enddate <".$now." AND elections.deleted = 0 ";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $row = $dq[1]->fetch_assoc();
            $GLOBALS['dea'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['endedelections'] = $row["COUNT(*)"];
          
        }else{
          $GLOBALS['endedelections'] = 0;
       }
    }

    function getvotersno(){
      $now = time();
        $query = "SELECT COUNT(*) FROM usermaster where institution = ".$_SESSION['uid']." AND usermaster.banned = 0 ";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $row = $dq[1]->fetch_assoc();
            $GLOBALS['da'] = $row;
          $depts = $row["COUNT(*)"];
          $GLOBALS['voters'] = $row["COUNT(*)"];
          
        }else{
          $GLOBALS['voters'] = 0;
       }
    }

    function getdepartmentnames(){
        $query = "SELECT * FROM departments where instid = ".$_SESSION['uid']." AND departments.deleted = 0 ";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $GLOBALS['dna'] = $dq[1];
          $GLOBALS['dnf'] = $dq[1];
          $GLOBALS['dnf'] = $dnf;
        }else{
          $GLOBALS['departments'] = 0;
       }
    }

     function getelectionnames(){
        $query = "SELECT * FROM elections where instid = ".$_SESSION['uid']." AND elections.deleted = 0 ";
        $deq = makequery($query);
       if($deq[0] == 'success'){
          $GLOBALS['ena'] = $deq[1];
        }else{
           $GLOBALS['ena'] = '';
       }
    }
    getongoingelectionsno();
     getendedelectionsno();
     
     getupcomingelectionsno();
     getdepartmentno();
     getdepartmentnames();
     getelectionnames();
     getvotersno();
    }

}else{


   function getinstitutions(){
        $query = "SELECT * FROM usermaster where usertype = 'institution' AND usermaster.banned = 0 ";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $GLOBALS['ina'] = $dq[1];
        }else{
          $GLOBALS['ina'] = array();
       }
    }

    getinstitutions();



}
 ?>