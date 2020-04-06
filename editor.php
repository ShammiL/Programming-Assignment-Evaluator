<?php

if(isset($_POST["submit"])) {

    //generate SID from Geeksforgeeks main.php by posting language, code, inputs and save parameters.
    $main_url = 'https://ide.geeksforgeeks.org/main.php';
    $multiline_code = file_get_contents( $_FILES['fileToUpload']['tmp_name'] );
    $main_data = http_build_query( array(
            'lang' => $_POST['lang'],
            'code' => $multiline_code,
            'input' => $_POST['input'],
            'save' => true
        )
    );
    $main_options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded",
            'method'  => 'POST',
            'content' => $main_data
        )
    );
    $main_context = stream_context_create( $main_options );
    $result = file_get_contents( $main_url, false, $main_context );
    $result = json_decode($result, true);

    //generate Output from Geeksforgeeks submissionResult.php by posting sid, and save requestType.
    $submissionResult_url = 'https://ide.geeksforgeeks.org/submissionResult.php';
    $submissionResult_data = http_build_query( array(
            'requestType' => 'fetchResults',
            'sid' => $result['sid']
        )
    );
    $submissionResult_options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded",
            'method'  => 'POST',
            'content' => $submissionResult_data
        )
    );
    $submissionResult_context = stream_context_create( $submissionResult_options );
    while (true) {
        $final_result = file_get_contents( $submissionResult_url, false, $submissionResult_context );
        $final_result = json_decode($final_result, true);
        if ($final_result['status'] === "SUCCESS") {
            break;
        }
    }

    if (isset($final_result['output'])) {
        echo "Output: ", $final_result['output'], "<br/>", "<br/>";
    } elseif (isset($final_resultf['rntError'])) {
        echo "Error: ", $final_result['rntError'], "<br/>", "<br/>";
    }

    echo json_encode($final_result);
}
