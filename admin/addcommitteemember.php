<?php include 'lib/header.php'; ?> 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add Committe Member</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-sm-12">
        <div class="box">
          <div class="box-body">
            <form  action="viewcommittee.php" method="post"  enctype="multipart/form-data">
             <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
              </div>
             </div>

             <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control" name="designation" placeholder="Enter Designation" required="">
              </div>
             </div>

              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control" name="address" placeholder="Enter Address">
              </div>
             </div>

              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control" name="contact" placeholder="Enter Contact">
              </div>
             </div>

              <div class="col-md-8">
                <div class="form-group">
                  <input type="file" class="form-control" name="photo" >
              </div>
             </div>
             <div class="col-md-4">
              <input type="submit" name="addmember" class="btn btn-primary">
            </div>
            
            </form>
          </div>
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <!-- footer -->
 <?php include 'lib/footer.php'; ?>