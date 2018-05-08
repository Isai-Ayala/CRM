<html>
	<head>
		<title>CRM</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">CRM</a>
				</div>
				<div id="navbar">
					<a href="<?php echo base_url() ?>">Home</a>
					&nbsp;&nbsp;<a href="<?php echo base_url() ?>About">About</a>

					<!-- links para sesion no loggeada !-->
					<?php if(!$this->session->userdata('logged_in')): ?>
						&nbsp;&nbsp;<a href="<?php echo base_url() ?>users/Login">Login</a>
					<?php endif; ?>

					<!-- links para sesion loggeada !-->
					<?php if($this->session->userdata('logged_in')): ?>
						<?php if($this->session->userdata('roleid') == 1): ?>
							&nbsp;&nbsp;<a href="<?php echo base_url() ?>users/Register">Register salesman</a>
						<?php endif; ?>
						<?php if($this->session->userdata('roleid') != 1): ?>
							&nbsp;&nbsp;<a href="<?php echo base_url() ?>posts/create">Create Post</a>
						<?php endif; ?>
						<?php if($this->session->userdata('roleid') != 3): ?>
							&nbsp;&nbsp;<a href="<?php echo base_url(); ?>users/edit/<?php echo $this->session->userdata('userid'); ?>">Edit User</a>
						<?php endif; ?>
						&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url() ?>users/Logout">Log out <?php echo $this->session->userdata('user'); ?> </a>
					<?php endif; ?>
				</div>
			</div>
		</nav>

		<div class="container">

			<!--flash messages,     Mensajes que se muestran en caso de que se haya realizado una operacion exitosa (ejemplo un registro de usuario exitoso )!-->

			<?php if($this->session->flashdata('user_registered')): ?>
				<?php echo '*' . $this->session->flashdata('user_registered'); ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('post_created')): ?>
				<?php echo '*' . $this->session->flashdata('post_created'); ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('post_updated')): ?>
				<?php echo '*' . $this->session->flashdata('post_updated'); ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('post_deleted')): ?>
				<?php echo '*' . $this->session->flashdata('post_deleted'); ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_login')): ?>
				<?php echo '*' . $this->session->flashdata('user_login'); ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('login_failed')): ?>
				<?php echo '*' . $this->session->flashdata('login_failed'); ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('logged_out')): ?>
				<?php echo '*' . $this->session->flashdata('logged_out'); ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_deleted')): ?>
				<?php echo '*' . $this->session->flashdata('user_deleted'); ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_updated')): ?>
				<?php echo '*' . $this->session->flashdata('user_updated'); ?>
			<?php endif; ?>
