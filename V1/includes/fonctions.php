<?php
		
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
			
		function parseSmiley($text)
			{

    			$smileys = array(
    			':o' => 'mozilla_surprised.png',
    			':O' => 'mozilla_surprised.png',
    			':-o' => 'mozilla_surprised.png',
    			':-O' => 'mozilla_surprised.png',
    			':)' => 'mozilla_smile.png',
        		';)' => 'mozilla_wink.png',
        		':-)' => 'mozilla_smile.png',
        		';-)' => 'mozilla_wink.png',
        		':D' => 'mozilla_laughing.png',
        		':-D' => 'mozilla_laughing.png',
        		':d' => 'mozilla_laughing.png',
        		':-d' => 'mozilla_laughing.png',
        		'(a)' => 'mozilla_innocent.png',
        		':p' => 'mozilla_tongueout.png',
        		':-p' => 'mozilla_tongueout.png',
        		':P' => 'mozilla_tongueout.png',
        		':-P' => 'mozilla_tongueout.png',
        		':/' => 'mozilla_undecided.png',
        		':-/' => 'mozilla_undecided.png',
        		'><' => 'mozilla_yell.png',
        		'>.<' => 'mozilla_yell.png',
        		'>-<' => 'mozilla_yell.png',
        		'>_<' => 'mozilla_yell.png',
        		':\'(' => 'mozilla_cry.png',
        		':-\'(' => 'mozilla_cry.png',
        		':|' => 'mozilla_embarassed.png',
        		':-|' => 'mozilla_embarassed.png',
        		':(' => 'mozilla_frown.png',
        		':-(' => 'mozilla_frown.png'
    			);

    			foreach($smileys as $smiley => $img)
    			{
        			$text = str_replace(    
           			$smiley,
            		"<img src='/smileys/{$img}' />",
            		$text
        			);
    			}
    			return $text;
			}
						
			
?>