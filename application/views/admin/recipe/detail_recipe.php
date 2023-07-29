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
            <h1 class="m-0">Detail Resep</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="breadcrumb-item active">Detail Resep</li>
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
                    <a class="nav-link active" id="custom-tabs-two-creator-tab" data-toggle="pill" href="#custom-tabs-two-creator" role="tab" aria-controls="custom-tabs-two-creator" aria-selected="true"><font color="purple">Pembuat</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true"><font color="purple">Resep</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-ingridientz-tab" data-toggle="pill" href="#custom-tabs-two-ingridientz" role="tab" aria-controls="custom-tabs-two-ingridientz" aria-selected="true"><font color="purple">Ingridient</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-step-tab" data-toggle="pill" href="#custom-tabs-two-step" role="tab" aria-controls="custom-tabs-two-step" aria-selected="true"><font color="purple">Step</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-tagindex-tab" data-toggle="pill" href="#custom-tabs-two-tagindex" role="tab" aria-controls="custom-tabs-two-tagindex" aria-selected="true"><font color="purple">Tag & Indexing</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-trycook-tab" data-toggle="pill" href="#custom-tabs-two-trycook" role="tab" aria-controls="custom-tabs-two-trycook" aria-selected="false"><font color="purple">Trycook</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false"><font color="purple">Komentar</font></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false"><font color="purple">Rating</font></a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-two-creator" role="tabpanel" aria-labelledby="custom-tabs-two-creator-tab">
                     <!-- INI DETAIL RESEP -->
                        <div class="card-body">
                          <?php $recipe_id = $row->recipe_id; ?>
                          <?php $customer_id = $row->customer_id; ?>

                          <div class="row">
                            <div class="col-md-6">
                              <!-- textarea -->
                              <?php
                                $root_path = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))).DIRECTORY_SEPARATOR;
                                $target_path = $root_path."filestocks/customer/".$row->customer_id.'/'.$row->profile_image;
                              ?>
                              <?php if (file_exists($target_path)) { ?>
                                <img src="https://filestocks.maumasak.id/customer/<?php echo $row->customer_id.'/'.$row->profile_image; ?>" width = "90%">
                              <?php } else {?>
                                  <img src="<?php echo base_url('assets/img/no_image.jpg'); ?>" width = "90%">
                              <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <label>Nama</label> 
                                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->fullname; ?>" readonly required>
                                <label>Email</label> 
                                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->email; ?>" readonly required>
                                  <label for="nama">Tanggal Lahir</label>
                                  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->birthdate; ?>" readonly required>

                                  <label for="nama">Jenis Kelamin</label>
                                  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->gender; ?>" readonly required>

                                  <label for="nama">Lokasi</label>
                                  <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $row->location; ?>" readonly required>

                                  <label for="nama">Tanggal Register</label>
                                  <input type="text" name="nama" class="form-control" id="nama"  value="<?php echo $row->register_date; ?>" readonly required>
                              </div>
                            </div>
                          </div>





                        <!-- /.card-body -->

                        
                     <!-- CLOSE DETAIL RESEP -->
                  </div>

                  <div class="tab-pane fade show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     <!-- INI DETAIL RESEP -->
                        <div class="card-body">
                          <?php $recipe_id = $row->recipe_id; ?>
                          <?php $customer_id = $row->customer_id; ?>
                          
                          <div class="form-group">
                            <label for="nama">Cover Resep</label>
                            <br>
                            <img src="https://filestocks.maumasak.id/recipes/<?php echo $row->customer_id.'/'.$row->cover_image; ?>" width = "20%">
                            <br>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#editcover"><i class="fa fa-edit"></i>Edit Cover</button>
                          </div>
                          <div class="form-group">
                            <label for="nama">Nama Resep</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Recipe" value="<?php echo $row->title; ?>" readonly required>
                          </div>
                          
                          <div class="form-group">
                            <label for="nama">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" readonly><?php echo $row->about; ?></textarea>
                          </div>

                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Porsi</label>
                                <input type="text" class="form-control" value="<?php echo $row->portion; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Waktu Persiapan</label>
                                <input type="text" class="form-control" value="<?php echo $row->preparation_time; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- textarea -->
                              <div class="form-group">
                                <label>Inactive Time</label>
                                <input type="text" class="form-control" value="<?php echo $row->inactive_time; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Waktu Memasak</label>
                                <input type="text" class="form-control" value="<?php echo $row->cooking_time; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- textarea -->
                              <div class="form-group">
                                <label>Level Kesulitan</label>
                                <input type="text" class="form-control" value="<?php echo $row->difficulties; ?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Cuisine</label>
                                
                                <input type="text" class="form-control" value="<?php echo $row->cuisine_name; ?>" readonly>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            
                            

                          </div>
                        </div>

                        <!-- /.card-body -->

                        
                     <!-- CLOSE DETAIL RESEP -->
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-two-ingridientz" role="tabpanel" aria-labelledby="custom-tabs-two-ingridientz-tab">
                     <!-- INI DETAIL RESEP -->
                        <div class="card-body">
                          

                          <div class="row">
                            
                            <?php
                              $ingridients = $row->ingredients;
                              //mengubah standar encoding
                              $content=utf8_encode($ingridients);
                              //mengubah data json menjadi data array asosiatif
                              $result=json_decode($content,true);
                              //looping data menggunakan foreach
                              foreach ($result as $key => $value) 
                                {
                              ?>
                                  <div class="col-sm-12 ">
                                    <div class="form-group">
                                      <label><?php echo $value['title_item']; ?></label>
                                    </div>
                                  </div>
                                <?php
                                  foreach ($value['items'] as $items) 
                                  {
                                ?> 
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" value="<?php echo $items['title']; ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <input type="text" class="form-control" value="<?php echo $items['desc']; ?>" readonly>
                                      </div>
                                    </div>
                                <?php 
                                  } // foreach ($value['items'] as $items) 
                                } // foreach ($result as $key => $value)
                             ?>
                            
                          </div>
                        </div>

                        <!-- /.card-body -->

                        
                     <!-- CLOSE DETAIL RESEP -->
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-two-step" role="tabpanel" aria-labelledby="custom-tabs-two-step-tab">
                     <!-- INI DETAIL RESEP -->
                        <div class="card-body">
                          
                          <?php $customer_id = $row->customer_id; ?>
                          

                          <div class="row">
                            <?php 
                              $steps = $row->steps;

                              //mengubah standar encoding
                              $content_step=utf8_encode($steps);

                              //mengubah data json menjadi data array asosiatif
                              $result=json_decode($content_step,true);

                              $id = $this->uri->segment(3);
                              $m = 1;
                              foreach ($result as $valuezz) {

                                 foreach ($valuezz as $itemzzzz) {
                                  if ($itemzzzz['image'] != '') {
                                    
                            ?>
                                  <div class="col-md-12">
                                    <?php echo "<label>Step : $m</label>"; ?>
                                  </div>

                                  <div class="col-md-12">
                                    <img src="http://filestocks.maumasak.id/recipes/<?php echo $customer_id.'/'.$itemzzzz['image']; ?>" width = "20%">
                                  </div>
                                  <div class="col-md-12">
                                    &nbsp;
                                  </div>
                            <?php } else {  ?>
                                    <div class="col-md-12">
                                      <?php echo "<label>Step : $m</label>"; ?>
                                    </div>
                            <?php } ?>
                                  <br>
                                  <div class="col-md-12">
                                    <textarea class="form-control" rows="4" readonly><?php echo $itemzzzz['remark']; ?></textarea>
                                  </div>
                            <?php $m++;}  } ?>

                          </div>

                            
                        </div>

                        <!-- /.card-body -->

                        
                     <!-- CLOSE DETAIL RESEP -->
                  </div>
                  
                  <div class="tab-pane fade show" id="custom-tabs-two-tagindex" role="tabpanel" aria-labelledby="custom-tabs-two-tagindex-tab">
                     <!-- INI DETAIL RESEP -->
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nama">Indexing</label>
                            <br>
                            <input type="text" class="form-control" value="<?php echo $row->indexing; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="nama">Recipe Tag</label>
                            <br>
                            <?php foreach ($reseptag as $tag): ?>
                            <?php echo $tag['tag_name'].'<br>'; ?>
                            <?php endforeach ?>
                            
                          </div>
                        </div>
                        <!-- /.card-body -->
                     <!-- CLOSE DETAIL RESEP -->
                  </div>
                                    
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                    <!-- Komen -->
                      <div class="card-body">
                        
                          <div class="timeline">
                            <!-- timeline item -->
                            <?php $i = 1; foreach ($row_comment as $comment) {?>
                            <div>
                              <i class="fas fa-comments bg-yellow"></i>
                              <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> <?php echo $comment['comment_date']; ?></span>
                                <h3 class="timeline-header" style="background-color: #eb6228;">
                                  <a href="#"><font color="white"><?php echo $comment['fullname']; ?></font></a>
                                </h3>

                                <div class="timeline-body">
                                  <?php echo base64_decode($comment['comment']); ?>
                                </div>
                                <div class="timeline-body">
                                  <a href="<?php echo base_url('admin/deletecomment/').$comment['recipe_comment_id']; ?>"> 
                                      <button class="btn btn-custom btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                  </a>
                                </div>
                                  

                                <div class="timeline-footer">
                                  
                                </div>
                                <?php
                                      $resep_id = $row->recipe_id;
                                      $comment_id = $comment['recipe_comment_id'];

                                      $query = $this->db->query("SELECT * FROM m_recipe_comment INNER JOIN m_customer ON m_recipe_comment.customer_id = m_customer.customer_id WHERE recipe_id = $resep_id AND parent_comment_id = '$comment_id'");
                                      $data = $query->result();
                                      foreach ($data as $utama){
                                  ?>
                                      <div class="timeline">
                                        <!-- timeline item -->
                                        <div>
                                          <i class="fas fa-comments bg-yellow"></i>
                                          <div class="timeline-item">
                                              <span class="time"><i class="fas fa-clock"></i> <?php echo $utama->comment_date; ?></span>
                                              <h3 class="timeline-header" style="background-color: #eb6228;">
                                                  <a href="#"><font color="white"><?php echo $utama->fullname; ?></font></a></h3>

                                              <div class="timeline-body">
                                                <?php echo base64_decode($utama->comment); ?>
                                              </div>

                                              <div class="timeline-footer">
                                                <a href="<?php echo base_url('admin/deletecomment/').$utama->recipe_comment_id; ?>"> 
                                                    <button class="btn btn-custom btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                          <div>
                                            <i class="fas fa-clock bg-gray"></i>
                                          </div>
                                    </div>

                                  <?php
                                      }
                                  ?>
                              </div>

                              <!-- komentar -->
                              
                            </div>
                            <!-- END timeline item -->
                            <?php $i++; }?>  
                            <div>
                              <i class="fas fa-clock bg-gray"></i>
                            </div>
                          </div> 
                            
                        </div>
                        <!-- /.card-body -->

                    <!-- Close Komen -->
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-two-trycook" role="tabpanel" aria-labelledby="custom-tabs-two-trycook-tab">
                    <!-- Komen -->
                      <div class="card-body">
                        
                          <div class="timeline">
                            <!-- timeline item -->
                            <?php $i = 1; foreach ($row_trycook as $trycook) {?>
                              <div>
                                <i class="fas fa-flag bg-grey"></i>
                                <div class="timeline-item">
                                  <span class="time"><i class="fas fa-clock"></i> <font color="white"><?php echo $trycook['created_date']; ?></font></span>
                                  <h3 class="timeline-header" style="background-color: #eb6228;">
                                    <a href="#"><font color="white"><?php echo $trycook['description']; ?></font></a>
                                  </h3>
                                  
                                  <div class="timeline-body">
                                    <img src="http://filestocks.maumasak.id/recipes/trycook/<?php echo $trycook['customer_id'].'/'.$trycook['trycook_image']; ?>" width = "20%">
                                  </div>
                                  <div class="timeline-body">
                                    <a href="<?php echo base_url('admin/delete_trycook/').$trycook['trycook_id']; ?>"> 
                                        <button class="btn btn-custom btn-sm"><i class="fa fa-trash"></i> Hapus Trycook</button>
                                    </a>
                                  </div>
                                  <div class="timeline-footer">
                                  <?php
                                      $trycook_id = $trycook['trycook_id'];
                                      $query_trycomment = $this->db->query("SELECT * FROM m_trycook_comment INNER JOIN m_customer ON m_trycook_comment.customer_id = m_customer.customer_id WHERE m_trycook_comment.trycook_id = $trycook_id");
                                      $data_trycomment = $query_trycomment->result();
                                  ?>
                                  <?php
                                      foreach ($data_trycomment as $comment_try){
                                  ?>
                                      <div class="timeline">
                                        <!-- timeline item -->
                                        <div>
                                          <i class="fas fa-comments bg-yellow"></i>
                                          <div class="timeline-item">
                                              <span class="time"><i class="fas fa-clock"></i> <?php echo $comment_try->comment_date; ?></span>
                                              <h3 class="timeline-header" style="background-color: #eb6228;">
                                                  <a href="#"><font color="white"><?php echo $comment_try->fullname; ?></font></a></h3>

                                              <div class="timeline-body">
                                                <?php echo base64_decode($comment_try->comment); ?>
                                              </div>

                                              <div class="timeline-footer">
                                                <a href="<?php echo base_url('admin/deletetry_comment/').$comment_try->trycook_comment_id; ?>"> 
                                                    <button class="btn btn-custom btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                                </a>
                                              </div>
                                          </div>
                                        </div>
                                        <div>
                                          <i class="fas fa-clock bg-gray"></i>
                                        </div>
                                      </div>
                                          <?php
                                      }
                                  ?>
                                  </div>
                              </div>
                            </div>

                                <!-- komentar -->
                                
                              <!-- END timeline item -->
                              <?php $i++; }?>  
                              <div>
                                <i class="fas fa-clock bg-gray"></i>
                              </div>
                          </div> 
                            
                        </div>
                        <!-- /.card-body -->

                    <!-- Close Komen -->
                  </div>

                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                        <!-- RATING -->
                          <div class="card-body">
                        
                            <div class="timeline">
                              <!-- timeline item -->
                              <?php $i = 1; foreach ($row_rating as $rating) {?>
                              <div>
                                <i class="fas fa-star bg-grey"></i>
                                <div class="timeline-item">
                                  <span class="time"><i class="fas fa-clock"></i> <?php echo $rating['rating_date']; ?></span>
                                  <h3 class="timeline-header" style="background-color: #eb6228;">
                                    <a href="#"><font color="white"><?php echo $rating['fullname']; ?></font></a>
                                  </h3>

                                  <div class="timeline-body">
                                    <?php $ratings = $rating['rating']; ?>
                                    <?php for ($i=0; $i < $ratings ; $i++) { ?>
                                        <img src="<?php echo base_url('assets/img/rating.png') ?>" width = "3%">
                                    <?php } ?>
                                    
                                  </div>
                                  <div class="timeline-body">
                                    <?php echo base64_decode($rating['comment']); ?>
                                  </div>
                                  <div class="timeline-body">
                                    <a href="<?php echo base_url('admin/deleterating/').$rating['recipe_rating_id']; ?>"> 
                                        <button class="btn btn-custom btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                    </a>
                                  </div>
                                  
                                    

                                  <div class="timeline-footer">
                                    
                                  </div>
                                  
                                </div>

                                <!-- komentar -->
                                
                              </div>
                              <!-- END timeline item -->
                              <?php $i++; }?>  
                              <div>
                                <i class="fas fa-clock bg-gray"></i>
                              </div>
                            </div> 
                              
                          </div>
                          <!-- /.card-body -->
                          
                        <!-- Close Rating -->
                  </div>
                  <a href="<?php echo base_url('admin/listrecipe') ?>">
                        <button type="button" class="btn btn-custom">Kembali</button>
                    </a>
                  <?php 
                    $status_resep = $row->recipe_status_id;
                    if ($status_resep == 5) {
                  ?>
                      <a href="<?php echo base_url('admin/approval/approved/'.$row->customer_id.'/'.$row->recipe_id) ?>">
                          <button type="button" class="btn btn-success"><i class="fa fa-check"> </i> Approved</button>
                      </a>
                      <!-- <a href="<?php echo base_url('admin/approval/revision/'.$row->recipe_id) ?>"> -->
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#revision<?php echo $row->recipe_id; ?>"><i class="fa fa-random"> </i> Need Revision</button>
                      <!-- </a> -->
                      <a href="<?php echo base_url('admin/approval/rejected/'.$row->customer_id.'/'.$row->recipe_id) ?>">
                          <button type="button" class="btn btn-danger"><i class="fa fa-ban"> </i> Rejected</button>
                      </a>
                  <?php } ?>
                    
                </div>
                
              </div>

            </div>
            <!-- /.card -->


    </section>
<!-- Modal -->
    <div class="modal fade" id="revision<?php echo $row->recipe_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Silahkan isi catatan revisi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo base_url('admin/approval/revision/'.$row->customer_id.'/'.$row->recipe_id) ?>">
              <div class="modal-body">
                
                    <input type="text" name="catatan" class="form-control" placeholder="Masukkan catatan revisinya..">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
      <div class="modal fade" id="editcover" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <label>Edit Cover</label>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('admin/updatecover/'.$recipe_id) ?>" method="POST" enctype="multipart/form-data">
              <img src="https://filestocks.maumasak.id/recipes/<?php echo $row->customer_id.'/'.$row->cover_image; ?>" width = "50%">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="cover_image" class="form-control" id="exampleInputFile" required>
                  <input type="hidden" name="customer_id" value="<?php echo $row->customer_id; ?>">
                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                </div>
                <!-- <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div> -->
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-custom">Update Cover Image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      
    </div>