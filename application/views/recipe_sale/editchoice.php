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
            <h1 class="m-0">Edit Resep Jual Pilihan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Resep Jual Pilihan</li>
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
                <h3 class="card-title">Edit Resep Jual Pilihan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php $recipe_id = $this->uri->segment(3); ?>
              <?php $choice_id = $this->uri->segment(4); ?>
              <form action="<?php echo base_url('recipe_sale/update_choice/'.$recipe_id.'/'.$choice_id); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="sorting">Nama Resep</label>
                    <input type="text" name="recipe_id" class="form-control" id="recipe_id" value="<?php echo $row_recipes->title; ?>" onkeypress="return hanyaAngka(event)" readonly> 
                    <a href="<?php echo base_url('recipe_sale/choose_recipe/'.$recipe_id.'/'.$choice_id) ?>">
                        <button type="button" class="btn btn-custom">Ganti</button>
                    </a>
                  </div>

                  <div class="form-group">
                    <label for="sorting">Sorting</label>
                    <input type="number" name="sorting" class="form-control" id="sorting" placeholder="Masukkan Sorting" value="<?php echo $row_rekomen->sorting ?>" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="<?php echo base_url('recipe_sale/reciperecomen') ?>">
                      <button type="button" class="btn btn-danger">Kembali</button>
                  </a>
                  <button type="submit" class="btn btn-custom">Submit</button>
                  
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