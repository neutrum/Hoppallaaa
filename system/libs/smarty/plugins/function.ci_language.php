<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {ci_language} function plugin
 *
 * Type:     function<br>
 * Name:     ci_language<br>
 * Purpose:  bridge to code igniter language files
 * @author Neighbor Webmastert <kepler ar neighborwebmaster dot com>
 * @param array Format:
 * <pre>
 * array(
 * 'file' => language file to load 
 * 'lang' => optional language identifier - defaults to 'english'
 * 'lang' => option language identifier - defaults to 'english'
 * 'lang' => option language identifier - defaults to 'english'
 * )
 * </pre>
 * @param Smarty
 */
function smarty_function_ci_language($params, &$smarty)
{
        if ($smarty->debugging) {
            $_params = array();
            require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
            $_debug_start_time = smarty_core_get_microtime($_params, $smarty);
        }

        $_lang = isset($params['lang']) ? $smarty->_dequote($params['lang']) : 'english';
        $_file = isset($params['file']) ? $smarty->_dequote($params['file']) : '';
        $_line = isset($params['line']) ? $smarty->_dequote($params['line']) : '';
        $_template = isset($params['template']) ? $smarty->_dequote($params['template']) : '';
        $_assign = isset($params['assign']) ? $smarty->_dequote($params['assign']) : '';

        if (substr($_lang, 0, 1) == '$')
        {
            $_lang = $smarty->get_template_vars( substr($_lang, 1) );
        }
        if (substr($_file, 0, 1) == '$')
        {
            $_file = $smarty->get_template_vars( substr($_file, 1) );
        }
        if (substr($_line, 0, 1) == '$')
        {
            $_line = $smarty->get_template_vars( substr($_line, 1) );
        }
		$CI = &get_instance();
		if ($_file != '') $CI->lang->load($_file, $_lang);

        if ($_line != '')
        {
// echo "KEY ->".$_line."<-";
// echo "TEMPLATE ->".$_template."<-";
            if ($_template != '')
            {
                $line = str_replace('$', $_line, $_template);
            }
            else
            {
                $line = $_line;
            }
// echo "LINE ->".$line."<-";

	        $val = $CI->lang->line($line);
            if ( $val == '' )
            {
	            $val = $line;
            }

            if ($_assign != '')
            {
	            $smarty->assign( $_assign, $val );
            }
            else
            {
	            echo $val;
            }
        }
        else
        {
		    $arr = $CI->lang->line($_lang);
        }

        if ($smarty->debugging) {
            $_params = array();
            require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
            $smarty->_smarty_debug_info[] = array('type'      => 'config',
                                                'filename'  => $_file.' ['.$_section.'] '.$_scope,
                                                'depth'     => $smarty->_inclusion_depth,
                                                'exec_time' => smarty_core_get_microtime($_params, $smarty) - $_debug_start_time);
        }

}

/* vim: set expandtab: */

?>
