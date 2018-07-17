<?php include( 'header.php'); ?>
<?php
 
	$stmt =  $db->link->query("select * from page where title='Rules' and status ='active'");
	if ($stmt) {
	    $data = $stmt->fetch_assoc();
	}


?>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			
			<article>
				<?php
					echo html_entity_decode($data['description']);

				 ?>
			</article>
			
		</div>
		
	</div>
	
</div>
<!-- /.box-body -->
<?php include( 'footer.php'); ?>																																																		