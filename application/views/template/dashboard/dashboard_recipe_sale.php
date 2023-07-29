<!-- RATING -->
<div class="card-body">
  <div class="row">
      
        <!-- TRANSAKSI ORDER -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-coffee"></i></span>
            <?php 
                $o = $recipe_sale;
                if ($o < 900) {
                  $format_angka4 = number_format($o, $presisi4);
                  $simbol4 = '';
                } else if ($o < 900000) {
                  $simbol4 = 'K';
                  $format_angka4 = number_format($o / 1000, $presisi4);
                } else if ($n < 900000000) {
                  $simbol4 = 'M';
                  $format_angka4 = number_format($presisi4);
                } else if ($n < 900000000000) {
                  $simbol4 = 'B';
                  $format_angka4 = number_format($o / 1000000000, $presisi4);
                } else {
                  $simbol4 = 'T';
                  $format_angka4 = number_format($o / 1000000000000, $presisi4);
                }

                

                if ( $presisi4 > 0 ) {
                  $pisah4 = '.' . str_repeat( '0', $presisi4 );
                  $format_angka4 = str_replace( $pisah4, '', $format_angka4 );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Recipe Sales</span>
              <span class="info-box-number"><?php echo $format_angka4.$simbol4; ?></span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-star"></i></span>
            <?php 
                $p = $rating_order->average;
                if ($p < 900) {
                  $format_angka5 = number_format($p, $presisi5);
                  $simbol5 = '';
                } else if ($p < 900000) {
                  $simbol5 = 'K';
                  $format_angka5 = number_format($p / 1000, $presisi5);
                } else if ($p < 900000000) {
                  $simbol5 = 'M';
                  $format_angka5 = number_format($presisi5);
                } else if ($p < 900000000000) {
                  $simbol5 = 'B';
                  $format_angka5 = number_format($p / 1000000000, $presisi5);
                } else {
                  $simbol5 = 'T';
                  $format_angka5 = number_format($p / 1000000000000, $presisi5);
                }

                

                if ( $presisi5 > 0 ) {
                  $pisah5 = '.' . str_repeat( '0', $presisi5 );
                  $format_angka5 = str_replace( $pisah5, '', $format_angka5 );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Rating Order</span>
              <span class="info-box-number"><?php echo $format_angka5.$simbol5; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-gavel"></i></span>
            <?php 
                $q = $total_trx_order->sum;
                if ($q < 900) {
                  $format_angka6 = number_format($q, $presisi6);
                  $simbol6= '';
                } else if ($q < 900000) {
                  $simbol6= 'K';
                  $format_angka6 = number_format($q / 1000, $presisi6);
                } else if ($q < 900000000) {
                  $simbol6= 'M';
                  $format_angka6 = number_format($q / 1000000, $presisi6);
                } else if ($q < 900000000000) {
                  $simbol6= 'B';
                  $format_angka6 = number_format($q / 1000000000, $presisi6);
                } else {
                  $simbol6= 'T';
                  $format_angka6 = number_format($q / 1000000000000, $presisi6);
                }

                

                if ( $presisi6 > 0 ) {
                  $pisah6 = '.' . str_repeat( '0', $presisi6 );
                  $format_angka6 = str_replace( $pisah6, '', $format_angka6 );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Transaction</span>
              <span class="info-box-number"><?php echo $format_angka6.$simbol6 ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-credit-card"></i></span>
            <?php 
                $r = $total_revenue->sum;
                if ($r < 900) {
                  $format_angka7 = number_format($r, $presisi7);
                  $simbol7 = '';
                } else if ($r < 900000) {
                  $simbol7 = 'K';
                  $format_angka7 = number_format($r / 1000, $presisi7);
                } else if ($r < 900000000) {
                  $simbol7 = 'M';
                  $format_angka7 = number_format($r / 1000000,$presisi7);
                } else if ($r < 900000000000) {
                  $simbol7 = 'B';
                  $format_angka7 = number_format($r / 1000000000, $presisi7);
                } else {
                  $simbol7 = 'T';
                  $format_angka7 = number_format($r / 1000000000000, $presisi7);
                }

                

                if ( $presisi7 > 0 ) {
                  $pisah7 = '.' . str_repeat( '0', $presisi7 );
                  $format_angka7 = str_replace( $pisah7, '', $format_angka7 );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Revenue</span>
              <span class="info-box-number"><?php echo $format_angka7.$simbol7; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-12 col-md-6">
          <div class="info-box mb-3">
            <div class="info-box-content">
              <h5><center><strong>All Order</strong></center></h5>
              <div class="chart">
                <canvas id="myChart_order"></canvas>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-12 col-md-6">
          <div class="info-box mb-3">
            <div class="info-box-content">
              <h5><center><strong>Finished</strong></center></h5>
              <canvas id="myChart_order_finish"></canvas>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-12 col-md-6">
          <div class="info-box mb-3">
            <div class="info-box-content">
              <h5><center><strong>On Delivery</strong></center></h5>
              <canvas id="myChart_order_delivery"></canvas>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <div class="col-12 col-sm-12 col-md-6">
          <div class="info-box mb-3">
            <div class="info-box-content">
              <h5><center><strong>On Process</strong></center></h5>
              <canvas id="myChart_order_process"></canvas>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-12 col-md-6">
          <div class="info-box mb-3">
            <div class="info-box-content">
              <h5><center><strong>New Order</strong></center></h5>
              <canvas id="myChart_order_new"></canvas>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <div class="col-12 col-sm-12 col-md-6">
          <div class="info-box mb-3">
            <div class="info-box-content">
              <h5><center><strong>Cancel</strong></center></h5>
              <canvas id="myChart_order_cancel"></canvas>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-12 col-md-12">
          <div class="info-box mb-3" style="overflow: scroll;">
            <div class="info-box-content">
              <h5><strong>Top 10 Popular Recipes Sale</strong></h5>
              <table class="table table-bordered table-striped">
                <thead style="background-color: #4472c4; color: white;">
                <tr>
                  <th>No</th>
                  <th>Cover</th>
                  <th>Resep Name</th>
                  <th>Total Order</th>
                  <th>Total Selesai</th>
                  <th>Total Ulasan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $i = 1;
                  foreach ($popular_recipe_sale as $recipe_sale) {
                    //SALE K
                      $z = $recipe_sale['sale'];
                      if ($z < 900) {
                        $format_angka_sale = number_format($z, $presisi_sale);
                        $simbol_sale = '';
                      } else if ($z < 900000) {
                        $simbol_sale = 'K';
                        $format_angka_sale = number_format($z / 1000, $presisi_sale);
                      } else if ($z < 900000000) {
                        $simbol_sale = 'M';
                        $format_angka_sale = number_format($presisi_sale);
                      } else if ($z < 900000000000) {
                        $simbol_sale = 'B';
                        $format_angka_sale = number_format($z / 1000000000, $presisi_sale);
                      } else {
                        $simbol_sale = 'T';
                        $format_angka_sale = number_format($z / 1000000000000, $presisi_sale);
                      }

                      if ( $presisi_sale > 0 ) {
                        $pisah_sale = '.' . str_repeat( '0', $presisi_sale );
                        $format_angka_sale = str_replace( $pisah_sale, '', $format_angka_sale );
                      }

                    //SALE K

                    //finish K
                      $y = $recipe_sale['finish'];
                      if ($y < 900) {
                        $format_angka_finish = number_format($y, $presisi_finish);
                        $simbol_finish = '';
                      } else if ($y < 900000) {
                        $simbol_finish = 'K';
                        $format_angka_finish = number_format($y / 1000, $presisi_finish);
                      } else if ($y < 900000000) {
                        $simbol_finish = 'M';
                        $format_angka_finish = number_format($presisi_finish);
                      } else if ($y < 900000000000) {
                        $simbol_finish = 'B';
                        $format_angka_finish = number_format($y / 1000000000, $presisi_finish);
                      } else {
                        $simbol_finish = 'T';
                        $format_angka_finish = number_format($y / 1000000000000, $presisi_finish);
                      }

                      if ( $presisi_finish > 0 ) {
                        $pisah_finish = '.' . str_repeat( '0', $presisi_finish );
                        $format_angka_finish = str_replace( $pisah_finish, '', $format_angka_finish );
                      }

                    //finish K

                    //ULASAN K
                      $x = $recipe_sale['ulasan'];
                      if ($c < 900) {
                        $format_angka_ulasan = number_format($x, $presisi_ulasan);
                        $simbol_ulasan = '';
                      } else if ($x < 900000) {
                        $simbol_ulasan = 'K';
                        $format_angka_ulasan = number_format($x / 1000, $presisi_ulasan);
                      } else if ($x < 900000000) {
                        $simbol_ulasan = 'M';
                        $format_angka_ulasan = number_format($presisi_ulasan);
                      } else if ($x < 900000000000) {
                        $simbol_ulasan = 'B';
                        $format_angka_finish = number_format($x / 1000000000, $presisi_ulasan);
                      } else {
                        $simbol_ulasan = 'T';
                        $format_angka_ulasan = number_format($x / 1000000000000, $presisi_ulasan);
                      }

                      if ( $presisi_ulasan > 0 ) {
                        $pisah_finish = '.' . str_repeat( '0', $presisi_ulasan );
                        $format_angka_ulasan = str_replace( $pisah_finish, '', $format_angka_ulasan );
                      }

                    //ULASAN K
                    ?>
                  <tr>
                    <td width="2%"><?php echo $i; ?></td>
                    <td width = "5%"><img src="https://filestocks.maumasak.id/recipes/<?php echo $recipe_sale['customer_id'].'/'.$recipe_sale['cover_image']; ?>" height = "50px"></td>                    
                    <td width="30%"><?php echo "<b>".ucwords($recipe_sale['title'])."</b>".'<br>'.'Pembuat : '.ucwords($recipe_sale['fullname']);; ?></td>
                    <td width="13%"><?php echo $format_angka_sale.$simbol_sale; ?></td>
                    <td width="13%"><?php echo $format_angka_finish.$simbol_finish; ?></td>
                    <td width="13%"><?php echo $format_angka_ulasan.$simbol_ulasan; ?></td>
                    
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
  </div>
<!-- /.card-body -->
<!-- Close Rating -->