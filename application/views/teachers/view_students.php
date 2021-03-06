<div class="container-fluid container-user row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10">
                        <h3><?php echo $course_id; ?></h3>
						<h4>Enrolled Students</h4>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-9">
								<label for="">Number of Enrolled Students :</label>
							</div>
						    <div class="col-md-3">
						    	<label for=""><?php echo $count['student_count']; ?></label>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-9">
								<?php echo form_open('teachers/searchStudent/'.$course_id) ?>
								<div class="row">
									<div class="form-group col-md-8">
										<input type="text" class="form-control" name="search-student" placeholder="Enter Student ID..." required>
									</div>
									<div class="form-group col-md-4">
										<button type="submit" name="submit-search-student" class="btn btn-primary btn-edit">Search</button>
									</div>
								</div>
								</form>
							</div>
							<div class="col-md-3">
								<a type="submit" href="<?php echo base_url(); ?>teacher/viewStudents/<?php echo $course_id; ?>" class="btn btn-primary btn-edit">View All</a>
							</div>
						</div>
					</div>
				</div>
                <?php if($students) { ?>
                    <div class="card mt-4">
                        <table class="table table-hover">
                            <thead class="card-header">
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
								<th scope="col">Telephone</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($students as $student): ?>
                                <tr>
                                    <td><?php echo $student['indexNumber']; ?></td>
                                    <td><?php echo $student['fname'].' '.$student['lname']; ?></td>
									<td><?php echo $student['email']; ?></td>
									<td><?php echo $student['phone']; ?></td>
								</tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { 
                    echo "<p class='text-center'>There are no students.</p>";
                } ?>
			</div>
		</div>
	</div>
    <div class="col-md-1"></div>
</div>
