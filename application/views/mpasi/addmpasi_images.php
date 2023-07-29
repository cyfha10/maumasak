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

  /*..........*/
  .btn-custom2 { 
    color: #ffffff; 
    background-color: #eb6228; 
    border-color: #ea581b; 
  } 

  .card-header { 
    color: #ffffff; 
    background-color: #eb6228; 
    border-color: #ea581b; 
  } 

  .btn-custom2:hover, 
  .btn-custom2:focus, 
  .btn-custom2:active, 
  .btn-custom2.active, 
  .open .dropdown-toggle.btn-custom2 { 
    color: #ffffff; 
    background-color: #eb6228; 
    border-color: #E51DF0; 
  } 

  .btn-custom2:active, 
  .btn-custom2.active, 
  .open .dropdown-toggle.btn-custom2 { 
    background-image: none; 
  } 

  .btn-custom2.disabled, 
  .btn-custom2[disabled], 
  fieldset[disabled] .btn-custom2, 
  .btn-custom2.disabled:hover, 
  .btn-custom2[disabled]:hover, 
  fieldset[disabled] .btn-custom2:hover, 
  .btn-custom2.disabled:focus, 
  .btn-custom2[disabled]:focus, 
  fieldset[disabled] .btn-custom2:focus, 
  .btn-custom2.disabled:active, 
  .btn-custom2[disabled]:active, 
  fieldset[disabled] .btn-custom2:active, 
  .btn-custom2.disabled.active, 
  .btn-custom2[disabled].active, 
  fieldset[disabled] .btn-custom2.active { 
    background-color: #BD1B77; 
    border-color: #E51DF0; 
  } 

  .btn-custom2 .badge { 
    color: #BD1B77; 
    background-color: #ffffff; 
  }
</style>


<style type="text/css">
  .fileUpload1 {
    position: relative;
    overflow: hidden;
    margin: 10px;
  }
  .fileUpload1 input.upload1 {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    background-color: #eb6228;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Tambah Resep MPasi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Resep MPasi</h3>
            </div>
            <?php $mpasi_id = $this->uri->segment(3); ?>
            <form action="<?php echo base_url('mpasi/act_mpasi_images/'.$mpasi_id) ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body p-0">
              <div class="bs-stepper">
                
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  
                  <div class="step" data-target="#task-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="task-part" id="task-part-trigger">
                      <span class="bs-stepper-circle">5</span>
                      <span class="bs-stepper-label">Cover Image MPasi</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  
                  <div id="task-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-group">
                      <label for="exampleInputFile">File Image MPasi</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="cover_image" class="form-control" id="exampleInputFile" required>
                          <input type="hidden" name="customer_id" value="<?php echo $recipe->customer_id; ?>">
                          <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                        </div>
                        <!-- <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div> -->
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Catatan Tambahan</label>
                      <textarea class="form-control" name="catatan" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4" align="right">
                  
                  
                </div>
              </div>
                      
              
              </form>
            </div>
          </div>
          <!-- /.card -->
        </div>
              
      </div>
      <!-- <input type="submit" class="btn btn-primary">  -->
              
              
      <!-- /.row -->
    </div>

  </section>

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Token Field -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-tokenfield.js"></script>

  <script type="text/javascript">
      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })
    </script>
