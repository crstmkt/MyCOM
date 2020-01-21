<?php

class Formatter
{
	/**
	 * Maskiert den String.
	 *
	 * @param string $string - der Uebergabe String der maskiert werden soll.
	 * 
	 * @return string $string - der maskierte String.
	 */
	public static function maskString($string)
	{
		if(get_magic_quotes_gpc())
		{
			$string = stripslashes($string);
		}
		
		return @mysql_real_escape_string($string);
	}
}

?>