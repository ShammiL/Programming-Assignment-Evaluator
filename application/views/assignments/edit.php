
  <h2>Edit Assignment</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('assignments/update'); ?>
<input type="hidden" name="id" value="<?php echo $assignment['assignment_id']; ?>"/>

<div class="form-group">

  <label>Assignment Name</label>
  <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo $assignment['assignment_name']?>">
</div>
<div class="form-group">
  <label>Description</label>
  <textarea class="form-control" name="description" placeholder="Enter assignment description"><?php echo $assignment['description']?>
  </textarea>
</div>
<div class="form-group">
  <label >Select language</label>
  <select class="form-control" name="language">
  <option value="<?php echo $assignment['assignment_name']?>"><?php echo $assignment['language']?></option>
  <option value="Java">Java</option>
    <option value="Python">Python</option>
    <option value="Javascript">Javascript</option>
    <option value="C++">C++</option>
  </select>
</div>
<div>
<label>Deadline :</label>

<input type="date" name="deadline"
     value="<?php echo $assignment['deadline']?>"
     min="19-04-2020">
</div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>