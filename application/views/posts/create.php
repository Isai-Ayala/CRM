<script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<h2> <?= $title ?> </h2>

<?php 
	if((isset($emptyPost)))
		echo $emptyPost . "<br>";
?>

<?php echo form_open('posts/create'); ?>
	<div class="form-group">
		<label>Post: </label>
		<textarea id="editor1" class="form-control" name="post" placeholder="Write your post!"></textarea>
	</div> 
	<input type="hidden" name="callFromForm" value="call made from a form">
	<button type="submit" class="btn btn-default">Submit</button>
</form>


<script>
	CKEDITOR.replace('editor1');
</script>
