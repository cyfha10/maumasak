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
            <h1 class="m-0">Edit Data Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Artikel</li>
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
                <h3 class="card-title">Edit Data Artikel</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <?php $article_id = $this->uri->segment(3); ?>
              <?php $customer_id = $this->uri->segment(4); ?>
              <form action="<?php echo base_url('admin/updatearticle/'.$article_id.'/'.$customer_id); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="emailaddress">Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control" id="emailaddress" placeholder="Masukkan Nama Role" value="<?php echo $customer->fullname ?>" readonly>
                    <a href="<?php echo base_url('admin/choosecustomers/') ?>">
                        <button type="button" class="btn btn-custom">Ganti</button>
                    </a>
                    <input type="hidden" name="customer_id" value="<?php echo $customer->customer_id ?>">
                  </div>

                  <div class="form-group">
                    <label for="emailaddress">Nama Artikel</label>
                    <input type="text" name="article_name" class="form-control" id="emailaddress" placeholder="Masukkan Nama Role" value="<?php echo $row->title ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="files">Cover Article</label><br>
                    <img src="https://filestocks.maumasak.id/articles/<?php echo $row->customer_id.'/'.$row->article_image; ?>" width = "10%">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="upload" class="form-control" id="files">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">Deskripsi</label>
                    <textarea id="editor2" name="isian"><?php echo $row->content; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="nama">Status</label>
                    <select class="form-control" name="status">
                      <option value="1" <?php if($row->is_active == 1) { echo 'selected'; } ?>>Aktif</option>
                      <option value="0" <?php if($row->is_active == 0) { echo 'selected'; } ?>>Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-custom">Ubah</button>
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