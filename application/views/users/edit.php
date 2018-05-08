<!--  vista para modificar un usuario que no sea cliente !-->

<h2><?= $title ?></h2>

<?php echo form_open('users/update'); ?>

	
	<div class="form-group">
		<label>User: </label>
		<input type="text" class="form-control" name="user" placeholder="User" value=<?php echo $users['user']; ?> >
	</div>
	<div class="form-group">
		<label>Name: </label>
		<input type="text" class="form-control" name="name" placeholder="Name" value=<?php echo $users['name']; ?> >
	</div>
	<div class="form-group">
		<label>Password: </label>
		<input type="password" class="form-control" name="password" placeholder="Password">
	</div>
	<div class="form-group">
		<label>Confirm Password: </label>
		<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
	</div>
	<input type="hidden" class="form-control" name="roleid" value=<?php echo $users['roleid']; ?> >
	<button type="submit" class="btn btn-primary">Submit</button>

<?php echo form_close(); ?>