<?php


function __autoload($className)
{
	define("__GLOBAL_PACKAGE_PATH", "source/");
	define("__GLOBAL_CLASS_POSTFIX", ".class.php");
	
	// Klassenattribute
	$packageRootDir = null;
	$currentObject = null;
	$currentClass = null;
	
	// Oeffnen des Paketverzeichnisses.
	$packageRootDir = dir(__GLOBAL_PACKAGE_PATH);
	
	// Durchlaufe alle Ordner des Paketverzeichnisses.
	while($currentObject = $packageRootDir->read())
	{
		// Laufe weiter wenn ein Punkt gefunden wurde.
		if($currentObject == ".")
		{
			continue;
		}
		else
		{
			// Laufe weiter wenn zwei Punkte gefunden wurden.
			if($currentObject == "..")
			{
				continue;
			}
			else 
			{
				// Baue den kompletten Pfad zur Klasse. Beispiel: /database/DatabaseConnector.class.php
				$currentClass = __GLOBAL_PACKAGE_PATH . $currentObject . "/" . $className . __GLOBAL_CLASS_POSTFIX;
				
				// Wenn die unter dem Pfad eine Datei existiert binde sie einmalig ein.
				if(file_exists($currentClass))
				{
					@require_once ($currentClass);
				}
			}
		}
	}
}

?>