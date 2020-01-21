<?php
include("source/security/SecurityManager.class.php");
include("lib/classloader.lib.php");
include("system/configuration.php"); 
include("system/queries.php");
@session_start();
//var_dump($_SESSION['securityManager']);
if(isset($_POST) || isset($_GET))
{
	try
	{
		$mysqlConnector = null;
		$mysqlConnector = new MySQLDatabaseConnector();
		$mysqlConnector->openConnection();
		
		// Fuege POST und GET zusammen zu einem Array.
		$request = array();
		$request = @array_merge($_POST, $_GET);
		
		// Instantiierung des Dispatcher
		$dispatcher = null;
		$dispatcher = new Dispatcher();
		$dispatcher->init();
		$dispatcher->setRequest($request);
		$dispatcher->handleRequest();
	  $dispatcher->getResponse();
		
		$mysqlConnector->closeConnection();
	}
	catch(Exception $ex)
	{
		echo "";
	} 
}
/*
 * Bugfix
 * 
<?xml" als PHP Tag
 */
 echo '<?xml version="1.0" encoding=""?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">                                   
  <head>                                                              
    <title>MyCOM | Mein Postfach                                                            
    </title>                                                              
    <meta http-equiv="content-style-type" content="text/css" />                                                              
    <meta http-equiv="content-script-type" content="text/javascript" />                                                              
    <meta http-equiv="content-language" content="de" />                                                              
    <meta http-equiv="expires" content="0" />	                                                               
    <meta name="page-topic" content="MyCOM | www.ion-light.de" />                                                              
    <meta name="description" content="MyCOM | www.ion-light.de" />                                                              
    <meta name="keywords" content="MyCOM | www.ion-light.de" />                                                              
    <meta name="generator" content="MyCOM | http://www.mycom.ion-light.de (c) 2009 - all rights reserved" />                                                              
    <meta name="author" content="MyCOM | http://www.mycom.ion-light.de (c) 2009 - all rights reserved" />                                                              
    <meta name="robots" content="index, follow" />	                                                               
    <link rel="stylesheet" type="text/css" href="template/default.css" /> 
    <link rel="stylesheet" type="text/css" href="template/post.css" />                                     
  </head>                                   
  <body>                                                           
    <div id="header">     Testseite                                                          
    </div>                                                           
    <div id="topnavileftcorner">                                                           
    </div>                                                           
    <div id="topnavileftborder">                                                           
    </div>                                                           
    <div id="topnavitoolbar"><h2>                                                                                                           
        <a href="index.php" class="a1">Startseite</a> |                                                                                                            
        <a href="index.php?news=1" class="a1">News</a> |                                                                                                            
        <a href="index.php?impres=1" class="a1">Impressum</a> |                                                                                                            
        <a href="index.php?agb=1" class="a1">AGBs</a> |                                                                                                            
        <a href="index.php?version=1" class="a1">Versionshinweise</a> |                                                                                                            
        <a href="http://www.ion-light.de" class="a1">Bugtracker</a></h2>                                                           
    </div>                                                           
    <div id="topnavirightborder">                                                           
    </div>                                                           
    <div id="topnavirightcorner">                                                           
    </div>                                                           
    <div id="advert-lefttop">                                                           
    </div>                                                           
    <div id="advert-leftbottom">                                                           
    </div>                                                           
    <div id="advert-righttop">                                                           
    </div>                                                           
    <div id="advert">
<?php 
       echo $result_ads;
                                                            ?>                                                           
    </div>                                                           
    <div id="advert-rightbottom">                                                           
    </div>                                                           
    <div id="advert-right">                                                           
    </div>                          
    <div id="wrapper" class="clearfix">                
      <div id="usernavi">                            
        <form action="index.php?page=login" method="post">                     
          <div id="loginbar">                       
          </div>	                      
          <div id="boxcontent">   	   	
<?php
		if(isset($_SESSION['securityManager']) && $_SESSION['securityManager']->isLoggedIn() === true)
		{
		  include ("functions/pn_check.php");
            ?> 	                                     
            <!-- intern start --> 						             Eingeloggt als:                                                                  
            <?php  echo $_SESSION['securityManager']->getUsername(); ?>                                                                   
            <br>                         
            <br>            Du hast <a href="post.php"><?php echo $result_newpns ?> neue Nachrichten. </a>                                      
            <br>                         
            <br>            Du hast 0 neue Events.                                       
            <a href="index.php?page=logout">                           
              <img class="logoutbt"></a>                                      
            <!-- intern end -->	 		
<?php	
		}
		else 
		{
            ?> 	  	                          
            <!-- default start -->   	  	                          
            <div>  	  	                                
              <div id="loginuser">                                 
                <table border="0">                                     
                  <td valign="middle">                                         
                    <input class="login" type="text" name="username" value="" class="login" /></td>                                 
                </table>                             
              </div>	    	                              
              <div id="loginpass">                                 
                <table border="0">                                     
                  <td valign="middle">                                         
                    <input class="login" type="password" name="password" value="" /></td>                                 
                </table>                             
              </div>	    	                              
              <input class="loginbt" type="submit" name="sender" value="" />	 	  	                          
            </div>	  	                          
            <a href="register.php">              
              <img class="registerbt"></a>	  	                          
            <!-- default end -->  	  	
<?php
		}
            ?>   	                      
          </div>
<?php 
if(isset($_SESSION['securityManager']) && $_SESSION['securityManager']->isLoggedIn() === true)
{

?>  
      <div id="leftnavigation">  
        <div id="navileftborder">
        </div>  
        <div id="navibar"><h2>Navigation</h2>
        </div>  
        <div id="navirightborder">
        </div>  
        <div id="boxcontent">
          <div id="usernavigation">
            <ul class="usrnavi">
              <a class="navlink" href="index.php"><li>Start</li></a>
              <a class="navlink" href="profile.php?username=<?php echo $_SESSION['securityManager']->getUsername(); ?>"><li>Mein Profil ansehen</li></a>
              <a class="navlink" href="profileedit.php"><li>Mein Profil bearbeiten</li></a>
              <a class="navlink" href="post.php"><li>Mein Postfach</li></a>
              <a class="navlink" href="search.php"><li>Leute finden</li></a>
          </div> 
        </div>
      </div>
<?php 
}
?>  	              
      </div>                                
    <div id="mainarea">                           
      <div id="postbar">
        Eingang | Ausgang | Archiv | Nachricht schreiben
      </div>
      <div id="postwrapper">
      </div>
      <div id="postbox">
        <?php 
        
        include("functions/pn_call_inbox.php"); 
        
       
        while($row = mysql_fetch_object($action_call_pns))
                    {
                        $value['prenom'] = $row->t2_prenom;
                        $value['username'] = $row->t2_username;
                        $value['nom'] = $row->t2_nom;
                        $value['causes'] = $row->t1_causes;
                        $value['text'] = $row->t1_text;      
              ?>        
                  <table border="0" width="450">
                    <td width="80" height="90"><img src="template/img/NoPic.jpg"></td>
                    
                    <td valign="top" width="100">
                    <a href="profile.php?username=<?php echo $value['username'] ?>">
                    <?php echo $value['prenom'];
                          echo " "; 
                          echo $value['nom']?><br>
                    <?php echo $value['username']?></a></td>
                    <td valign="top">  
                      <b><?php echo $value['causes'] ?> </b><br>   
                      <?php echo $value['text']?>       
                    </td>           
                  </table>
  <?php             
                   }  
  ?>
        
      </div>
      </div>           
    </div>         
    </div>               
    </div>                                                                                        
  </body>
</html>