<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['testing/(:any)'] = 'testing/$1';

$route['login'] = 'login/index';
$route['login/(:any)'] = 'login/$1';

$route['student/assignmentDetails'] = 'student/assignmentDetails';
$route['student/courseDetails'] = 'student/courseDetails';
$route['student/enrollCourse'] = 'student/enrollCourse';
$route['student/viewCourses'] = 'student/viewCourses';
$route['student/(:any)'] = 'student/view/$1';

//$route['lecturer/home'] = 'lecturer/view/home';
$route['lecturer/(:any)'] = 'lecturer/view/$1';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
