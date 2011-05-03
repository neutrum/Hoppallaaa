<?php
  Class Login Extends Controller
  {
  	  function Login() 
  	  {
  	  	parent::Controller();
	  }
	  
	  function index()
	  {
	  	  $this->userVerify();
	  	  if (isLogged())
	  	  {
	  	  	  redirect('/');
		  }
		  $this->smarty->setPartial('content', 'login');
	  }
	  
	  function userVerify()
	  {
	  	$credentials = $this->input->post('credentials');
	  	if (!empty($credentials)) {  
	  		  $logged_in = $this->user->userVerify($credentials);
	  		  if ($logged_in) 
	  		  {
	  	  		  $this->session->set_userdata('logged_in', 1);
			  }
		}
	  }
	  
	  function logout()
	  {
	  	  $this->session->unset_userdata('logged_in');
	  	  redirect('/');
	  }
  }
?>
