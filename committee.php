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
			<div style="" class="">
				
				<div class="row">

					<?php

						$stmt = $db->link->query("select * from committee order by name asc");
						if ($stmt) {
							while ($row = $stmt->fetch_object()) { ?>
								<div class="col-md-3" >
									<?php if($row->photo == '' || $row->photo == null): ?>
			                          <img src="photo/committee/default.png" alt="" width="100%" height="240px;">
			                      <?php else: ?>
			                          <img src="photo/committee/<?php echo $row->photo; ?>" alt="" width="100%" height="240px">
			                       <?php endif; ?>
									<br><br>
									<div class="info" style="color: #00000 !important;">
										<p style="font-size: 22px; text-align: center;"><?php echo $row->name; ?></p>
										<p style="font-size: 14px; text-align: center;"><?php echo $row->designation; ?></p>
										<p style="font-size: 14px; text-align: center;"><?php echo $row->contact; ?></p>
									</div> <br><br>

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