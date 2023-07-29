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
            <h1 class="m-0">Tambah Data Bank</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data Bank</li>
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
                <h3 class="card-title">Tambah Data Data Bank</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('masterecom/act_addbank/'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Kode Bank</label>
                    <input type="text" name="bank_code" class="form-control" placeholder="Masukkan Kode Bank" required>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Bank</label>
                    <input type="text" name="bank_name" class="form-control" placeholder="Masukkan Nama Bank" required>
                  </div>

                  <div class="form-group">
                    <label for="nama">Tipe Transfer LLG</label><br>
                    <input type="radio" name="is_llg" value="Y"> Ya <input type="radio" name="is_llg" value="N"> Tidak
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Tipe Transfer RTG</label><br>
                    <input type="radio" name="is_rtg" value="Y"> Ya <input type="radio" name="is_rtg" value="N"> Tidak
                  </div>

                  <div class="form-group">
                    <label for="nama">Tipe Transfer Online</label><br>
                    <input type="radio" name="is_onl" value="Y"> Ya <input type="radio" name="is_onl" value="N"> Tidak
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="<?php echo base_url('masterecom/bank'); ?>">
                      <button type="button" class="btn btn-custom">Back</button>
                  </a>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>