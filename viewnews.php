<?php include( 'header.php'); ?>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'view'){ 
	$id = $help->validAndEscape($_GET['id']);
	$stmt =  $db->link->query("select * from news where id ='$id'");
    if ($stmt) {
        $data = $stmt->fetch_assoc();
    }


} ?>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			
				<img src="photo/news/<?php echo $data['photo']; ?>" alt="" width="100%" height="300px"><br/><br/>
				
			
			<h2><?php echo $data['title']; ?></h2>
			<small style="margin: 0px;"><strong>Published on : <?php echo $help->formatDate($data['date']); ?></strong></small><br/><br/>
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