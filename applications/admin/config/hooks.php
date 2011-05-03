<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/


$hook['post_controller'][] = array(
                            	'class' => 'Render_content',
                            	'function' => 'after',
                            	'filename' => 'Render_content.php',
                            	'filepath' => 'hooks' 
							);
$hook['post_controller_constructor'][] = array(
                            	'class' => 'Render_content',
                            	'function' => 'before',
                            	'filename' => 'Render_content.php',
                            	'filepath' => 'hooks' 
							);
/* End of file hooks.php */
/* Location: ./system/application/config/hooks.php */