<div class="container-fluid">
	<div class="main row">
		<div class="col-md-1"></div>
		<div class="col-md-10 body-card">
			<div class="card">
				<div class="card-header">
					<h2>My Courses</h2>
				</div>
				<div class="card-body">
					<div class="row row-cols-1 row-cols-md-4">
						<?php foreach($courses as $course):
							$course_id = $course['course_id'];
							$course_name = $course['course_name']; ?>							
							<div class="col mb-4">	
								<a href="<?php echo site_url('student/courseDetails/'.$course_id); ?>">
									<div class="card">
										<div class="row mt-3">
											<div class="col-md-2"></div>
											<div class="col-md-8">
												<img src="<?php echo base_url(); ?>assets/images/site/undraw_resume_folder_2_arse.svg" class="card-img-top" alt="...">
											</div>
											<div class="col-md-2"></div>
										</div>
										<div class="card-header mt-2 text-center">
											<h5 class="card-title m-0"><?php echo $course_id; ?></h5>
											<p class="card-text"><?php echo $course_name; ?></p>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach;  ?>							
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>