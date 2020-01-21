<?php

class HashingEngine
{
	/**
	 * Der private Schluessel mit dem der Hash erzeugt wird.
	 *
	 * @var string
	 */
	private $privateKey = "WKobxlp9Gr1JH41VCC,@i*6I714N7@744GIbYbkUbLTO5UU4uv/E0Y(h:F;Fao*OReDK?LP66ac
  			JH41VCC,@i*6I714N7@744GIbYbkUbLTO5UU4uv/E0Y(h:F;Fao*OReDK?LP66ajhDvb-3IF6FM%zEk*8ZYf>@30@s
  			H-Gs%s4DAiO##1*4s029UX6iWUq*rO>8&5V:Ut-&Wa)v,&qVS1MVNy-IwH@Y6-Gs%s43&k6CVIELQCY5cM30XW97LY
  			1j0l2OU<<9c5uYGHk:e3lNTe4R4LNT*f!9VoOFfO3<6CM8kfVAM<5%6Vve86+gKm*m(Bnce?E3AiWRLRZjV5yvZT98
  			P/1!g!ZtGs%s4?;h5%JH41VCC,@i*6I714N7@744GIbYbkUbLTO5UU4uv/E0Y(h:F;Fao*OReDK?LP66a4j&&//(sh";
	
	/**
	 * Generiert einen eindeutigen Hash fuer einen gegeben String.
	 *
	 * @param string $string - Der String der gehasht 
	 *
	 * @return string $hash - Der generierte Hash.
	 */
	public function create($string)
	{
		$saltHash = array();
		$saltHash['salt'] = null;
		$saltHash['saltedHash'] = null;
		
		// Hashgenerierung
		$saltHash['salt'] = microtime();
		$saltHash['salt'] = crc32($saltHash['salt']);
		$saltHash['salt'] = pack('N', $saltHash['salt']);
		$saltHash['salt'] = base64_encode($saltHash['salt']);
		$saltHash['salt'] = substr($saltHash['salt'], 0, 6);
		
		$saltHash['saltedHash'] = $this->getHash($string, $saltHash['salt']);
		
		return $saltHash['saltedHash'];
	}
	
	/**
	 * Generiert einen eindeutigen Hash fuer einen gegeben String.
	 *
	 * @param string $string - Der String der gehasht 
	 * @param string $hashedString - Der gehashte String 
	 * 
	 * @return boolean $compare - TRUE wenn die Strings indentisch sind.
	 */
	public function compare($string, $hashedString)
	{
		$compare = false;
		$saltHash = array();
		$saltHash['salt'] = null;
		$saltHash['saltedHash'] = null;
		
		$saltHash['salt'] = substr($hashedString, 0, strpos($hashedString, "|"));
		$saltHash['saltedHash'] = $this->getHash($string, $saltHash['salt']);
		
		if($saltHash['saltedHash'] === $hashedString)
		{
			$compare = true;
		}
		
		return $compare;
	}
	
	/**
	 * Generiert den Hash aus dem gegeben String und dem "Salt".
	 *
	 * @param string $string - der normale String.
	 * @param string $salt - das Salt zum hashing.
	 * 
	 * @return string $saltedHash - der hashed string
	 */
	private function getHash($string, $salt)
	{
		$saltedHash = $salt;
		$saltedHash .= "|";
		$saltedHash .= sha1($this->privateKey);
		$saltedHash .= sha1($salt . $string);
		
		return $saltedHash;
	}
}
?>