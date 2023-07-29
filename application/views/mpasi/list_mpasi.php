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
            <h1 class="m-0">List data MPasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Data MPasi</li>
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
              <div class="col-12 col-sm-12 col-md-12">
              <div class="info-box mb-3" style="overflow: scroll;">
              <div class="card-body">
                  <div class="col-md-6">
                    <a href="<?php echo base_url('mpasi/pilihpelanggan'); ?>"> 
                      <button class="btn btn-custom">Tambah Data</button>
                    </a>
                  </div>
                  <div class="col-md-12 col-sm-12" style="text-align: right;">
                      <form action="<?php echo base_url('mpasi/listmpasi/'); ?>" method = "post">
                         <fieldset>
                            <select name="recipe_status" id="recipe_status">
                                <option value=""><i>- Pilih Status -</i></option>
                                <option value="all" <?php $filter = ''; if($filter == 'all') { echo 'selected';} ?>><i>Semua</i></option>
                                <?php
                                if($datarecipestatus){
                                  foreach($datarecipestatus as $statuss){
                                    ?>
                                    <option value="<?php echo $statuss['recipe_status_id'];?>" <?php if($filter == $statuss['recipe_status_id']) { echo 'selected'; } ?>><?php echo $statuss['recipe_status']; ?></option>
                                    <?php
                                  }
                                }
                                ?>
                              </select>
                            <input type="submit" class="btn btn-primary" name="filter" value="Filter">
                         </fieldset>
                      </form>
                  </div>
                
                <table id="example1" class="table table-bordered table-striped" width="100%">
                  <thead style="background-color: #eb6228; color: white">
                  <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Nama Resep MPasi</th>
                    <th>Tgl Dibuat</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Like</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $i = 1;
                    foreach ($list_mpasi as $mpasi) {?>
                    <tr>
                      <?php 
                        $getdata_status = $this->General_model->get_where_one('m_recipe_status', 'recipe_status_id', $mpasi['recipe_status_id']);
                        $recipe_status = $getdata_status->recipe_status;

                        $getdata_customer = $this->General_model->get_where_one('m_customer', 'customer_id' ,$mpasi['customer_id']);
                        $fullname = $getdata_customer->fullname;
                      ?>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width="15%">
                        <img src="https://filestocks.maumasak.id/mpasi/<?php echo $mpasi['customer_id'].'/'.$mpasi['cover_image']; ?>" width = "100%">
                      </td>
                      <td width="20%"><?php echo $mpasi['title'].'<br>'.'Pembuat : '.$fullname;; ?></td>
                      <td width="15%"><?php echo $mpasi['created_date']; ?></td>
                      <td width="10%">
                          
                          <?php if($mpasi['recipe_status_id'] == 1){ ?>
                            <span class="badge bg-default"><?php echo $recipe_status; ?></span>
                          <?php } ?>
                          <?php if($mpasi['recipe_status_id'] == 2){ ?>
                            <span class="badge bg-success"><?php echo $recipe_status; ?></span>
                          <?php } ?>
                          <?php if($mpasi['recipe_status_id'] == 3){ ?>
                            <span class="badge bg-warning"><?php echo $recipe_status; ?></span>
                          <?php } ?>
                          <?php if($mpasi['recipe_status_id'] == 4){ ?>
                            <span class="badge bg-danger"><?php echo $recipe_status; ?></span>
                          <?php } ?>
                          <?php if($mpasi['recipe_status_id'] == 5){ ?>
                            <span class="badge bg-info"><?php echo $recipe_status; ?></span>
                          <?php } ?>
                          <?php if($mpasi['recipe_status_id'] == 6){ ?>
                            <span class="badge bg-default"><?php echo $recipe_status; ?></span>
                          <?php } ?>
                      </td>
                      <td>
                        <?php 
                        $getview = $this->Mpasi_model->get_count_mpasi_view($mpasi['mpasi_id']);
                        echo $getview;
                      ?>
                      </td>
                      <td>
                        <?php 
                        $getlike = $this->Mpasi_model->get_count_mpasi_like($mpasi['mpasi_id']);
                        echo $getlike;
                      ?>
                      </td>
                      <td width="20%">
                        <a href="<?php echo base_url('mpasi/detailmpasi/'.$mpasi['mpasi_id']); ?>">
                          <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="Detail Resep"><i class="fa fa-list"></i></button>
                        </a>
                        <a href="<?php echo base_url('mpasi/editmpasi/'.$mpasi['customer_id'].'/'.$mpasi['mpasi_id']); ?>">
                          <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="Edit Resep"><i class="fa fa-edit"></i></button>
                        </a>
                        <a href="<?php echo base_url('mpasi/createhastag/'.$mpasi['mpasi_id']); ?>">
                          <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="Create Hastag Resep"><i class="fa fa-hashtag"></i></button>
                        </a>
                        <!-- <a href="<?php echo base_url('mpasi/deleterecipe/'.$mpasi['mpasi_id']); ?>"> -->
                        <a href="#">
                          <button class="btn btn-custom" data-toggle="modal" data-target="#delModal<?php echo $mpasi['mpasi_id']; ?>"><i class="fa fa-trash "></i></button>
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
foreach ($list_mpasi as $mpasi) { ?>
<!-- Modal -->
  <div class="modal fade" id="delModal<?php echo $mpasi['mpasi_id']; ?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <label>Konfirmasi Hapus Resep</label>
        </div>
        <div class="modal-body">
          Apakah anda yakin untuk menghapus resep ini?
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url('mpasi/deleterecipempasi/'.$mpasi['mpasi_id']); ?>">
            <button type="button" class="btn btn-custom">Yes</button>
          </a>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

