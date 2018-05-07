<!--  vista para registrar un usuario !-->

<h2><?= $title ?></h2>

<?php echo form_open('users/register'); ?>

	
	<div class="form-group">
		<label>User: </label>
		<input type="text" class="form-control" name="user" placeholder="User">
	</div>
	<div class="form-group">
		<label>Name: </label>
		<input type="text" class="form-control" name="name" placeholder="Name">
	</div>
	<div class="form-group">
		<label>Password: </label>
		<input type="password" class="form-control" name="password" placeholder="Password">
	</div>
	<div class="form-group">
		<label>Confirm Password: </label>
		<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>

<?php echo form_close(); ?>