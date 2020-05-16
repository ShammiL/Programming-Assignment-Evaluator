<div class="container-fluid row">
	<div class="col-md-1"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10">
						<h2>Enrolled Students</h2>
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
						<form class="form-row" action="" method="post">
							<div class="col-md-1"></div>
							<div class="form-group col-md-7">
								<input type="text" class="form-control" name="search-student" placeholder="Enter Student ID...">
							</div>
							<div class="form-group col-md-4">
								<div class="form-row">
									<div class="col-md-1"></div>
									<button type="submit" name="submit-search-student" class="btn btn-primary col-md-5">Search</button>
									<div class="col-md-1"></div>
									<button type="submit" name="submit-all-student" class="btn btn-primary col-md-5">View All</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card mt-4">
					<table class="table table-hover">
						<thead>
						<tr>
							<th scope="col">Student ID</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Submissions</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($students as $student): ?>
							<tr>
								<td><?php echo $student['indexNumber']; ?></td>
								<td><?php echo $student['fname'].' '.$student['lname']; ?></td>
								<td><?php echo $student['email']; ?></td>
								<td>3/3</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
