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
            <h1 class="m-0">Tambah Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Tambah Pelanggan</li>
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
                <h3 class="card-title">Tambah Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('admin/act_customer/'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">

                  <div class="row col-md-12">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user_id" class="form-control" placeholder="Masukkan Username" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" name="fullname_id" class="form-control" placeholder="Masukkan Nama Anda" required>
                      </div>
                    </div>
                  </div>

                  <div class="row col-md-12">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="pass_id" class="form-control" placeholder="Masukkan Password" value="123456" readonly required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Alamat Email</label>
                        <input type="email" name="email_id" class="form-control" placeholder="Masukkan Email Anda" required>
                    </div>
                  </div>

                  <div class="row col-md-12">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="phone_id" class="form-control" placeholder="Masukkan No HP">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bio</label>
                        <input type="text" name="bio" class="form-control" placeholder="Masukkan Username">
                      </div>
                    </div>
                  </div>

                  <div class="row col-md-12">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender"  class="form-control" required>
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Birthdate</label>
                        <input type="date" name="birthdate" class="form-control" placeholder="Masukkan Username">
                      </div>
                    </div>
                  </div>

                  <div class="row col-md-12">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status"  class="form-control" required>
                          <option value="">Pilih Status</option>
                          <option value="1" selected>Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      </div>
                    </div>
                  </div>

                  
                  <div class="card-body">
                    <button type="submit" class="btn btn-custom">Submit</button>
                    <a href="<?php echo base_url('admin/listkategori'); ?>">
                        <button type="button" class="btn btn-danger">Back</button>
                    </a>
                  </div>
                  <div>&nbsp;</div>

                </div>
                <!-- /.card-body -->

                
              </form>
            </div>
            <!-- /.card -->

    </section>