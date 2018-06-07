<?php include 'lib/header.php'; ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add Page</h1>
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
            <form  action="pagelist.php" method="post"  enctype="multipart/form-data">
             <div class="col-md-12">
                <div class="form-group">
                  <label for="">Tiltle</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter Page Title" required="">
              </div>
             </div>
             
             <div class="col-md-12">
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" id="editor" cols="30" rows="40" class="form-control" required="">
                    
                  </textarea>
              </div>
             </div>
             <div class="col-md-12">
                <div class="form-group">
                  <label for="">Photo</label>
                  <input type="file" class="form-control" name="photo" required="">
              </div>
             </div>

              
             <div class="col-md-4">
              <input type="submit" name="addpage" class="btn btn-primary">
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