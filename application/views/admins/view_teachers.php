<div class="container">
	<div class="card mt-100">
        <div class="card-header">
            <h3>View Teachers</h3>
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Number of Teachers :</label>
                        </div>
                        <div class="col-md-7">
                            <label for=""><?php echo $count; ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-9">
                        <?php echo form_open('admin/searchTeacher') ?>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" name="search-teacher" placeholder="Enter Teacher ID..." required>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" name="submit-search-teacher" class="btn btn-primary btn-edit">Search</button>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="col-md-3">
                            <a type="submit" href="<?php echo base_url(); ?>admin/viewTeacher" class="btn btn-primary btn-edit">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($teachers_available != "") { ?>
                <div class="card mt-4">
					<table class="table table-hover">
						<thead class="card-header">
                            <tr>
                                <th scope="col">NIC Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Action</th>
                            </tr>
						</thead>
						<tbody>
                        <?php foreach($teachers_available as $teacher) { ?>
                            <tr>
                                <td><?php echo $teacher['nic']; ?></td>
                                <td><?php echo $teacher['fname'].' '.$teacher['lname']; ?></td>
                                <td><?php echo $teacher['email']; ?></td>
                                <td><?php echo $teacher['telephone']; ?></td>
                                <td><a href="<?php echo base_url(); ?>admin/editTeacher/<?php echo $teacher['nic']; ?>">View</a></td>
                            </tr>
                        <?php  } ?>
						</tbody>
					</table>
				</div>
            <?php } else {
                echo "<p class='text-center'>There are no available teachers.</p>";
            } ?>
            <?php if($teachers_disable != "") { ?>
                <h4 class="mt-5">Disabled Teachers</h4>
                <div class="card mt-4">
                    <table class="table table-hover">
                        <thead class="card-header">
                            <tr>
                                <th scope="col">NIC Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($teachers_disable as $teacher) { ?>
                            <tr>
                                <td><?php echo $teacher['nic']; ?></td>
                                <td><?php echo $teacher['fname'].' '.$teacher['lname']; ?></td>
                                <td><?php echo $teacher['email']; ?></td>
                                <td><?php echo $teacher['telephone']; ?></td>
                                <td><a href="<?php echo base_url(); ?>admin/editTeacher/<?php echo $teacher['nic']; ?>">View</a></td>
                            </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
        </div>
	</div>
</div>
