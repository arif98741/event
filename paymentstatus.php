<?php include( 'header.php'); ?>
<!-- Full Width Column -->
<div class="container">
	<div class="row">
		<?php if (isset($_GET['action']) && isset($_GET['registrationid'])){ 
			$registant_id = $help->validAndEscape($_GET['registrationid']);

			if (isset($_POST['addtransaction'])) {
				$transaction_id = $help->validAndEscape($_POST['transaction_id']);
				$check = $db->link->query("select * from ledger where transaction_id ='$transaction_id'") or die($db->link->error)."at line number ".__LINE__;
				if ($check) {
					if ($check->num_rows > 0) {
						$message = "<h3 style='color: red; text-align:center;'>Transaction ID has already been used</h3>";
					}else{
						$stmt = $db->link->query("update ledger set transaction_id ='$transaction_id' where registant_id='$registant_id'") or die($db->link->error)."at line number ".__LINE__;

						if ($stmt) {
							$message = "<h3 style='color: green; text-align:center;'>Transaction ID successfully saved</h3>";

							
							$regisstmt = $db->link->query("select * from registration where id ='$registant_id'") or die($db->link->error)."at line number ".__LINE__;
							if ($regisstmt) {
								$registrationdata = $regisstmt->fetch_assoc();
							}

							$message .='<p>'.'<strong>Name : </strong>'.$registrationdata['fullname'].'</p>';
							$message .="<p><strong>Father's Name: </strong>".$registrationdata['father']."</p>";
							$message .="<p><strong>Academic: </strong>".$registrationdata['academic']."</p>";
							$message .="<p><strong>First Admission: </strong>".$registrationdata['batchyear']."</p>";

						}else{
							$message = "<h3 style='red: green; text-align:center;'>Failed to save transaction ID</h3>";
						}
					}
				}
			} 
			
		}else{
		 	header("location: payment.php");
		} 
		?>	
	
		
		<div class="col-md-12">
			<!-- /.box-header -->
			<div style="background:#fff; padding:20px;box-shadow:0 1px 1px 0px #EFEFEF; class="table-container">
				<h3 class="box-title"><i class="fa fa-reply" aria-hidden="true"></i>Transaction Submission<hr></h3>
						<?php if(isset($message)){ ?>

						 <?php echo $message ; ?>

						<?php }else{ ?>



					<div class="row">

					<form action="" method="post" >	
						
						<div class="col-md-offset-3 col-md-6">
							<div class="form-group">
								<input name="transaction_id" type="text" class="form-control1" tabindex="2"  placeholder="Transaction Number"  required="" />
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer"> <center>
					<input type="hidden" name="addtransaction">
					<button type="reset"class="btn btn-danger" value="Reset">Reset</button>
					<button type="submit" name="sign_up" tabindex="18" class="btn btn-success"> <i class="fa fa-reply" aria-hidden="true"></i> Submit</button>
				
				</form>
				</center>
				<?php } ?>	
				
			</div> 

		</div> 
	</div>
	
</div>
<!-- /.box-body -->
<?php include( 'footer.php'); ?>																																																		