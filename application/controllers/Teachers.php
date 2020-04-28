<?php
class Teachers extends CI_Controller
{

	public function login()
	{

		$this->load->view('teachers/login');

	}

	public function index() {

		$this->load->view('templates/header');
		$this->load->view('teachers/home');
		$this->load->view('templates/footer');
	}
}
