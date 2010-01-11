<?php

class Game extends Controller
{
	
	function home()
	{
		$validated	=	$this->session->userdata('validated');
		
		if(!isset($validated) || $validated != true)
		{
			$data['page'] = 'Home';
			$data['content']	=	'pages/not_logged_in';			
			$this->load->view('index',$data);
		} else {
			$data['page'] = 'Home';
			$data['content']	=	'game/home';
			$this->load->view('game/layout/index', $data);
		}
	}
	
	function profile($username)
	{
		$this->load->view('game/layout/index', $data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
