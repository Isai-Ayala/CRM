<!-- la unica funcion de los administrador es eliminar y registrar vendedores !-->

<?php 
	if(!$this->session->userdata('logged_in')) //si no esta loggeado se va a la pagina de login
		redirect('users/login');
	if($this->session->userdata('roleid') != 1) //si no es administrador se va a la pagina de posts
		redirect('posts');
?>

<h2><?= $title ?></h2>

<br>
<br>
<?php foreach($salesmen as $salesman) : ?>
	<?php echo $salesman['user'];?>
	<br>
	<?php echo $salesman['name'];?>
	<?php echo form_open('admin/delete/' . $salesman['userid']); ?>
		<input type='submit' class='btn btn-danger' value="delete"></input> 
	</form>
	<br>
	<br>
<?php endforeach; ?>