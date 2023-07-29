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
            <h1 class="m-0">Ubah Data Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Pelanggan</li>
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
            <h3 class="card-title">Ubah Data Pelanggan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <?php $customer_id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('admin/updatecustomer_anonim/'.$customer_id); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="card-body">

              <div class="row col-md-12">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Photo</label><br>
                    <img src="https://filestocks.maumasak.id/customer/<?php echo $customer_id.'/'.$editcustomer->profile_image; ?>" width = "50%">
                    <br>
                        <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#editphoto"><i class="fa fa-edit"></i>Edit Photo</button>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    
                </div>
              </div>

              <div class="row col-md-12">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user_id" class="form-control" placeholder="Masukkan Username" autocomplete="off" value="<?php echo $editcustomer->username; ?>" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="fullname_id" class="form-control" placeholder="Masukkan Nama Anda" value="<?php echo $editcustomer->fullname; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row col-md-12">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass_id" class="form-control" placeholder="Masukkan Password" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email" name="email_id" class="form-control" placeholder="Masukkan Email Anda" value="<?php echo $editcustomer->email; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row col-md-12">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="phone_id" class="form-control" placeholder="Masukkan No HP" value="<?php echo $editcustomer->phone; ?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Bio</label>
                    <input type="text" name="bio" class="form-control" placeholder="Masukkan Bio" value="<?php echo $editcustomer->bio; ?>">
                  </div>
                </div>
              </div>

              <div class="row col-md-12">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Gender</label>
                    <select name="gender"  class="form-control" required>
                      <option value="" <?php if($editcustomer->gender == '') { echo 'selected'; } ?>>Pilih Jenis Kelamin</option>
                      <option value="L" <?php if($editcustomer->gender == 'L') { echo 'selected'; } ?>>Laki - Laki</option>
                      <option value="P" <?php if($editcustomer->gender == 'P') { echo 'selected'; } ?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" name="birthdate" class="form-control" value="<?php echo $editcustomer->birthdate; ?>">
                  </div>
                </div>
              </div>

              <div class="row col-md-12">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status"  class="form-control" required>
                      <option value="">Pilih Status</option>
                      <option value="1" <?php if($editcustomer->is_active == 1) { echo 'selected'; } ?>>Aktif</option>
                      <option value="0" <?php if($editcustomer->is_active == 0) { echo 'selected'; } ?>>Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  </div>
                </div>
              </div>

              
              <div class="card-body">
                <button type="submit" class="btn btn-custom">Ubah</button>
                <a href="<?php echo base_url('admin/listcustomeranonim'); ?>">
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

<!-- Modal -->
  <div class="modal fade" id="editphoto" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <label>Edit Photo</label>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/updatephoto/'.$customer_id) ?>" method="POST" enctype="multipart/form-data">
          <img src="https://filestocks.maumasak.id/customer/<?php echo $customer_id.'/'.$editcustomer->profile_image; ?>" width = "50%">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="photo" class="form-control" id="exampleInputFile" required>
              <input type="hidden" name="customer_id" value="<?php echo $editcustomer->customer_id; ?>">
              <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
            </div>
            <!-- <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div> -->
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-custom">Ubah Photo</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  
</div>