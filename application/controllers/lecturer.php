<?php

	class lecturer extends CI_Controller{

		public function view ($page = 'home'){
			if ($this->session->userdata('lecturer_id')){
				if (!file_exists(APPPATH . 'views/lecturer/' . $page . '.php')) {
					show_404();
				}

				$data['title'] = ucfirst($page);
				$this->load->view('templates/header');
				$this->load->view('lecturer/' . $page, $data);
				$this->load->view('templates/footer');

			} else {
				redirect('login');
			}
		}	}