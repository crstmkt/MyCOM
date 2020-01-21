<?php

interface IDatabaseConnector
{
	/**
	 * Oeffnet eine Datenbankverbindung zu einer MySQL Datenbank.
	 */
	public function openConnection();
	
	/**
	 * Schliesst eine Datenbankverbindung zu einer MySQL Datenbank.
	 */
	public function closeConnection();
}

?>