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
            <h1 class="m-0">Ubah Data Bank</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Bank</li>
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
                <h3 class="card-title">Ubah Data Bank</h3>
              </div>
              <!-- /.card-header -->
              <?php  
                  $id = $this->uri->segment(3);
              ?>
              <!-- form start -->
              <form action="<?php echo base_url('masterecom/updatebank/'.$id); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="nama">Kode Bank</label>
                    <input type="text" name="bank_code" class="form-control" placeholder="Masukkan Kode Bank" value="<?php echo $databank->bank_code; ?>" required>
                    <input type="hidden" name="bank_id" value="<?php echo $databank->bank_id; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Bank</label>
                    <input type="text" name="bank_name" class="form-control" placeholder="Masukkan Nama Bank" value="<?php echo $databank->bank_name; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="nama">Tipe Transfer LLG</label><br>
                    <?php $tipe_llg = $databank->is_llg; ?>
                    <input type="radio" name="is_llg" value="Y" <?php  if ($tipe_llg == 'Y') { echo "checked"; } ?> > Ya <input type="radio" name="is_llg" value="N" <?php  if ($tipe_llg == 'N') { echo "checked"; } ?>> Tidak
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Tipe Transfer RTG</label><br>
                    <?php $tipe_rtg = $databank->is_rtg; ?>
                    <input type="radio" name="is_rtg" value="Y" <?php  if ($tipe_rtg == 'Y') { echo "checked"; } ?> > Ya <input type="radio" name="is_rtg" value="N" <?php  if ($tipe_rtg == 'N') { echo "checked"; } ?>> Tidak
                  </div>

                  <div class="form-group">
                    <label for="nama">Tipe Transfer Online</label><br>
                    <?php $tipe_onl = $databank->is_onl; ?>
                    <input type="radio" name="is_onl" value="Y" <?php  if ($tipe_onl == 'Y') { echo "checked"; } ?> > Ya <input type="radio" name="is_onl" value="N" <?php  if ($tipe_onl == 'N') { echo "checked"; } ?> > Tidak
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-custom">Ubah</button>
                  <a href="<?php echo base_url('withdrawstatus'); ?>">
                      <button type="button" class="btn btn-danger">Back</button>
                  </a>
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>