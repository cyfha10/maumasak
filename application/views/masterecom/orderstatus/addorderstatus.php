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
            <h1 class="m-0">Tambah Order Status</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Tambah Order Status</li>
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
                <h3 class="card-title">Tambah Data Order Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('masterecom/act_addorderstatus/'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Order Status ID</label>
                    <input type="text" name="order_status_id" class="form-control" placeholder="Masukkan Order Status ID" required>
                  </div>

                  <div class="form-group">
                    <label for="nama">Order Status</label>
                    <input type="text" name="order_status" class="form-control" placeholder="Masukkan Order Status" required>
                  </div>

                  <div class="form-group">
                    <label for="nama">Order Status Seller</label>
                    <input type="text" name="orderstatus_seller" class="form-control" placeholder="Masukkan Order Status Seller">
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Status Alias Buyer</label>
                    <input type="text" name="statusalias_buyer" class="form-control" placeholder="Masukkan Status Alias Buyer" required>
                  </div>

                  <div class="form-group">
                    <label for="nama">Status Alias Seller</label>
                    <input type="text" name="statusalias_seller" class="form-control" placeholder="Masukkan Status Alias Seller">
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Notes</label>
                    <input type="text" name="notes" class="form-control" placeholder="Masukkan Catatan Tambahan" required>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-custom">Submit</button>
                  <a href="<?php echo base_url('paymentmethod'); ?>">
                      <button type="button" class="btn btn-danger">Back</button>
                  </a>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>