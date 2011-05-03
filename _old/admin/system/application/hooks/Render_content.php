<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');   

class Render_content 
{
	function after()
	{
		$ci = &get_instance();
		if (!property_exists (&$ci, "noRender")) {
			$ci->smarty->render();
		}
	}
	
	function before()
	{
		$ci = &get_instance();
		if (!property_exists (&$ci, "noRender") && isLogged()) {
			$ci->smarty->setPartial('content', 'area');
		}
	}
}


?>
