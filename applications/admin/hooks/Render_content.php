<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');   

class Render_content 
{
	function after()
	{
		$ci = &get_instance();

        $RTR = &load_class('Router');
        if(!property_exists (&$ci, "noRender")) {
            $ci->smarty->render();
		}
	}
	
	function before()
	{
		$ci = &get_instance();
        $RTR = &load_class('Router');
        $class = $RTR->fetch_class();

        if (!isLogged() && $class != 'login' && $class != 'uploader') {
            redirect('/admin/login');
        }
		if (!property_exists (&$ci, "noRender") && isLogged()) {
			$ci->smarty->setPartial('content', 'area');
		}
	}
}


?>
