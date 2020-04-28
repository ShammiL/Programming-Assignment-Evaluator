<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Courses';
$route['assignments/view/(:any)'] = 'Assignments/view/$1';
$route['assignments/create/(:any)'] = 'Assignments/create/$1';
$route['assignments/edit/(:any)'] = 'Assignments/edit/$1';
$route['assignments/update'] = 'Assignments/update';
$route['courses/(:any)'] = 'courses/index/$1';
$route['students/(:any)'] = 'students/view/$1';
$route['submissions/view/(:any)'] = 'submissions/view/$1';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
