<?php

class SecurityManager
{
	/**
	 * Aktueller loginstatus fuer den Benutzer
	 * 
	 * @var boolean
	 */
	private $isLoggedIn = false;
	
	/**
	 * Status ob der angemeldete Benutzer ein Admin ist.
	 *
	 * @var boolean
	 */
	private $isAdmin = false;
	
	/**
	 * Der Benutzername
	 *
	 * @var string
	 */
	private $username = null;
	
	/**
	 * Die BenutzerID
	 *
	 * @var integer
	 */
	private $userID = -1;
	
	/**
	 * Meldet den Benutzer mit den gegebenen Werten am System an und setzt die Auth-Session.
	 *
	 * @param string $username - der Benutzername
	 * @param string $password - das Kennwort
	 */
	public function login($username, $password)
	{
		$isLoggedIn = false;
		
		try
		{
			$securityQuery = new MySQLDatabaseQuery();
			$securityQuery->query("SELECT userID, password, isAdmin FROM tbl_user WHERE username = '" . Formatter::maskString($username) . "'");
			
			$hashingEngine = new HashingEngine();
			
			if($securityQuery->numRows() > 0)
			{
				while($rows = $securityQuery->fetchRows())
				{
					if($hashingEngine->compare($password, $rows['password']) === true)
					{
						$this->isLoggedIn = true;
						$isLoggedIn = true;
						$this->userID = $rows['userID'];
						$this->username = $username;
						
						if($rows['isAdmin'] == 1)
						{
							$this->isAdmin = true;
						}
					}
				}
			}
		}
		catch(Exception $ex)
		{
		
		}
		
		return $isLoggedIn;
	}
	
	/**
	 * Meldet den Benutzer ab.
	 */
	public function logout()
	{
		$this->isAdmin = false;
		$this->isLoggedIn = false;
		$this->username = null;
		$this->userID = -1;
	}
	
	/**
	 * Gibt den aktuellen Status der Anmeldung zurueck.
	 *
	 * @return boolean $isLoggedIn - TRUE wenn der Benutzer angemeldet ist, FALSE ansonsten.
	 */
	public function isLoggedIn()
	{
		return $this->isLoggedIn;
	}
	
	/**
	 * Gibt den Adminstatus zurueck.
	 *
	 * @return boolean $isAdmin - TRUE wenn der Benutzer ein Administrator ist, FALSE sonst.
	 */
	public function isAdmin()
	{
		return $this->isAdmin;
	}
	
	/**
	 * Gibt den Benutzernamen des angemeldeteten Benutzers zurueck.
	 *
	 * @return string $username - Der Benutzername des Users.
	 */
	public function getUsername()
	{
		return $this->username;
	}
	
	/**
	 * Gibt die BenutzerID des angemeldeten Benutzers zurueck.
	 *
	 * @return integer $userID - Die BenutzerID des Users.
	 */
	public function getUserID()
	{
		return $this->userID;
	}
}
?>