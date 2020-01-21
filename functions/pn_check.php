<?php
include("../system/configuration.php");

    $userID = $_SESSION['securityManager']->getUserID();
    
    //Abfrage auf neue Nachrichten
    $call_newpns = "SELECT COUNT(*) as newpns FROM tbl_pns WHERE alreadyread = 0 AND receiverID LIKE '".$userID."'";
    $action_call_newpns = mysql_query($call_newpns, $link) or die('Mysql error: '.mysql_error());
    $result_newpns = mysql_result($action_call_newpns,0);
?>
