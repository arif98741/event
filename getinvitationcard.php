<?php
	include 'classes/DB.php';
	include 'helper/Helper.php';
	$db = new Database();
	$help = new Helper();
	if (isset($_GET['action']) && isset($_GET['registrationid'])) {
		$registrationid = $help->validAndEscape($_GET['registrationid']);
		$query = "select * from registration  where id='$registrationid'  limit 1";
		$stmt = $db->link->query($query) or die($db->link->error)." error at line number ".__LINE__;
		if ($stmt) {
			if ($stmt->num_rows > 0) {
				$registant_data = $stmt->fetch_assoc();
			}
			
		} 
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmation Card- CGSA & Registration ID -<?php echo $id; ?></title>
	<style>
		a{
			text-decoration: none;
		    color: #edfbe5;
		    border: 1px solid #000;
		    padding: 4px;
		    background: #9a6464;
		    width: 45px;
		    height: 20px;
		    border-radius: 3px;
		    display: block;
		    text-align: center;
		}
		body{
			background: #7c908d;
		}
		.wrapper{
			width: 960px;
			margin: 0px auto;
			min-height: 760px;
			background: #fff;
			border: 1px solid #000;
			padding: 5px;
		}

		.header{
			padding : 10px;
		}
		.header h1{
			 text-align: center; 
			 border: 1px solid #000;
			 width: 40%;
			 padding: 6px;
			 margin: 0 auto;
			 margin-bottom: 20px;
		}

		.header .ex-student{
			 text-align: center; 
			 border: 1px solid #000;
			 width: 30%;
			 padding: 5px;
			 margin: 0 auto;
			 margin-top: 100px;
		}


		.header .logo{
			float: left;
		}
		.header .logo img{
			width: 60px; height: 60px;
			margin-left: 330px;
		}
		.header .logo-content{
			float: right;
			margin-right: 320px;
		}
		.header .logo-content h3, .header .logo-content h4{
			margin: 0px;
		}

		.content{
			margin-top: 20px;
		}
		.content .id-header{
			
			padding: 25px;
			width: 90%;
			margin: 0 auto;
			border: 1px solid #000;
		}
		.content .id-header .reg-id{
			float: left;

		}
		.content .id-header .date{
			float: right;
		}

		.content .id-header h4{
			margin: 0px;
		}

		.information{
			border: 1px solid #000;
		    width: 95%;
		    margin: 0 auto;
		    margin-top: 20px

		}
		.information h3{
			padding: 4px;
		}
		.information p{
			padding: 1px;
   			margin-left: 10px;
   			max-width: 300px;
   			margin: 5px;
		}
		.instructions{
		
		}
		.instructions h3{
			padding: 5px;
		    text-align: center;
		    /* text-decoration: underline; */
		    /* display: inline; */
		    width: 100%;
		    border-bottom: 1px solid black;
		    width: 26%;
		    margin: 0px auto;
		    margin-top: 40px;
		}
		.instructions ol{
			
		}
		.instructions ol li{
			line-height: 25px;
		}
	</style>
</head>
<body>
	<a href="#" onclick="printpage()"  id="printbtn" >Print</a>

	<div class="wrapper">
		<div class="header">
			<h1>INVITATION CARD</h1>
			<div class="logo">
				<img src="photo/logo.jpg" alt="">
			</div>
			<div class="logo-content">
				<h3>75 Years Celebration 2018</h3>
				<h4>Chowmuhani Govt. College</h4>
			</div>

			<h3 class="ex-student">Ex-Student</h3>
		</div>
		<div class="content">
			<div class="id-header">
				<div class="reg-id">
					<h4>Registration ID: <?php echo $registant_data['id']; ?></h4>
				</div>
				<div class="date">
					<h4>Date: 12-03-1997</h4>
				</div>
			</div>


			<div class="information">
				<h3>Personal Information</h3>
				<hr>
				<p>Name: <?php echo $registant_data['fullname']; ?></p>
				<hr>
				<p>Father's Name: <?php echo $registant_data['father']; ?></p>
				<hr>
				<p>Academic Degree: <?php echo $registant_data['academic']; ?></p>
				<hr>
				<p>First Admission Year: <?php echo $registant_data['batchyear']; ?></p>
				<hr>
				<p>Mobile Number: <?php echo $registant_data['contact']; ?></p>
			</div>
		</div>
		<div class="footer">
			<div class="instructions">
				<h3>Instructions</h3>
				<ol>
					<li>Something</li>
					<li>Traffic Control System Maintances</li>
					<li>Better Idea and Study</li>
					<li>Better Idea and Study</li>
				</ol>
			</div>
		</div>
	</div>
	<script>
		function printpage()
		{
			document.getElementById("backbtn").style.display = "none";
			document.getElementById("printbtn").style.display = "none";
			window.print();
			document.getElementById("backbtn").style.display = "block";
			document.getElementById("printbtn").style.display = "block";
		}
		
	</script>

</body>
</html>