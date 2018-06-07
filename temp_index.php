<?php include( 'header.php'); ?>
<style>
	.dashboard-container{
		min-height: 170px;
	}
	.dashboard-block{
		margin-top: 20px;
	}

	.dashboard-block a{
		text-decoration: none;
		font-size: 24px;
		padding-top: 30px;
		
	}
	.newsummary{
		margin-top:10px;
	}

	
</style>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		

		
		<div class="col-md-12">
			
			<div style="background:#fff; padding:20px; box-shadow:0 1px 1px 0px #EFEFEF;" class="table-container dashboard-container">
		 
				<div class="col-md-4 dashboard-block">
					
					<a href="<?php echo BASE_URL?>newsandevent.php"><i class="fa fa-bullhorn"></i>&nbsp;News and Events</a>
					<hr>

				</div>

				<div class="col-md-4 dashboard-block">
					
					<a href=""><i class="fa fa-list"></i>&nbsp;Rules</a>
					<hr>



				</div>

				<div class="col-md-4 dashboard-block">
					
					<a href="<?php echo BASE_URL?>registration.php"><i class="fa fa-plus"></i>&nbsp;Registration</a>
					
					<hr>
					
				</div>
				<br>
					<?php

						$stmt = $db->link->query("select * from news where status='active' order by id desc limit 6");
						if ($stmt) {
							while ($row = $stmt->fetch_object()) { ?>
							   <div class="newsummary">
							   	
							   	 <i class="fa fa-check" aria-hidden="true" ></i> <a href="viewnews.php?action=view&id=<?php echo $row->id; ?>"><?php echo $row->title; ?> <sub>(<?php echo $help->formatDate($row->date,'d-m-Y'); ?>)</sub></a><br>
							   </div>
							<?php }
						}
					 ?>
					
			</div>
			
				
				
		</div> 





	</div> 
</div>

<!-- /.box-body -->
<?php include( 'footer.php'); ?>																																																		