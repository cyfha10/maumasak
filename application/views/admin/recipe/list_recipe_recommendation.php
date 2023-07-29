<style type="text/css">
  .btn-custom { 
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
            <h1 class="m-0">List data Rekomendasi Resep</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Data Rekomendasi Resep</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="<?php echo base_url('admin/chooserecipe'); ?>"> 
                  <button class="btn btn-custom">Tambah Data</button>
                </a>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Nama Resep</th>
                    <th>Pembuat</th>
                    <th>Sorting</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $i = 1;
                    foreach ($list_recipe as $rekomen) {?>
                    <tr>
                      <?php 
                        $getdata_status = $this->Master_model->get_recipe_one($rekomen['recipe_status_id']);
                        $recipe_status = $getdata_status->recipe_status;

                        $getdata_customer = $this->Master_model->get_customer_one($rekomen['customer_id']);
                        $fullname = $getdata_customer->fullname;
                      ?>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width = "20%"><img src="https://filestocks.maumasak.id/recipes/<?php echo $rekomen['customer_id'].'/'.$rekomen['cover_image']; ?>" width = "100%"></td>
                      <td width="30%"><?php echo $rekomen['title']; ?></td>
                      <td width="30%"><?php echo $fullname; ?></td>
                      <td><?php echo $rekomen['sorting']; ?></td>
                      <td width="20%">
                        <a href="<?php echo base_url('admin/editrekomen/'.$rekomen['recipe_id'].'/'.$rekomen['recipe_recommendation_id']); ?>">
                          <button class="btn btn-custom"><i class="fa fa-edit"></i></button>
                        </a>
                        <a href="<?php echo base_url('admin/deleterekomen/'.$rekomen['recipe_recommendation_id']); ?>">
                          <button class="btn btn-custom"><i class="fa fa-trash"></i></button>
                        </a>
                      </td>
                    </tr>
                  <?php $i++; } ?>
                  </tfoot>
                </table>
                

              </div>
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          <!-- </div> -->
          <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->