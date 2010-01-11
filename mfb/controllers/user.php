<?php

class User extends Controller
{
	function index()
	{
		$data['page']		=	'Home';
		$data['content']	=	'pages/login';
		$this->load->view('index', $data);
	}
	
	function login()
	{
		$data['page']		=	'Login';
		$data['content']	=	'pages/login';
		$this->load->view('index', $data);	
	}
	
	function check()
	{
		/* 
		 * Check the users login credentials, if they're correct...
		 * log the user in.
		 */
		$this->load->model('user_model','user');
		$this->load->model('game_model','game');
		$query = $this->user->verify();
		
		if($query)
		{
			$user_data = array(
				'username'	=>	$this->input->post('username'),
				'validated'	=>	TRUE
				);
			
			$this->session->set_userdata($user_data);
			$this->game->update_time();
			redirect('game/home');
		}
			else
		{
			$data['page']		=	'Login Failed!';
			$data['content']	=	'pages/errors/login_failed';
			
			$this->load->view('error', $data);
		}
	}
	
	function register()
	{
		$data['page']		=	'Register an Account';
		$data['content']	=	'pages/register';
		$this->load->view('index', $data);
	
	}
	
	function create()
	{
		/*
		 * Create the user, make sure checks are made to ensure that the user
		 * doesn't exist first.
		 */
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[25]|
										   xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[150]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[34]|htmlspecialchars');
		$this->form_validation->set_rules('confirmpwd','Password Confirmation','trim|matches[password]|required');
		$this->form_validation->set_rules('first_name','First Name','trim|htmlspecialchars');
		$this->form_validation->set_rules('last_name','Last Name','trim|htmlspecialchars');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->register();
		}
			else
		{
			$this->load->model('user_model','user');
			
			if($send = $this->user->create())
			{
				$data['content']	=	'pages/member_created';
				$this->load->view('index', $data);
			}
				else
			{
				$this->register();
			}
		}
	}
	
	function forgotpass()
	{
		$data['page']		=	'Forgot Password';
		$data['content']	=	'pages/forgotpass';
		$this->load->view('index', $data);
	
	}
}

