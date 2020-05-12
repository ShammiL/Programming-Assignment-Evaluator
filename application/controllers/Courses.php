<?php
class Courses extends CI_Controller{

	public function index($course_id = 'CS3020'){
		//  echo $course_id;

		$data['course'] = $course_id;
		// echo ($course_id);
		$this->load->view('templates/header');
		$this->load->view('courses/course_page', $data);
		$this->load->view('templates/footer');
		// $this->load->view('pages/about');

	}

}
