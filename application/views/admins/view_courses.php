<div class="container">
	<div class="card body-card">
        <div class="card-header">
            <h3>View Courses</h3>
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Number of Courses :</label>
                        </div>
                        <div class="col-md-7">
                            <label for=""><?php echo $count; ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php echo form_open('admin/searchCourse/') ?>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" name="search-course" placeholder="Enter Course ID...">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" name="submit-search-course" class="btn btn-primary btn-edit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if($courses) { ?>
                <div class="card mt-4">
					<table class="table table-hover">
						<thead class="card-header">
                            <tr>
                                <th scope="col">Course ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Lecturer</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Action</th>
                            </tr>
						</thead>
						<tbody>
                        <?php foreach($courses as $course) { ?>
                            <tr>
                                <td><?php echo $course['course_id']; ?></td>
                                <td><?php echo $course['course_name']; ?></td>
                                <td><?php echo $course['lecturer_id']; ?></td>
                                <td><?php echo $course['semester']; ?></td>
                                <td><a href="">View</a></td>
                            </tr>
                        <?php  } ?>
						</tbody>
					</table>
				</div>
                <?php } else {
                    echo "<p class='text-center'>There are no courses.</p>";
                } ?>
        </div>
	</div>
</div>
