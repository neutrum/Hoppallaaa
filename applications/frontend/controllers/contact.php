<?php
  Class Contact extends Controller
  {
  	  function Contact()
  	  {
  	  	  parent::Controller();
	  }
	  
	  function index()
	  {
	  	  $data = array();
	  	  $this->smarty->setPartial('content','contact',$data);
	  } 
  }
?>
