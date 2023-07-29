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
              <li class="breadcrumb-item active">Add Resep</li>
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
                  <h3 class="card-title">Form Add Resep</h3>
                </div>
                <div class="card-body p-0">
                  <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                      <!-- your steps here -->
                      <div class="step" data-target="#addresep-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="addresep-part" id="addresep-part-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">Add Resep</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#porsi-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="porsi-part" id="porsi-part-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">Porsi & Waktu Masak</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#ingridient-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="ingridient-part" id="information-part-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">Ingridient</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#langkah-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="langkah-part" id="information-part-trigger">
                          <span class="bs-stepper-circle">4</span>
                          <span class="bs-stepper-label">Step Resep</span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#task-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="task-part" id="task-part-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">Cover Image</span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <!-- your steps content here -->
                      <div id="addresep-part" class="content" role="tabpanel" aria-labelledby="addresep-part-trigger">
                        <div class="form-group">
                          <label for="nama">Nama Resep</label>
                          <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Recipe" required>
                        </div>
                        
                        <div class="form-group">
                          <label for="nama">Deskripsi</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                        </div>

                        <div class="form-group">
                          <label for="nama">Hidangan</label>
                          <select name="cuisine" id="cuisine" class="form-control" required>
                              <option value=""><i>- Pilih Hidangan -</i></option>
                              <?php
                              if($datacuisine){
                                  foreach($datacuisine as $cuisine){
                                      ?>
                                      <option value="<?php echo $cuisine['cuisine_id'];?>"><?php echo $cuisine['cuisine_name']; ?></option>
                              <?php
                                  }
                              }
                              ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="nama">Kategori Hidangan</label>
                          <select name="kategori" id="kategori" class="form-control" required>
                              <option value=""><i>- Pilih Kategori Hidangan -</i></option>
                              <?php
                              if($datacategory){
                                  foreach($datacategory as $kategori){
                                      ?>
                                      <option value="<?php echo $kategori['category_id'];?>"><?php echo $kategori['category_name']; ?></option>
                              <?php
                                  }
                              }
                              ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="nama">Set Menu</label>
                          <select name="setmenu" id="setmenu" class="form-control">
                              <option value=""><i>- Pilih Set Menu -</i></option>
                              <?php
                              if($datasetmenu){
                                  foreach($datasetmenu as $setmenu){
                                      ?>
                                      <option value="<?php echo $setmenu['set_menu_id'];?>"><?php echo $setmenu['set_menu']; ?></option>
                              <?php
                                  }
                              }
                              ?>
                          </select>
                        </div>
                        

                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div id="porsi-part" class="content" role="tabpanel" aria-labelledby="porsi-part-trigger">
                        <div class="form-group">
                          <label for="nama">Porsi</label>
                          <input type="text" name="porsi" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="nama">Waktu Memasak</label>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Persiapan Bahan</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="number" min="1" max="60" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Dalam Menit....">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Persiapan Bumbu</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="number" min="1" max="60" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Dalam Menit....">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Memasak</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="number" min="1" max="60" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Dalam Menit....">
                            </div>
                          </div>
                        </div>

                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div id="ingridient-part" class="content" role="tabpanel" aria-labelledby="ingridient-part-trigger">
                        <br>
                        <div class="form-group field_wrapper1">
                          <div class="input-group">
                            <a href="javascript:void(0);" class="addform" title="Add field">
                              <button class="btn btn-custom">Tambah List Baru</button>
                            </a>
                          </div>
                        </div>
                        <div class="field_wrapper">
                            <div class="row">
                              <div class="col-sm-5">
                                <!-- text input -->
                                <div class="form-group">
                                  <input type="text" class="form-control" value="Ingridient" readonly>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                
                              </div>
                              <div class="col-sm-2">
                                <div class="form-group">

                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="field_wrapper">
                            <div class="row">
                              <div class="col-sm-5">
                                <!-- text input -->
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="....">
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="....">
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="form-group">

                                </div>
                              </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <a href="javascript:void(0);" class="add_button" title="Add field">
                                <button class="btn btn-custom2 btn-block" style="background-color: #ffffff; color: #eb6228">Tambah Ingridient Lainnya</button>
                            </a>
                        </div>

                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div id="langkah-part" class="content" role="tabpanel" aria-labelledby="langkah-part-trigger">
                        <div class="form-group">
                          <label for="exampleInputFile">File Step Resep</label>
                                <br>
                                    <input type="file" name="myPhoto1" class="btn btn-custom"required/>
                                    Pilih Foto Max 2 MB                                
                                <br>
                                <div class="col-md-6">
                                    <a href="#" onclick="PreviewImage1();" id="add"><button type="button" class="btn btn-primary btn-block btn-flat">Upload</button></a>
                                </div>
                        </div>
                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div id="task-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div class="form-group">
                          <label for="exampleInputFile">Files</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                          </div>
                        </div>
                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
      </div>
    </section>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <script type="text/javascript">
      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })
    </script>

    <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }

  </script>


<!-- JQUERY ADD RECIPE -->
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10000; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row"><div class="col-sm-5"><div class="form-group"><input type="text" class="form-control" name ="isi[]" placeholder="...."></div></div><div class="col-sm-5"><div class="form-group"><input type="text" class="form-control" name = "dataisi[]" placeholder="...."></div></div><a href="javascript:void(0);" class="remove_button"><i class = "fa fa-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$(document).ready(function(){
    var maxjum = 10000; //Input fields increment limitation
    var addform = $('.addform'); //Add button selector
    var wrapp = $('.field_wrapper1'); //Input field wrapper
    var fieldHTMLs = '<br><div class="ingridients"><div class="row"><div class="col-sm-5"><div class="form-group"><input type="text" name = "text1[]" class="form-control" placeholder="Contoh : Tepung Krispi"></div></div><div class="col-sm-5"><div class="form-group"><button class = "btn btn-custom"><i class = "fa fa-minus"></i> Delete</button></div></div></div></div><div class="field_wrapper"><div class="row"><div class="col-sm-5"><div class="form-group"><input type="text" name = "text1[]" class="form-control" placeholder="ss1"></div></div><div class="col-sm-5"><div class="form-group"><input type="text" name = "text2[]" class="form-control" placeholder="ss2"></div></div><div class="col-sm-2"><div class="form-group"></div></div></div></div><div class="form-group"><a href="javascript:void(0);" class="add_button2" title="Add field"><button class="btn btn-custom btn-block">Tambah Ingridient Lainnya</button></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addform).click(function(){
        //Check maximum number of input fields
        if(x < maxjum){ 
            x++; //Increment field counter
            $(wrapp).append(fieldHTMLs); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapp).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

// CLOSE ADD RECIPE

</script>
