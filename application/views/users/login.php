<?php echo form_open('users/login') ?>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" name="user" class="form-control" placeholder="Enter Username" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
			</div> 
			<input type="submit" class="btn btn-primary btn-block"></input>
		</div>
	</div>
<?php echo form_close(); ?>