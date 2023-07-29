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
            <h1 class="m-0">Detail Riwayat Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Detail Riwayat Order</li>
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
                <a class="nav-link active" id="custom-tabs-two-creator-tab" data-toggle="pill" href="#custom-tabs-two-creator" role="tab" aria-controls="custom-tabs-two-creator" aria-selected="true"><font color="purple">Log Order</font></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-recipe-tab" data-toggle="pill" href="#custom-tabs-two-recipe" role="tab" aria-controls="custom-tabs-two-recipe" aria-selected="true"><font color="purple">Recipe</font></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><font color="purple">Ulasan</font></a>
              </li>
             
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-two-creator" role="tabpanel" aria-labelledby="custom-tabs-two-creator-tab">
                 <!-- INI DETAIL RESEP -->
                  <div class="timeline">
                    <!-- timeline time label -->
                    
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <?php
                        if($detail_log){
                          foreach ($detail_log as $log) { 
                      ?>
                          <div>
                            <?php if($log['order_status_id'] == 'ST001'){ ?>
                              <i class="fa fa-check bg-blue"></i>
                            <?php } if($log['order_status_id'] == 'ST002'){ ?>
                              <i class="fa fa-check bg-blue"></i>
                            <?php } if($log['order_status_id'] == 'ST003'){ ?>
                              <i class="fa fa-check bg-blue"></i>
                            <?php } if($log['order_status_id'] == 'ST004'){ ?>
                              <i class="fa fa-check bg-blue"></i>
                            <?php } if($log['order_status_id'] == 'ST005'){ ?>
                              <i class="fa fa-check bg-blue"></i>
                            <?php } if($log['order_status_id'] == 'ST006'){ ?>
                              <i class="fa fa-check bg-blue"></i>
                            <?php } ?>
                            
                            <div class="timeline-item"> 
                              <?php
                                  $times = $log['logged_time']; 
                                  $pecah = explode(' ', $times);
                                  $tgl = $pecah[0];
                                  $jam = $pecah[1];
                              ?>

                              <span class="time"><i class="fas fa-clock"></i> <?php echo $jam; // Hasil 15 February 1994?></span>
                              <h3 class="timeline-header">
                                <font color="#eb6228">
                                  <a href="#">
                                      <?php echo 'System Tracker - '.$log['order_status'].' - '.date('d F Y', strtotime($log['logged_time']));
                                      ?>
                                  </a>
                                </font>
                              </h3>

                              <div class="timeline-body">
                                <?php if($log['order_status_id'] == 'ST001'){ ?>
                                  <font color="grey">Menunggu Proses Pembayaran dan Verifikasi Pembayaran</font>
                                <?php } if($log['order_status_id'] == 'ST002'){ ?>
                                  <font color="grey">Pembayaran sudah Diverifikasi</font><br>
                                  <font color="grey">Pembayaran telah diterima MauMasak dan pesanan Anda sudah diteruskan ke penjual </font>
                                <?php } if($log['order_status_id'] == 'ST003'){ ?>
                                  <font color="grey">Menunggu konfirmasi penjual</font>
                                <?php } if($log['order_status_id'] == 'ST004'){ ?>
                                  <font color="grey">Pesanan Anda sedang diproses oleh penjual</font>
                                <?php } if($log['order_status_id'] == 'ST005'){ ?>
                                  <font color="grey">Pesanan telah dikirim.</font>
                                  <font color="grey">Pesanan Anda telah diproses pengiriman oleh Kurir</font>
                                <?php } if($log['order_status_id'] == 'ST006'){ ?>
                                  <font color="grey">Pesanan telah tiba di tujuan</font>
                                <?php } ?>
                              </div>
                              <div class="timeline-footer">
                                
                              </div>
                            </div>
                          </div>
                      <?php } } ?>
                    
                    <!-- END timeline item -->
                    
                    <div>
                      <i class="fas fa-clock bg-gray"></i>
                    </div>
                  </div>
                 <!-- CLOSE DETAIL RESEP -->
              </div>

              <div class="tab-pane fade show" id="custom-tabs-two-recipe" role="tabpanel" aria-labelledby="custom-tabs-two-recipe-tab">
                 <!-- INI DETAIL RESEP -->
                    <table id="example1" class="table table-bordered table-striped">
                      <thead style="background-color: #eb6228; color: white">
                        <tr>
                          <th>No</th>
                          <th>Recipe</th>
                          <th>Qty</th>
                          <th>Amount</th>
                          <th>Diskon</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i = 1;
                        foreach ($recipe_log as $recipe) {?>
                        <tr>
                          
                          <td width="2%"><?php echo $i; ?></td>
                          <td width="40%"><?php echo $recipe['title']; ?></td>
                          <td width="15%"><?php echo $recipe['qty']; ?></td>
                          <td width="15%"><?php echo 'Rp. '.number_format($recipe['amount'],0,',','.'); ?></td>
                          <td width="15%"><?php echo $recipe['discount_amount']; ?></td>
                          <td width="15%"><?php echo 'Rp. '.number_format($recipe['total_amount'],0,',','.'); ?></td>
                        </tr>
                      <?php $i++; } ?>
                      </tbody>
                    </table>
                 <!-- CLOSE DETAIL RESEP -->
              </div>

              <div class="tab-pane fade show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                 <!-- INI DETAIL RESEP -->
                    <table id="example3" class="table table-bordered table-striped">
                      <thead style="background-color: #eb6228; color: white">
                        <tr>
                          <th>No</th>
                          <th>Ulasan</th>
                          <th>Balasan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $i = 1;
                        foreach ($list_ulasan as $ulasan) {?>
                        <tr>
                          
                          <td width="2%"><?php echo $i; ?></td>
                          <td width="30%"><?php echo $ulasan['feedback']; ?></td>
                          <td width="30%"><?php echo $ulasan['author_reply']; ?></td>
                        </tr>
                      <?php $i++; } ?>
                      </tbody>
                    </table>
                 <!-- CLOSE DETAIL RESEP -->
              </div>
            </div>
          </div>
        </div>
</section>
