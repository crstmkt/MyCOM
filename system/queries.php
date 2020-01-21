<?php
include("configuration.php");

    //Anzahl Werbebanner
    $request_call_adsn = "SELECT COUNT(*) as anzahl FROM tbl_advertisement";
    $action_call_adsn = mysql_query($request_call_adsn, $link) or die('Mysql error: '.mysql_error());
    $result_call_adsn = mysql_result($action_call_adsn,0);
    
    //Erzeuge Zufallszahl für Werbebanner
    $ads = rand(1, $result_call_adsn);
    
    //Werbecode
    $request_ads = "SELECT code FROM tbl_advertisement WHERE ID LIKE '".$ads."'";
    $action_ads = mysql_query($request_ads, $link) or die ('Mysql error: '.mysql_error());
    $result_ads = mysql_result($action_ads, 0);
    
?>
