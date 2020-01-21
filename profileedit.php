<?php
include("source/security/SecurityManager.class.php");
include("lib/classloader.lib.php");
include("system/configuration.php"); 
include("system/queries.php");
include("editor/fckeditor.php");
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
    <title>MyCOM | Startseite                                                            
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
    <link rel="stylesheet" type="text/css" href="template/profileedit.css" />                                      
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
            ?> 	                                     
            <!-- intern start --> 						             Eingeloggt als:                                                                  
            <?php  echo $_SESSION['securityManager']->getUsername(); ?>                                                                   
            <br>                         
            <br>            Du hast 0 neue Nachrichten.                                       
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
          </form>
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
              <a class="navlink" href="profile.php?username=<?php echo $_SESSION['securityManager']->getUsername(); ?>"><li>Mein Profil ansehen</li></a>
              <a class="navlink" href="profileedit.php"><li>Mein Profil bearbeiten</li></a>
              <a class="navlink" href="search.php"><li>Leute finden</li></a>
          </div> 
        </div>
      </div>
<?php 
}
?>  	              
      </div>                                
    <div id="mainarea">
    <div id="content-topbar">               
          <div id="ctopbarl">          
          </div>               
          <div id="ctopbarc"><h2>Mein Profil bearbeiten</h2>          
          </div>               
          <div id="ctopbarr">          
          </div>           
        </div>  
    
        <div id="frame-topbar">               
          <div id="ftopbarl">          
          </div>               
          <div id="ftopbarc"><h2>
          <?php 
          	if (isset ($_REQUEST["changesuccessful"]))  
    {  
      echo "Änderung erfolgreich übernommen";  
    }
          ?>
          </h2>          
          </div>               
          <div id="ftopbarr">          
          </div>           
        </div>             
        <div id="boxcontentbig">        
