<?php
include ("../system/configuration.php");

  $userID = $_SESSION['securityManager']->getUserID();

 /* $call_pns = "SELECT t1.senderID, t1.alreadyread, t1.date, t1.time, t1.causes, t1.text, t2.username, t2.prenom, t2.nom
               FROM tbl_pns AS t1 INNER JOIN tbl_usr_ext AS t2
               ON t1.senderID = t2.userID  
               WHERE receiverID = '".$userID."'";  */
               
  $call_pns = "SELECT t1.senderID AS t1_senderID, 
               t1.alreadyread, 
               t1.date, 
               t1.time, 
               t1.causes AS t1_causes, 
               t1.text as t1_text, 
               t2.userID, 
               t2.username AS t2_username, 
               t2.prenom AS t2_prenom, 
               t2.nom AS t2_nom
               FROM tbl_pns AS t1
               INNER JOIN tbl_usr_ext AS t2
               ON t1.senderID = t2.userID
               WHERE t1.receiverID = ".$userID." ";
               
  $action_call_pns = mysql_query($call_pns, $link) or die('Mysql error: '.mysql_error());
  
  

?>
                                         