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
            <h1 class="m-0">Detail Data Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Detail Data Pelanggan</li>
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
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-creator-tab" data-toggle="pill" href="#custom-tabs-two-creator" role="tab" aria-controls="custom-tabs-two-creator" aria-selected="true"><font color="purple">Data Pribadi</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-detail-tab" data-toggle="pill" href="#custom-tabs-two-detail" role="tab" aria-controls="custom-tabs-two-detail" aria-selected="true"><font color="purple">Data Detail</font></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-creator" role="tabpanel" aria-labelledby="custom-tabs-two-creator-tab">
                     <!-- INI DETAIL RESEP -->
                        <div class="card-body">
                          <?php $recipe_id = $row->recipe_id; ?>
                          <?php $customer_id = $row->customer_id; ?>

                          <div class="row">
                            <div class="col-md-6">
                              <!-- textarea -->
                              <?php if (file_exists("https://filestocks.maumasak.id/customer/".$row->customer_id.'/'.$row->profile_image)) { ?>
                                <img src="https://filestocks.maumasak.id/customer/<?php echo $row->customer_id.'/'.$row->profile_image; ?>" width = "90%">
                              <?php } else {?>
                                  <img src="<?php echo base_url('assets/img/no_image.jpg'); ?>" width = "90%">
                              <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label>Nama</label> 
                                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->fullname; ?>" readonly required>
                                <label>Email</label> 
                                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->email; ?>" readonly required>
                                  <label for="nama">Tanggal Lahir</label>
                                  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->birthdate; ?>" readonly required>

                                  <label for="nama">Jenis Kelamin</label>
                                  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->gender; ?>" readonly required>

                                  <label for="nama">Lokasi</label>
                                  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->location; ?>" readonly required>

                                  <label for="nama">Tanggal Register</label>
                                  <input type="text" name="nama" class="form-control" id="nama"  value="<?php echo $row->register_date; ?>" readonly required>

                                  <label for="nama">Device Brand</label>
                                  <input type="text" name="nama" class="form-control" id="nama"  value="<?php echo $row->device_brand; ?>" readonly required>

                                  <label for="nama">Device Model</label>
                                  <input type="text" name="nama" class="form-control" id="nama"  value="<?php echo $row->device_model; ?>" readonly required>

                                  <label for="nama">Device OS</label>
                                  <input type="text" name="nama" class="form-control" id="nama"  value="<?php echo $row->device_os; ?>" readonly required>

                              </div>
                            </div>
                          </div>
                        <!-- /.card-body -->                       
                     <!-- CLOSE DETAIL RESEP -->
                  </div>

                  <div class="tab-pane fade show" id="custom-tabs-two-detail" role="tabpanel" aria-labelledby="custom-tabs-two-detail-tab">
                     <!-- INI DETAIL RESEP -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped" style="overflow: false;">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th>Device Brand</th>
                              <th>Device Model</th>
                              <th>Device OS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; foreach ($row_detail as $customer) {?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $customer['device_brand']; ?></td>
                                <td><?php echo $customer['device_model']; ?></td>
                                <td><?php echo $customer['device_os']; ?></td>
                              </tr>
                            <?php $i++; }?>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->                       
                     <!-- CLOSE DETAIL RESEP -->
                  </div>

                  <a href="<?php echo base_url('admin/listrecipe') ?>">
                        <button type="button" class="btn btn-custom">Kembali</button>
                    </a>
                    
                </div>
                
              </div>

            </div>
            <!-- /.card -->


    </section>
