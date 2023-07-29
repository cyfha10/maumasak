<!-- maumasak -->
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1" style="background-color: #e33e11"><i class="fas fa-users" style="color: white"></i></span>
            <?php
                $presisi = 0;
                $presisi1 = 0;
                $presisi2 = 0;
                $presisi3 = 0;
                $presisi4 = 0;
                $presisi5 = 1;
                $presisi6 = 1;
                $presisi7 = 1;
                $presisi_view = 0;
                $presisi_comment = 0;
                $presisi_likes = 0;
                $presisi_sale = 0;
                $presisi_finish = 0;
                $presisi_ulasan = 0;

                $n = $mpasi;
                if ($n < 900) {
                  $format_angka = number_format($n, $presisi);
                  $simbol = '';
                } else if ($o < 900000) {
                  $simbol = 'K';
                  $format_angka = number_format($n / 1000, $presisi);
                } else if ($o < 900000000) {
                  $simbol = 'M';
                  $format_angka = number_format($presisi);
                } else if ($o < 900000000000) {
                  $simbol = 'B';
                  $format_angka = number_format($n / 1000000000, $presisi);
                } else {
                  $simbol = 'T';
                  $format_angka = number_format($n / 1000000000000, $presisi);
                }

                

                if ( $presisi > 0 ) {
                  $pisah = '.' . str_repeat( '0', $presisi );
                  $format_angka = str_replace( $pisah, '', $format_angka );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Recipe Mpasi</span>
              <span class="info-box-number"><?php echo $format_angka.$simbol; ?></span>
              
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
            <span class="info-box-icon elevation-1" style="background-color: #ee7848"><i class="fa fa-user" style="color: white"></i></span>
            <?php 
                $m = $mpasi_try;
                if ($m < 900) {
                  $format_angka1 = number_format($m, $presisi1);
                  $simbol1 = '';
                } else if ($m < 900000) {
                  $simbol1 = 'K';
                  $format_angka1 = number_format($m / 1000, $presisi1);
                } else if ($m < 900000000) {
                  $simbol1 = 'M';
                  $format_angka1 = number_format($presisi1);
                } else if ($m < 900000000000) {
                  $simbol1 = 'B';
                  $format_angka1 = number_format($m / 1000000000, $presisi1);
                } else {
                  $simbol1 = 'T';
                  $format_angka1 = number_format($m / 1000000000000, $presisi1);
                }

                

                if ( $presisi1 > 0 ) {
                  $pisah1 = '.' . str_repeat( '0', $presisi1 );
                  $format_angka1 = str_replace( $pisah1, '', $format_angka1 );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Trycook Mpasi</span>
              <span class="info-box-number"><?php echo $format_angka1.$simbol1; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1" style="background-color: #f69f6d"><i class="fas fa-hamburger" style="color: black"></i></span>
            <?php 
                $x = $mpasi_monthly;
                if ($x < 900) {
                  $format_angka2 = number_format($x, $presisi2);
                  $simbol1 = '';
                } else if ($x < 900000) {
                  $simbol1 = 'K';
                  $format_angka2 = number_format($x / 1000, $presisi2);
                } else if ($x < 900000000) {
                  $simbol1 = 'M';
                  $format_angka2 = number_format($presisi2);
                } else if ($x < 900000000000) {
                  $simbol1 = 'B';
                  $format_angka2 = number_format($x / 1000000000, $presisi2);
                } else {
                  $simbol1 = 'T';
                  $format_angka2 = number_format($x / 1000000000000, $presisi2);
                }

                

                if ( $presisi2 > 0 ) {
                  $pisah2 = '.' . str_repeat( '0', $presisi2 );
                  $format_angka2 = str_replace( $pisah2, '', $format_angka2 );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Mpasi Monthly</span>
              <span class="info-box-number"><?php echo $format_angka2.$simbol1; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon elevation-1" style="background-color: #fcc79e"><i class="fas fa-retweet" style="color: black"></i></span>
            <?php 
                $y = $try_mpasi_monthly;
                if ($y < 900) {
                  $format_angka3 = number_format($y, $presisi3);
                  $simbol3 = '';
                } else if ($y < 900000) {
                  $simbol3 = 'K';
                  $format_angka3 = number_format($y / 1000, $presisi3);
                } else if ($y < 900000000) {
                  $simbol3 = 'M';
                  $format_angka3 = number_format($presisi3);
                } else if ($y < 900000000000) {
                  $simbol3 = 'B';
                  $format_angka3 = number_format($y / 1000000000, $presisi3);
                } else {
                  $simbol3 = 'T';
                  $format_angka3 = number_format($y / 1000000000000, $presisi3);
                }

                

                if ( $presisi3 > 0 ) {
                  $pisah3 = '.' . str_repeat( '0', $presisi3 );
                  $format_angka3 = str_replace( $pisah3, '', $format_angka3 );
                }

                
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Trycook Monthly</span>
              <span class="info-box-number"><?php echo $format_angka3.$simbol3; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- CLOSE MPASI -->

        <div class="col-12 col-sm-12 col-md-6">
          <div class="info-box mb-3">
            <div class="info-box-content">
              <h5><center><strong>Popular Category Mpasi</strong></center></h5>
              <canvas id="myChart_category"></canvas>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-12 col-md-6">
          <div class="info-box mb-3">
            <div class="info-box-content">
              <h5><center><strong>Popular Ingredients Mpasi</strong></center></h5>
              <canvas id="myChart_ingredients_mpasi"></canvas>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-12 col-md-12">
          <div class="info-box mb-3" style="overflow: scroll;">
            <div class="info-box-content">
              <h5><strong>Top 10 Popular Mpasi</strong></h5>
              <table class="table table-bordered table-striped">
                <thead style="background-color: #4472c4; color: white;">
                <tr>
                  <th>No</th>
                  <th>Cover</th>
                  <th>Resep Name</th>
                  <th>Total View</th>
                  <th>Total Comment</th>
                  <th>Total Like</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $i = 1;
                  foreach ($popular_mpasi as $data_mpasi) {
                    //VIEW K
                      $mm = $data_mpasi['view'];
                      if ($mm < 900) {
                        $angka_view_mpasi = number_format($mm, $presMpasi_view);
                        $simbol_view_mpasi = '';
                      } else if ($mm < 900000) {
                        $simbol_view_mpasi = 'K';
                        $angka_view_mpasi = number_format($mm / 1000, $presMpasi_view);
                      } else if ($v < 900000000) {
                        $simbol_view_mpasi = 'M';
                        $angka_view_mpasi = number_format($presMpasi_view);
                      } else if ($v < 900000000000) {
                        $simbol_view_mpasi = 'B';
                        $angka_view_mpasi = number_format($mm / 1000000000, $presMpasi_view);
                      } else {
                        $simbol_view_mpasi = 'T';
                        $angka_view_mpasi = number_format($mm / 1000000000000, $presMpasi_view);
                      }

                      if ( $presMpasi_view > 0 ) {
                        $pisah_view_mpasi = '.' . str_repeat( '0', $presMpasi_view );
                        $angka_view_mpasi = str_replace( $pisah_view_mpasi, '', $angka_view_mpasi );
                      }

                    //VIEW K

                    //COMMENT K
                      $cc = $data_mpasi['comment'];
                      if ($cc < 900) {
                        $angka_comment_mpasi = number_format($cc, $presMpasi_comment);
                        $simbol_comment_mpasi = '';
                      } else if ($cc < 900000) {
                        $simbol_comment_mpasi = 'K';
                        $angka_comment_mpasi = number_format($cc / 1000, $presMpasi_comment);
                      } else if ($cc < 900000000) {
                        $simbol_comment_mpasi = 'M';
                        $angka_comment_mpasi = number_format($presMpasi_comment);
                      } else if ($cc < 900000000000) {
                        $simbol_comment_mpasi = 'B';
                        $angka_comment_mpasi = number_format($cc / 1000000000, $presMpasi_comment);
                      } else {
                        $simbol_comment_mpasi = 'T';
                        $angka_comment_mpasi = number_format($cc / 1000000000000, $presMpasi_comment);
                      }

                      if ( $presMpasi_comment > 0 ) {
                        $pisah_comment_mpasi = '.' . str_repeat( '0', $presMpasi_comment );
                        $angka_comment_mpasi = str_replace( $pisah_comment_mpasi, '', $angka_comment_mpasi );
                      }

                    //COMMENT K

                    //LIKES K
                      $likerr = $data_mpasi['likes'];
                      if ($likerr < 900) {
                        $angka_likes_mpasi = number_format($likerr, $presMpasi_likes);
                        $simbol_likes_mpasi = '';
                      } else if ($likerr < 900000) {
                        $simbol_likes_mpasi = 'K';
                        $angka_likes_mpasi = number_format($likerr / 1000, $presMpasi_likes);
                      } else if ($likerr < 900000000) {
                        $simbol_likes_mpasi = 'M';
                        $angka_likes_mpasi = number_format($presMpasi_likes);
                      } else if ($likerr < 900000000000) {
                        $simbol_likes_mpasi = 'B';
                        $angka_likes_mpasi = number_format($likerr / 1000000000, $presMpasi_likes);
                      } else {
                        $simbol_likes_mpasi = 'T';
                        $angka_likes_mpasi = number_format($likerr / 1000000000000, $presMpasi_likes);
                      }

                      

                      if ( $presMpasi_likes > 0 ) {
                        $pisah_likes_mpasi = '.' . str_repeat( '0', $presMpasi_likes );
                        $angka_likes_mpasi = str_replace( $pisah_likes_mpasi, '', $angka_likes_mpasi );
                      }
                    //LIKES K
                    ?>
                  <tr>
                    <td width="2%"><?php echo $i; ?></td>
                    <td width = "5%"><img src="https://filestocks.maumasak.id/mpasi/<?php echo $data_mpasi['customer_id'].'/'.$data_mpasi['cover_image']; ?>" height = "50px"></td>                    
                    <td width="30%"><?php echo "<b>".ucwords($data_mpasi['title'])."</b>".'<br>'.'Pembuat : '.ucwords($data_mpasi['fullname']);; ?></td>
                    <td width="13%"><?php echo $angka_view_mpasi.$simbol_view_mpasi; ?></td>
                    <td width="13%"><?php echo $angka_comment_mpasi.$simbol_comment_mpasi; ?></td>
                    <td width="13%"><?php echo $angka_likes_mpasi.$simbol_likes_mpasi; ?></td>
                    
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
  <!-- Close MPASI -->