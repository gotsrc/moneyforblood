<?php

class Home extends Controller 
{
	function __construct()
	{
	
	}
	
	function index()
	{
		die("You're not logged in!");
	}
	
	function login()
	{
		die("Login page here.");
	}
	
	function logout()
	{
		die("You're now logged out.");
	}
}
