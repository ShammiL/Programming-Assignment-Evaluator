
  

 <h2> <?php echo $assignment[0]['assignment_name']; ?> </h2>

 <div>
  <p> <?php echo $assignment[0]['description']; ?> </p>
 </div>

 <small> deadline : <?php echo $assignment[0]['deadline']; ?> </small>
<br>
 <a href="<?= base_url('assets/uploads/reference docs/'); ?>"> reference document </a>
 <hr>
 <a class="btn btn-default" href="<?php echo base_url();?>assignments/edit/<?php echo $assignment[0]['assignment_id']; ?>"> Edit </a>
  

<h3><?= $title?></h3>


  
