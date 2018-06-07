<?php include( 'header.php'); ?>
<style>
	img:hover{
		opacity: .6;
		transition: .6s;
	}
</style>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		
		<?php
			if (isset($_POST['sign_up'])){ ?>
				<div class="col-md-12" style="margin-bottom: 30px; width: 100%;">
				<?php echo $status = $man->addRegistant($_POST); ?>
				</div>
			<?php	} ?>
		
		
		<div class="col-md-12">
			<div style="background:#fff; padding:20px;" class="table-container">
				
				<div class="row">
					<h3>News & Events</h3>
					<hr>
					<?php

						$stmt = $db->link->query("select * from news where status='active' order by id desc") or die($db->link->error)." ".__LINE__;
						if ($stmt) {
							while ($row = $stmt->fetch_object()) { ?>
								<div class="col-md-4" >
									<a href="viewnews.php?action=view&id=<?php echo $row->id; ?>"><img src="photo/news/<?php echo $row->photo; ?>" alt="" width="100%" height="200px"></a>
									<a href="viewnews.php?action=view&id=<?php echo $row->id; ?>"><h3 style="margin: 0px;"><?php echo $row->title; ?></h3></a>
									<small><strong>Published on: <?php echo $help->formatDate($row->date,'d-m-Y'); ?></strong></small>
									<article style="font-size: 14px;"><?php echo html_entity_decode(substr($row->description, 0,150))."..."; ?></article>
								</div>
							    
							<?php }
						}
					 ?>
					
					

				</div>
			</div>

			
		</div>

		<br/><br/>

	</div>
	
</div>
<!-- /.box-body -->
<?php include( 'footer.php'); ?>																																																		