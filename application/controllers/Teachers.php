<?php
class Teachers extends CI_Controller
{

	public function login()
	{

		$this->load->view('teachers/login');

	}

	public function index() {

		$data['courses'] = $this->Course_model->get_courses();

		$this->load->view('templates/header');
		$this->load->view('teachers/home', $data);
		$this->load->view('templates/footer');
	}

	public function grade() {

		$this->load->view('templates/header');
		$this->load->view('teachers/grade');
		$this->load->view('templates/footer');

	}
}
