<?php
	include 'classes/DB.php';
	include 'helper/Helper.php';
	$db = new Database();
	$help = new Helper();
	if (isset($_GET['action']) && isset($_GET['registrationid'])) {
		$registrationid = $help->validAndEscape($_GET['registrationid']);
		$query = "select * from registration join ledger on registration.id = ledger.registant_id  where registration.id='$registrationid'  limit 1";
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
	<title>Invitation Card- CGSA & Registration ID -<?php echo $id; ?></title>
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
		.registration_id{
			border: 2px solid #000;
		    padding: 7px 47px;
		    font-weight: 1014;
		    font-size: 20px;
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
			 margin-top: 75px;
		}

		.header .ex-student{
			 text-align: center; 
			 /*border: 1px solid #000;*/
			 width: 30%;
			 padding: 5px;
			 margin: 0 auto;
			 margin-top: 20px;
		}


		.header .logo{
			float: left;
		}
		.header .logo img{
			width: 60px; height: 60px;
			margin-left: 280px;
		}
		.header .logo-content{
			float: right;
			margin-right: 290px;
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
			min-height: 85px;
			
		}
		.content .id-header .reg-id{
			float: left;
			

		}
		.content .id-header .partipant_photo{
			float: right;
		}

		.content .id-header img{
			margin: 0px;
			width: 120px;
			height: 120px;
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
		.instructions ul{
			list-style: none;
			line-height: 30px;
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
			
			<div class="logo">
				<img src="photo/logo.jpg" alt="">
			</div>
			<div class="logo-content">
				<h3>75 Years Celebration 2018</h3>
				<h4>Chowmuhani Govt. SA College, Noakhali</h4>
			</div>
			<h1>INVITATION CARD</h1>

			<h3 class="ex-student">Ex-Student</h3>
		</div>
		<div class="content">
			<div class="id-header">
				<div class="reg-id">
					<span>Registration ID: <span class="registration_id"><strong><?php echo $registant_data['id']; ?></strong><span></span>
				</div>
				<div class="partipant_photo">
					
					<img src="photo/<?php echo $registant_data['photo']; ?>">
				</div>
			</div>


			<div class="information">
				<h3>Personal Information</h3>
				<hr>
				<p>Participant's Name: <?php echo $registant_data['fullname']; ?></p>
				<hr>
				<p>Number of Participants with Family: <?php echo 1 + $registant_data['no_of_family_member']; ?></p>
				<hr>
				<p>Academic Class: <?php echo $registant_data['academic']; ?></p>
				<hr>
				<p>First Admission Year: <?php echo $registant_data['batchyear']; ?></p>
				<hr>
				<p>Amount Paid: <?php echo $registant_data['amount']; ?></p>
			</div>
		</div>
		<div class="footer">
			<div class="instructions">
				<h3>নির্দেশাবলী</h3>
				<ul>
					<li>১। ইনভাইটেশন কার্ড প্রদর্শন পূর্বক অনুষ্ঠানস্থলে প্রবেশ করতে পারবেন</li>
					<li>২।  অনুষ্ঠানস্থলে প্রবেশের পর আপনার জন্য নির্ধারিত কাউন্টার হতে  সকাল  ৯টা হতে ১১টার মধ্যে ইনভাইটেশন কার্ড প্রদর্শন করে
উপহার সামগ্রী, খাবারের কুপণ ও মূল প্যান্ডেলে প্রবেশের জন্য আইডি কার্ড সংগ্রহ করতে পারবেন।</li>
					<li>৩।  ৭৫ বছর পূর্তি উৎসবে অংশগ্রহণকারী সকলকে সকাল ১১টার মধ্যে সরবরাহকৃত ID কার্ড গলায় ঝুলিয়ে অবশ্যই অনুষ্ঠানের 
মূল প্যান্ডেলে প্রবেশ করার জন্য অনুরোধ করা হলো। এখানে উল্লেখ্য যে, মূল প্যান্ডেলে প্রবেশে নিরাপত্তা তল্লাশী সুষ্ঠুভাবে সম্পাদনের সুবিধার্থে অংশগ্রহণকারী সকলকে সারিবদ্ধ ভাবে প্যান্ডেলে প্রবেশ করার জন্য বিশেষভাবে অনুরোধ করা হলো।</li>
					<li>৪। এই অনুষ্ঠানে কোন ধরনের অস্ত্র বহন করা যাবেনা, ধুপমান সম্পূর্ণ নিষিদ্ধ বিধায় কেউ অনুষ্ঠানস্থলে ধুপমান সামগ্রী নিয়ে প্রবেশ করবেন না।</li>
				</ul>
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