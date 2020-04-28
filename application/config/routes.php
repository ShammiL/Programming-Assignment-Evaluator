<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome/index';
$route['courses'] = 'Courses';
$route['assignments/view/(:any)'] = 'Assignments/view/$1';
$route['assignments/create/(:any)'] = 'Assignments/create/$1';
$route['assignments/edit/(:any)'] = 'Assignments/edit/$1';
$route['assignments/update'] = 'Assignments/update';
$route['courses/(:any)'] = 'courses/index/$1';
$route['students/login'] = 'students/login';
$route['teachers/login'] = 'teachers/login';
$route['teachers'] = 'teachers/index';
$route['teachers/courses/(:any)'] = 'Courses';
$route['students/(:any)'] = 'students/view/$1';
$route['submissions/view/(:any)'] = 'submissions/view/$1';
$route['compiler'] = 'compiler/index';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
