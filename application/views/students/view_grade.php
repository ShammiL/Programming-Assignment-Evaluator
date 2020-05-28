<div class="container-fluid row">
    <div class="col-md-1"></div>
    <div class="col-md-10 body-card">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $assignment_data['course_id']; ?></h2>
                <h3>Assignment <?php echo $num.' - '.$assignment_data['assignment_name']; ?></h3>
            </div>
            <div class="card-body">
                <h5 class="card-title mt-3">Grade :</h5>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <label class="col-md-3" for="file-input">Grade :</label>
                            <label class="col-md-9" for="file-input"><?php echo $grade; ?>/100</label>
                        </div>
                        <div class="row">
                            <label class="col-md-3" for="file-input">Plagiarism report :</label>
                            <label class="col-md-9" for="file-input">Unique</label>
                        </div>
                        <div class="row">
                            <label class="col-md-3" for="file-input">Feedback :</label>
                            <label class="col-md-9" for="file-input">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur libero mollitia ut. Accusantium beatae eos modi obcaecati, sit vitae voluptatem.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
