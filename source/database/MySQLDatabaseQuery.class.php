<?php

class MySQLDatabaseQuery implements IDatabaseQuery
{
	/**
	 * Das Ergebnis des Querys.
	 *
	 * @var ressource $queryResult
	 */
	private $queryResult = null;
	
	/**
	 * Setzt einen Query ab und speichert das Ergebnis zwischen.
	 * Danach kann durch Standardfunktionen die durch das Interface beschrieben werden auf das Ergebnis zugegriffen werden.
	 *
	 * @param string $string - der Querystring
	 */
	public function query($string)
	{
		$this->queryResult = @mysql_query($string);
	}
	
	/**
	 * Gibt die betroffenen Reihen der Abfrage zurueck.
	 * 
	 * @return array $rows - die betroffenen Abfragereihen
	 */
	public function fetchRows()
	{
		return @mysql_fetch_assoc($this->queryResult);
	}
	
	/**
	 * Gibt die Anzahl der betroffenen Reihen zurueck.
	 *
	 * @return integer $count - die Anzahl der betroffenen Reihen.
	 */
	public function numRows()
	{
		return @mysql_num_rows($this->queryResult);
	}
}
?>