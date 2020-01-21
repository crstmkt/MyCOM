<?php

include ("../../system/configuration.php");

class MySQLDatabaseConnector implements IDatabaseConnector
{

	/**
	 * Oeffnet eine Datenbankverbindung zu einer MySQL Datenbank.
	 */
	public function openConnection()
	{
    global $host, $user, $pass, $db;
		 
     if(@mysql_connect($host, $user, $pass, false) === false)
		{
			throw new Exception("Could not open database connection");
		}
		else
		{
			if(@mysql_select_db($db) === false)
			{
				throw new Exception("Could not select database");
			}
		}
	}
	
	/**
	 * Schliesst eine Datenbankverbindung zu einer MySQL Datenbank.
	 */
	public function closeConnection()
	{
		@mysql_close();
	}
}
?>