<?php

interface IDatabaseQuery
{
	/**
	 * Setzt einen Query ab und speichert das Ergebnis zwischen.
	 * Danach kann durch Standardfunktionen die durch das Interface beschrieben werden auf das Ergebnis zugegriffen werden.
	 *
	 * @param string $string - der Querystring
	 */
	public function query($string);
	
	/**
	 * Gibt die betroffenen Reihen der Abfrage zurueck.
	 * 
	 * @return array $rows - die betroffenen Abfragereihen
	 */
	public function fetchRows();
	
	/**
	 * Gibt die Anzahl der betroffenen Reihen zurueck.
	 *
	 * @return integer $count - die Anzahl der betroffenen Reihen.
	 */
	public function numRows();
}

?>
