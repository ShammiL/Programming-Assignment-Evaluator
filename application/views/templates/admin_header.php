<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Merienda:wght@700&family=Roboto+Slab&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
		<title>MK Blog</title>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg bg-custom fixed-top">
		<div class="container p-2 text-uppercase">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">Logo</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url(); ?>admin">Home<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href=<?php echo base_url()."login/logout"; ?>>Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid mt-5">
