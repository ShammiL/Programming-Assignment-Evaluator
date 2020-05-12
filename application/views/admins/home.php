<div class="container-fluid">
	<div class="body-card">
		<div class="card">
			<div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4 class="font-weight-bold">Courses</h4>
                                <hr>
                                <h6>Total Courses: <?php echo $course_count; ?></h6>                                
                            </div>
                            <div class="card-body">
                                <img class="admin-card-img" src="<?php echo base_url(); ?>assets/images/site/admin_course.png" alt="admin_course">
                            </div>
                            <div class="card admin-card">
                                <a href="<?php echo base_url(); ?>admin/addCourse">
                                    <div class="card-header">
                                        <i class="fas fa-plus-circle"></i> Add New Course
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>admin/viewCourse">
                                    <div class="card-header">
                                        <i class="fas fa-eye"></i> View All Courses
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4 class="font-weight-bold">Teachers</h4>
                                <hr>
                                <h6>Total Teachers: <?php echo $teacher_count; ?></h6> 
                            </div>
                            <div class="card-body">
                                <img class="admin-card-img" src="<?php echo base_url(); ?>assets/images/site/admin_teacher.png" alt="admin_teacher">
                            </div>
                            <div class="card admin-card">
                                <a href="<?php echo base_url(); ?>admin/addTeacher">
                                    <div class="card-header">
                                        <i class="fas fa-plus-circle"></i> Add New Teacher
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>admin/viewTeacher">
                                    <div class="card-header">
                                        <i class="fas fa-eye"></i> View All Teachers
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4 class="font-weight-bold">Students</h4>
                                <hr>
                                <h6>Total Students: <?php echo $student_count; ?></h6>  
                            </div>
                            <div class="card-body">
                                <img class="admin-card-img" src="<?php echo base_url(); ?>assets/images/site/admin_student.png" alt="admin_student">
                            </div>
                            <div class="card admin-card">
                                <a href="<?php echo base_url(); ?>admin/addStudent">
                                    <div class="card-header">
                                        <i class="fas fa-plus-circle"></i> Add New Student
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>admin/viewStudent">
                                    <div class="card-header">
                                        <i class="fas fa-eye"></i> View All Students
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
