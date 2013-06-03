<?PHP
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|       				 SoundZone Radio CMS V1                           #|
#|        		  Copyright 2013 MoOgOoZA PRODUCTION                      #|
#|																		  #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
		
		function SecuriseSQL($str, $avancee=false) 
			{
				if($avancee== true){ return mysql_real_escape_string($str); }
				$str = mysql_real_escape_string(htmlspecialchars($str));
				return $str;
			}
		
		function Securise($str)
			{
				$str = mysql_real_escape_string(htmlspecialchars(stripslashes(nl2br(trim($str)))));
				return $str;
			}
			
		function SecuriseText($str, $avancee=false, $codeforum=false) 
			{
				if($avancee == true){ return stripslashes($str); }
				$str = stripslashes(nl2br(htmlspecialchars($str)));
				if($codeforum == true){$str = bbcode_format($str); }
				return $str;
			}
						
			
?>