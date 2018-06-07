<?php include( 'header.php'); ?>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		<?php if (isset($_GET['action']) && isset($_GET['token'])){ 
			$token = $help->validAndEscape($_GET['token']);
			$stmt = $db->link->query("select * from confirmation");
			if ($stmt) {
				$registant_id = $stmt->fetch_object()->registant_id;

			}
			
		} ?>	
	
		
		<div class="col-md-12">
			<!-- /.box-header -->
			<div style="background:#fff; padding:20px;box-shadow:0 1px 1px 0px #EFEFEF; class="table-container">
				<h3 class="box-title"><i class="fa fa-money" aria-hidden="true"></i> PAYMENT<hr></h3>
		 
					<div class="row">
					<form action="index.php" method="post" >	
						<input name="registant_id" value="<?php  echo $registant_id; ?>" type="hidden" class="form-control1" placeholder="" />
						
						<div class="col-md-6" tabindex="1" >
							<div class="form-group">
							  <select class="form-control1" name="method" required="">
							    <option>Select Method</option>
							    <option value="bkash">Bkash</option>
							    <option value="rocket">Rocket</option>
							    <option value="cash">Cash</option>
								  
							</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input name="amount" type="number" class="form-control1" tabindex="2"  placeholder="Amount"  required="" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input name="transaction_id" type="text" class="form-control1" tabindex="3"  placeholder="Transaction ID"  required="" />
							</div>
						</div>
						
					</div>
				</div>
				<div class="panel-footer"> <center>
					<input type="hidden" name="addpayment">
					<button type="reset"class="btn btn-danger" value="Reset">Reset</button>
					<button type="submit" name="sign_up" tabindex="18" class="btn btn-success" onclick="return confirm('Are you sure you want to Process this ?');"> <i class="fa fa-refresh" aria-hidden="true"></i> Submit</button>
				</form>
				</center>
			</div> 
		</div> 
	</div>
	
</div>
<!-- /.box-body -->
<?php include( 'footer.php'); ?>																																																		