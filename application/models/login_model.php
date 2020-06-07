<?php

	class login_model extends CI_Model{

		public function student_login($username,$password){

			$db2 = $this->load->database('db2',TRUE);
			$db2->where('indexNumber',$username);
			$db2->where('password',md5($password));
			$result = $db2->get('student');
			if($result -> num_rows() == 1){
				return $result->result_array()[0];
			} else {
				return FALSE;
			}
			
		}

		public function lecturer_login($username,$password){
			
			$db2 = $this->load->database('db2',TRUE);
			$db2->where('nic',$username);
			$db2->where('password',md5($password));
			$result = $db2->get('lecturer');
			if($result -> num_rows() == 1 ){
				return $result->result_array()[0];
			} else {
				return FALSE;
			}
		}

		public function admin_login($username,$password){
			
			$db2 = $this->load->database('db2',TRUE);
			$db2->where('email',$username);
			$db2->where('password',md5($password));
			$result = $db2->get('admin');
			if($result -> num_rows() == 1 ){
				return $result->row(0)->email;
			} else {
				return FALSE;
			}
		}
	}
