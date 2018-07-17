<?php include 'lib/header.php'; ?> 
<?php 
   if(isset($_GET['action'] ) && $_GET['action'] ='delete'){ //delete registant
    $id = $help->validAndEscape($_GET['id']); 
    //$stmt = $db->link->query("delete from ledger where registant_id='$id'");
    $stmt = $db->link->query("delete from registration where id='$id'");
    if ($stmt) {
      header('Location: index.php');
    }

  }

  if(isset($_GET['duty'] ) && $_GET['duty'] == 'view'){
    $id = $help->validAndEscape($_GET['id']);
    $stmt = $db->link->query("select * from registration join ledger on registration.id = ledger.registant_id where registration.id='$id'");
    if ($stmt) {
      $registant_data = $stmt->fetch_assoc();
    }

  }
  if(isset($_GET['perform'] ) && isset($_GET['serial'])){
    $id = $help->validAndEscape($_GET['serial']);
    $stmt = $db->link->query("UPDATE ledger SET status = 'active' WHERE registant_id = '$id'");
    $stmt = $db->link->query("update registration set status='approved' where id='$id'");
    if ($stmt) {
      header('Location: viewregistant.php?duty=view&id='.$id);
    }

  }
 

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View Registant </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      

      <!-- row -->
          <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
            <div class="inner">
              <img src="../photo/<?php echo $registant_data['photo']; ?>" class="thumbnail" alt="" width="200px" height="200px">
              <p><?php echo $registant_data['fullname'];?></p>
            </div>
            
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-9 col-xs-6">
          <!-- small box -->
         
            <div class="">
              <h3>Registant Details</h3>
              <hr>
              <h4><strong>Name:</strong> <?php echo $registant_data['fullname'];?></h4>
              <h4><strong>Fullname in Bengali:</strong> <?php echo $registant_data['fullnameinbangla'];?></h4>
              
              <h4><strong>Batch:</strong> <?php echo $registant_data['batchyear'];?></h4>
              <h4><strong>Gender:</strong> <?php echo strtoupper($registant_data['gender']);?></h4>
              <h4><strong>Contact:</strong> <?php echo $registant_data['contact'];?></h4>
              <h4><strong>Email:</strong> <?php echo $registant_data['email'];?></h4>
              <h4><strong>Address:</strong> <?php echo $registant_data['address'];?></h4>
              <h4><strong>Occcupation:</strong> <?php echo $registant_data['occupation'];?></h4>
              <h4><strong>Father:</strong> <?php echo $registant_data['father'];?></h4>
              <h4><strong>Registration Type:</strong> <?php echo $registant_data['registration_type'];?></h4>
              <h4><strong>Registration Fee:</strong>
               <?php
                if ($registant_data['registration_type'] === 'Ex Student' ) {
                      echo "700";
                }else if($registant_data['registration_type'] === 'Ex Student(Abroad)' ){
                       echo "800";
                }else if($registant_data['registration_type'] === 'Current Student' ){
                       echo "300";
                }
               ?>
             </h4>

            
            <h4><strong>Number of Family Member:</strong> <?php echo $registant_data['no_of_family_member'];?></h4>
            <h4><strong>Paid Amount:</strong> <?php echo $registant_data['amount'];?></h4>
            <h4><strong>Transaction ID:</strong> <?php echo $registant_data['transaction_id'];?></h4>
            
            </div>
            
            <div class="inner">
              <?php  if ($registant_data['status'] == 'pending'): ?>
                  <a href="#" class="btn btn-warning" disabled>Pending</a>
                  <a href="?perform=activate&serial=<?php  echo $registant_data['id']; ?>" class="btn btn-warning">Activate</a>
                  

               <?php elseif($registant_data['status'] == 'approved'): ?>
                 <a href="#" class="btn btn-warning" disabled>Approved</a>
                  
               <?php endif; ?> 
               

            </div>
           
          </div>
        
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <!-- footer -->
 <?php include 'lib/footer.php'; ?>