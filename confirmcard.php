<?php
	include 'classes/DB.php';
	include 'helper/Helper.php';
	$db = new Database();
	$help = new Helper();
	if (isset($_GET['action']) && isset($_GET['rid'])) {
		$id = $help->validAndEscape($_GET['rid']);
		$query = "select * from registration join ledger on registration.id = ledger.registant_id where registration.id='$id'  limit 1";
		$stmt = $db->link->query($query) or die($db->link->error)." error at line number ".__LINE__;
		if ($stmt) {
			if ($stmt->num_rows > 0) {
				$registant_data = $stmt->fetch_assoc();
			}
			
		} 
	} else{
		header('location: index.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmation Card- CGSA & Registration ID -<?php echo $id; ?></title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		body{
			background: #fff;
			max-width: 970px;
			margin: 0 auto;
		}
		.wrapper{
			width: 960px;
			margin: 30px auto;
			border: 1px solid #eee;
			background: #fff;
			height: 550px;
			border-radius: 3px;
		}
		.header{}
		.header h1, .header h3{text-align: center; padding: 0px; color:#006}
		.main{

		}
				.header h1{  color:#F00;}
		.main h4{text-align: center;  }
		.main .details-table{
			width: 95%;
			 border: 1px solid black;
			 margin: 0 auto;
			 margin-top: 20px;
			 border-collapse: collapse;
			}
		.main .details-table td, .main .details-table th{
			border: 1px solid black;
		}	
		.main .details-table td{text-align: left; padding: 3px;}
		.footer{}
		table td{}

	</style>
</head>
<body>
	<div class="wrapper">
	  <div class="header">
		<table width="100%" border="0">
			  <tr>
			    <td width="15%" align="left" valign="top"><a href="index.php"><img src="photo/logo.jpg" width="85" height="93"  alt=""/></a></td>
			    <td width="54%" nowrap="nowrap"><h1>CHOWMUHANI GOVT. SA COLLEGE</h1>
                <H3>Chowmuhani, Noakhali</H3></td>
			    <td width="15%" align="right" valign="top"><img src="photo/c_logo.png" width="120" height="89"  alt=""/></td>
		      </tr>
	    </table>
	  </div>
		<div class="main">
		  <p style="max-width: 685px; margin: 0 auto;">Congratulations! We have successfully received your registration. Your Registration ID is  <strong><?php  echo $registant_data['id']; ?></strong>.<br> Please pay the amount <strong>TK. <?php echo round($registant_data['amount']); ?>/-</strong> by mobile banking system- Rocket for collecting you invitation card.<br><br></p>
		  
          <table width="100%" border="0">
            <tr>
              <td width="2%" nowrap>&nbsp;</td>
              <td width="13%" nowrap><strong>Registration ID: </strong></td>
              <td width="65%"><strong>
                <?php  echo $registant_data['id']; ?>
              </strong></td>
              <td width="14%" nowrap><strong>Registration Date: </strong></td>
              <td width="4%" nowrap><strong>
                <?php  echo date('d-m-Y', strtotime($registant_data['date']));; ?>
              </strong></td>
              <td width="2%" nowrap>&nbsp;</td>
            </tr>
          </table>
<table width="100%" class="details-table">
				
	    <tbody>
					<tr>
						<td width="19%" align="left" nowrap>Full Name</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo $registant_data['fullname']; ?>
						</strong></td>
						<td width="20%" rowspan="11" align="center" valign="top"><img src="photo/<?php  echo $registant_data['photo']; ?>" alt="" width="170px" height="170px"></td>
					
					</tr>

					<tr>
						<td width="19%" align="left" nowrap>Full Name in Bengali</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo $registant_data['fullnameinbangla']; ?>
						</strong></td>
						
					
					</tr>

					<tr>
						<td width="19%" align="left" nowrap>Gender</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo strtoupper($registant_data['gender']); ?>
						</strong></td>
						
					</tr>

					<tr>
						<td width="19%" align="left" nowrap>Contact Number</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo $registant_data['contact']; ?>
						</strong></td>
						
					</tr>

					<tr>
						<td width="19%" align="left" nowrap>Email</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  
					   	 if (!empty($registant_data['email'] )) {
					   	 	$registant_data['email']; 
					   	 } else {
					   	 	echo ' - ';
					   	 }
					    ?>
						</strong></td>
						
					</tr>

			  <td width="19%" align="left" nowrap>First Admission</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo $registant_data['batchyear']; ?>
						</strong></td>
						
					</tr>

					

						<td width="19%" align="left" nowrap>Academic</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo $registant_data['academic']; ?>
						</strong></td>
						
					</tr>


					<tr>
						<td width="19%" align="left" nowrap>Registraion Type</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo $registant_data['registration_type']; ?>
						</strong></td>
						
					</tr>

					<tr>
						<td width="19%" align="left" nowrap>Number of Family Member</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap>
							<strong>
							<?php
						  		if($registant_data['no_of_family_member'] == null || $registant_data['no_of_family_member'] == 0){
						  			echo 0;
						  		}else{
						  			echo $registant_data['no_of_family_member'];
						  		}
						   ?>
						  	
					      </strong></td>
						
					</tr>


					<tr>
						<td width="19%" align="left" nowrap>Occupation</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo $registant_data['occupation']; ?>
						</strong></td>
					</tr>

					<tr>
						<td width="19%" align="left" nowrap>Total Fee</td>
						<td width="5%" nowrap>:</td>
						<td width="56%" align="left" nowrap><strong>
					    <?php  echo round($registant_data['amount']); ?>
					    /- Taka</strong></td>
					</tr>

					
			</table>
		</div>
		<div class="footer" style="margin-top: 30px;">
			<p style="text-align:center;">বিঃ দ্রঃ Registration ID ব্যবহার করে Rocket এর মাধ্যমে আপনার ফি পরিশোধ করুন । Registration ID ও টাকা পরিশোধ করার পর প্রাপ্ত  Transaction ID ব্যবহার করে Invitation Card সংগ্রহ করুন। Invitation Card ছাড়া কেউ অনুষ্ঠানস্থলে প্রবেশ করতে পারবে না। </p>
			<br>
			<hr>
			<br>
			<p>রেজিট্রেশন ফি পেমেন্ট পদ্ধতিঃ</p>
		</div>
	</div>
</body>
</html>