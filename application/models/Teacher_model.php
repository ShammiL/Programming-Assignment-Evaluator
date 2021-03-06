<?php

class Teacher_model extends CI_Model
{
	public function __construct() {
		$this->load->database();
	}

	public function signup_teacher($input) {

		$db2 = $this->load->database('db2',TRUE);
		return $db2->insert('lecturer', $input);
	}

	public function add_teacher($input) {

		return $this->db->insert('lecturer', $input);
	}

    public function update_teacher($id, $data){

        $this->db->set($data);
        $this->db->where('nic', $id);
        return $this->db->update('lecturer');
    }

    public function search_teacher($teacher_id) {
		$this->db->like('nic', $teacher_id);
		$query = $this->db->get('lecturer');
		return $query->result_array();
	}

	public function get_teacher($teacher_id = NULL) {

		if ($teacher_id) {
			$query = $this->db->get_where('lecturer', array('nic' => $teacher_id));
			return $query->result_array();
		}

		$query = $this->db->get('lecturer');
		return $query->result_array();
	}

	public function get_available_teacher($teacher_id = NULL) {

		if ($teacher_id) {
			$this->db->where('nic', $teacher_id);
			$this->db->where('status', '1');
			$this->db->or_where('status', '-1');
			$query = $this->db->get('lecturer');
			return $query->result_array()[0];
		}

		$this->db->where('status', '1');
		$this->db->or_where('status', '-1');
		$query = $this->db->get('lecturer');
		return $query->result_array();
	}

	public function get_disable_teacher($teacher_id = NULL) {

		if ($teacher_id) {
			$query = $this->db->get_where('lecturer', array('nic' => $teacher_id, 'status' => '0'));
			return $query->result_array()[0];
		}

		$query = $this->db->get_where('lecturer', array('status' => '0'));
		return $query->result_array();
	}

	public function get_password($teacher_id) {

		$db2 = $this->load->database('db2',TRUE);
		$db2->select('password');
		$query = $db2->get_where('lecturer', array('nic' => $teacher_id));
		return $query->result_array()[0]['password'];
	}
	
	public function change_password($teacher_id, $pwrd) {

		$db2 = $this->load->database('db2',TRUE);
		$db2->set('password', $pwrd);
        $db2->where('nic', $teacher_id);
		return $db2->update('lecturer');
	}

	public function get_teacher_count() {
			
		$db2 = $this->load->database('db2',TRUE);
		$db2->select('COUNT(nic) AS teacher_count');
		$query = $db2->get('lecturer');
		return $query->result_array()[0]['teacher_count'];
	}

	public function get_status($teacher_id) {

		$this->db->select('status');
		$query = $this->db->get_where('lecturer', array('nic' => $teacher_id));
		return $query->row(0)->status;
	}

	public function change_status($teacher_id, $status) {

		$db2 = $this->load->database('db2',TRUE);

		if ($status == '1') {
			$this->db->set(array('status' => '1'));
			$db2->set(array('status' => '1'));
		} else {
			$this->db->set(array('status' => '0'));
			$db2->set(array('status' => '0'));
		}
		$this->db->where('nic', $teacher_id);
		$this->db->update('lecturer');
		$db2->where('nic', $teacher_id);
		return $db2->update('lecturer');
	}
}
