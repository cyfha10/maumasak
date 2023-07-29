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
            <h1 class="m-0">Data Verifikasi Penjual</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Data Verifikasi Penjual</li>
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
                <div class="col-md-12 col-sm-12" style="text-align: right;">
                    <form action="<?php echo base_url('user/sellerverif/'); ?>" method = "post">
                       <fieldset>
                          <select name="status" id="recipe_status">
                              <option value=""><i>- Pilih Status -</i></option>
                              <option value="all" <?php if($filter == 'all') { echo 'selected';} ?>><i>Semua</i></option>
                              <?php
                              if($list_status){
                                foreach($list_status as $statuss){
                                  ?>
                                  <option value="<?php echo $statuss['seller_status_id'];?>" <?php if($filter == $statuss['seller_status_id']) { echo 'selected'; } ?>><?php echo $statuss['seller_status']; ?></option>
                                  <?php
                                }
                              }
                              ?>
                            </select>
                          <input type="submit" class="btn btn-primary" name="filter" value="Filter">
                       </fieldset>
                    </form>
                </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead style="background-color: #eb6228; color: white">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>KTP Image</th>
                    <th>Selfie Image</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach ($list_customer as $customer) {?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td width="20%"><?php echo $customer['fullname']; ?></td>
                      <td width="10%"><?php echo $customer['email']; ?></td>
                      <td  width="20%">
                        <a data-toggle="modal" data-target="#ktp<?php echo $customer['customer_id']; ?>" title="Klik untuk memperbesar" data-placement="top">
                          <img  src="http://filestocks.maumasak.id/customer/seller_verification/<?php echo $customer['customer_id'].'/'.$customer['ktp_image']; ?>" width = "100%">
                        </a>
                      </td>
                      <td  width="20%">
                        <a data-toggle="modal" data-target="#selfie<?php echo $customer['customer_id']; ?>" title="Klik untuk memperbesar" data-placement="top">
                          <img src="http://filestocks.maumasak.id/customer/seller_verification/<?php echo $customer['customer_id'].'/'.$customer['selfie_image']; ?>" width = "100%">
                        </a>
                      <td width="15%">
                        <?php 
                          $getdata_seller_status = $this->General_model->get_where_one('m_seller_status', 'seller_status_id', $customer['seller_status_id']);
                          $seller_status = $getdata_seller_status->seller_status;
                          echo $seller_status;
                        ?>
                      </td>
                      <td width="20%">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approved<?php echo $customer['customer_id']; ?>"><i class="fa fa-check"> </i></button>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejected<?php echo $customer['customer_id']; ?>"><i class="fa fa-times"> </i></button>
                      </td>
                    </tr>
                  <?php $i++; }?>
                  </tbody>
                </table>
                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
  $i = 1;
  foreach ($list_customer as $customerz) {?>
    <div class="modal fade" id="approved<?php echo $customerz['customer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
              <label>Verifikasi Penjual</label>
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin akan menyetujui?</h5>
          </div>
          <div class="modal-footer">
              <a href="<?php echo base_url('user/approval/approved/'.$customerz['customer_id']) ?>">
                <button type="button" class="btn btn-custom">Ya</button>
              </a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="rejected<?php echo $customerz['customer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
              <label>Verifikasi Penjual</label>
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin akan menolak?</h5>
          </div>
          <div class="modal-footer">
              <a href="<?php echo base_url('user/approval/rejected/'.$customerz['customer_id']) ?>">
                <button type="button" class="btn btn-custom">Ya</button>
              </a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ktp<?php echo $customerz['customer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <label>KTP Image</label>
          </div>
          <div class="modal-body" style="overflow: scroll;">
            <img  src="http://filestocks.maumasak.id/customer/seller_verification/<?php echo $customerz['customer_id'].'/'.$customerz['ktp_image']; ?>" width = "50%">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="selfie<?php echo $customerz['customer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <label>Selfie Image</label>
          </div>
          <div class="modal-body" style="overflow: scroll;">
            <img  src="http://filestocks.maumasak.id/customer/seller_verification/<?php echo $customerz['customer_id'].'/'.$customerz['selfie_image']; ?>" width = "50%">

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

<?php } ?>

<script>
  $(document).ready(function(){
    $('[data-toggle="modal"]').tooltip();
  });
</script>