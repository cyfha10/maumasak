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
            <h1 class="m-0">Ubah Tipe Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Ubah Tipe Pembayaran</li>
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
                <h3 class="card-title">Ubah Tipe Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <?php  
                  $id = $this->uri->segment(3);
              ?>
              <!-- form start -->
              <form action="<?php echo base_url('paymentmethod/update/'.$id); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Tipe Pembayaran</label>
                    <input type="text" name="tipe" class="form-control" placeholder="Masukkan Tipe Pembayaran" value="<?php echo $list_type->payment_method_type; ?>" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Deskripsi</label>
                    <input type="text" name="tipe_deskripsi" class="form-control" placeholder="Masukkan Deskripsi" value="<?php echo $list_type->description ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="nama">Sort</label>
                    <input type="text" name="sort" class="form-control" placeholder="Masukkan Urutan" value="<?php echo $list_type->sorting; ?>" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Status</label>
                    <select class="form-control" name="status">
                      <option value="1" <?php if($list_type->is_active == 1) { echo 'selected'; } ?>>Aktif</option>
                      <option value="0" <?php if($list_type->is_active == 0) { echo 'selected'; } ?>>Tidak Aktif</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-custom">Ubah</button>
                  <a href="<?php echo base_url('paymentmethod'); ?>">
                      <button type="button" class="btn btn-danger">Back</button>
                  </a>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>