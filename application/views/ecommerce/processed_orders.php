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
            <h1 class="m-0">Processed Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Processed Orders</li>
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
                    <th>Order Address</th>
                    <th>Delivery</th>
                    <th>Grand Total</th>
                    <th>Order Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if($list_orders){
                  $i = 1;
                  foreach ($list_orders as $orders) {?>
                    <tr>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width="15%"><?php echo $orders['created_date']; ?></td>
                      <td width="10%"><?php echo $orders['order_id'].'<br>'.$orders['invoice_no']; ?></td>
                      <td width="25%">
                          <?php echo '('.$orders['distance'].' KM) '.$orders['order_address'].'<br>';?>
                          <a href="https://www.google.com/maps/place/<?php echo $orders['order_latitude'].' '.$orders['order_longitude']; ?>" target = "_blank">«Link on GMaps»</a>
                      </td>
                      <td width="25%"><?php echo $orders['courier_name'].' ('.$orders['courier_service'].')'.'<br>'.'Rp. '.number_format($orders['shipping_amount'],0,',','.').'<br>'.'PIC : '.$orders['receiver_name']; ?></td>
                      <td width="25%"><?php echo 'Rp. '.number_format($orders['grand_total_amount'],0,',','.').'<br>'.$orders['payment_method_name'].'<br>'.$orders['account_name'].'<br>'.$orders['account_number'].'<br>'.$orders['branch']; ?></td>
                      <td width="25%">
                          <a href="<?php echo base_url('ecommerce/logs/'.$orders['order_id']) ?>">
                            <button class="btn btn-custom"><i class="fa fa-history"></i></button>
                          </a>
                      </td>                       
                    </tr>
                  <?php $i++; } } else { ?>
                    <tr>
                      <td colspan="8">No Data</td>
                    </tr>
                  <?php } ?>
                  </tbody>
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
