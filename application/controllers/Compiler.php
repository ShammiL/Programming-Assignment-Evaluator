<?php 

class Compiler extends CI_Controller {

	public function index() {

		$data['title'] = "Compiler";

		$this->load->helper('form');

		if (isset($_FILES['userfile'])) {

			$types = array('py', 'java', 'php', 'js');
			$directory = array('Python' => 'py', 'Python3' => 'py', 'Java' => 'java', 'Cpp' => 'cpp', 'Php' => 'php');

			$filename = explode('.', $_FILES['userfile']['name']);

			if (in_array(end($filename), $types)) {

				if ($directory[$_POST['lang']] === end($filename)) {
					$multiline_code = file_get_contents($_FILES['userfile']['tmp_name']);
					$data = $this->compile($_POST, $multiline_code);
				}
				else {
					$data['message'] = "The input file is not compatible with the selected language.";
				}
			} 
			else {
				$data['message'] = "This system is only supported for Java, Python, PHP and C++.";
			}

		}

		$this->load->view('templates/header');
		$this->load->view('compiler/index', $data);
		$this->load->view('templates/footer');

	}

	public function compile($post, $code) {		

		// Generate SID from Geeksforgeeks main.php by posting language, code, inputs and save parameters.
		$main_url = 'https://ide.geeksforgeeks.org/main.php';
		$main_data = http_build_query(array(
                'lang' => $post['lang'],
                'code' => $code,
                'input' => strval($post['input']),
                'save' => true
            )
        );

        $main_options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => $main_data
            )
        );

        $main_context = stream_context_create($main_options);
        $result = file_get_contents($main_url, false, $main_context);
        $result = json_decode($result, true);

        // Generate Output from Geeksforgeeks submissionResult.php by posting sid, and save requestType.
        $submissionResult_url = 'https://ide.geeksforgeeks.org/submissionResult.php';
        $submissionResult_data = http_build_query(array(
                'requestType' => 'fetchResults',
                'sid' => $result['sid']
            )
        );

        $submissionResult_options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => $submissionResult_data
            )
        );

        $submissionResult_context = stream_context_create($submissionResult_options);

        while (true) {
            $final_result = file_get_contents($submissionResult_url, false, $submissionResult_context);
            $final_result = json_decode($final_result, true);

            if ($final_result['status'] === "SUCCESS") {
            	$data['message'] = "Executed in ".$final_result['time']." second(s).";
                break;
            }
        }

        $data['final_result'] = $final_result;
        return $data;

	}

	public function grade($id) {

		$this->load->helper('form');

		$test_cases = $this->assignment_model->get_test_cases($id);		
		$assignment = $this->assignment_model->get_assignment($id);
		$post['lang'] = $assignment['language'];

		if (isset($_FILES['userfile'])) {
			$code = file_get_contents($_FILES['userfile']['tmp_name']);
			$passed = 0;

			foreach ($test_cases as $test_case) {

				$post['input'] = $test_case['input'];
				$final_result = $this->compile($post, $code);

				if ( isset($final_result['final_result']['output']) ) {

					// If code is run without any errors and gien the correct output, 2 mark is given.
					if ( trim($final_result['final_result']['output']) === trim($test_case['output']) ) {
						$passed += 2;
					} 
					// If code is run without any error 1 mark is given.
					else {
						$passed += 1;
					}
				} 
			}

			echo 'Grade: '.$passed;
			
		}

		$this->load->view('templates/header');
		$this->load->view('teacher/assignment/grade');
		$this->load->view('templates/footer');

	}

}
