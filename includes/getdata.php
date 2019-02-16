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

    function getdepartmentnames(){
        $query = "SELECT * FROM departments where instid = ".$_SESSION['uid']." AND departments.deleted = 0 ";
        $dq = makequery($query);
       if($dq[0] == 'success'){
          $GLOBALS['dna'] = $dq[1];
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
     getupcomingelectionsno();
     getdepartmentno();
     getdepartmentnames();
     getelectionnames();
    }

}else{


}
 ?>