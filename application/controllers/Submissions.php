<?php
class Submissions extends CI_Controller{
    


public function view($assignment_id = 1){
        
    $data['title'] = 'All Submissions';
    $data['assignment'] = $this->Assignment_model->get_one($assignment_id);
    $data['submissions'] = $this->Submission_model->get_submissions($assignment_id);



    // print_r ($data['assignment']);
    $this->load->view('templates/header');
    $this->load->view('submissions/view', $data);
    $this->load->view('templates/footer');

}

}