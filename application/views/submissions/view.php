<div class="container-fluid row">
	<div class="col-md-2"></div>
	<div class="col-md-10 body-card">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-9">
						<h3>Course ID</h3>
						<h4><?php echo $assignment['assignment_name']; ?></h4>
					</div>
					<div class="col-md-3">
						<a href="<?php echo base_url()?>assignments/view_issues/<?php echo $assignment['assignment_id'];  ?>" class="btn btn-primary btn-edit" type="submit" id="view-grade">View Issues</a>
						<a href="<?php echo base_url();?>assignments/edit/<?php echo $assignment['assignment_id']; ?>" class="btn btn-primary btn-edit mt-1" type="submit" id="view-grade">Edit Assignment</a>
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
								<label for="">127</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-9">
								<label for="">Number of Submitted Assignments :</label>
							</div>
							<div class="col-md-3">
								<label for="">4</label>
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
				<h5 class="card-title mt-3">Description :</h5>
				<p> <?php echo $assignment['description']; ?> </p>
				<a href="<?= base_url('assets/uploads/reference docs/'); ?>">Reference Document</a>
				<h5 class="card-title mt-3">Deadline :</h5>
				<p> <?php echo $assignment['deadline']; ?> </p>
				<div class="card mt-4">
					<table class="table table-hover">
						<thead>
						<tr>
							<th scope="col">Student ID</th>
							<th scope="col">Submitted at</th>
							<th scope="col">Marks</th>
							<th scope="col">Plagiarised</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>752458H</td>
							<td>Friday, 6 March 2020, 11:50 PM</td>
							<td>67.5<a class="ml-3" href="">Edit</a></td>
							<td>Yes</td>
							<td><a href="">Download</a><a class="ml-3" href="">Feedback</a></td>
						</tr>
						<tr>
							<td>656963M</td>
							<td>Friday, 6 March 2020, 10:50 PM</td>
							<td>87.1<a class="ml-3" href="">Edit</a></td>
							<td>No</td>
							<td><a href="">Download</a><a class="ml-3" href="">Feedback</a></td>
						</tr>
						<tr>
							<td>485426U</td>
							<td>Friday, 6 March 2020, 11:10 PM</td>
							<td>77.8<a class="ml-3" href="">Edit</a></td>
							<td>Yes</td>
							<td><a href="">Download</a><a class="ml-3" href="">Feedback</a></td>
						</tr>
						<tr>
							<td>812475D</td>
							<td>Friday, 6 March 2020, 11:42 PM</td>
							<td>74.3<a class="ml-3" href="">Edit</a></td>
							<td>No</td>
							<td><a href="">Download</a><a class="ml-3" href="">Feedback</a></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


  
