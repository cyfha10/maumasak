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
            <h1 class="m-0">List data Trycook Mpasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Data Trycook Mpasi</li>
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
              <div class="col-12 col-sm-12 col-md-12">
              <div class="info-box mb-3" style="overflow: scroll;">
              <div class="card-body">
                  
                <table id="example1" class="table table-bordered table-striped" width="100%">
                  <thead style="background-color: #eb6228; color: white">
                  <tr>
                    <th>No</th>
                    <th>Pembuat</th>
                    <th>Cover Recipe</th>
                    <th>Recipe Name</th>
                    <th>Customer</th>
                    <th>Image Trycook</th>
                    <th>Description</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $i = 1;
                    foreach ($list_trycook as $mpasi) {?>
                    <tr>
                      <td width="2%"><?php echo $i; ?></td>
                      <td><?php echo $mpasi['fullname']; ?></td>
                      <td width="20%">
                        <img src="https://filestocks.maumasak.id/mpasi/<?php echo $mpasi['customer_id'].'/'.$mpasi['cover_image']; ?>" width = "100%">
                      </td>
                      <td><?php echo $mpasi['title']; ?></td>
                      <td><?php echo $mpasi['fullname']; ?></td>
                      <td width="20%">
                        <img src="http://filestocks.maumasak.id/mpasi/trycook/<?php echo $mpasi['customer_id'].'/'.$mpasi['trycook_image']; ?>" width = "100%">
                      </td>
                      <td><?php echo $mpasi['description']; ?></td>
                      <td>
                        <a href="#">
                            <button class="btn btn-custom" data-toggle="modal" data-target="#delModal<?php echo $mpasi['mpasi_trycook_id']; ?>"><i class="fa fa-trash "></i></button>
                          </a>
                      </td>
                    </tr>
                  <?php $i++; } ?>
                  </tfoot>
                </table>
                

              </div>
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          <!-- </div> -->
          <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
$i = 1;
foreach ($list_trycook as $mpasii) { ?>
<!-- Modal -->
  <div class="modal fade" id="delModal<?php echo $mpasii['mpasi_trycook_id']; ?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <label>Konfirmasi Hapus Resep Mpasi</label>
        </div>
        <div class="modal-body">
          Apakah anda yakin untuk menghapus resep ini?
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url('trycook/deltrympasi/'.$mpasii['mpasi_trycook_id']); ?>">
            <button type="button" class="btn btn-custom">Yes</button>
          </a>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

