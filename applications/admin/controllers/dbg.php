<?php
  Class Dbg Extends Controller
  {
  	  private $noRender = 1;
  	  function Dbg()
  	  {
  	  	  parent::Controller();
	  }
	  
	  function index()
	  {
	  	  echo "Show me the magic<BR>";
	  	  print_r($this->session->userdata('photos_tmp'));
	  	  print_r($_SESSION);
	  }
  }
?>
