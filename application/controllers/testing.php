<?php

	class testing extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('unit_test');
		}

		function login_test(){

			$this->unit->run($this->login_model->student_login('170307M','1234'),'170307M','Correct Login','Valid Username & Valid Password');
			$this->unit->run($this->login_model->student_login('170307M','1234567'),FALSE,'Incorrect Login','Valid Username & Invalid Password');
			$this->unit->run($this->login_model->student_login('170309M','1234'),FALSE,'Incorrect Login','Invalid Username & Valid Password');
			$this->unit->run($this->login_model->student_login('170309M','123456'),FALSE,'Incorrect Login','Invalid Username & Invalid Password');

			$this->load->view('tests');

		}

		function student_model_test(){

			$getCourses = array(
				array(
					'course_id' => 'CS2022',
					'name' => 'Theory of Computing',
					'semester' => 2,
					'description' => 'Theory of computation is the branch of computer science that deals with how efficiently problems can be solved on a model of computation, using an algorithm.'
				),
				array(
					'course_id' => 'CS3042',
					'name' => 'Data structures and Algorithms',
					'semester' => 2,
					'description' => 'In depth exploration of algorithms and data structures and using them to solve promming problems.'
				),
			);

			$this->unit->run($this->student_model->getCourses('170307M'),$getCourses,'Get courses test');
			$this->unit->run($this->student_model->checkEnrollment('170307M','CS3042'),'CS3042','Check Enrollment Test','Correct student id and course id');
			$this->unit->run($this->student_model->checkEnrollment('170307M','CS3042'),'CS3042','Check Enrollment Test','Incorrect student id and course id');
			//$this->unit->run($this->student_model->enrollToCourse('170307M','CS2022'),TRUE,'Enroll to course test','Check to see if student is enrolled.');

			$this->load->view('tests');
		}

		function course_model_test(){
			$getCourseDetails = array (
				'course_id' => 'CS2022',
				'name' => 'Theory of Computing',
				'semester' => 2,
				'descriptiion' => 'Theory of computation is the branch of computer science that deals with how efficiently problems can be solved on a model of computation, using an algorithm.'
			);

			$this->unit->run($this->course_model->getCourseDetails('CS2022'),$getCourseDetails,'Get course details check','Check to see whether given an id the course details are displayed.');
			$assignment = array(
				array(
					'assignment_id' => 2,
					'assignment_name' => 'Shortest path',
					'description' => 'Given a set of cities and the distances between each of them, find the shortest path from one to another.',
					'language' => 'Python',
					'course_id' => 'CS3042',
					'deadline' => '2020-04-30',
					'status' => 'available'
				),
				array(
					'assignment_id' => 1,
					'assignment_name' => 'Sorting',
					'description' => 'Given a set of numbers find the soretd sequence in optimal time',
					'language' => 'Python',
					'course_id' => 'CS3042',
					'deadline' => '2020-05-06',
					'status' => 'over'
				)
			);
			$this->unit->run($this->course_model->getAssignments('CS3042'),$assignment,'Get assignments test.', 'Check to see if given a course_id course details are displayed.');

			$this->load->view('tests');
		}

		function assignment_model_test(){
			$this->unit->run($this->assignment_model->checkStatus('2'),TRUE,'Check status test','Checking status of an available assignment.');
			$this->unit->run($this->assignment_model->checkStatus('1'),FALSE,'Check status test','Checking status of an not available assignment.');

			$this->unit->run($this->assignment_model->checkForSubmission('2','170307M'),FALSE,'Check for Submission test.');
			//$this->unit->run($this->assignment_model->checkForSubmission('1','170307M'),TRUE,'Check for Submission test.');
			//$this->unit->run($this->assignment_model->getGrade('1','170307M'),0,'Get grade test','Check to see if the grade is correctly accessed from the database.');
			$this->unit->run($this->assignment_model->getLang('1'),'py','Get language test.','Check whether given the assignment id the corresponding language is displayed.');
			$this->load->view('tests');
		}

		function doAll(){
			$this->login_test();
			$this->student_model_test();
			$this->assignment_model_test();
			$this->load->view('tests');
		}
	}