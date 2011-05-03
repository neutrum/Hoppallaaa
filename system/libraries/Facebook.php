<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');

  require_once( BASEPATH.'libs/facebook/src/facebook.php' );

  class CI_Facebook extends Facebook {
	function CI_Facebook()
	{
		parent::Facebook();
	}
  }

?>
