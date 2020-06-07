<?php
$url = 'http://127.0.0.1:5000/result';

$arr = [];
$arr['1'] = base64_encode(file_get_contents('submissions0/1.txt'));
$arr['2'] = base64_encode(file_get_contents('submissions0/2.txt'));
$arr['3'] = base64_encode(file_get_contents('submissions0/3.txt'));
$arr['4'] = base64_encode(file_get_contents('submissions0/4.txt'));

echo $arr['1'];
echo "\n";
echo $arr['2'];
echo "\n";
echo $arr['3'];
echo "\n";
echo $arr['4'];
$postfields = array(
  'lang' => 'python',
  'files' => $arr,
);
$options = array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => TRUE,
  CURLOPT_POSTFIELDS => json_encode($postfields),
  CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
  // CURLOPT_POSTFIELDS => http_build_query(array(
  //   'lang' => 'python',
  //   'files' => [
  //     base64_encode(file_get_contents('files/1.txt')),
  //     base64_encode(file_get_contents('files/2.txt')),
  //     base64_encode(file_get_contents('files/3.txt')),
  //   ]), 
    // 'files' => base64_encode(file_get_contents('files/1.txt')),
    // 'files' => base64_encode(file_get_contents('files/2.txt')),
    // 'files' => base64_encode(file_get_contents('files/3.txt')),
    // array(
    //   "1" => base64_encode(file_get_contents('files/1.txt')),
    //   "2" => base64_encode(file_get_contents('files/2.txt')),
    //   "3" => base64_encode(file_get_contents('files/3.txt')),
    // ),
    // 'file0' => curl_file_create(realpath('files/1.txt')),
    // 'file1' => curl_file_create(realpath('files/2.txt')),
    // 'file2' => curl_file_create(realpath('files/3.txt')),
    // 'file3' => curl_file_create(realpath('files/4.txt')),
  // ),
);

$ch = curl_init();
curl_setopt_array($ch, $options);
$content = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
echo $content;
$str = file_get_contents('files/3.txt');
echo base64_encode($str);