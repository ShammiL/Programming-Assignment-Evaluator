<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome/index';
$route['course'] = 'Courses';

$route['assignment/view/(:any)'] = 'Assignments/view/$1';
$route['assignment/edit/(:any)'] = 'Assignments/edit/$1';
$route['assignment/update'] = 'Assignments/update';

$route['course/(:any)'] = 'courses/index/$1';

$route['student/login'] = 'students/login';

$route['teacher'] = 'teachers/index';
$route['teacher/login'] = 'teachers/login';
$route['teacher/grade'] = 'teachers/grade';
$route['teacher/course/(:any)'] = 'Courses/index/$1';
$route['teacher/assignment/create/(:any)'] = 'Assignments/create/$1';

$route['student/(:any)'] = 'students/view/$1';

$route['submission/view/(:any)'] = 'submissions/view/$1';

$route['compiler'] = 'compiler/index';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
