<style type="text/css">
  .btn-custom { 
    color: #ffffff; 
    background-color: #eb6228; 
    border-color: #ea581b; 
  } 
   
  .btn-custom:hover, 
  .btn-custom:focus, 
  .btn-custom:active, 
  .btn-custom.active, 
  .open .dropdown-toggle.btn-custom { 
    color: #ffffff; 
    background-color: #eb6228; 
    border-color: #E51DF0; 
  } 
   
  .btn-custom:active, 
  .btn-custom.active, 
  .open .dropdown-toggle.btn-custom { 
    background-image: none; 
  } 
   
  .btn-custom.disabled, 
  .btn-custom[disabled], 
  fieldset[disabled] .btn-custom, 
  .btn-custom.disabled:hover, 
  .btn-custom[disabled]:hover, 
  fieldset[disabled] .btn-custom:hover, 
  .btn-custom.disabled:focus, 
  .btn-custom[disabled]:focus, 
  fieldset[disabled] .btn-custom:focus, 
  .btn-custom.disabled:active, 
  .btn-custom[disabled]:active, 
  fieldset[disabled] .btn-custom:active, 
  .btn-custom.disabled.active, 
  .btn-custom[disabled].active, 
  fieldset[disabled] .btn-custom.active { 
    background-color: #BD1B77; 
    border-color: #E51DF0; 
  } 
   
  .btn-custom .badge { 
    color: #BD1B77; 
    background-color: #ffffff; 
  }
</style>
              <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List data Cuisine</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Data Cuisine</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="<?php echo base_url('admin/addcuisine'); ?>"> 
                  <button class="btn btn-custom">Tambah Data</button>
                </a>
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Cuisine</th>
                    <th>Image MauMasak</th>
                    <th>Image MauMakan</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  foreach ($list_cuisine as $cuisine) {?>
                    <tr>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width="15%"><?php echo $cuisine['cuisine_name']; ?></td>
                      <td>
                        <img src="http://filestocks.maumasak.id/cuisine/<?php echo $cuisine['cuisine_image']; ?>" width = "50%"><br>
                        <button type="button" class="btn-sm btn btn-custom" data-toggle="modal" data-target="#edit1<?php echo $cuisine['cuisine_id']; ?>"><i class="fa fa-edit"> </i></button>
                      </td>
                      <td>
                        <img src="http://filestocks.maumasak.id/cuisine/<?php echo $cuisine['cuisine_image_2']; ?>" width = "50%"><br>
                        <button type="button" class="btn-sm btn btn-custom" data-toggle="modal" data-target="#edit2<?php echo $cuisine['cuisine_id']; ?>"><i class="fa fa-edit"> </i></button>
                      </td>
                      <td><?php echo $cuisine['description']; ?></td>
                      <td><?php if($cuisine['is_active'] == 1) { echo 'Aktif'; } else { echo 'Tidak Aktif'; } ?></td>
                      <td width="10%">
                        <a href="<?php echo base_url('admin/editcuisine/'.$cuisine['cuisine_id']); ?>">
                          <button class="btn btn-custom"><i class="fa fa-edit"></i></button>
                        </a>
                          &nbsp;&nbsp;
                        <!-- <a href="<?php echo base_url('admin/hapuscuisine/'.$cuisine['cuisine_id']); ?>">
                          <button class="btn btn-custom"><i class="fa fa-window-close"></i></button>
                        </a> -->
                    </tr>
                  <?php $i++; }?>
                  </tfoot>
                </table>
                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
  $i = 1;
  foreach ($list_cuisine as $cuisines) {?>
    <div class="modal fade" id="edit1<?php echo $cuisines['cuisine_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
              <label>Edit Image 1 Upload</label>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('admin/updatecuisine1/'.$cuisines['cuisine_id']) ?>" method="post" enctype="multipart/form-data">
              <input type="file" name="upload">
              <br><br>
              <input type="submit" class="btn btn-custom" name=""> 
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </form>
          </div>
          <div class="modal-footer">
              
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="edit2<?php echo $cuisines['cuisine_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
              <label>Edit Image 2 Upload</label>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('admin/updatecuisine2/'.$cuisines['cuisine_id']) ?>" method="post" enctype="multipart/form-data">
              <input type="file" name="upload">
              <br><br>
              <input type="submit" class="btn btn-custom" name=""> 
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </form>
          </div>
          <div class="modal-footer">
              
          </div>
        </div>
      </div>
    </div>
<?php } ?>