<h2><?= $title ?></h2>

<br>
<br>
<?php foreach($posts as $post) : ?>

	<small>Posted on: <?php echo $post['date'];?></small>
	<br>
	<?php echo $post['post'];?>
	<br>
	<a class="btn btn-default" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['postsid'] ?>">Edit</a>
	<?php echo form_open('posts/delete/' . $post['postsid']); ?>
		<input type='submit' class='btn btn-danger' value="delete"></input> 
	</form>

	<br>
	<br>

<?php endforeach; ?>