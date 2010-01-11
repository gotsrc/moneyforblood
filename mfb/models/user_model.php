<?php

class User_Model extends Model
{
	function verify()
	{
		/* 
		 * Verify the users existance.
		 */
		 $salt = $this->config->item('encryption_key');
		 
		 $this->db->where('username',$this->input->post('username'));
		 $this->db->where('password',sha1($this->input->post('password') . $salt));
		 
		 $get = $this->db->get('users');
		 
		 if($get->num_rows === 1)
		 {
		 	return TRUE;
		 }
		 	else
		 {
		 	return FALSE;
		 }
	}
	
	function create()
	{
		/*
		 * If the user doesn't exist create him/her.
		 */
		 
		 $salt = $this->config->item('encryption_key');
		 
		 $user_data = array(
		 		'username'	=>	$this->input->post('username'),
		 		'email'		=>	$this->input->post('email'),
		 		'password'	=>	sha1($this->input->post('password') . $salt),
		 		
		 		'first_name'	=>	$this->input->post('first_name'),
		 		'last_name'		=>	$this->input->post('last_name'),
		 		'registered'	=>	date("Y-m-d h:i:s"),

		 		
		 		'cash'	=>	'10000',
		 		'level'	=>	'0',
		 		'location'	=>	$this->input->post('location'),
		 		
		 		'ip_address'	=>	$this->input->post('ip'),
		 		'access'	=>	0
		 );
		 
		 $send = $this->db->insert('users',$user_data);
		 
		 return $send;
	}
	
}
