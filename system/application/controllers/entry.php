<?php
  class Entry extends Controller {

	function Entry()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data = array(
			"event" => 'Ci pana'
		);
		$this->smarty->setPartial("content", "home", $data);
	} 
}
