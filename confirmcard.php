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
			background: #156C7F;
			max-width: 970px;
			margin: 0 auto;
		}
		.wrapper{
			width: 960px;
			margin: 30px auto;
			border: 1px solid black;
			background: #fff;
			height: 550px;
			border-radius: 2px;
		}
		.header{}
		.header h1, .header h3{text-align: center; padding: 10px;}
		.main{

		}
		.main h4{text-align: center; margin-top: 20px;}
		.main .details-table{
			width: 95%;
			 border: 1px solid black;
			 margin: 0 auto;
			 margin-top: 30px;
			 border-collapse: collapse;
			}
		.main .details-table td, .main .details-table th{
			border: 1px solid black;
		}	
		.main .details-table td{text-align: center; padding: 3px;}
		.footer{}
		table td{}

	</style>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<h1>CHOWMUHANI GOVT. SA COLLEGE</h1>
			<H3>Chowmuhani, Noakhali</H3>
		</div>
		<div class="main">
			<h4>Congratulations! We have successfully received your registration.</h4>
			<table class="details-table">
				
				
				<tbody>
					<tr>
						<td width="30%">Registration ID</td>
						<td width="5%">:</td>
						<td width="40%"><?php  echo $registant_data['id']; ?></td>
						<td></td>
					</tr>

					<tr>
						<td width="30%">Full Name</td>
						<td width="5%">:</td>
						<td width="40%"><?php  echo $registant_data['fullname']; ?></td>
						<td rowspan="12" width="25%"><img src="photo/<?php  echo $registant_data['photo']; ?>" alt="" width="170px" height="170px"></td>
					
					</tr>

					<tr>
						<td width="30%">Full Name in Bengali</td>
						<td width="5%">:</td>
						<td width="40%"><?php  echo $registant_data['fullnameinbangla']; ?></td>
						
					
					</tr>

					<tr>
						<td width="30%">Gender</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo strtoupper($registant_data['gender']); ?></td>
						
					</tr>

					<tr>
						<td width="30%">Contact Number</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo $registant_data['contact']; ?></td>
						
					</tr>

					<tr>
						<td width="30%">Email</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo $registant_data['email']; ?></td>
						
					</tr>

						<td width="30%">First Admission</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo $registant_data['batchyear']; ?></td>
						
					</tr>

					</tr>

						<td width="30%">Academic</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo $registant_data['academic']; ?></td>
						
					</tr>


					<tr>
						<td width="30%">Registraion Type</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo $registant_data['registration_type']; ?></td>
						
					</tr>

					<tr>
						<td width="30%">Number of Family Member</td>
						<td width="10%">:</td>
						<td width="35%">
							<?php
						  		if($registant_data['no_of_family_member'] == null || $registant_data['no_of_family_member'] == 0){
						  			echo 0;
						  		}else{
						  			echo $registant_data['no_of_family_member'];
						  		}
						   ?>
						  	
						  </td>
						
					</tr>


					<tr>
						<td width="30%">Occupation</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo $registant_data['occupation']; ?></td>
					</tr>

					<tr>
						<td width="30%">Total Fee</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo round($registant_data['amount']); ?>tk</td>
					</tr>

					

					<tr>
						<td width="30%">Registration Date</td>
						<td width="10%">:</td>
						<td width="35%"><?php  echo date('d-m-Y', strtotime($registant_data['date']));; ?></td>
					</tr>

				</tbody>


			</table>
		</div>
		<div class="footer" style="margin-top: 30px; margin-left: 4px;">
			<p style="text-align:center;">special note: This card must be saved and showed for collecting ID card,souvenir and gift.</p>
		</div>
	</div>
</body>
</html>