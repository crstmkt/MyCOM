<?php

// +-------------------------------------------------------------------+
// | Copyright (c) 2008 Sven Bartak <sven@svenbartak.de>               |
// +-------------------------------------------------------------------+
// +-------------------------------------------------------------------+
// | Urheberrechtliche Hinweise:                                       |
// +-------------------------------------------------------------------+
// | Dieses Skript ist urheberrechtlich geschützt.                     |
// | Eine Verletzung des Urheberrechts, welches insbesondere die       |
// | Veroeffentlichung und den Vertrieb untersagt, zieht eine          |
// | strafrechtliche Verfolgung des Verletzenden nach sich.            |
// +-------------------------------------------------------------------+
// | Lizenzrechtliche Hinweise:                                        |
// +-------------------------------------------------------------------+
// | Dieses Skript ist lizenztechnisch geschützt.                      |
// | Eine Nutzung dieses Skriptes ohne gültige Lizenz ist strafbar und |
// | wird strafrechtlich verfolgt.                                     |
// |                                                                   |
// | Ein Wort in eigener Sache:                                        |
// | Bitte ersparen Sie mir und vorallen Ihnen den langen und kosten-  |
// | intensiven juristischen Weg. Es lohnt sich einfach nicht.         |
// +-------------------------------------------------------------------+
// +-------------------------------------------------------------------+
// | Wenn Sie dieses Skript dennoch nutzen, vermarkten oder            |
// | veroeffentlichen wollen, wenden Sie sich bitte an folgenden       | 
// | Ansprechpartner:                                                  |
// |                                                                   |
// | Sven Bartak                                                       |
// | Dorfstrasse 37                                                    |
// | 59439 Holzwickede (Germany)                                       |
// |                                                                   |
// | Phone: +49 (0)2301-912634                                         |
// | Mobile: +49 (0)175-6513250                                        |
// +-------------------------------------------------------------------+


/**
 * Das Datenbank Interface fuer die Querys.
 *
 * @name      IDatabaseQuery.class.php
 * @package   database
 * @author    Sven Bartak <sven@svenbartak.de>
 * @copyright (c) 2008 - Sven Bartak 
 *
 * Lizenz:
 * Mit Benutzung dieses Skriptes erkennen Sie automatisch die dafuer
 * geltenden Lizenzbedingungen an. Die Bedingungen finden Sie unter
 * folgender URL.
 * @license http://www.svenbartak.de/licene.txt 
 */
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