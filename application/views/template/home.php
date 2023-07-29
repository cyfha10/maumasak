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
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-mpasi_sale-tab" data-toggle="pill" href="#custom-tabs-two-mpasi_sale" role="tab" aria-controls="custom-tabs-two-mpasi_sale" aria-selected="false"><font color="black">Mpasi Sale</font></a>
                  </li>

                </ul>
              </div>

              <?php
                $presisi = 0;
                $presisi1 = 0;
                $presisi2 = 0;
                $presisi3 = 0;
                $presisi4 = 0;
                $presisi5 = 1;
                $presisi6 = 1;
                $presisi7 = 1;

                $presisi_ff = 0;
                $presisi_gg = 0;
                $presisi_hh = 0;
                $presisi_ii = 0;

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

              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <!-- MAU MASAK -->
                  <div class="tab-pane fade show active" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                    <?php include "dashboard/dashboard_recipe_reguler.php"; ?>
                  </div>
                  <!-- CLOSE MAU MASAK -->

                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                    <?php include "dashboard/dashboard_recipe_sale.php"; ?>
                  </div>

                        <!-- CLOSE RECIPE SALE -->

                  <div class="tab-pane fade" id="custom-tabs-two-mpasi" role="tabpanel" aria-labelledby="custom-tabs-two-mpasi-tab">
                    <?php include "dashboard/dashboard_recipe_mpasi.php"; ?>
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-two-mpasi_sale" role="tabpanel" aria-labelledby="custom-tabs-two-mpasi_sale-tab">
                    <?php include "dashboard/dashboard_mpasi_sale.php"; ?>
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
                          "#11B6E3",
                          "#e33e11",
                          "#8E8E8E",
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
                backgroundColor: '#11B6E3',
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


  <!-- MAU MAKAN MPASI -->
<!-- ChartJS -->
  <script type="text/javascript">
    var ctx = document.getElementById('myChart_order_mpasi').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_mpasi as $data) {
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
                      foreach ($graph_order_mpasi as $data) {
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
    var ctx = document.getElementById('myChart_order_finish_mpasi').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_finish_mpasi as $data) {
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
                      foreach ($graph_order_finish_mpasi as $data) {
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
    var ctx = document.getElementById('myChart_order_delivery_mpasi').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_delivery_mpasi as $data) {
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
                      foreach ($graph_order_delivery_mpasi as $data) {
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
    var ctx = document.getElementById('myChart_order_process_mpasi').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_process_mpasi as $data) {
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
                      foreach ($graph_order_process_mpasi as $data) {
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
    var ctx = document.getElementById('myChart_order_new_mpasi').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_new_mpasi as $data) {
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
                      foreach ($graph_order_new_mpasi as $data) {
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
    var ctx = document.getElementById('myChart_order_cancel_mpasi').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
              <?php
                  foreach ($graph_order_cancel_mpasi as $data) {
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
                      foreach ($graph_order_cancel_mpasi as $data) {
                    echo "'" .$data['grafik_order_cancel'] ."',";
                      }
                  ?>
                ]
            }]
        },
    });
 
  </script>
<!-- CLOSE MAU MAKAN MPASI -->
<!-- CLOSE MPASI -->