<?php include( 'header.php'); ?>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		
		<?php
			if (isset($_POST['sendmessage'])){ ?>
				<div class="col-md-12" style="margin-bottom: 30px; width: 100%;">
				<?php echo $status = $man->sendMessage($_POST); ?>
				</div>
			<?php	} ?>
	
		
		
		<div class="col-md-offset-2 col-md-8">
			<!-- /.box-header -->
			<div style="background:#fff; padding:20px;box-shadow:0 1px 1px 0px #EFEFEF; class="table-container">
				<h3 class="box-title" style="text-align: center;"><i class="fa fa-envelope" aria-hidden="true"></i> CONTACT<hr></h3>
				<h4>Mobile: 01864-008787</h4>
				<h4>Contact at <a href="https://facebook.com" target="_blank">Facebook</a></h4>
				<hr>
		 
					<div class="row">
					<form action="" method="post">	
						
						<div class="col-md-12">
							<div class="form-group">
								<input name="subject" type="text" required class="form-control1" tabindex="1" placeholder="Enter Subject" required="" autocomplete="off" />
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<input name="name" type="text" required class="form-control1" tabindex="1" placeholder="Enter Your Name" required="" autocomplete="off" />
							</div>
						</div>




						<div class="col-md-6">
							<div class="form-group">
								<input name="contact" type="text" required class="form-control1" tabindex="2" placeholder="Enter Mobile" autocomplete="off" required="" />
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<input name="email" type="email" required class="form-control1" tabindex="3" placeholder="Enter Email" autocomplete="off" />
							</div>
						</div>

						
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="message" cols="45" rows="5" class="form-control" tabindex="4" placeholder="Write your message here" required=""></textarea>
							</div>
						</div>
								
					</div>
				</div>
				<div class="panel-footer"> <center>
					<button type="reset"class="btn btn-danger" value="Reset">Reset</button>
					<button type="submit" name="sendmessage" tabindex="18" class="btn btn-success" tabindex="5" onclick="return confirm('Are you sure you want to Process this ?');"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Send</button>
				</form>
				</center>
			</div> 
		</div> 
	</div>
	
</div>
<!-- /.box-body -->
<?php include( 'footer.php'); ?>																																																		