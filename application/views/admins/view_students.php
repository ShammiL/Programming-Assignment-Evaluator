<div class="container">
	<div class="card mt-100">
        <div class="card-header">
            <h3>View Students</h3>
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Number of Students :</label>
                        </div>
                        <div class="col-md-7">
                            <label for=""><?php echo $count; ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-9">
                        <?php echo form_open('admin/searchStudent') ?>
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
                            <a type="submit" href="<?php echo base_url(); ?>admin/viewStudent" class="btn btn-primary btn-edit">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($students) { ?>
                <div class="card mt-4">
					<table class="table table-hover">
						<thead class="card-header">
                            <tr>
                                <th scope="col">Index Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Action</th>
                            </tr>
						</thead>
						<tbody>
                        <?php foreach($students as $student) { ?>
                            <tr>
                                <td><?php echo $student['indexNumber']; ?></td>
                                <td><?php echo $student['fname'].' '.$student['lname']; ?></td>
                                <td><?php echo $student['email']; ?></td>
                                <td><?php echo $student['semester']; ?></td>
                                <td><a href="<?php echo base_url(); ?>admin/editStudent/<?php echo $student['indexNumber']; ?>">View</a></td>
                            </tr>
                        <?php  } ?>
						</tbody>
					</table>
				</div>
                <?php } else {
                    echo "<p class='text-center'>There are no students.</p>";
                } ?>
        </div>
	</div>
</div>
