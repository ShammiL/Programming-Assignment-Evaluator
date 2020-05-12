<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome/index';

$route['testing/(:any)'] = 'testing/$1';

$route['login'] = 'login/index';
$route['loginAdmin'] = 'login/adminLogin';

$route['admin'] = 'admins/index';
$route['admin/addCourse'] = 'admins/addCourse';
$route['admin/addTeacher'] = 'admins/addTeacher';
$route['admin/addStudent'] = 'admins/addStudent';
$route['admin/viewStudent'] = 'admins/viewStudent';
$route['admin/viewCourse'] = 'admins/viewCourse';
$route['admin/viewTeacher'] = 'admins/viewTeacher';

$route['teacher'] = 'teachers/index';
$route['teacher/grade'] = 'teachers/grade';
$route['teacher/courseDetails/(:any)'] = 'teachers/courseDetails/$1';
$route['teacher/createAssignment/(:any)'] = 'teachers/createAssignment/$1';
$route['teacher/editAssignment/(:any)/(:any)/(:any)'] = 'teachers/editAssignment/$1/$2/$3';
$route['teacher/update/(:any)/(:any)/(:any)'] = 'teachers/update/$1/$2/$3';
$route['teacher/viewAssignments/(:any)'] = 'teachers/viewAssignments/$1';
$route['teacher/viewSubmissions/(:any)/(:any)/(:any)'] = 'teachers/viewSubmissions/$1/$2/$3';
$route['teacher/viewSubmissions/(:any)/(:any)'] = 'teachers/viewSubmissions/$1/$2';
$route['teacher/viewStudents/(:any)'] = 'teachers/viewStudents/$1';
$route['teacher/course/(:any)'] = 'Courses/index/$1';
$route['teacher/assignment/create/(:any)'] = 'Assignments/create/$1';

$route['student'] = 'students/index';
$route['student/assignmentDetails/(:any)/(:any)/(:any)'] = 'students/assignmentDetails/$1/$2/$3';
$route['student/assignmentDetails/(:any)/(:any)'] = 'students/assignmentDetails/$1/$2';
$route['student/courseDetails/(:any)'] = 'students/courseDetails/$1';
$route['student/enrollCourse'] = 'students/enrollCourse';
$route['student/viewGrade/(:any)/(:any)'] = 'students/viewGrade/$1/$2';
$route['student/viewCourses'] = 'students/viewCourses';
$route['student/(:any)'] = 'students/view/$1';

$route['compiler'] = 'compiler/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
