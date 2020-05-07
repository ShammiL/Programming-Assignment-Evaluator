<?php

	class student extends CI_Controller{

		public function view ($page = 'home'){

			if ($this->session->userdata('student_id')){
				if (!file_exists(APPPATH . 'views/student/' . $page . '.php')) {
					show_404();
				}

				$data['title'] = ucfirst($page);
				$this->load->view('templates/header');
				$this->load->view('student/' . $page, $data);
				$this->load->view('templates/footer');

			} else {
				redirect('login');
			}
		}

		function viewCourses(){

			if($this->session->userdata('student_id')){

				$indexNumber = $this->session->userdata('student_id');
				$data['courses'] = $this->student_model->getCourses($indexNumber);

				$this->load->view('templates/header');
				$this->load->view('student/view_courses',$data);
				$this->load->view('templates/footer');
			} else {
				redirect('login');
			}
		}

		function courseDetails($id){

			$course_id = $id;
			if(!$this->session->userdata('student_id')){
				redirect('login');
			}

			$indexNumber = $this->session->userdata('student_id');

			if ($this->student_model->checkEnrollment($indexNumber,$course_id)){
				$data['assignments'] = $this->course_model->getAssignments($course_id);
				$data['courseDetails'] = $this->course_model->getCourseDetails($course_id);

				$this->load->view('templates/header');
				$this->load->view('student/view_assignments',$data);
				$this->load->view('templates/footer');

			} else {

				$data['id'] = $course_id;
				$this->load->view('templates/header');
				$this->load->view('student/enroll_course',$data);
				$this->load->view('templates/footer');
			}
			
		}

		function enrollCourse($id){

			if($this->session->userdata('student_id')){

				$indexNumber = $this->session->userdata('student_id');
				$course_id = $id;

				if($this->student_model->enrollToCourse($indexNumber,$course_id) and $this->student_model->checkEnrollment($indexNumbe,$course_id)){
					$data['assignments'] = $this->course_model->getAssignments($course_id);
					$data['courseDetails'] = $this->course_model->getCourseDetails($course_id);

					$this->load->view('templates/header');
					$this->load->view('student/view_assignments',$data);
					$this->load->view('templates/footer');
				} else {

					redirect('student/courseDetails/'.$course_id);
				}

			} else {
				redirect('login');
			}
		}

		function assignmentDetails($assignment_id,$num,$data1=NULL){

			if(!$this->session->userdata('student_id')){
				redirect('login');
			}
			
			$student_id = $this->session->userdata('student_id');
			$status = $this->assignment_model->checkStatus($assignment_id);
			$submissionCheck = $this->assignment_model->checkForSubmission($assignment_id,$student_id);
			//echo $status;
			
			//echo $this->assignment_model->checkForSubmission('1','170307M');
			
			//echo $assignment_id;

			if($status){
				$data['deadline'] = FALSE;
				if($submissionCheck){
					$data['graded'] = FALSE;
					$data['submitted'] = TRUE;
				} else {
					$data['submitted'] = FALSE;
					$data['graded'] = FALSE;
				}
			} else {
				$data['deadline'] = TRUE;
				if($submissionCheck){
					$data['graded'] = TRUE;
					$data['submitted'] = TRUE;
					$data['grade'] = $this->assignment_model->getGrade($assignment_id,$student_id);
				} else {
					$data['graded'] = FALSE;
					$data['submitted'] = FALSE;
				}
			}

			$data['assignment_id'] = $assignment_id;
			$data['num'] = $num;
			$data['error'] = $data1;
			$this->load->view('templates/header');
			$this->load->view('student/viewSubmission',$data);
			$this->load->view('templates/footer');

		}

		function makeSubmission($assignment_id,$num){

			$student_id = $this->session->userdata('student_id');
			//C:\xampp\htdocs\myapp\submissions
			$lang = $this->assignment_model->getLang($assignment_id);
			$config['upload_path'] = './submissions/';
			$config['allowed_types'] = $lang;

			$id = $this->assignment_model->makeSubmission($student_id,$assignment_id);
			$config['file_name'] = $id;

			$this->load->library('upload',$config);

			if($this->upload->do_upload('userfile')){

				$filepath = 'C:/xampp/htdocs/myapp/submissions/'.$id;
				$this->assignment_model->updateSubmission($id,$filepath);
				//echo $this->upload->display_errors();
				//$this->assignmentDetails($assignment_id,$num);
				$this->assignmentDetails($assignment_id,$num);
			} else {
				//$this->assignmentDetails($assignment_id,$num);
				$data = "The file upload was unsuccesssful.<br>Either the file was not written in the expected language, if so please do so.<br>IF you have uploaded the correct file please try again later.";
				$this->assignment_model->deleteSubmission($id);
				$this->assignmentDetails($assignment_id,$num,$data);
			}
		}

	}