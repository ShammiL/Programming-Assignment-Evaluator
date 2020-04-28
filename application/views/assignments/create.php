
  <h2>Create Assignment</h2>

  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart('assignments/create/' . $course); ?>
  <div class="form-group">
    <label>Assignment Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="description" placeholder="Enter assignment description">
    </textarea>
  </div>
  <div class="form-group">
    <label >Select language</label>
    <select class="form-control" name="language">
    <option value="none">------Select language------</option>
    <option value="Java">Java</option>
      <option value="Python">Python</option>
      <option value="Javascript">Javascript</option>
      <option value="C++">C++</option>
    </select>
  </div>
  <div>
  <label for="start">Start date:</label>

<input type="date" name="deadline"
       value="dd-mm-yyyy"
       min="19-04-2020">
  </div>

  <div class="form-group"><label> Upload file</label>
  <input type="file" name="userfile" size="100">
  </div>

  </div>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>