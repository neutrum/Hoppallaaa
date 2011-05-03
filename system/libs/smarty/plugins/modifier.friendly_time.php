<?php

	function smarty_modifier_friendly_time($time) {		
		$tm = strtotime($time);

		$dt_diff = time() - $tm;
		$datum = date("d.m.Y",$tm); 
		$dni = array("neděle", "pondělí", "úterý", "středa", "čtvrtek", "pátek", "sobota");

		if ($dt_diff >= (-1)*(24*60*60) && $dt_diff < 0 ) {
			$txt = 'zítra '.$datum;
		}
		elseif($dt_diff >= 0 && $dt_diff < (24*60*60)) {
			$txt = 'Dnes '.$datum;
		}
		elseif($dt_diff < 72*3600) {
			if(date("d", strtotime('Yesterday')) == date('d', $tm)) {
				$txt = "včera ".$datum;
				//$txt .= strftime("%H:%M", $tm);
			}
			else {
				$txt = $dni[strftime("%w", $tm)]." ".$datum;
			}
		}
		elseif(date("Y") != date('Y', $tm)) {
			$txt = strftime("%e. %B %Y", $tm);
		}
		else {
			$txt = $dni[strftime("%w", $tm)]." ".$datum;
		}

		return strtolower($txt);
	}

?>