
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Real Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  
                  <img class="profile-user-img img-fluid img-circle" src="https://filestocks.maumasak.id/customer/<?php echo $row->customer_id.'/'.$row->profile_image; ?>" width = "90%" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row->fullname; ?></h3>

                <p class="text-muted text-center"><?php echo $row->bio; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right"><?php echo $follower; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right"><?php echo $following; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Recipe</b> <a class="float-right"><?php echo $recipe_count; ?></a>
                  </li>
                  
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Bio</strong>

                <p class="text-muted">
                  <?php echo $row->bio; ?>
                </p>

                <hr>

                <strong><i class="fas fa-calendar"></i> Birthdate</strong>

                <p class="text-muted"><?php echo $row->birthdate; ?></p>

                <hr>

                <strong><i class="fas fa-phone"></i> Phone</strong>

                <p class="text-muted">
                  <?php echo $row->phone; ?>
                </p>

                <hr>

                <strong><i class="far fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?php echo $row->location; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Recipe</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Trycook</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <?php 
                    $i = 1;
                    foreach ($recipe_customer as $recipe) { ?>
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="https://filestocks.maumasak.id/customer/<?php echo $recipe['customer_id'].'/'.$recipe['profile_image']; ?>" width = "90%">
                        <span class="username">
                          <a href="#"><?php echo $recipe['title']; ?></a>
                        </span>
                        <span class="description"><?php echo $recipe['created_date']; ?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?php echo $recipe['about']; ?>
                      </p>
                    </div>
                    <!-- /.post -->
                  <?php } ?>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <?php 
                        $i = 1;
                        foreach ($recipe_trycook as $trycook) { ?>
                        <!-- Post -->
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="https://filestocks.maumasak.id/customer/<?php echo $trycook['customer_id'].'/'.$trycook['trycook_image']; ?>" width = "90%">
                            <span class="username">
                              <a href="#"><?php echo $trycook['description']; ?></a>
                            </span>
                            <span class="description"><?php echo $trycook['created_date']; ?></span>
                          </div>
                          <!-- /.user-block -->
                          
                        </div>
                        <!-- /.post -->
                      <?php } ?>
                  </div>
                  <!-- /.tab-pane -->

                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>