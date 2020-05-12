<section>
	<div class="courses">
		<h1 class="text-center text-uppercase" data-aos="zoom-in">Our Courses</h1>
		<div class="owl-carousel owl-theme display-course">
		<?php foreach ($courses as $course) { ?>
			<div class="course-content" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
				<img src="<?php echo base_url(); ?>assets/images/site/undraw_resume_folder_2_arse.svg" alt="course-image">
				<div class="course-title text-center">
					<h4><?php echo $course['course_id']; ?></h4>
					<h5><?php echo $course['course_name']; ?></h5>
					<button class="btn btn-view">View</button>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>
<footer class="footer">
	<div class="container">
		<div class="about" data-aos="fade-down-right">
			<h3>About us</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, eaque alias minus tenetur placeat tempora in laboriosam dolore possimus hic.</p>
		</div>
		<div class="follow" data-aos="zoom-in">
			<h3>Follow us</h3>
			<div class="social-links">
				<img class="width-20" src="<?php echo base_url(); ?>assets/images/site/facebook.svg">
				<img class="width-20" src="<?php echo base_url(); ?>assets/images/site/instagram.svg">
				<img class="width-20" src="<?php echo base_url(); ?>assets/images/site/youtube.svg">
				<img class="width-20" src="<?php echo base_url(); ?>assets/images/site/twitter.svg">

			</div>
		</div>
		<div class="contact" data-aos="fade-down-left">
			<h3>Contact us</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, iure!</p>
			<p><ion-icon name="call-outline"></ion-icon> +9477 251 23 45</p>
			<p><ion-icon name="logo-whatsapp"></ion-icon> +9477 251 23 45</p>
			<p><ion-icon name="mail-open-outline"></ion-icon> programming@gmail.com</p>
		</div>
	</div>
</footer>
