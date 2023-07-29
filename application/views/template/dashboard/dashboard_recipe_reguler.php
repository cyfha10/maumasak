<!-- maumasak -->
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon elevation-1" style="background-color: #e33e11"><i class="fas fa-users" style="color: white"></i></span>
              
              <div class="info-box-content">
                <span class="info-box-text">Total Registered User</span>
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
                  $m = $customer_active;
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
                <span class="info-box-text">Total Active User</span>
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
                  $x = $resep;
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
                <span class="info-box-text">Total Recipes</span>
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
                  $y = $trycook;
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
                <span class="info-box-text">Total Trycook</span>
                <span class="info-box-number"><?php echo $format_angka3.$simbol3; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon elevation-1" style="background-color: #6dedf6"><i class="fas fa-hamburger" style="color: black"></i></span>
              <?php 
                  $aa = $recipe_monthly;
                  if ($aa < 900) {
                    $angka_aa = number_format($aa, $pres_aa);
                    $simbol_aa = '';
                  } else if ($aa < 900000) {
                    $simbol_aa = 'K';
                    $angka_aa = number_format($aa / 1000, $pres_aa);
                  } else if ($aa < 900000000) {
                    $simbol_aa = 'M';
                    $angka_aa = number_format($pres_aa);
                  } else if ($aa < 900000000000) {
                    $simbol_aa = 'B';
                    $angka_aa = number_format($aa / 1000000000, $presisi2);
                  } else {
                    $simbol_aa = 'T';
                    $angka_aa = number_format($aa / 1000000000000, $pres_aa);
                  }

                  

                  if ( $pres_aa > 0 ) {
                    $pisah2 = '.' . str_repeat( '0', $pres_aa );
                    $angka_aa = str_replace( $pisah2, '', $angka_aa );
                  }

                  
                ?>
              <div class="info-box-content">
                <span class="info-box-text">Total Recipe Monthly</span>
                <span class="info-box-number"><?php echo $angka_aa.$simbol_aa; ?></span>
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
              <span class="info-box-icon elevation-1" style="background-color: #48d6ee"><i class="fa fa-retweet" style="color: white"></i></span>
              <?php 
                  $bb = $try_recipe_monthly;
                  if ($bb < 900) {
                    $angka_2 = number_format($bb, $pres_mpasi2);
                    $simbol1 = '';
                  } else if ($bb < 900000) {
                    $simbol1 = 'K';
                    $angka_2 = number_format($bb / 1000, $pres_mpasi2);
                  } else if ($bb < 900000000) {
                    $simbol1 = 'M';
                    $angka_2 = number_format($pres_mpasi2);
                  } else if ($bb < 900000000000) {
                    $simbol1 = 'B';
                    $angka_2 = number_format($bb / 1000000000, $pres_mpasi2);
                  } else {
                    $simbol1 = 'T';
                    $angka_2 = number_format($bb / 1000000000000, $pres_mpasi2);
                  }

                  

                  if ( $pres_mpasi2 > 0 ) {
                    $pisah_aa = '.' . str_repeat( '0', $pres_mpasi2 );
                    $angka_2 = str_replace( $pisah_aa, '', $angka_2 );
                  }

                  
                ?>
              <div class="info-box-content">
                <span class="info-box-text">Total Trycook Monthly</span>
                <span class="info-box-number"><?php echo $angka_2.$simbol1; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            
          </div>
          <!-- /.col -->
          <!-- CLOSE MPASI -->

          <div class="col-12 col-sm-12 col-md-6">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <h5><center><strong>User Growth <?php echo date('Y') ?></strong></center></h5>
                <div class="chart">
                  <canvas id="myChart"></canvas>
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
                <h5><center><strong>Popular Category</strong></center></h5>
                <canvas id="myChart_cuisine"></canvas>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-12 col-md-6">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <h5><center><strong>User Device</strong></center></h5>
                <canvas id="myChart_device"></canvas>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <div class="col-12 col-sm-12 col-md-6">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <h5><center><strong>Popular Ingredients</strong></center></h5>
                <canvas id="myChart_ingredients"></canvas>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3" style="overflow: scroll;">
              <div class="info-box-content">
                <h5><strong>Top 10 Popular Recipes</strong></h5>
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
                    foreach ($popular_recipe as $recipe) {
                      //VIEW K
                        $v = $recipe['view'];
                        if ($v < 900) {
                          $format_angka_view = number_format($v, $presisi_view);
                          $simbol_view = '';
                        } else if ($v < 900000) {
                          $simbol_view = 'K';
                          $format_angka_view = number_format($v / 1000, $presisi_view);
                        } else if ($v < 900000000) {
                          $simbol_view = 'M';
                          $format_angka_view = number_format($presisi_view);
                        } else if ($v < 900000000000) {
                          $simbol_view = 'B';
                          $format_angka_view = number_format($v / 1000000000, $presisi_view);
                        } else {
                          $simbol_view = 'T';
                          $format_angka_view = number_format($v / 1000000000000, $presisi_view);
                        }

                        if ( $presisi_view > 0 ) {
                          $pisah_view = '.' . str_repeat( '0', $presisi_view );
                          $format_angka_view = str_replace( $pisah_view, '', $format_angka_view );
                        }

                      //VIEW K

                      //COMMENT K
                        $c = $recipe['comment'];
                        if ($c < 900) {
                          $format_angka_comment = number_format($c, $presisi_comment);
                          $simbol_comment = '';
                        } else if ($c < 900000) {
                          $simbol_comment = 'K';
                          $format_angka_comment = number_format($c / 1000, $presisi_comment);
                        } else if ($c < 900000000) {
                          $simbol_comment = 'M';
                          $format_angka_comment = number_format($presisi_comment);
                        } else if ($c < 900000000000) {
                          $simbol_comment = 'B';
                          $format_angka_comment = number_format($c / 1000000000, $presisi_comment);
                        } else {
                          $simbol_comment = 'T';
                          $format_angka_comment = number_format($c / 1000000000000, $presisi_comment);
                        }

                        if ( $presisi_comment > 0 ) {
                          $pisah_comment = '.' . str_repeat( '0', $presisi_comment );
                          $format_angka_comment = str_replace( $pisah_comment, '', $format_angka_comment );
                        }

                      //COMMENT K

                      //LIKES K
                        $likezz = $recipe['likes'];
                        if ($likezz < 900) {
                          $format_angka_likes = number_format($likezz, $presisi_likes);
                          $simbol_likes = '';
                        } else if ($likezz < 900000) {
                          $simbol_likes = 'K';
                          $format_angka_likes = number_format($likezz / 1000, $presisi_likes);
                        } else if ($likezz < 900000000) {
                          $simbol_likes = 'M';
                          $format_angka_likes = number_format($presisi_likes);
                        } else if ($likezz < 900000000000) {
                          $simbol_likes = 'B';
                          $format_angka_likes = number_format($likezz / 1000000000, $presisi_likes);
                        } else {
                          $simbol_likes = 'T';
                          $format_angka_likes = number_format($likezz / 1000000000000, $presisi_likes);
                        }

                        

                        if ( $presisi_likes > 0 ) {
                          $pisah_likes = '.' . str_repeat( '0', $presisi_likes );
                          $format_angka_likes = str_replace( $pisah_likes, '', $format_angka_likes );
                        }
                      //LIKES K
                      ?>
                    <tr>
                      <td width="2%"><?php echo $i; ?></td>
                      <td width = "5%"><img src="https://filestocks.maumasak.id/recipes/<?php echo $recipe['customer_id'].'/'.$recipe['cover_image']; ?>" height = "50px"></td>                    
                      <td width="30%"><?php echo "<b>".ucwords($recipe['title'])."</b>".'<br>'.'Pembuat : '.ucwords($recipe['fullname']);; ?></td>
                      <td width="13%"><?php echo $format_angka_view.$simbol_view; ?></td>
                      <td width="13%"><?php echo $format_angka_comment.$simbol_comment; ?></td>
                      <td width="13%"><?php echo $format_angka_likes.$simbol_likes; ?></td>
                      
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

          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mb-3">
              <div class="info-box-content">
                <h5><strong>Last User Activities</strong></h5>
                <table class="table table-bordered table-striped">
                  <thead style="background-color: #4472c4; color: white;">
                  <tr>
                    <th>Last Activities</th>
                    <th>Time</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $i = 1;
                    foreach ($last_activities as $activities) {
                      $type = $activities['type'];
                      $fullname = $activities['fullname'];
                      $title = $activities['title'];
                      $follower = $activities['follower'];

                      ?>

                    <tr>
                      <td width="40%">
                          <?php 
                              if ($type == 'NOTIF_LIKE_RECIPE') {
                                echo ucwords($follower).' menyukai resep '.ucwords($title);
                              }

                              if ($type == 'NOTIF_TRYCOOK_RECIPE') {
                                echo ucwords($fullname).' trycook resep '.ucwords($title);
                              }

                              if ($type == 'NOTIF_COMMENT_RECIPE') {
                                echo ucwords($fullname).' berkomentar di resep '.ucwords($title);
                              }

                              
                              if ($type == 'NOTIF_COMMENT_TRYCOOK') {
                                echo ucwords($follower).' mengomentari trycook resep '.ucwords($title);
                              }

                              if ($type == 'NOTIF_LIKE_TRYCOOK') {
                                echo ucwords($follower).' menyukai trycook resep '.ucwords($title);
                              }

                              if ($type == 'NOTIF_LIKE_MPASI') {
                                echo ucwords($fullname).' menyukai mpasi '.ucwords($title);
                              }

                              if ($type == 'NOTIF_TRYCOOK_MPASI') {
                                echo ucwords($fullname).' trycook mpasi '.ucwords($title);
                              }

                              if ($type == 'NOTIF_COMMENT_MPASI') {
                                echo ucwords($fullname).' berkomentar di mpasi '.ucwords($title);
                              }

                              if ($type == 'NOTIF_FOLLOW') {
                                echo ucwords($follower).' mengikuti '.ucwords($fullname);
                              }

                              if ($type == 'NOTIF_COMMENT_TRYCOOK_MPASI') {
                                echo ucwords($follower).' mengomentari trycook mpasi '.ucwords($title);
                              }

                              if ($type == 'NOTIF_LIKE_TRYCOOK_MPASI') {
                                echo ucwords($follower).' menyukai trycook mpasi '.ucwords($title);
                              }
                          ?>
                      </td>
                      <td width="20%">
                        <?php 
                          $awal  = new DateTime($activities['created_date']);
                          $akhir = new DateTime(); // Waktu sekarang
                          $diff  = $awal->diff($akhir);

                          if ($diff->m) {
                            echo $diff->m . ' bulan yang lalu';
                          }
                          else if ($diff->d) {
                            echo $diff->d.' hari yang lalu ';
                          }
                          elseif ($diff->h) {
                            echo $diff->h . ' jam yang lalu ';
                          }
                          elseif ($diff->i) {
                            echo $diff->i . ' menit yang lalu ';
                          }
                          elseif ($diff->s) {
                            echo $diff->s . ' detik yang lalu';
                          }
                          else
                          {
                            echo "-";
                          }
                        ?>
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
  </div>
  <!-- Close maumasak -->