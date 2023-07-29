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
            <h1 class="m-0">List Konfirmasi Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">List Konfirmasi Pembayaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3" style="overflow: scroll;">
              <div class="info-box-content">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead style="background-color: #eb6228; color: white">
                      <tr>
                        <th>No</th>
                        <th>Order Date</th>
                        <th>Order ID</th>
                        <th>Buyer Name</th>
                        <th>Seller Name</th>
                        <th>Total Amount</th>
                        <th>Approval</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $i = 1;
                      foreach ($list_confirm as $confirm) {?>
                        <tr>
                          <td width="2%"><?php echo $i; ?></td>
                          <td width="15%"><?php echo $confirm['created_date']; ?></td>
                          <td width="8%"><?php echo $confirm['order_id'].'<br>'.$confirm['invoice_no']; ?></td>
                          <td width="15%"><?php echo $confirm['buyer_name']; ?></td>
                          <td width="15%"><?php echo $confirm['seller_name']; ?></td>
                          <td width="10%"><?php echo 'Rp. '.number_format($confirm['grand_total_amount'],0,',','.'); ?></td>
                          <td width="20%">
                            <a href="<?php echo base_url('ecommerce/detailpayment/'.$confirm['buyer_id'].'/'.$confirm['order_id'].'/'.$confirm['seller_id']); ?>">
                              <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="View Evidence"><i class="fa fa-list"></i></button>
                            </a>
                            <a href="<?php echo base_url('ecommerce/approval/approved/'.$confirm['buyer_id'].'/'.$confirm['order_id'].'/'.$confirm['seller_id']); ?>">
                              <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="Approved"><i class="fa fa-check"></i></button>
                            </a>
                            <a href="<?php echo base_url('ecommerce/approval/rejected/'.$confirm['buyer_id'].'/'.$confirm['order_id'].'/'.$confirm['seller_id']); ?>">
                              <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="Rejected"><i class="fa fa-times"></i></button>
                            </a>
                          </td>                       
                        </tr>
                      <?php $i++; } ?>
                      </tfoot>
                  </table>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
        </div>
        <!-- /.row -->

        

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
