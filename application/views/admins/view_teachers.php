<div class="container">
	<div class="card body-card">
        <div class="card-header">
            <h3>View Teachers</h3>
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Number of Teachers :</label>
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
                                <input type="text" class="form-control" name="search-teacher" placeholder="Enter Teacher ID...">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" name="submit-search-teacher" class="btn btn-primary btn-edit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if($teachers) { ?>
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
                        <?php foreach($teachers as $teacher) { ?>
                            <tr>
                                <td><?php echo $teacher['nic']; ?></td>
                                <td><?php echo $teacher['fname'].' '.$teacher['lname']; ?></td>
                                <td><?php echo $teacher['email']; ?></td>
                                <td><?php echo $teacher['telephone']; ?></td>
                                <td><a href="">View</a></td>
                            </tr>
                        <?php  } ?>
						</tbody>
					</table>
				</div>
                <?php } else {
                    echo "<p class='text-center'>There are no teachers.</p>";
                } ?>
        </div>
	</div>
</div>
