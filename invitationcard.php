<?php include( 'header.php'); ?>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		<?php if (isset($_POST['getinvitationcard'])){ 
			$registration_id = $help->validAndEscape($_POST['registration_id']);
			$transaction_id = $help->validAndEscape($_POST['transaction_id']);
			
			$stmt = $db->link->query("SELECT * FROM registration r JOIN ledger l on r.id = l.registant_id WHERE r.id = '$registration_id' and l.transaction_id='$transaction_id'") or die($db->link->error)."at line number ".__LINE__;
			if ($stmt) {
				if ($stmt->num_rows > 0) {
					$data = $stmt->fetch_assoc();
					header("location: getinvitationcard.php?action=getcard&registrationid=".$data['registant_id']);
				} else {
					$message = "<h3 style='color: red; text-align:center;'>Registration ID or Transaction ID Didn't match</h3>";
				}
			}
		} ?>	
	
		
		<div class="col-md-12">
			<!-- /.box-header -->
			<div style="background:#fff; padding:20px;box-shadow:0 1px 1px 0px #EFEFEF; class="table-container">
				<h3 class="box-title"><i class="fa fa-list" aria-hidden="true"></i> INVITATION CARD	<hr></h3>

					<?php if(isset($message)){
						 echo $message ;
						}  ?>

					<div class="row">

					<form action="" method="post" >	
						
						<div class="col-md-offset-3 col-md-6">
							<div class="form-group">
								<input name="registration_id" type="text" class="form-control1" tabindex="2"  placeholder="Registration ID"  required="" />

								<br><br>

								<input name="transaction_id" type="text" class="form-control1" tabindex="2"  placeholder="Transaction ID"  required="" />

								
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer"> <center>
					<input type="hidden" name="getinvitationcard">
					<button type="reset"class="btn btn-danger" value="Reset">Reset</button>
					<button type="submit" name="sign_up" tabindex="18" class="btn btn-success"> <i class="fa fa-search" aria-hidden="true"></i> Search</button>
				
				</form>
				</center>
				
			</div> 

		</div> 
	</div>
	
</div>
<!-- /.box-body -->
<?php include( 'footer.php'); ?>																																																		