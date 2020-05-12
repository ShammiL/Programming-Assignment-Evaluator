<div class="container-fluid row">
	<div class="col-md-2"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<div class="col-md-10">
					<h2>Assigned Courses</h2>
				</div>
			</div>
			<div class="card-body">
				<div class="row row-cols-1 row-cols-md-4">
					<?php foreach ($courses as $course) { ?>
						<div class="col mb-4">
							<a href="<?php echo base_url(); ?>teacher/courseDetails/<?php echo $course['course_id'] ?>">
								<div class="card">
									<div class="row mt-3">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<img src="<?php echo base_url(); ?>assets/images/site/undraw_resume_folder_2_arse.svg" class="card-img-top" alt="...">
										</div>
										<div class="col-md-2"></div>
									</div>
									<div class="card-header mt-2 text-center">
										<h5 class="card-title"><?php echo $course['course_id'] ?></h5>
										<p class="card-text"><?php echo $course['course_name'] ?></p>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
