<div class="container-fluid row" id="body">
    <div class="col-md-2"></div>
    <div class="col-md-10 body-card">
        <div class="card">
            <div class="card-header">
                <h3>Compiler</h3>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">                        
                        
                        <?php echo form_open_multipart('compiler/index');?>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="file-input">Select file to upload :</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="userfile" required>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Choose the Language :</label>
                                        <select name = "lang" class="custom-select" required>
                                            <option value="Python">Python 2.7</option>
                                            <option value="Python3">Python 3.7</option>
                                            <option value="Java">Java</option>
                                            <option value="Cpp">C++</option>
                                            <option value="Php">PHP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Give Custom Inputs :</label>
                                        <textarea class="form-control" name="input"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="upload">Run Code</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if (isset($message)) {
                    echo '
                    <h5 class="card-title mt-2">Output : </h5>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h6 class="col-md-2">Message : </h6>
                                <h6 class="col-md-10">'.$message.'</h6>
                            </div>';
                            if (isset($final_result['output'])) {
                                echo '
                                <div class="row">
                                    <h6 class="col-md-2">Output : </h6>
                                    <h6 class="col-md-10">'.$final_result["output"].'</h6>
                                </div>';
                            } elseif (isset($final_result['rntError'])) {
                                echo '
                                <div class="row">
                                    <h6 class="col-md-2">Runtime Error : </h6>
                                    <h6 class="col-md-10">'.$final_result["rntError"].'</h6>
                                </div>';
                            } elseif (isset($final_result['cmpError'])) {
                                echo '
                                <div class="row">
                                    <h6 class="col-md-2 pr-0">Compilation Error :</h6>
                                    <h6 class="col-md-10">'.$final_result["cmpError"].'</h6>
                                </div>';
                            } 
                        echo '
                        </div>
                    </div>';
                } ?>
            </div>
        </div>
    </div>
</div>
