<?php
class Assignments extends CI_Controller{
    public function view($course_id){
     

    $data['title'] = 'All Assignments';
    $data['assignments'] = $this->Assignment_model->get_assignments($course_id);
    // print_r ($data['assignments']);
    $this->load->view('templates/header');
    $this->load->view('assignments/view', $data);
    $this->load->view('templates/footer');

}

public function create($course_id){
        
    $data['title'] = 'Create new Assignment';

    $data['course'] = $course_id;
    // $this->load->library('form_validation'); 
    $this->form_validation->set_rules('name', 'name' , 'required');
    $this->form_validation->set_rules('description', 'description' , 'required');
    $this->form_validation->set_rules('language', 'Language', 'required|callback_select_validate');
    $this->form_validation->set_rules('deadline', 'deadline' , 'required');

//     // print_r ($data['assignments']);
    

    if($this->form_validation->run() === false){
    $this->load->view('templates/header');
    $this->load->view('assignments/create', $data);
    $this->load->view('templates/footer');

        }
        
    else{
            $input = array(
                'assignment_name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'language' => $this->input->post('language'),
                'course_id' => $course_id,
                'deadline' => $this->input->post('deadline'),
                'status' => 'Ongoing'
            );
        
        $config['upload_path'] = './assets/uploads/reference docs';
        $config['allowed_types'] = 'pdf|doc|zip|rar';
        $config['max_size'] = '.2048';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()){
            $errors = array('error' => $this->upload->display_errors());
            
        }
        else{
            $file_data = array('upload_data' => $this->upload->data());
            $input['reference_file'] = $_FILES['userfile']['name'];
        }
        $this->Assignment_model->create_assignment($input);
        $this->view($course_id);
    }

}

function select_validate($lang)
{

    if($lang=="none"){
$this->form_validation->set_message('select_validate', 'Please Select a language.');
return false;
} 
    else{
return true;
}
}

public function edit($assignment_id){
    $data['title'] = 'Edit Assignment';
    $model_data = $this->Assignment_model->get_one($assignment_id);
    $data['assignment'] = $model_data[0];
    // print_r ($data['assignment']);
    $this->load->view('templates/header');
    $this->load->view('assignments/edit', $data);
    $this->load->view('templates/footer');
}

public function update(){
    $input = array(
        'assignment_name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'language' => $this->input->post('language'),
        'deadline' => $this->input->post('deadline'),
    );
    $this->Assignment_model->update_assignment($input);
   echo ('success');
}

}