<?php


class Dispatcher
{
	/**
	 * Der zu verarbeitende Request.
	 *
	 * @var array
	 */
	private $request = null;
	
	/**
	 * Das Ergebnis des 
	 *
	 * @var unknown_type
	 */
	private $response = null;
	
	/**
	 * Initialisiert benoetigte Klassen und Dienste.
	 */
	public function init()
	{
		if(!isset($_SESSION['securityManager']))
		{
			$_SESSION['securityManager'] = new SecurityManager();
		}
	}
	
	/**
	 * Handles the request and set the response.
	 */
	public function handleRequest()
	{
		if(isset($_SESSION['securityManager']))
		{
			if($_SESSION['securityManager']->isLoggedIn() === true)
			{
				$this->handleRequestWithSession();
			}
			else
			{
				$this->handleRequestWithoutSession();
			}
		}
		else
		{
			$this->response = "There is no instance of security manager. Try to get some...";
			$this->init();
			$this->handleRequest();
		}
	}
	
	/**
	 * Arbeitet den Request mit einer gueltigen SecuritySession ab.
	 */
	private function handleRequestWithSession()
	{
		switch($this->request['page'])
		{
			case 'logout':
				$_SESSION['securityManager']->logout();
				unset($_SESSION['securityManager']);
				$this->response = "Abmeldung erfolgreich.";
			break;
			
			default:
				$this->response = ' <a href="index.php?page=logout">Abmelden</a>';
			break;
		}
	}
	
	/**
	 * Arbeitet den Request ohne eine gueltigen SecuritySession ab.
	 */
	private function handleRequestWithoutSession()
	{
		switch($this->request['page'])
		{
			case 'login':
				if($_SESSION['securityManager']->login($this->request['username'], $this->request['password']) === true)
				{
					$this->response = 'Anmeldung erfolgreich.';
					$this->handleRequestWithSession();
				}
				else
				{
					$this->response = 'Benutzerdaten fehlerhaft.';
				}
			break;
		}
	}
	
	/**
	 * Setzt den zu verarbeitenden Request.
	 * 
	 * @param array $request - der Request.
	 */
	public function setRequest($request)
	{
		$this->request = $request;
	}
	
	/**
	 * Gibt das Ergebnis der Abfrage zurueck.
	 *
	 * @return array $response - das Ergebnis.
	 */
	public function getResponse()
	{
		return $this->response;
	}
}

?>