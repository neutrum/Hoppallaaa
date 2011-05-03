<?php
  Class User Extends Model
  {
  	  function User()
  	  {
  	  	  parent::Model();
	  }
	  
	  function userVerify($credentials)
	  {
	  	
	  	$login = $credentials['login'];
	  	$password = $credentials['password'];
	  	
	  	$userExists = $this->db->get_where('users', array('UsrLogin' => $login))->result_array();
	  	
	  	if (!empty($userExists))
	  	{
	  		if (md5($password) == $userExists[0]['UsrPassword'])
	  		{
	  		  return true;	
			}		
		}
		return false;
	  }
	  
  }
?>
