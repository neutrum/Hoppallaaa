<?php
  function isLogged()
  {
  	  $ci = &get_instance();
  	  if ($ci->session->userdata('logged_in'))
  	  {
  	  	  return true;
	  }
	  return false;
  }
?>
