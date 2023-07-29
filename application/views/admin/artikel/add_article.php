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
            <h1 class="m-0">Tambah Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Add Artikel</li>
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
                <h3 class="card-title">Tambah Artikel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('admin/actarticle/'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Customer</label>
                    <input type="text" name="customer" class="form-control" id="nama" value="<?php echo $customer->fullname; ?>" readonly>
                      <a href="<?php echo base_url('admin/choosecustomer/') ?>">
                        <button type="button" class="btn btn-custom">Ganti</button>
                      </a>
                    <input type="hidden" name="customer_id" value="<?php echo $customer->customer_id; ?>">
                  </div>

                  <div class="form-group">
                    <label for="nama">Judul</label>
                    <input type="text" name="judul" class="form-control" id="nama" placeholder="Masukkan Judul Artikel" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="files">File Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="upload" class="form-control" id="files">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama">Isi</label>
                    <textarea id="editor2" name="isian"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="nama">Status</label>
                    <select class="form-control" name="status">
                      <option value="1" selected>Aktif</option>
                      <option value="0">Tidak Aktif</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-custom">Submit</button>
                  <a href="<?php echo base_url('admin/listarticle'); ?>">
                      <button type="button" class="btn btn-danger">Back</button>
                  </a>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>
 
 <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace('editor2', {
      height: 280,
    });
    </script>