<?php
              if(isset($_SESSION['securityManager']) && $_SESSION['securityManager']->isLoggedIn() === true )
              { 
                    $callusrdat = "SELECT * FROM tbl_usr_ext WHERE USERNAME like '".$_SESSION['securityManager']->getUsername()."'";
                    $usresult = mysql_query($callusrdat, $link);
                    while($row = mysql_fetch_object($usresult))
                    {
                        $value['prenom'] = $row->prenom;
                        $value['name'] = $row->nom;
                        $value['nickname'] = $row->nickname;
                        $value['gender'] = $row->gender;
                        $value['homecity'] = $row->homecity;
                        $value['smoker'] = $row->smoker;
                        $value['drinker'] = $row->drinker;
                        $value['icq'] = $row->icq;
                        $value['aim'] = $row->aim;
                        $value['msn'] = $row->msn;
                        $value['Skype'] = $row->skype;
                        $value['Yahoo'] = $row->yahoo;
                        $value['rel_ship_stat'] = $row->rel_ship_stat;
                        $value['whatIlike'] = $row->whatIlike;
                        $value['whatIdislike'] = $row->whatIdislike;
                        $value['aboutme'] = $row->aboutme;    
                    }
                
?>                
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!--START---------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->                               
          <form name="profile" action="profileedit.php" method="post">
            <table  width="50%" border="0"  cellpadding="0" cellspacing="2">
              <tr> 
                <td width="110">Vorname:</td><td width="180">
                  <input type="text" name="prenom" value="<?php echo $value['prenom']; ?>" class="profile" /></td>
                </tr>
              <tr>  <td>Nachname:</td>  <td> 
                  <input type="text" name="name" value="<?php echo $value['name']; ?>" class="profile" /></td>
              </tr>
              <tr>  <td>Spitzname:</td>  <td> 
                  <input type="text" name="nickname" value="<?php echo $value['nickname']; ?>" class="profile" /></td>
              </tr>
              <tr>  <td>Geschlecht:</td>  <td> 
                  <select name="gender" class="prfselect"> 
                    <option value="0" <?php if($value['gender'] == "0") { echo "selected";} ?> >---
                    </option> 
                    <option value="1" <?php if($value['gender'] == "1") { echo "selected";} ?> >Weiblich
                    </option> 
                    <option value="2" <?php if($value['gender'] == "2") { echo "selected";} ?> >Männlich
                    </option>
                  </select></td>
              </tr>
              <tr>  <td>Wohnort:</td>  <td> 
                  <input type="text" name="homecity" value="<?php echo $value['homecity']; ?>" class="profile" /></td>
              </tr>
              <tr>  <td>Raucher?:</td>  <td> 
                  <select name="smoker"> 
                    <option value="0" <?php if($value['smoker'] == "0") { echo "selected";} ?> >Ja
                    </option> 
                    <option value="1" <?php if($value['smoker'] == "1") { echo "selected";} ?> >Nein
                    </option> 
                    <option value="2" <?php if($value['smoker'] == "2") { echo "selected";} ?> >Gelegentlich
                    </option>
                  </select></td>
              </tr>
              <tr>  <td>Trinker?</td>  <td> 
                  <select name="drinker"> 
                    <option value="0" <?php if($value['drinker'] == "0") { echo "selected";} ?> >Ja
                    </option> 
                    <option value="1" <?php if($value['drinker'] == "1") { echo "selected";} ?> >Nein
                    </option> 
                    <option value="2" <?php if($value['drinker'] == "2") { echo "selected";} ?> >Gelegentlich
                    </option>
                  </select></td>
              </tr>
              <tr>  <td>ICQ:</td>  <td> 
                  <input type="text" name="ICQ" value="<?php echo $value['icq']; ?>" class="profile" /></td>
              </tr>
              <tr>  <td>AIM</td>  <td> 
                  <input type="text" name="AIM" value="<?php echo $value['aim']; ?>" class="profile" /></td>
              </tr>
              <tr>  <td>MSN</td>  <td> 
                  <input type="text" name="MSN" value="<?php echo $value['msn']; ?>" class="profile" /></td>
              </tr>
              <tr>  <td>Skype</td>  <td> 
                  <input type="text" name="Skype" value="<?php echo $value['Skype']; ?>" class="profile" /></td>
              </tr>
              <tr>  <td>Yahoo</td>  <td> 
                  <input type="text" name="Yahoo" value="<?php echo $value['Yahoo']; ?>" class="profile" /></td>
              </tr>
              <tr>  <td>Beziehungsstatus:</td>  <td> 
                  <select name="rel_ship_state"> 
                    <option value="0" <?php if($value['rel_ship_stat'] == "0") { echo "selected";} ?> >Keine Angabe
                    </option> 
                    <option value="1" <?php if($value['rel_ship_stat'] == "1") { echo "selected";} ?> >Solo und auf der Suche
                    </option> 
                    <option value="2" <?php if($value['rel_ship_stat'] == "2") { echo "selected";} ?> >Solo und will es bleiben
                    </option>
                    <option value="3" <?php if($value['rel_ship_stat'] == "3") { echo "selected";} ?> >Glücklich verliebt
                    </option> 
                    <option value="4" <?php if($value['rel_ship_stat'] == "4") { echo "selected";} ?> >Unglücklich verliebt
                    </option>
                    <option value="5" <?php if($value['rel_ship_stat'] == "5") { echo "selected";} ?> >Glücklich vergeben
                    </option> 
                    <option value="6" <?php if($value['rel_ship_stat'] == "6") { echo "selected";} ?> >Unglücklich vergeben
                    </option> 
                    <option value="7" <?php if($value['rel_ship_stat'] == "7") { echo "selected";} ?> >Glücklich verheiratet
                    </option> 
                    <option value="8" <?php if($value['rel_ship_stat'] == "8") { echo "selected";} ?> >Unglücklich verheiratet
                    </option>
                    <option value="9" <?php if($value['rel_ship_stat'] == "9") { echo "selected";} ?> >Verlobt
                    </option> 
                    <option value="10" <?php if($value['rel_ship_stat'] == "10") { echo "selected"; }?> >Auf den richtigen Partner warten
                    </option>
                  </select></td>
              </tr>
            </table>
            <div id="avatarch">
            <td class="ava">
            <img src="template/img/NoPicBig.jpg">
            [Mein Anzeigebild bearbeiten]<br>
            [Mein Anzeigebild löschen]
            </td>
            </div>
            <div id="editors">
            <center>
Gib hier ein, was du magst            
<?php
              $sBasePath = $_SERVER['PHP_SELF'] ;
              $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "editor" ) ) ;
              $oFCKeditor = new FCKeditor('whatIlike') ;
              $oFCKeditor->BasePath	= $sBasePath ;
              $oFCKeditor->Value		= htmlspecialchars_decode($value['whatIlike'], ENT_COMPAT);
              $oFCKeditor->Create() ;
