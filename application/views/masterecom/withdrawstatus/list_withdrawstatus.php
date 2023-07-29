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
            <h1 class="m-0">List Data Withdraw Status</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Data Withdraw Status</li>
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
                <!-- <a href="<?php echo base_url('masterecom/addwithdrawstatus'); ?>"> 
                  <button class="btn btn-custom">Tambah Data</button>
                </a> -->
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead style="background-color: #eb6228; color: white;">
                  <tr>
                    <th>No</th>
                    <th>Withdraw ID</th>
                    <th>Withdraw Status</th>
                    <th>Remark</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  foreach ($list_withdraw as $withdraw) {?>
                    <tr>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width="30%"><?php echo $withdraw['withdraw_status_id']; ?></td>
                      <td width="30%"><?php echo $withdraw['withdraw_status']; ?></td>
                      <td width="25%"><?php echo $withdraw['remark']; ?></td>
                      <td width="15%">
                        <a href="<?php echo base_url('masterecom/editwithdrawstatus/'.$withdraw['withdraw_status_id']); ?>">
                          <button class="btn btn-custom"><i class="fa fa-edit"></i></button>
                        </a>
                          <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $withdraw['withdraw_status_id']; ?>"><i class="fa fa-trash"> </i></button> -->
                      </td>                       
                    </tr>
                  <?php $i++; } ?>
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
  foreach ($list_withdraw as $withdrawz) {?>
    <div class="modal fade" id="delete<?php echo $withdrawz['withdraw_status_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
              <label>Hapus Text Suggestion</label>
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin menghapus data ini?</h5>
          </div>
          <div class="modal-footer">
              <a href="<?php echo base_url('masterecom/deletewithdrawstatus/'.$withdrawz['withdraw_status_id']) ?>">
                <button type="button" class="btn btn-custom">Ya</button>
              </a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>

<?php } ?>