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
            <h1 class="m-0">Edit Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Admin</li>
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
                <h3 class="card-title">Edit Admin</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <?php $id = $this->uri->segment(3); ?>
              <form action="<?php echo base_url('admin/updateadmin/'.$id); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="emailaddress">Email address</label>
                    <input type="email" name="email" class="form-control" id="emailaddress" placeholder="Masukkan Email" value="<?php echo $row->email ?>" required>
                    <input type="hidden" name="admin_id" class="form-control" value="<?php echo $row->admin_id ?>" >
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Anda" value="<?php echo $row->admin_name ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="password1">Password Lama</label>
                    <input type="password" name="pass_old" class="form-control" id="password1" placeholder="Masukkan Password" required>
                  </div>
                  <div class="form-group">
                    <label for="password1">Password Baru</label>
                    <input type="password" name="pass_id" class="form-control" id="password1" placeholder="Masukkan Password" required>
                  </div>
                  <div class="form-group">
                    <label for="password2">Ulang Password Baru</label>
                    <input type="password" name="repass_id" class="form-control" id="password2" placeholder="Ulangi Password Anda" required>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-custom">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>