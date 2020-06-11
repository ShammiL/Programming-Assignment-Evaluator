<?php

	class testing extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('unit_test');
		}

		function login_test(){

			// Student
			$this->unit->run($this->login_model->student_login('170307M','1234'),'170307M','Student Correct Login','Valid Username & Valid Password');
			$this->unit->run($this->login_model->student_login('170307M','1234567'),FALSE,'Student Incorrect Login','Valid Username & Invalid Password');
			$this->unit->run($this->login_model->student_login('170309M','1234'),FALSE,'Student Incorrect Login','Invalid Username & Valid Password');
			$this->unit->run($this->login_model->student_login('170309M','123456'),FALSE,'Student Incorrect Login','Invalid Username & Invalid Password');

			// Lecturer
			// $this->unit->run($this->login_model->lecturer_login('972183261v','1234'),array ( 'nic' => '972183261v', 'password' => '81dc9bdb52d04dc20036dbd8313ed055', 'status' => '1' ),'Lecturer Correct Login','Valid Username & Valid Password');
			$this->unit->run($this->login_model->lecturer_login('972183261v','1234567'),FALSE,'Lecturer Incorrect Login','Valid Username & Invalid Password');
			$this->unit->run($this->login_model->lecturer_login('972183261x','1234'),FALSE,'Lecturer Incorrect Login','Invalid Username & Valid Password');
			$this->unit->run($this->login_model->lecturer_login('972183261x','123456'),FALSE,'Lecturer Incorrect Login','Invalid Username & Invalid Password');

			// Admin
			$this->unit->run($this->login_model->admin_login('melangak@email.com','1234'),'melangak@email.com','Admin Correct Login','Valid Username & Valid Password');
			$this->unit->run($this->login_model->admin_login('melangak@email.com','1234567'),FALSE,'Admin Incorrect Login','Valid Username & Invalid Password');
			$this->unit->run($this->login_model->admin_login('melangak@gmail.com','1234'),FALSE,'Admin Incorrect Login','Invalid Username & Valid Password');
			$this->unit->run($this->login_model->admin_login('melangak@gmail.com','123456'),FALSE,'Admin Incorrect Login','Invalid Username & Invalid Password');

			$this->load->view('tests');

		}

		function student_model_test(){

			$sign_up_input = array(
				'indexNumber' => '170295H',
				'password' => md5("1234")
			);

			$add_input = array(
				'indexNumber' => '170296H',
				'fname' => 'Melanga',
				'lname' => 'Kasun',
				'email' => 'melangak@gmail.com',
				'gender' => 'Male',
				'nationality' => 'Sinhala',
				'birthday' => '1997-08-05',
				'address' => 'abc, Matara',
				'semester' => 1,
				'phone' => '0719717847'
			);

			$update_input = array(
				'fname' => 'MelangaK',
				'lname' => 'MKasun',
				'email' => 'melangakm@gmail.com',
				'gender' => 'Male',
				'nationality' => 'Sinhala',
				'birthday' => '1997-08-06',
				'address' => 'abc, Galle',
				'semester' => 2,
				'phone' => '0719717846'
			);
			
			$get_semester_courses = array(
				array(
					'course_id' => 'CS1032',
					'course_name' => 'Programming Fundamentals',
					'semester' => 1,
					'lecturer_nic' => '972183261v',
					'description' => 'On completion of the course, students will be able to'
				)
			);

			$get_index_courses = array(
				array(
					array(
						'course_id' => 'CS1032',
						'course_name' => 'Programming Fundamentals',
						'semester' => 1,
						'lecturer_nic' => '972183261v',
						'description' => 'On completion of the course, students will be able to'
					)
				)
			);

			$get_student_course = array(
				array(
					'indexNumber' => '170298H',
					'course_id' => 'CS1032',
					'fname' => 'MelangaK',
					'lname' => 'MKasun',
					'email' => 'melangakm@gmail.com',
					'birthday' => '1997-08-06',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'address' => 'abc, Galle',
					'phone' => '0719717846',
					'semester' => 1
				)
			);

			$get_all_students = array(
				array(
					'indexNumber' => '124564F',
					'fname' => 'D. B. Sachini',
					'lname' => 'Lakshani',
					'email' => 'sachini04@email.com',
					'birthday' => '2004-10-24',
					'gender' => 'Female',
					'nationality' => 'Sinhala',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'phone' => '0713665604',
					'semester' => ""
				),
				array(
					'indexNumber' => '170298H',
					'fname' => 'MelangaK',
					'lname' => 'MKasun',
					'email' => 'melangakm@gmail.com',
					'birthday' => '1997-08-06',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'address' => 'abc, Galle',
					'phone' => '0719717846',
					'semester' => 1
				),
				array(
					'indexNumber' => '170307M',
					'fname' => 'Sikandabala',
					'lname' => 'Kogul',
					'email' => 'kogul.17@cse.mrt.ac.lk',
					'birthday' => '1997-06-13',
					'gender' => 'Male',
					'nationality' => 'Tamil',
					'address' => 'Kogul, Colombo, Sri Lanka',
					'phone' => '0774152632',
					'semester' => 2
				)
			);

			$this->unit->run($this->student_model->getCoursesBySemester('170298H'),$get_semester_courses,'Get courses for semester. test','Get a specific students\'s courses by semester');
			$this->unit->run($this->student_model->getCoursesByIndex('170298H'),$get_index_courses,'Get enrolled courses test','Get a specific student\'s enrolled courses');
			$this->unit->run($this->student_model->checkEnrollment('170298H','CS1032'),'CS1032','Check Enrollment test','Correct student id and course id');
			$this->unit->run($this->student_model->checkEnrollment('170298H','CS3043'),FALSE,'Check Enrollment test','Correct student id and incorrect course id');
			$this->unit->run($this->student_model->checkEnrollment('170475H','CS3043'),FALSE,'Check Enrollment test','Incorrect student id and incorrect course id');
			$this->unit->run($this->student_model->get_students('CS1032'),$get_student_course,'Get students by course test');
			$this->unit->run($this->student_model->get_student_count('CS1032'),array('student_count' => 1),'Get students count test','Get the students count for a particular course');
			$this->unit->run($this->student_model->get_student_count(),3,'Get students count test','Get the students count in the system');
			$this->unit->run($this->student_model->add_student($add_input),TRUE,'Add student test','Add student details to the database.');
			$this->unit->run($this->student_model->get_password('170307M'),'93c5ae2ecd4fe11a0273523d43bb80c8','Get student password test');
			$this->unit->run($this->student_model->change_password('170298H', md5(12345)),TRUE,'Update student password test');
			$this->unit->run($this->student_model->update_student('170298H', $update_input),TRUE,'Update student details test');
//			$this->unit->run($this->student_model->get_all_students(),$get_student_course,'Get all the students test');
//			$this->unit->run($this->student_model->enrollCourse('170307M','CS2044'),TRUE,'Enroll to course test','Check to see if student is enrolled.');

			$this->load->view('tests');
		}

		function course_model_test(){

			$create_input = array(
				'course_id' => 'CS1010',
				'course_name' => 'title',
				'description' => 'description',
				'lecturer_nic' => 'teacher',
				'semester' => 'semester'
			);

			$update_input = array(
				'course_name' => 'title1',
				'description' => 'description1',
				'lecturer_nic' => 'teacher1',
				'semester' => 'semester1'
			);

			$courses = array(
				array(
					'course_id' => 'CS1012',
					'course_name' => 'Where can I get',
					'description' => 'aaaa',
					'lecturer_nic' => '582201472v',
					'semester' => 3
				),
				array(
					'course_id' => 'CS1013',
					'course_name' => 'Computer Science for Future',
					'description' => 'aaaa',
					'lecturer_nic' => '582201472v',
					'semester' => 3
				),
				array(
					'course_id' => 'CS1032',
					'course_name' => 'Programming Fundamentals',
					'description' => 'On completion of the course, students will be able to',
					'lecturer_nic' => '972183261v',
					'semester' => 1
				),
				array(
					'course_id' => 'CS2011',
					'course_name' => 'Computer Engineering for Future II',
					'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
					'lecturer_nic' => '582201472v',
					'semester' => 6
				),
				array(
					'course_id' => 'CS2012',
					'course_name' => 'Principles of Object Oriented Programming',
					'description' => 'At the end of the module the student will be able to',
					'lecturer_nic' => '582201472v',
					'semester' => 2
				)
			);

			$course = array(
				array(
					'course_id' => 'CS1012',
					'course_name' => 'Where can I get',
					'description' => 'aaaa',
					'lecturer_nic' => '582201472v',
					'semester' => 3
				)
			);

			$lecturer_courses = array(
				array(
					'course_id' => 'CS1032',
					'course_name' => 'Programming Fundamentals',
					'description' => 'On completion of the course, students will be able to',
					'lecturer_nic' => '972183261v',
					'semester' => 1
				)
			);

			$this->unit->run($this->course_model->get_courses(),$courses,'Get courses test', 'Get all the courses in the system.');
			$this->unit->run($this->course_model->get_courses('CS1012'),$course,'Get courses test', 'Get a specific course details in the system.');
			$this->unit->run($this->course_model->get_course_count(),'5','Get courses count test', 'Get the number of courses in the system.');
			$this->unit->run($this->course_model->get_course_by_lecturer('972183261v'),$lecturer_courses,'Get courses by lecturer test', 'Get the courses assigned to a particular lecturer.');
			$this->unit->run($this->course_model->create_course($create_input),TRUE,'Create course test','Register course in the database.');
			$this->unit->run($this->course_model->update_course('CS1010', $update_input),TRUE,'Update course details test');

			$this->load->view('tests');

		}

		function assignment_model_test(){

			$assignmets = array(
				array(
					'assignment_id' => '18',
					'assignment_name' => 'Sorting List',
					'description' => 'Given a set of numbers find the soretd sequence in optimal time',
					'language' => 'Python3',
					'course_id' => 'CS3042',
					'deadline' => '2020-05-06',
					'reference_file' => '',
					'status' => 'available'
				),
				array(
					'assignment_id' => '19',
					'assignment_name' => 'Shortest path',
					'description' => 'Given a set of cities and the distances between each of them, find the shortest path from one to ano',
					'language' => 'Python',
					'course_id' => 'CS3042',
					'deadline' => '2020-04-14',
					'reference_file' => '',
					'status' => 'over'
				)
			);

			$assignmet = array(
				'assignment_id' => '19',
				'assignment_name' => 'Shortest path',
				'description' => 'Given a set of cities and the distances between each of them, find the shortest path from one to ano',
				'language' => 'Python',
				'course_id' => 'CS3042',
				'deadline' => '2020-04-14',
				'reference_file' => '',
				'status' => 'over'
			);

			$create_input = array(
				'assignment_name' => 'name',
				'description' => 'description',
				'language' => 'Java',
				'course_id' => 'CS3021',
				'deadline' => '2020-01-15',
				'reference_file' => 'file',
				'status' => 'over'
			);

			$update_input = array(
				'assignment_name' => 'name1',
				'description' => 'description1',
				'language' => 'Java',
				'course_id' => 'CS3021',
				'deadline' => '2020-01-16',
				'reference_file' => 'file1',
				'status' => 'ongoing'
			);

			$this->unit->run($this->assignment_model->checkStatus('17'),TRUE,'Check status test','Checking status of an available assignment.');
			$this->unit->run($this->assignment_model->checkStatus('19'),FALSE,'Check status test','Checking status of an not available assignment.');
			$this->unit->run($this->assignment_model->checkForSubmission('2','170307M'),FALSE,'Check for Submission test','Not submitted assignment by a student.');
			$this->unit->run($this->assignment_model->checkForSubmission('19','170307M'),TRUE,'Check for Submission test','Submitted assignment by a student.');
			$this->unit->run($this->assignment_model->get_assignments('CS3042'),$assignmets,'Get assignment test','Get all the assignments for a particular course.');
			$this->unit->run($this->assignment_model->getLang('18'),'py','Get language test','Get the language of a particular assignment.');
			$this->unit->run($this->assignment_model->makeSubmission('170298H', '18'),'18','Make submission test');
			$this->unit->run($this->assignment_model->updateSubmission('17', 'submissions/19.py'),TRUE,'Update submission test');
			$this->unit->run($this->assignment_model->deleteSubmission('17', 'submissions/19.py'),TRUE,'Delete submission test');
			$this->unit->run($this->assignment_model->get_one('19'),$assignmet,'Get assignment test','Get a particular assignment from the database.');
			$this->unit->run($this->assignment_model->get_one('1'),FALSE,'Get assignment test','Assignment is not in the database.');
			$this->unit->run($this->assignment_model->create_assignment($create_input),TRUE,'Create assignment test');
			$this->unit->run($this->assignment_model->update_assignment($update_input,'20'),TRUE,'Update assignment test');
			//$this->unit->run($this->assignment_model->getGrade('1','170307M'),0,'Get grade test','Check to see if the grade is correctly accessed from the database.');

			$this->load->view('tests');
		}

		function teacher_model_test(){

			$signup_teacher = array(
				'nic' => '547896321v',
				'password' => md5("1234"),
				'status' => '1'
			);

			$add_teacher = array(
				'email' => 'email',
				'nic' => '547896321v',
				'fname' => 'fname',
				'lname' => 'lname',
				'telephone' => '0712356859',
				'address' => 'address',
				'birthday' => '1997-01-25',
				'gender' => 'Male',
				'nationality' => 'Tamil',
				'status' => '1'
			);

			$update_teacher = array(
				'email' => 'email1',
				'nic' => '547896321v',
				'fname' => 'fname1',
				'lname' => 'lname1',
				'telephone' => '0712356859',
				'address' => 'address1',
				'birthday' => '1997-01-25',
				'gender' => 'Male',
				'nationality' => 'Tamil',
				'status' => '1'
			);

			$teachers = array(
				array(
					'email' => 'johnd@gmail.com',
					'nic' => '147852963v',
					'fname' => 'John',
					'lname' => 'Doe',
					'telephone' => '0114747478',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '1990-10-23',
					'gender' => 'Male',
					'nationality' => 'Christian',
					'status' => '1'
				),
				array(
					'email' => 'janith@email.com',
					'nic' => '547852317v',
					'fname' => 'Janith',
					'lname' => 'Kulathunga',
					'telephone' => '0714578852',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '2020-05-08',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'status' => '0'
				),
				array(
					'email' => 'ariyasena@email.com',
					'nic' => '550331470v',
					'fname' => 'D. B.',
					'lname' => 'Ariyasena',
					'telephone' => '0713665604',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '1955-02-02',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'status' => '1'
				),
				array(
					'email' => 'kogul.17@cse.mrt.ac.lk',
					'nic' => '971585456v',
					'fname' => 'Srikandabala',
					'lname' => 'Kogul',
					'telephone' => '0719717847',
					'address' => 'abc, colombo',
					'birthday' => '2020-05-12',
					'gender' => 'Male',
					'nationality' => 'Tamil',
					'status' => '0'
				),
				array(
					'email' => 'melangak@gmail.com',
					'nic' => '972183261v',
					'fname' => 'Melanga',
					'lname' => 'Kasun',
					'telephone' => '0719717847',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '1997-08-05',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'status' => '1'
				)
			);

			$teacher = array(
				array(
					'email' => 'melangak@gmail.com',
					'nic' => '972183261v',
					'fname' => 'Melanga',
					'lname' => 'Kasun',
					'telephone' => '0719717847',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '1997-08-05',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'status' => '1'
				)
			);

			$available_teachers = array(
				array(
					'email' => 'johnd@gmail.com',
					'nic' => '147852963v',
					'fname' => 'John',
					'lname' => 'Doe',
					'telephone' => '0114747478',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '1990-10-23',
					'gender' => 'Male',
					'nationality' => 'Christian',
					'status' => '1'
				),
				array(
					'email' => 'ariyasena@email.com',
					'nic' => '550331470v',
					'fname' => 'D. B.',
					'lname' => 'Ariyasena',
					'telephone' => '0713665604',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '1955-02-02',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'status' => '1'
				),
				array(
					'email' => 'melangak@gmail.com',
					'nic' => '972183261v',
					'fname' => 'Melanga',
					'lname' => 'Kasun',
					'telephone' => '0719717847',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '1997-08-05',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'status' => '1'
				)
			);

			$available_teacher = array(
				'email' => 'melangak@gmail.com',
				'nic' => '972183261v',
				'fname' => 'Melanga',
				'lname' => 'Kasun',
				'telephone' => '0719717847',
				'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
				'birthday' => '1997-08-05',
				'gender' => 'Male',
				'nationality' => 'Sinhala',
				'status' => '1'
			);

			$disable_teachers = array(
				array(
					'email' => 'janith@email.com',
					'nic' => '547852317v',
					'fname' => 'Janith',
					'lname' => 'Kulathunga',
					'telephone' => '0714578852',
					'address' => 'Kotagewaththa, Uggoda, Yatiyana, Matara',
					'birthday' => '2020-05-08',
					'gender' => 'Male',
					'nationality' => 'Sinhala',
					'status' => '0'
				),
				array(
					'email' => 'kogul.17@cse.mrt.ac.lk',
					'nic' => '971585456v',
					'fname' => 'Srikandabala',
					'lname' => 'Kogul',
					'telephone' => '0719717847',
					'address' => 'abc, colombo',
					'birthday' => '2020-05-12',
					'gender' => 'Male',
					'nationality' => 'Tamil',
					'status' => '0'
				)
			);

			$disable_teacher = array(
				'email' => 'kogul.17@cse.mrt.ac.lk',
				'nic' => '971585456v',
				'fname' => 'Srikandabala',
				'lname' => 'Kogul',
				'telephone' => '0719717847',
				'address' => 'abc, colombo',
				'birthday' => '2020-05-12',
				'gender' => 'Male',
				'nationality' => 'Tamil',
				'status' => '0'
			);

			$this->unit->run($this->teacher_model->get_teacher(),$teachers,'Get teacher test', 'Get all the teachers in the system.');
			$this->unit->run($this->teacher_model->get_teacher('972183261v'),$teacher,'Get teacher test', 'Get a particular teacher in the system.');
			$this->unit->run($this->teacher_model->get_available_teacher(),$available_teachers,'Get available teacher test', 'Get all the available teachers in the system.');
			$this->unit->run($this->teacher_model->get_available_teacher('972183261v'),$available_teacher,'Get available teacher test', 'Get a particular available teacher in the system.');
			$this->unit->run($this->teacher_model->get_disable_teacher(),$disable_teachers,'Get disabled teacher test', 'Get all the disabled teachers in the system.');
			$this->unit->run($this->teacher_model->get_disable_teacher('971585456v'),$disable_teacher,'Get disabled teacher test', 'Get a particular disabled teacher in the system.');
			$this->unit->run($this->teacher_model->get_password('972183261v'),'81dc9bdb52d04dc20036dbd8313ed055','Get teacher password test');
			$this->unit->run($this->teacher_model->change_password('971585456v', '81dc9bdb52d04dc20036dbd8313ed055'),TRUE,'Change teacher password test');
			$this->unit->run($this->teacher_model->get_teacher_count(),'3','Get teacher count test');
			$this->unit->run($this->teacher_model->get_status('971585456v'),'0','Get teacher status test','Get status of a disabled teacher.');
			$this->unit->run($this->teacher_model->get_status('972183261v'),'1','Get teacher status test','Get status of an available teacher.');
			$this->unit->run($this->teacher_model->change_status('972183261v', 1),TRUE,'Change status test','Change status of a particular teacher.');
			$this->unit->run($this->teacher_model->signup_teacher($signup_teacher),TRUE,'Sign up teacher test','Register teacher in the system.');
			$this->unit->run($this->teacher_model->add_teacher($add_teacher),TRUE,'Add teacher test','Add teacher details to the database.');
			$this->unit->run($this->teacher_model->update_teacher('547896321v',$update_teacher),TRUE,'Update teacher test');

			$this->load->view('tests');
		}

		function submission_model_test() {

			$all_submissions = array (
				array (
					"submission_id" => 30,
					"assignment_id" => 1,
					"student_id" => "170307M",
					"file_path" => "170307M_check_java.java",
					"submitted_at" => "2020-05-31 08:48:19 pm",
					"grade" => ""
				)
			);

			$submitted = array(
				'submitted_at' => "2020-05-31 08:48:19 pm",
				'filepath' => "170307M_check_java.java",
				'submitted' => true
			);

			$not_submitted = array(
				'submitted_at' => '---',
				'submitted' => FALSE
			);

			$create = array (
				"assignment_id" => 2,
				"student_id" => "170307M",
				"file_path" => "170307M_check_java.java",
				"submitted_at" => "2020-05-31 08:48:19 pm"
			);

			$update = array (
				"file_path" => "170307M_check_java.java",
				"submitted_at" => "2020-07-31 08:06:19 pm"
			);

			$files = array(
				array(
					"student_id" => "170307M",
					"file_path" => "170307M_check_java.java"
				)
			);

			$this->unit->run($this->Submission_model->get_submissions('1'),$all_submissions,'Get submissions test','Get all the submissions for a particular assignment.');
			$this->unit->run($this->Submission_model->get_submissions('1', '170307M'),$all_submissions,'Get submissions test','Get the submission for a particular assignment by a particular student.');
			$this->unit->run($this->Submission_model->checkForSubmission('1', '170307M'),$submitted,'Check for submission test','Student submitted the assignment.');
			$this->unit->run($this->Submission_model->checkForSubmission('2', '170307M'),$not_submitted,'Check for submission test','Student didn\'t submit the assignment.');
			$this->unit->run($this->Submission_model->get_file('1', '170307M'),"170307M_check_java.java",'Get file test','Get the filepath for a particular assignment by a particular student.');
			$this->unit->run($this->Submission_model->getFiles('1'),$files,'Get all files test','Get all the files with the student id for a particular assignment.');
			$this->unit->run($this->Submission_model->makeSubmission($create),NULL,'Create submission test');
			$this->unit->run($this->Submission_model->updateSubmission('2', '170307M', $update),TRUE,'Update submission test');
			$this->unit->run($this->Submission_model->deleteSubmission('34'),TRUE,'Delete submission test');

			$this->load->view('tests');
		}

		public function issue_model_test() {

			$issues = array(
				array(
					'assignment_id' => 1,
					'indexNumber' => '170307M',
					'content' => 'The description is not clear. Please give a detailed explanation.'
				),
				array(
					'assignment_id' => 1,
					'indexNumber' => '170307M',
					'content' => 'Description is not clear. Please give an explained one.'
				),
				array(
					'assignment_id' => 1,
					'indexNumber' => '170307M',
					'content' => 'Description is not clear. Please give an explained one.'
				),
				array(
					'assignment_id' => 1,
					'indexNumber' => '170307M',
					'content' => 'Description is not clear. Please give an explained one.'
				),
			);

			$create = array(
				'assignment_id' => 2,
				'indexNumber' => '170307M',
				'content' => 'Description is not clear. Please give an explained one.'
			);

			$this->unit->run($this->issue_model->get_issues('1'),$issues,'Get issues test', 'Get all the issues for a particular assignment.');
			$this->unit->run($this->issue_model->create_issue($create),TRUE,'Create issue test');
			$this->unit->run($this->issue_model->get_issues_student('170307M', '1'),$issues,'Get issues by student test', 'Get all the issues for a particular assignment by particular student.');

			$this->load->view('tests');
		}

		public function testcase_model_test() {

			$test_cases = array(
				array(
					'assignment_id' => 8,
					'case_id' => 1,
					'input_name' => 'input_8_1.txt',
					'output_name' => 'output_8_1.txt'
				),
				array(
					'assignment_id' => 8,
					'case_id' => 2,
					'input_name' => 'input_8_2.txt',
					'output_name' => 'output_8_2.txt'
				)
			);

			$inputs = array(
				array(
					'case_id' => 1,
					'input_name' => 'input_8_1.txt'
				),
				array(
					'case_id' => 2,
					'input_name' => 'input_8_2.txt'
				)
			);

			$outputs = array(
				array(
					'case_id' => 1,
					'output_name' => 'output_8_1.txt'
				),
				array(
					'case_id' => 2,
					'output_name' => 'output_8_2.txt'
				)
			);

			$input = array(
				'assignment_id' => 5,
				'case_id' => 1,
				'input_name' => 'input_5_1.txt',
				'output_name' => 'output_5_1.txt'
			);

			$this->unit->run($this->Testcase_model->get_testcases('8'),$test_cases,'Get test cases test','Get all the test cases for a particular assignment.');
			$this->unit->run($this->Testcase_model->getInput('8'),$inputs,'Get inputs test','Get input files for a particular assignment.');
			$this->unit->run($this->Testcase_model->getOutput('8'),$outputs,'Get outputs test','Get output files for a particular assignment.');
			$this->unit->run($this->Testcase_model->create($input),TRUE,'Create test case test');

			$this->load->view('tests');
		}

		function doAll(){
			$this->login_test();
			$this->student_model_test();
			$this->course_model_test();
			$this->assignment_model_test();
			$this->teacher_model_test();
			$this->submission_model_test();
			$this->issue_model_test();
			$this->testcase_model_test();
			$this->load->view('tests');
		}
	}
