<!-- RATING -->
<div class="card-body">
  <div class="row">
      
        <!-- TRANSAKSI ORDER -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-coffee"></i></span>
            <?php 
                $ff = $mpasi_sale;
                if ($ff < 900) {
                  $simbol_ff = '';
                  $format_angka_ff = number_format($ff, $presisi_ff);
                } else if ($ff < 900000) {
                  $simbol_ff = 'K';
                  $format_angka_ff = number_format($ff / 1000, $presisi_ff);
                } else if ($ff < 900000000) {
                  $simbol_ff = 'M';
                  $format_angka_ff = number_format($ff / 1000000, $presisi_ff);
                } else if ($ff < 900000000000) {
                  $simbol_ff = 'B';
                  $format_angka_ff = number_format($ff / 1000000000, $presisi_ff);
                } else {
                  $simbol_ff = 'T';
                  $format_angka_ff = number_format($ff / 1000000000000, $presisi_ff);
                }

                

                if ( $presisi_ff > 0 ) {
                  $pisah4 = '.' . str_repeat( '0', $presisi_ff );
                  $format_angka_ff = str_replace( $pisah4, '', $format_angka_ff );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Mpasi Sales</span>
              <span class="info-box-number"><?php echo $format_angka_ff.$simbol_ff; ?></span>
              
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
                $gg = $rating_order_mpasi->average;
                if ($gg < 900) {
                  $format_angka_gg = number_format($gg, $presisi_gg);
                  $simbol_gg = '';
                } else if ($gg < 900000) {
                  $simbol_gg = 'K';
                  $format_angka_gg = number_format($gg / 1000, $presisi_gg);
                } else if ($gg < 900000000) {
                  $simbol_gg = 'M';
                  $format_angka_gg = number_format($presisi_gg);
                } else if ($gg < 900000000000) {
                  $simbol_gg = 'B';
                  $format_angka_gg = number_format($gg / 1000000000, $presisi_gg);
                } else {
                  $simbol_gg = 'T';
                  $format_angka_gg = number_format($gg / 1000000000000, $presisi_gg);
                }

                

                if ( $presisi_gg > 0 ) {
                  $pisah5 = '.' . str_repeat( '0', $presisi_gg );
                  $format_angka_gg = str_replace( $pisah5, '', $format_angka_gg );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Rating Order</span>
              <span class="info-box-number"><?php echo $format_angka_gg.$simbol_gg; ?></span>
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
                $hh = $total_trx_order_mpasi->sum;
                if ($hh < 900) {
                  $format_angka_gg = number_format($hh, $presisi_gg);
                  $simbol_gg= '';
                } else if ($hh < 900000) {
                  $simbol_gg= 'K';
                  $format_angka_gg = number_format($hh / 1000, $presisi_gg);
                } else if ($hh < 900000000) {
                  $simbol_gg= 'M';
                  $format_angka_gg = number_format($hh / 1000000, $presisi_gg);
                } else if ($q < 900000000000) {
                  $simbol_gg= 'B';
                  $format_angka_gg = number_format($hh / 1000000000, $presisi_gg);
                } else {
                  $simbol_gg= 'T';
                  $format_angka_gg = number_format($hh / 1000000000000, $presisi_gg);
                }

                

                if ( $presisi_gg > 0 ) {
                  $pisah6 = '.' . str_repeat( '0', $presisi_gg );
                  $format_angka_gg = str_replace( $pisah6, '', $format_angka_gg );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Transaction</span>
              <span class="info-box-number"><?php echo $format_angka_gg.$simbol_gg ?></span>
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
                $ii = $total_revenue_mpasi->sum;
                if ($r < 900) {
                  $format_angka_ii = number_format($ii, $presisi_ii);
                  $simbol_ii = '';
                } else if ($ii < 900000) {
                  $simbol_ii = 'K';
                  $format_angka_ii = number_format($ii / 1000, $presisi_ii);
                } else if ($ii < 900000000) {
                  $simbol_ii = 'M';
                  $format_angka_ii = number_format($ii / 1000000,$presisi_ii);
                } else if ($ii < 900000000000) {
                  $simbol_ii = 'B';
                  $format_angka_ii = number_format($ii / 1000000000, $presisi_ii);
                } else {
                  $simbol_ii = 'T';
                  $format_angka_ii = number_format($ii / 1000000000000, $presisi_ii);
                }

                

                if ( $presisi_ii > 0 ) {
                  $pisah7 = '.' . str_repeat( '0', $presisi_ii );
                  $format_angka_ii = str_replace( $pisah7, '', $format_angka_ii );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Revenue</span>
              <span class="info-box-number"><?php echo $format_angka_ii.$simbol_ii; ?></span>
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
                <canvas id="myChart_order_mpasi"></canvas>
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
              <canvas id="myChart_order_finish_mpasi"></canvas>
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
              <canvas id="myChart_order_delivery_mpasi"></canvas>
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
              <canvas id="myChart_order_process_mpasi"></canvas>
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
              <canvas id="myChart_order_new_mpasi"></canvas>
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
              <canvas id="myChart_order_cancel_mpasi"></canvas>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-12 col-md-12">
          <div class="info-box mb-3" style="overflow: scroll;">
            <div class="info-box-content">
              <h5><strong>Top 10 Popular Mpasi Sale</strong></h5>
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
                  foreach ($popular_mpasi_sale as $mpasi_sale) {
                    //SALE K
                      $rr = $mpasi_sale['sale'];
                      if ($z < 900) {
                        $format_angka_sale_mpasi = number_format($z, $presisi_sale_mpasi);
                        $simbol_sale_mpasi = '';
                      } else if ($z < 900000) {
                        $simbol_sale_mpasi = 'K';
                        $format_angka_sale_mpasi = number_format($z / 1000, $presisi_sale_mpasi);
                      } else if ($z < 900000000) {
                        $simbol_sale_mpasi = 'M';
                        $format_angka_sale_mpasi = number_format($presisi_sale_mpasi);
                      } else if ($z < 900000000000) {
                        $simbol_sale_mpasi = 'B';
                        $format_angka_sale_mpasi = number_format($z / 1000000000, $presisi_sale_mpasi);
                      } else {
                        $simbol_sale_mpasi = 'T';
                        $format_angka_sale_mpasi = number_format($z / 1000000000000, $presisi_sale_mpasi);
                      }

                      if ( $presisi_sale_mpasi > 0 ) {
                        $pisah_sale_mpasi = '.' . str_repeat( '0', $presisi_sale_mpasi );
                        $format_angka_sale_mpasi = str_replace( $pisah_sale_mpasi, '', $format_angka_sale_mpasi );
                      }

                    //SALE K

                    //finish K
                      $y = $mpasi_sale['finish'];
                      if ($y < 900) {
                        $format_angka_finish_mpasi = number_format($y, $presisi_finish_mpasi);
                        $simbol_finish_mpasi = '';
                      } else if ($y < 900000) {
                        $simbol_finish_mpasi = 'K';
                        $format_angka_finish_mpasi = number_format($y / 1000, $presisi_finish_mpasi);
                      } else if ($y < 900000000) {
                        $simbol_finish_mpasi = 'M';
                        $format_angka_finish_mpasi = number_format($presisi_finish_mpasi);
                      } else if ($y < 900000000000) {
                        $simbol_finish_mpasi = 'B';
                        $format_angka_finish_mpasi = number_format($y / 1000000000, $presisi_finish_mpasi);
                      } else {
                        $simbol_finish_mpasi = 'T';
                        $format_angka_finish_mpasi = number_format($y / 1000000000000, $presisi_finish_mpasi);
                      }

                      if ( $presisi_finish_mpasi > 0 ) {
                        $pisah_finish_mpasi = '.' . str_repeat( '0', $presisi_finish_mpasi );
                        $format_angka_finish_mpasi = str_replace( $pisah_finish_mpasi, '', $format_angka_finish_mpasi );
                      }

                    //finish K

                    //ULASAN K
                      $x = $mpasi_sale['ulasan'];
                      if ($c < 900) {
                        $format_angka_ulasan_mpasi = number_format($x, $presisi_ulasan_mpasi);
                        $simbol_ulasan_mpasi = '';
                      } else if ($x < 900000) {
                        $simbol_ulasan_mpasi = 'K';
                        $format_angka_ulasan_mpasi = number_format($x / 1000, $presisi_ulasan_mpasi);
                      } else if ($x < 900000000) {
                        $simbol_ulasan_mpasi = 'M';
                        $format_angka_ulasan_mpasi = number_format($presisi_ulasan_mpasi);
                      } else if ($x < 900000000000) {
                        $simbol_ulasan_mpasi = 'B';
                        $format_angka_finish_mpasi = number_format($x / 1000000000, $presisi_ulasan_mpasi);
                      } else {
                        $simbol_ulasan_mpasi = 'T';
                        $format_angka_ulasan_mpasi = number_format($x / 1000000000000, $presisi_ulasan_mpasi);
                      }

                      if ( $presisi_ulasan_mpasi > 0 ) {
                        $pisah_finish_mpasi = '.' . str_repeat( '0', $presisi_ulasan_mpasi );
                        $format_angka_ulasan_mpasi = str_replace( $pisah_finish_mpasi, '', $format_angka_ulasan_mpasi );
                      }

                    //ULASAN K
                    ?>
                  <tr>
                    <td width="2%"><?php echo $i; ?></td>
                    <td width = "5%"><img src="https://filestocks.maumasak.id/mpasi/<?php echo $mpasi_sale['customer_id'].'/'.$mpasi_sale['cover_image']; ?>" height = "50px"></td>                    
                    <td width="30%"><?php echo "<b>".ucwords($mpasi_sale['title'])."</b>".'<br>'.'Pembuat : '.ucwords($mpasi_sale['fullname']);; ?></td>
                    <td width="13%"><?php echo $format_angka_sale_mpasi.$simbol_sale_mpasi; ?></td>
                    <td width="13%"><?php echo $format_angka_finish_mpasi.$simbol_finish_mpasi; ?></td>
                    <td width="13%"><?php echo $format_angka_ulasan_mpasi.$simbol_ulasan_mpasi; ?></td>
                    
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