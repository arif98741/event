<?php include 'lib/header.php'; ?> 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Payment Report</h1>
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
            <form action="printfiles/payment/paymentreport.php" method="post">
             <div class="col-md-5">
                <div class="form-group">
                  <input type="date" class="form-control" name="starting">
              </div>
             </div>

             <div class="col-md-5">
                <div class="form-group">
                  <input type="date" class="form-control" name="ending">
              </div>
             </div>
           

              <div class="col-md-2">
                <input type="submit" class="btn btn-primary" name="paymentreportbydate" value="Preview">
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