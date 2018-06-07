<?php include 'lib/header.php'; ?>
<?php 

  if(isset($_GET['duty'] ) && $_GET['duty'] ='edit'){
    $id = $help->validAndEscape($_GET['id']);
    $stmt = $db->link->query("SELECT * FROM `news` where id='$id'");
    if ($stmt) {
      $news_data = $stmt->fetch_assoc();
    }
  }

?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit News</h1>
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
            <form  action="newslist.php" method="post"  enctype="multipart/form-data">
             <div class="col-md-12">
                <div class="form-group">
                  <label for="">Tiltle</label>
                  <input type="text" class="form-control" value="<?php echo $news_data['title']; ?>" name="title" placeholder="Enter Title" required="">
                  <input type="hidden" value="<?php echo $news_data['id']; ?>" name="newsid" >
              </div>
             </div>
             
             <div class="col-md-12">
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" id="editor" cols="30" rows="10" class="form-control" required="">
                   <?php echo html_entity_decode($news_data['description']) ?>
                  </textarea>
              </div>
             </div>


             <div class="col-md-12">
                <div class="form-group">
                  <label for="">Photo</label>
                  <input type="file" class="form-control" name="photo">
              </div>
             </div>

              
             <div class="col-md-4">
              <input type="submit" name="updatenews" class="btn btn-primary">
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