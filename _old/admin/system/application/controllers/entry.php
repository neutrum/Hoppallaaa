<?php
  class Entry extends Controller {

	function Entry()
	{
		parent::Controller();	
	}
	
	function index()
	{
		if (!isLogged())
		{
		    	redirect('/login');
		}
	} 
}
