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
            <h1 class="m-0">Pilih data Resep</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pilih Data Resep</li>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Nama Resep</th>
                    <th>Pembuat</th>
                    <th>Tgl Dibuat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $i = 1;
                    foreach ($list_recipe as $recipe) {?>
                    <tr>
                      <?php 
                        $getdata_status = $this->Master_model->get_recipe_one($recipe['recipe_status_id']);
                        $recipe_status = $getdata_status->recipe_status;

                        $getdata_customer = $this->Master_model->get_customer_one($recipe['customer_id']);
                        $fullname = $getdata_customer->fullname;

                        $recipe_id = $this->uri->segment(3);
                        $id_rekomen = $this->uri->segment(4);

                      ?>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width = "10%"><img src="https://filestocks.maumasak.id/recipes/<?php echo $recipe['customer_id'].'/'.$recipe['cover_image']; ?>" width = "100%"></td>
                      <td width="30%"><?php echo $recipe['title']; ?></td>
                      <td><?php echo $fullname; ?></td>
                      <td><?php echo $recipe['created_date']; ?></td>
                      <td><?php echo $recipe_status; ?></td>
                      <td width="20%">
                        <a href="<?php echo base_url('admin/editrekomen/'.$recipe['recipe_id'].'/'.$id_rekomen); ?>">
                          <button class="btn btn-custom"><i class="fa fa-check"></i></button>
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

<?php 
$i = 1;
foreach ($list_recipe as $recipez) { ?>
<!-- Modal -->
  <div class="modal fade" id="delModal<?php echo $recipez['recipe_id']; ?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <label>Konfirmasi Hapus Resep</label>
        </div>
        <div class="modal-body">
          Apakah anda yakin untuk menghapus resep ini?
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url('admin/deleterecipe/'.$recipe['recipe_id']); ?>">
            <button type="button" class="btn btn-custom">Yes</button>
          </a>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>