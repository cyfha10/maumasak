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
            <h1 class="m-0">Dashboard</h1>
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
                    <a class="nav-link active" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false"><font color="black">Recipe Reguler</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false"><font color="black">Recipe Sale</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-mpasi-tab" data-toggle="pill" href="#custom-tabs-two-mpasi" role="tab" aria-controls="custom-tabs-two-mpasi" aria-selected="false"><font color="black">Recipe Mpasi</font></a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <!-- MAU MASAK -->
                  <div class="tab-pane fade show active" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
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

                                    $presMpasi_view = 0;
                                    $presMpasi_comment = 0;
                                    $presMpasi_likes = 0;
                                    $pres_mpasi2 = 0;
                                    $pres_aa = 0;
                                    
                                    $angka_aa = 0;

                                    $n = $customer;
                                    if ($n < 900) {
                                      $format_angka = number_format($n, $presisi);
                                      $simbol = '';
                                    } else if ($n < 900000) {
                                      $simbol = 'K';
                                      $format_angka = number_format($n / 1000, $presisi);
                                    } else if ($n < 900000000) {
                                      $simbol = 'M';
                                      $format_angka = number_format($presisi);
                                    } else if ($n < 900000000000) {
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

                                                if ($type == 'NOTIF_FOLLOW') {
                                                  echo ucwords($follower).' mengikuti '.ucwords($fullname);
                                                }

                                                if ($type == 'NOTIF_COMMENT_TRYCOOK') {
                                                  echo ucwords($follower).' mengomentari trycook resep '.ucwords($title);
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
                  </div>
                  <!-- CLOSE MAU MASAK -->

                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
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
                                          } else if ($o < 900000000) {
                                            $simbol4 = 'M';
                                            $format_angka4 = number_format($presisi4);
                                          } else if ($o < 900000000000) {
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
                          </div>
                          <!-- /.card-body -->
                        <!-- Close Rating -->

                        <!-- CLOSE RECIPE SALE -->

                  <div class="tab-pane fade" id="custom-tabs-two-mpasi" role="tabpanel" aria-labelledby="custom-tabs-two-mpasi-tab">
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
                                    } else if ($n < 900000) {
                                      $simbol = 'K';
                                      $format_angka = number_format($n / 1000, $presisi);
                                    } else if ($n < 900000000) {
                                      $simbol = 'M';
                                      $format_angka = number_format($presisi);
                                    } else if ($n < 900000000000) {
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

                            <div class="col-12 col-sm-12 col-md-12">
                              <div class="info-box mb-3">
                                <div class="info-box-content">
                                  <h5><strong>Last User Activities Mpasi</strong></h5>
                                  <table class="table table-bordered table-striped">
                                    <thead style="background-color: #4472c4; color: white;">
                                    <tr>
                                      <th>Last Activities</th>
                                      <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      $ww = 1;
                                      foreach ($last_activities_mpasi as $Mpasi_activities) {
                                        $type_mpasi = $Mpasi_activities['type'];
                                        $fullname_mpasi = $Mpasi_activities['fullname'];
                                        $title_mpasi = $Mpasi_activities['title'];
                                        $follower_mpasi = $Mpasi_activities['follower'];

                                        ?>

                                      <tr>
                                        <td width="40%">
                                            <?php 
                                                if ($type_mpasi == 'NOTIF_LIKE_MPASI') {
                                                  echo ucwords($follower_mpasi).' menyukai mpasi '.ucwords($title_mpasi);
                                                }

                                                if ($type_mpasi == 'NOTIF_TRYCOOK_MPASI') {
                                                  echo ucwords($fullname_mpasi).' trycook mpasi '.ucwords($title_mpasi);
                                                }

                                                if ($type_mpasi == 'NOTIF_COMMENT_MPASI') {
                                                  echo ucwords($fullname_mpasi).' berkomentar di mpasi '.ucwords($title_mpasi);
                                                }

                                                if ($type_mpasi == 'NOTIF_FOLLOW') {
                                                  echo ucwords($follower_mpasi).' mengikuti '.ucwords($fullname_mpasi);
                                                }

                                                if ($type_mpasi == 'NOTIF_COMMENT_TRYCOOK_MPASI') {
                                                  echo ucwords($follower_mpasi).' mengomentari trycook mpasi '.ucwords($title_mpasi);
                                                }
                                            ?>
                                        </td>
                                        <td width="20%">
                                          <?php 
                                            $awal_mpasi  = new DateTime($Mpasi_activities['created_date']);
                                            $akhir_mpasi = new DateTime(); // Waktu sekarang
                                            $diff_mpasi  = $awal_mpasi->diff($akhir_mpasi);

                                            if ($diff_mpasi->m) {
                                              echo $diff_mpasi->m . ' bulan yang lalu';
                                            }
                                            else if ($diff_mpasi->d) {
                                              echo $diff_mpasi->d.' hari yang lalu ';
                                            }
                                            elseif ($diff_mpasi->h) {
                                              echo $diff_mpasi->h . ' jam yang lalu ';
                                            }
                                            elseif ($diff_mpasi->i) {
                                              echo $diff_mpasi->i . ' menit yang lalu ';
                                            }
                                            elseif ($diff_mpasi->s) {
                                              echo $diff_mpasi->s . ' detik yang lalu';
                                            }
                                            else
                                            {
                                              echo "-";
                                            }
                                          ?>
                                        </td>
                                        
                                      </tr>
                                    <?php $ww++; } ?>
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
                  </div>
                  <!-- CLOSE MPASI -->

                  </div>
                </div>
                


              </div>

            </div>
            <!-- /.card -->

    </section>

<!-- MAU MASAK -->
  
<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph as $data) {
                    echo "'" .$data['grafik_bulan'] ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'User Growth',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                  <?php
                      foreach ($graph as $data) {
                    echo "'" .$data['grafik_jumlah'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>
  
  <script type="text/javascript">
    var ctx = document.getElementById('myChart_ingredients').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
              <?php
                  foreach ($graph_ingredient as $data_ing) {
                    echo "'" .ucfirst($data_ing['grafik_ingredients']) ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'Ingredients',
                backgroundColor: '#4472c4',
                borderColor: '##93C3D2',
                data: [
                  <?php
                      foreach ($graph_ingredient as $data_ing) {
                    echo "'" .$data_ing['grafik_jum'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>

  <script type="text/javascript">
    var ctx1 = document.getElementById('myChart_cuisine').getContext('2d');
    var chart1 = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: [
              <?php
                if (count($graph_cuisine)>0) {
                  foreach ($graph_cuisine as $data_cuisine) {
                    echo "'" .$data_cuisine['cuisine_name'] ."',";
                  }
                }
              ?>
            ],
            datasets: [{
                label: 'Popular Category',
                backgroundColor: [
                          "#4472c4",
                          "#ffc000",
                          "#a5a5a5",
                          "#ed7d31"],
                borderColor: 'white',
                data: [
                  <?php
                    if (count($graph_cuisine)>0) {
                       foreach ($graph_cuisine as $data_cuisine) {
                        echo $data_cuisine['maximum'] . ", ";
                      }
                    }
                  ?>
                ]
            }]
        },
    }); 
 
  </script>

  <script type="text/javascript">
    var ctx2 = document.getElementById('myChart_device').getContext('2d');
    var chart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: [
          <?php
            if (count($graph_device)>0) {
              foreach ($graph_device as $data_device) {
                echo "'" .$data_device['device'] ."',";
              }
            }
          ?>
        ],
        datasets: [{
            label: 'Popular Category',
            backgroundColor: [
                      "#4472c4",
                      "#ed7d31",
                      "#a5a5a5",
                      "#ed7d31"],
            borderColor: 'white',
            data: [
              <?php
                if (count($graph_device)>0) {
                   foreach ($graph_device as $data_device) {
                    echo $data_device['jum_device'] . ", ";
                  }
                }
              ?>
            ]
        }]
    },
  }); 
 
  </script>

<!-- CLOSE MAU MASAK -->


<!-- MAU MAKAN -->
<!-- ChartJS -->
  <script type="text/javascript">
    var ctx = document.getElementById('myChart_order').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order as $data) {
                    echo "'" .$data['grafik_order_bulan'] ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'All Order',
                backgroundColor: '#ffe6cd',
                borderColor: '#fbcfa3',
                data: [
                  <?php
                      foreach ($graph_order as $data) {
                    echo "'" .$data['grafik_order_jumlah'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>

  <!-- ChartJS -->
  <script type="text/javascript">
    var ctx = document.getElementById('myChart_order_finish').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_finish as $data) {
                    echo "'" .$data['grafik_order_bulan'] ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'Finished',
                backgroundColor: '#d5e8d4',
                borderColor: '#b1e9ae',
                data: [
                  <?php
                      foreach ($graph_order_finish as $data) {
                    echo "'" .$data['grafik_order_finish'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>

  <!-- ChartJS -->
  <script type="text/javascript">
    var ctx = document.getElementById('myChart_order_delivery').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_delivery as $data) {
                    echo "'" .$data['grafik_order_bulan'] ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'On Delivery',
                backgroundColor: '#d9e8fb',
                borderColor: '#bbd8fd',
                data: [
                  <?php
                      foreach ($graph_order_delivery as $data) {
                    echo "'" .$data['grafik_order_delivery'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>

  <!-- ChartJS -->
  <script type="text/javascript">
    var ctx = document.getElementById('myChart_order_process').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_process as $data) {
                    echo "'" .$data['grafik_order_bulan'] ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'On Process',
                backgroundColor: '#e6d0dd',
                borderColor: '#e5b0cf',
                data: [
                  <?php
                      foreach ($graph_order_process as $data) {
                    echo "'" .$data['grafik_order_proses'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>

  <!-- ChartJS -->
  <script type="text/javascript">
    var ctx = document.getElementById('myChart_order_new').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_new as $data) {
                    echo "'" .$data['grafik_order_bulan'] ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'New Order',
                backgroundColor: '#f5f5f5',
                borderColor: '#f6eaea',
                data: [
                  <?php
                      foreach ($graph_order_new as $data) {
                    echo "'" .$data['grafik_order_new'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>

  <!-- ChartJS -->
  <script type="text/javascript">
    var ctx = document.getElementById('myChart_order_cancel').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_cancel as $data) {
                    echo "'" .$data['grafik_order_bulan'] ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'User Growth',
                backgroundColor: '#f7cecc',
                borderColor: '#f7b9b6',
                data: [
                  <?php
                      foreach ($graph_order_cancel as $data) {
                    echo "'" .$data['grafik_order_cancel'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>
<!-- CLOSE MAU MAKAN -->

<!-- MPASI -->
<script type="text/javascript">
    var ctx1 = document.getElementById('myChart_category').getContext('2d');
    var chart1 = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: [
              <?php
                if (count($graph_mpasi)>0) {
                  foreach ($graph_mpasi as $data_category) {
                    echo "'" .$data_category['category_name'] ."',";
                  }
                }
              ?>
            ],
            datasets: [{
                label: 'Popular Category',
                backgroundColor: [
                          "#4472c4",
                          "#ffc000",
                          "#a5a5a5",
                          "#ed7d31"],
                borderColor: 'white',
                data: [
                  <?php
                    if (count($graph_mpasi)>0) {
                       foreach ($graph_mpasi as $data_category) {
                        echo $data_category['maximum'] . ", ";
                      }
                    }
                  ?>
                ]
            }]
        },
    }); 
 
  </script>

  <script type="text/javascript">
    var ctx = document.getElementById('myChart_ingredients_mpasi').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
              <?php
                  foreach ($graph_ing_mpasi as $dataMpasi_ing) {
                    echo "'" .ucfirst($dataMpasi_ing['grafik_mpasi']) ."',";
                  }
              ?>
            ],
            datasets: [{
                label: 'Ingredients',
                backgroundColor: '#4472c4',
                borderColor: '##93C3D2',
                data: [
                  <?php
                      foreach ($graph_ing_mpasi as $dataMpasi_ing) {
                    echo "'" .$dataMpasi_ing['grafik_mpasi_jum'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>
<!-- CLOSE MPASI -->