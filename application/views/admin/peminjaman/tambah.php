
<?php  
include('add.php');
echo '<hr>';
include('list.php');
?>

<script>
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>