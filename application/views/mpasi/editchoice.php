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
            <h1 class="m-0">Edit Resep Mpasi Pilihan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Resep Mpasi Pilihan</li>
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
                <h3 class="card-title">Edit Resep Mpasi Pilihan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php $mpasi_id = $this->uri->segment(3); ?>
              <?php $choice_id = $this->uri->segment(4); ?>
              <form action="<?php echo base_url('mpasi/update_choice/'.$mpasi_id.'/'.$choice_id); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="sorting">Nama Resep Mpasi</label>
                    <input type="text" name="mpasi_id" class="form-control" id="mpasi_id" value="<?php echo $row_recipes->title; ?>" onkeypress="return hanyaAngka(event)" readonly> 
                    <a href="<?php echo base_url('mpasi/choose_mpasi/'.$mpasi_id.'/'.$choice_id) ?>">
                        <button type="button" class="btn btn-custom">Ganti</button>
                    </a>
                  </div>

                  <div class="form-group">
                    <label for="sorting">Sorting</label>
                    <input type="number" name="sorting" class="form-control" id="sorting" placeholder="Masukkan Sorting" value="<?php echo $row_rekomen->sorting ?>" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="sorting">Sale</label><br>
                    <input type="radio" name="sale" <?php if($row_rekomen->is_commerce == 1){ echo "checked"; } else { echo ""; } ?>> Sale 
                    <input type="radio" name="sale" <?php if($row_rekomen->is_commerce == 0){ echo "checked"; } else { echo ""; } ?>> Not Sale
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="<?php echo base_url('mpasi/mpasichoice') ?>">
                      <button type="button" class="btn btn-danger">Kembali</button>
                  </a>
                  <button type="submit" class="btn btn-success">Submit</button>
                  
                </div>
              </form>
            </div>
            <!-- /.card -->

    </section>

    <script>
      function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

          return false;
        return true;
      }

    </script>