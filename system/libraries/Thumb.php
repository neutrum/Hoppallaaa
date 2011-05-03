<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
  require_once( BASEPATH.'libs/thumb/ThumbFactory.php' );
  
  class CI_Thumb extends CutThumbFactory {
	function CI_Thumb()
	{
		parent::CutThumbFactory();
	}
	function cropImage($prefix, $data, $w, $h=null) {
			$this->maxwidth = $w;
			if ($h == null) {
				$this->maxheight = $w;	
			} else {
			    $this->maxheight = $h;
			}
			$this->thumbDir = $data['upload_dir'];
			$this->makeThumb($data['upload_dir'].$data['filename'], $prefix.$data['filename']);
	}	
  }    
  
?>
