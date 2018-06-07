<?php include 'lib/header.php'; ?> 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Registant Report</h1>
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
            <form action="printfiles/student/studentreport.php" method="post">
             <div class="col-md-6">
                <div class="form-group">
                  <input type="date" class="form-control" name="starting">
              </div>
             </div>

             <div class="col-md-6">
                <div class="form-group">
                  <input type="date" class="form-control" name="ending">
              </div>
             </div>
            <div class="col-md-6">
                <div class="form-group">
                  <select name="batch" id="" class="form-control">
                    <option value="">HSC Batch Year</option>
                    <?php
                     $year = 2018;
                     while ($year >= 1952) {
                         $year--; ?>
                      <option value="<?php echo $year; ?>"><?php echo $year; ?></option>

                     <?php }
                     ?>
                  </select>

                  
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <select name="gender" id="" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                   
                  </select>

                </div>
              </div>

              <div class="col-md-offset-1 col-md-8">
                <input type="submit" class="btn btn-primary" name="allstudents" value="All Students">
                <input type="submit" class="btn btn-warning"  name="bybatch"  value="Batch Wise">
                <input type="submit" class="btn btn-danger" name="bygender"  value="Gender Wise">
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