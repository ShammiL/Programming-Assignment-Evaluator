<?php namespace App\Controllers;

class Admin extends BaseController
{
    public function index() {
        return view('Admin/Login');
    }

    public function teachers() {
        return view('Admin/Teachers');
    }

    public function courses() {
        return view('Admin/Courses');
    }

    public function addCourse() {
        return view('Admin/AddCourse');
    }

    public function addTeacher() {
        return view('Admin/AddTeacher');
    }

    public function viewTeacher() {
        return view('Admin/ViewTeacher');
    }

    public function viewCourse() {
        return view('Admin/ViewCourse');
    }
}
