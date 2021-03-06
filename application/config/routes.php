<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login/index';
$route['changeInitialPassword'] = 'login/changeInitialPassword';

$route['testing/(:any)'] = 'testing/$1';


$route['admin'] = 'admins/index';
$route['admin/addCourse'] = 'admins/addCourse';
$route['admin/addTeacher'] = 'admins/addTeacher';
$route['admin/addStudent'] = 'admins/addStudent';
$route['admin/editStudent/(:any)'] = 'admins/editStudent/$1';
$route['admin/editCourse/(:any)'] = 'admins/editCourse/$1';
$route['admin/editTeacher/(:any)'] = 'admins/editTeacher/$1';
$route['admin/viewStudent'] = 'admins/viewStudent';
$route['admin/viewCourse'] = 'admins/viewCourse';
$route['admin/viewTeacher'] = 'admins/viewTeacher';
$route['admin/searchStudent'] = 'admins/searchStudent';
$route['admin/searchCourse'] = 'admins/searchCourse';
$route['admin/searchTeacher'] = 'admins/searchTeacher';
$route['admin/changeStatus/(:any)/(:any)'] = 'admins/changeStatus/$1/$2';


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
$route['teacher/profile'] = 'teachers/profile';
$route['teacher/course/(:any)'] = 'Courses/index/$1';
$route['teacher/assignment/create/(:any)'] = 'Assignments/create/$1';
$route['teacher/viewIssues/(:any)'] = 'teachers/view_issues/$1';


$route['student'] = 'students/index';
$route['student/assignmentDetails/(:any)/(:any)/(:any)'] = 'students/assignmentDetails/$1/$2/$3';
$route['student/assignmentDetails/(:any)/(:any)'] = 'students/assignmentDetails/$1/$2';
$route['student/courseDetails/(:any)'] = 'students/courseDetails/$1';
$route['student/enrollCourse/(:any)'] = 'students/enrollCourse/$1';
$route['student/viewGrade/(:any)/(:any)'] = 'students/viewGrade/$1/$2';
$route['student/viewCourses'] = 'students/viewCourses';
$route['student/profile'] = 'students/profile';
$route['student/(:any)'] = 'students/view/$1';
$route['student/reportIssue/(:any)'] = 'students/report_issue/$1';
$route['student/viewIssue/(:any)'] = 'students/view_issues/$1';
$route['student/callapi'] = 'students/call_api';



$route['compiler'] = 'compiler/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
