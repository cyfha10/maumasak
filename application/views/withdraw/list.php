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
            <h1 class="m-0">List Data Withdraw</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Data Withdraw</li>
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
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead style="background-color: #eb6228; color: white">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tgl Transfer</th>
                    <th>Nominal</th>
                    <th>Akun Rekening</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  foreach ($list_withdraw as $withdraw) {?>
                    <tr>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width="15%"><?php echo $withdraw['fullname']; ?></td>
                      <td width="13%"><?php echo $withdraw['transfer_date']; ?></td>
                      <td width="15%"><?php echo 'Rp. '.number_format($withdraw['nominal'],0,',','.'); ?></td>
                      <td width="25%">
                        <?php echo $withdraw['account_number'].'<br>'.$withdraw['account_name'].'<br>'.$withdraw['bank_name']; ?>
                      </td>
                      <td width="15%"><?php echo $withdraw['withdraw_status']; ?></td>
                      <td width="13%">
                        <?php if($withdraw['withdraw_status_id'] == 'WT001'){ ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approved<?php echo $withdraw['withdraw_id']; ?>"><i class="fa fa-check"> </i></button>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejected<?php echo $withdraw['withdraw_id']; ?>"><i class="fa fa-times"> </i></button>
                        <?php } ?>
                        <?php if($withdraw['withdraw_status_id'] == 'WT002'){ ?>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#transfer<?php echo $withdraw['withdraw_id']; ?>"><i class="fa fa-paper-plane"> </i> Transfer</button>
                        <?php } ?>
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
    <div class="modal fade" id="approved<?php echo $withdrawz['withdraw_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
                  <label>Approval Withdraw</label>
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin akan menyetujui?</h5>
          </div>
          <div class="modal-footer">
              <a href="<?php echo base_url('withdraw/approval/approved/'.$withdrawz['customer_id'].'/'.$withdrawz['withdraw_id']) ?>">
                <button type="button" class="btn btn-custom">Ya</button>
              </a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="rejected<?php echo $withdrawz['withdraw_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
                  <label>Approval Withdraw</label>
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin akan menolak?</h5>
          </div>
          <div class="modal-footer">
              <a href="<?php echo base_url('withdraw/approval/rejected/'.$withdrawz['customer_id'].'/'.$withdrawz['withdraw_id']) ?>">
                <button type="button" class="btn btn-custom">Ya</button>
              </a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="transfer<?php echo $withdrawz['withdraw_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
              <label><h4>Transfer Dana</h4></label>
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">Masukkan Tanggal Transfer</h5>
            <form action="<?php echo base_url('withdraw/act_transfer/') ?>" method="post">
              <input type="hidden" name="customer_id" value="<?php echo $withdrawz['customer_id'] ?>">
              <input type="hidden" name="withdraw_id" value="<?php echo $withdrawz['withdraw_id'] ?>">
              <input type="date" name="tgl_transfer" class="form-control">
          </div>
          <div class="modal-footer">
                <button type="submit" class="btn btn-custom">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
          </div>
        </div>
      </div>
    </div>
<?php } ?>