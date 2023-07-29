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
            <h1 class="m-0">Detail Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Pembayaran</li>
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
                <a href="<?php echo base_url('ecommerce'); ?>">
                  <button class="btn btn-custom">Kembali</button>
                </a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead style="background-color: #eb6228; color: white">
                  <tr>
                    <th>No</th>
                    <th>Order Date</th>
                    <th>Order ID</th>
                    <th>Transfer Date</th>
                    <th>Transfer Form</th>
                    <th>Bukti Transfer</th>
                    <th>Approval</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  $seller_id  = $this->uri->segment(5);
                  foreach ($list_payment as $confirm) {?>
                    <tr>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width="15%"><?php echo $confirm['created_date']; ?></td>
                      <td width="10%"><?php echo $confirm['order_id'].'<br>'.$confirm['invoice_no']; ?></td>
                      <td width="10%"><?php echo $confirm['transfer_date']; ?></td>
                      <td width="25%"><?php echo $confirm['customer_bank'].'<br>'.$confirm['account_name'].'<br>'.'Rp. '.number_format($confirm['nominal'],0,',','.').'<br>'.$confirm['transfer_method']; ?></td>
                      <td width="10%">
                              <img src="https://filestocks.maumasak.id/payment_confirmation/<?php echo $confirm['customer_id'].'/'.$confirm['transfer_image']; ?>" width = "90%">
                      </td>
                      <td width="20%">
                          <a href="<?php echo base_url('ecommerce/approval/approved/'.$confirm['customer_id'].'/'.$confirm['order_id'].'/'.$seller_id); ?>">
                          <button class="btn btn-custom"><i class="fa fa-check"></i></button>
                        </a>
                        <a href="<?php echo base_url('ecommerce/approval/rejected/'.$confirm['customer_id'].'/'.$confirm['order_id'].'/'.$seller_id); ?>">
                          <button class="btn btn-custom"><i class="fa fa-times"></i></button>
                        </a>
                      </td>                       
                    </tr>
                  <?php $i++; } ?>
                  </tfoot>
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