?>
<br><br>
Gib hier ein, was du nicht magst
<?php 
            $sBasePath = $_SERVER['PHP_SELF'] ;
            $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "editor" ) ) ;
            $oFCKeditor = new FCKeditor('whatIdislike') ;
            $oFCKeditor->BasePath	= $sBasePath ;
            $oFCKeditor->Value		= htmlspecialchars_decode($value['whatIdislike'], ENT_COMPAT);
            $oFCKeditor->Create() ;
?>
<br><br>
Hier kannst du etwas über dich schreiben
<?php 
            $sBasePath = $_SERVER['PHP_SELF'] ;
            $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "editor" ) ) ;
            $oFCKeditor = new FCKeditor('aboutme') ;
            $oFCKeditor->BasePath	= $sBasePath ;
            $oFCKeditor->Value		= htmlspecialchars_decode($value['aboutme'], ENT_COMPAT);
            $oFCKeditor->Create() ;
?>
</center>
</div>
 <center> 
                <input type="reset" name="reset" value="Zurücksetzen" />
                <input type="submit" name="updater" value="Änderungen speichern" />
            </center>
          </form>

<!--UPDATE START--------------------------------------------------------------------------------------------------------------------------->
<?php
echo mysql_error();
 
function update() 
{
  
 if ( isset( $_POST ) )
        $postArray = $_POST ;

      foreach ( $postArray as $sForm => $value )
      {
	       if ( get_magic_quotes_gpc() )
		      $postedValue = htmlspecialchars( stripslashes( $value ) ) ;
	       else
		      $postedValue = htmlspecialchars( $value ) ;
			
      }  

  global $link;

  $updateprofile = "UPDATE `tbl_usr_ext`  
                      SET 
                      `prenom` = '".$_POST['prenom']."',
                      `nom` = '".$_POST['name']."',
                      `nickname` = '".$_POST['nickname']."',
                      `gender` = '".$_POST['gender']."',
                      `homecity` = '".$_POST['homecity']."',
                      `smoker` = '".$_POST['smoker']."',
                      `drinker` = '".$_POST['drinker']."',
                      `icq` = '".$_POST['ICQ']."',
                      `aim` = '".$_POST['AIM']."',
                      `msn` = '".$_POST['MSN']."',
                      `skype` = '".$_POST['Skype']."',
                      `yahoo` = '".$_POST['Yahoo']."',
                      `rel_ship_stat` = '".$_POST['rel_ship_state']."',
                      `whatIlike` = '".$_POST['whatIlike']."',
                      `whatIdislike` = '".$_POST['whatIdislike']."',
                      `aboutme` = '".$_POST['aboutme']."'
                      WHERE 
                      `username` 
                      LIKE 
                      '".$_SESSION['securityManager']->getUsername()."'";  
                       
      mysql_query($updateprofile, $link); 
      //echo mysql_error();
                   
}  
if(isset($_POST['updater'])) 
{ 
  update(); 
}
?>
<!--UPDATE ENDE---------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<!--ENDE----------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->          
<?php 
            }
else
{
    echo "Du bist nicht eingelogt. Bitte logge dich ein um diese Funktion nutzen zu können.";
}       
?>           
        </div>           
        <div id="footerl">        
        </div>           
        <div id="footerc"><h2>All rights reserved by MyCOM © 2009 | MyCOM is a division of Ion-Light</h2>        
        </div>      
      </div>           
    </div>         
    </div>               
    </div>                                                                                        
  </body>
</html>