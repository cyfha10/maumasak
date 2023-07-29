<style type="text/css">
  .btn-custom { 
    color: #ffffff; 
    background-color: #eb6228; 
    border-color: #ea581b; 
  } 

  .card-header { 
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
            <h1 class="m-0">List data jenis pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Tambah Tipe Pembayaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-custom">
              <div class="card-header">
                <h3 class="card-title">Tipe Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <?php  
                  $id = $this->uri->segment(3);
              ?>
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Tipe Pembayaran</label>
                    <input type="text" name="tipe" class="form-control" placeholder="Masukkan Tipe Pembayaran" value="<?php echo $list_type->payment_method_type; ?>" disabled>
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Deskripsi</label>
                    <input type="text" name="tipe_deskripsi" class="form-control" placeholder="Masukkan Deskripsi" value="<?php echo $list_type->description ?>" disabled>
                  </div>
                  <?php $id = $this->uri->segment(3); ?>
                  <a href="<?php echo base_url('paymentmethod/addmethod/'.$id); ?>"> 
                    <button class="btn btn-custom">Tambah Data</button>
                  </a>

                  <table id="example1" class="table table-bordered table-striped">
                    <thead style="background-color: #eb6228; color: white">
                      <tr>
                        <th>No</th>
                        <th>Metode</th>
                        <th>Icon</th>
                        <th>Instruksi</th>
                        <th>Rekening</th>
                        <th>Biaya Servis</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                  <tbody>
                    <?php 
                    $i = 1;
                    foreach ($list_method as $method) {?>
                      <tr>
                        <td width="2%"><?php echo $i; ?></td>
                        <td width="5%"><?php echo $method['payment_method_name']; ?></td>
                        <td width="5%"><img src="http://filestocks.maumasak.id/payment_method/<?php echo $method['payment_method_icon']; ?>"></td>
                        <td width="20%"><?php echo $method['instruction']; ?></td>
                        <td width="5%"><?php echo $method['account_name'].'<br>'.$method['account_number'].'<br>'.$method['branch']; ?></td>
                        <td width="5%"><?php if($method['service_fee'] > 0){ echo $method['service_fee'].' '.$method['service_fee_type']; } else { echo "-"; } ?></td>
                        <td width="10%">
                          
                          <a href="<?php echo base_url('paymentmethod/edit_pay/'.$method['payment_method_id']) ?>">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#delete<?php echo $method['payment_method_id']; ?>"><i class="fa fa-edit"> </i></button>
                          </a>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $method['payment_method_id']; ?>"><i class="fa fa-trash"> </i></button>
                        </td>
                      </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
                </div>
                <!-- /.card-body -->

                

                <div class="card-footer">
                  <a href="<?php echo base_url('paymentmethod'); ?>">
                      <button type="button" class="btn btn-danger">Back</button>
                  </a>
                </div>
            </div>
            <!-- /.card -->

    </section>

<?php 
  $i = 1;
  foreach ($list_method as $methods) {?>
    <div class="modal fade" id="delete<?php echo $methods['payment_method_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
              <label>Hapus Payment Method</label>
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin menghapus data ini?</h5>
          </div>
          <div class="modal-footer">
              <a href="<?php echo base_url('paymentmethod/deletepay/'.$id.'/'.$methods['payment_method_id']) ?>">
                <button type="button" class="btn btn-custom">Ya</button>
              </a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>

<?php } ?>