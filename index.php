<?php include( 'header.php'); ?>
<!-- Full Width Column -->
<marquee behavior="" direction="">Registration will be Started From 04-July-2018</marquee>
<div class="container">
	<div class="row">
		
		<?php
			if (isset($_POST['sign_up'])) { ?>
				<div class="col-md-12" style="margin-bottom: 30px; width: 100%; margin-left: 30px;">
				<?php 
						$status = $man->addRegistant($_POST);
						echo $status;
					 ?>
				</div>
			<?php	} ?>
		
		<div class="col-md-12">
			<!-- /.box-header -->
			<div style="background:#fff; padding:20px;box-shadow:0 1px 1px 0px #ccc; class="table-container">
				<h3 class="box-title"><i class="fa fa-user-plus" aria-hidden="true"></i> 75th Anniversary | Student Registration Form</h3> 
				<a href="rules.php">Before Registration Please Read the following Instruction</a>
				<hr>
		 
					<div class="row">
					<form action="registration.php" method="post"  enctype="multipart/form-data">	
						<div class="col-md-4">
							<div class="form-group">
								
								<select class="form-control1"  name="registration_type" id="registration_type" required>
								    <option value="" selected="">Registration Type</option>
								    <option value="Ex Student">Ex Student</option>
								    <option value="Ex Student(Abroad)">Ex Student(Abroad)</option>
								    <option value="Current Student">Current Student</option>
							</select>
						

							</div>
						</div>
						<div class="col-md-4">
							
							<div class="form-group">
								<input name="fullname" type="text" class="form-control1" placeholder="Full Name in English" required="" />
							</div>
						</div>

						<div class="col-md-4">
							
							<div class="form-group">
								<input name="fullnameinbangla" type="text" class="form-control1" placeholder="Full Name in Bangla" required="" />
							</div>
						</div>


						<div class="col-md-4">
							<div class="form-group">
								<input name="dob" type="text" class="form-control1" placeholder="Date of Birth (dd-mm-yyyy)" required="" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
							  <select class="form-control1" name="gender" required>
								    <option value="" disabled="" selected="">Select Gender</option>
								    <option value="male">Male</option>
								    <option value="female">Female</option>
								  
							</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input name="father" required="" type="text" class="form-control1"  placeholder="Father's Name"  />
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
									<select class="form-control1" name="academic" required>

									    <option value="" disabled="" selected="">Academic Class</option>
									    <option value="HSC">HSC</option>
									    <option value="DEGREE">Degree(Pass) </option>
									    <option value="Honors">Honours</option>
									    <option value="Masters">Masters</option>
										  
									</select>
								</div>
							</div>							
							
												
							<div class="col-md-4">
								<div class="form-group">
									<select name="batchyear" id="" class="form-control1">
										<option value="" disabled="" selected="">First Admission Year</option>
										<?php
										 $year = 2018;
										 while ($year > 1943) {
										     $year--; ?>
											<option value="<?php echo $year; ?>"><?php echo $year; ?></option>

										 <?php }
										 ?>
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
									<input name="no_of_family_member" type="number" id="no_of_member_in_family"  class="form-control1" placeholder="Family Members to Participate" autocomplete="off" />
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<select name="bloodgroup" id="bloodgroup" class="form-control1">
										<option value="" disabled="" selected>Blood Group</option>
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										
									
									</select>
								</div>
							</div>

						<div class="col-md-4">
							<div class="form-group">
								<input name="amount" type="number" id="amount" class="form-control1"   placeholder="Amount" />
							</div>
						</div>
						

						<div class="col-md-8">
							
							<div class="form-group">
								<input name="expiration" type="hidden" required class="form-control1"  autocomplete="off" value="<?php echo date('Y/m/d', strtotime('+15 days'));?>" />
								<samp><input name="photo" type="file"  class="form-control1" id="f" onchange="ValidateSingleInput(this);" title="Image should be less than 400KB" accept=".JPG" required /></samp>
							</div>
						</div>
						<div class="col-md-4">
							<h5>Image size will be less then 400KB</h5>
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