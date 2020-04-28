
  <h2><?= $title?></h2>

  <?php foreach($assignments as $assignment): ?>
   <a href="<?php echo base_url();?>submissions/view/<?=$assignment['assignment_id'];?>"> <h5> <?php echo $assignment['assignment_name']; ?> : <?php echo $assignment['language']; ?> assignment </h5> </a>


  <?php endforeach; ?>

    
