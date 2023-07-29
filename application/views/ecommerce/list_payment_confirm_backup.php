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
            <h1 class="m-0">List Konfirmasi Pembayaran</h1>
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
                    <a class="nav-link active" id="custom-tabs-two-recipe-tab" data-toggle="pill" href="#custom-tabs-two-recipe" role="tab" aria-controls="custom-tabs-two-recipe" aria-selected="false"><font color="black">Payment Recipe</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-mpasi-tab" data-toggle="pill" href="#custom-tabs-two-mpasi" role="tab" aria-controls="custom-tabs-two-mpasi" aria-selected="false"><font color="black">Payment Mpasi</font></a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <!-- MAU MASAK -->
                  <div class="tab-pane fade show active" id="custom-tabs-two-recipe" role="tabpanel" aria-labelledby="custom-tabs-two-recipe-tab">
                    <!-- maumasak -->
                      <div class="card-body">
                        <div class="row">
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
                      </div>
                  </div>
                  <!-- CLOSE RECIPE -->

                  <div class="tab-pane fade" id="custom-tabs-two-mpasi" role="tabpanel" aria-labelledby="custom-tabs-two-mpasi-tab">
                    <!-- maumasak -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12 col-sm-6 col-md-3">
                            <table id="myTable" class="display table table-bordered table-striped">
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
                              foreach ($payment_mpasi as $pay_mpasi) {?>
                                <tr>
                                  <td width="2%"><?php echo $i; ?></td>
                                  <td width="15%"><?php echo $pay_mpasi['created_date']; ?></td>
                                  <td width="8%"><?php echo $pay_mpasi['order_id'].'<br>'.$pay_mpasi['invoice_no']; ?></td>
                                  <td width="15%"><?php echo $pay_mpasi['buyer_name']; ?></td>
                                  <td width="15%"><?php echo $pay_mpasi['seller_name']; ?></td>
                                  <td width="10%"><?php echo 'Rp. '.number_format($pay_mpasi['grand_total_amount'],0,',','.'); ?></td>
                                  <td width="20%">
                                    <a href="<?php echo base_url('ecommerce/detailpayment/'.$pay_mpasi['buyer_id'].'/'.$pay_mpasi['order_id'].'/'.$pay_mpasi['seller_id']); ?>">
                                      <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="View Evidence"><i class="fa fa-list"></i></button>
                                    </a>
                                    <a href="<?php echo base_url('ecommerce/approval/approved/'.$pay_mpasi['buyer_id'].'/'.$pay_mpasi['order_id'].'/'.$pay_mpasi['seller_id']); ?>">
                                      <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="Approved"><i class="fa fa-check"></i></button>
                                    </a>
                                    <a href="<?php echo base_url('ecommerce/approval/rejected/'.$pay_mpasi['buyer_id'].'/'.$pay_mpasi['order_id'].'/'.$pay_mpasi['seller_id']); ?>">
                                      <button class="btn btn-custom" data-toggle="tooltip" data-placement="top" title="Rejected"><i class="fa fa-times"></i></button>
                                    </a>
                                  </td>                       
                                </tr>
                              <?php $i++; } ?>
                              </tfoot>
                            </table>
                          </div>

                        </div>
                      </div>
                  </div>
                  <!-- CLOSE RECIPE -->

                  
                </div>
              </div> 
              <!-- card body -->
            </div>

          </div>
            <!-- /.card -->
        </div>
      </div>
    </section>

<!-- MAU MASAK -->
<script>
  $(document).ready(function() {
    $('table.display').DataTable();
  } );
  
  $(document).ready(function() {
    $('table.table').DataTable();
  } );
</script>