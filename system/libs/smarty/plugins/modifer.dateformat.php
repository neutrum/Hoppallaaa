<?php
 /**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
  function smarty_modifier_dateformat($string)
  {  	
    	$datestimestamp = mktime($string);
    	$newData = date('d/m/Y', $datestimestamp); 
    	return $newDate
  }
?>
