	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Merienda:wght@700&family=Roboto+Slab&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
		<title><?=$title ?></title>
	</head>
	<body>
	<div class="navbar-background">
	</div>
	<nav class="navbar navbar-expand-lg bg-custom fixed-top">
		<div class="container p-2 text-uppercase">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url(); ?>teacher">Courses<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>compiler">Compiler</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href=<?php echo base_url()."teacher/profile"; ?>>Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#logout-teacher" href="#" >Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!--Logout Modal -->
	<div class="modal fade" id="logout-teacher" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">Are you sure ?</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<a class="btn btn-primary" href="<?php echo base_url().'login/logout'; ?>" >Logout</a>
					<a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid mt-5">
