<?php include 'lib/header.php'; ?> 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Batch Wise Registant Report</h1>
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
            <form action="printfiles/student/batchwise.php" method="post">
             
            <div class="col-md-6">
                <div class="form-group">
                  <select name="batch" id="" class="form-control">
                    <option value="">Batch</option>
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
                 <select class="form-control" name="academic" required="">

                      <option value="" disabled="" selected="">Academic</option>
                      <option value="SSC">SSC</option>
                      <option value="HSC">HSC</option>
                      <option value="Honors">Honors</option>
                      <option value="Masters">Masters</option>
                      
                  </select>

                </div>
              </div>

              <div class="col-md-offset-1 col-md-8">
                <input type="submit" class="btn btn-primary" name="bybatch" value="Preview Report">
                
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