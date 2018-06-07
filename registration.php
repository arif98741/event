<?php include( 'header.php'); ?>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		
		<?php
			if (isset($_POST['sign_up'])){ ?>
				<div class="col-md-12" style="margin-bottom: 30px; width: 100%; margin-left: 30px;">
				<?php 
						$status = $man->addRegistant($_POST);
						echo $status;
					 ?>
				</div>
			<?php	} ?>
		
		<div class="col-md-offset-1 col-md-10">
			<!-- /.box-header -->
			<div style="background:#fff; padding:20px;box-shadow:0 1px 1px 0px #EFEFEF; class="table-container">
				<h3 class="box-title"><i class="fa fa-user-plus" aria-hidden="true"></i> EVENT REGISTRATION<hr></h3>
		 
					<div class="row">
					<form action="" method="post"  enctype="multipart/form-data">	
						<div class="col-md-4">
							<div class="form-group">
								
								<select class="form-control1"  name="registration_type" id="registration_type" required="">
								    <option disabled="" selected="">Registration Type</option>
								    <option value="Former Student">Ex Student</option>
								    <option value="Former Student(Abroad)">Ex Student(Abroad)</option>
								    <option value="Running Student">Current Student</option>
							</select>
						

							</div>
						</div>
						<div class="col-md-4">
							
							<div class="form-group">
								<input name="fullname" type="text" class="form-control1" placeholder="Full Name" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input name="dob" type="text" class="form-control1" placeholder="Date of Birth (dd-mm-YYYY)" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
							  <select class="form-control1" name="gender" required="">
								    <option disabled="" selected="">Select Gendar</option>
								    <option value="male">Male</option>
								    <option value="female">Female</option>
								  
							</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input name="father" type="text" class="form-control1"  placeholder="Father' Name"  />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input name="contact" type="text" class="form-control1"  placeholder="Contact Number"  />
							</div></div>
						
							<div class="col-md-4">
								<div class="form-group">
									<input name="address" type="text" required class="form-control1" placeholder="Address" autocomplete="off" />
								</div>
							</div>							
							
												
							<div class="col-md-4">
								<div class="form-group">
									<select name="batchyear" id="" class="form-control1">
										<option value="" disabled="" selected="">First Admission Year</option>
										<?php
										 $year = 2018;
										 while ($year >= 1950) {
										     $year--; ?>
											<option value="<?php echo $year; ?>"><?php echo $year; ?></option>

										 <?php }
										 ?>
									</select>

									
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<select class="form-control1" name="academic" required="">

									    <option value="" disabled="" selected="">Academic</option>
									    <option value="SSC">SSC</option>
									    <option value="HSC">HSC</option>
									    <option value="Honors">Honors</option>
									    <option value="Masters">Masters</option>
										  
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input name="email" type="email" class="form-control1" id="email" placeholder="Email Address" />
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<input name="occupation" type="text" required class="form-control1"  placeholder="Occupation" autocomplete="off" />
								</div>
							</div>
							
							
							<div class="col-md-4">
								<div class="form-group">
									<input name="no_of_family_member" type="number" id="no_of_member_in_family" required class="form-control1" placeholder="Number of Members in Family" autocomplete="off" />
								</div>
							</div>
							
							<div class="col-md-6" tabindex="1" >
							<div class="form-group">
							  <select class="form-control1" name="method" required="">
							    <option disabled="" selected="">Select Method</option>
							    <option value="rocket">Rocket</option>
							    <option value="cash">Cash</option>
								  
							</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input name="amount" type="number" id="amount" class="form-control1"   placeholder="Amount"  readonly="" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input name="transaction_id" type="text" class="form-control1"   placeholder="Transaction ID"  required="" />
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input name="expiration" type="hidden" required class="form-control1"  autocomplete="off" value="<?php echo date('Y/m/d', strtotime('+15 days'));?>" />
								<samp><input name="photo" type="file"  class="form-control1" id="f" onchange="ValidateSingleInput(this);" accept=".PNG" /></samp>
							</div>
						</div>
								
					</div>
				</div>
				<div class="panel-footer"> <center>
					<button type="reset"class="btn btn-danger" value="Reset">Reset</button>
					<button type="submit" name="sign_up" class="btn btn-success" onclick="return confirm('Are you sure you want to Process this ?');"> <i class="fa fa-refresh" aria-hidden="true"></i> Submit</button>
				</form>
				</center>
			</div> 
		</div> 
	</div>
	
</div>
<!-- /.box-body -->
<?php include( 'footer.php'); ?>																																																		