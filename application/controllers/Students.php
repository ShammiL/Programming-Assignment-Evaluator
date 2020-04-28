<?php
class Students extends CI_Controller{

	public function login() {

		$this->load->view('students/login');

	}

	public function view($course_id = "CS3020"){

		$data['title'] = ucfirst('Students following '. $course_id);
		// print_r ($data['title']);

		$data['students'] = $this->Student_model->get_students($course_id);
		$data['count'] = $this->Student_model->get_student_count($course_id);
		// print_r ($data['students']);

		$this->load->view('templates/header');
		$this->load->view('students/view', $data);
		$this->load->view('templates/footer');

	}

	public function search($course_id = "CS3020") {

		$id = $this->input->post('search-student');

		$data['students'] = $this->Student_model->get_students($course_id, $id);
		$data['count'] = $this->Student_model->get_student_count($course_id);
		// print_r ($data['students']);

		$this->load->view('templates/header');
		$this->load->view('students/view', $data);
		$this->load->view('templates/footer');

	}

}
