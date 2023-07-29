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
                        <div class="form-group">
                          <div class="input-group">
                            <button class="btn btn-custom">Tambah List Baru</button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="....">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="....">
                            </div>
                          </div>
                        </div>

                        <div id="field_wrapper">
                            <div class="form-group">
                              <input type="hidden" id="hidden_number" value="1">
                                 <input id="input_0" type = "text"  
                                       style = "border              : 5px #FFFFFF; 
                                                background-color    : #FFFFFF; 
                                                color               : #000000;
                                                text-transform      : uppercase;
                                                box-shadow          :-1px -1px 1px #888888;" name="action[]" class="form-control" placeholder="Pleace input your action">
                                <br>
                                
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <button class="btn btn-custom btn-block" onclick="add_button()">Tambah Ingridient Lainnya</button>
                          </div>
                        </div>

                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                      </div>
                      <div id="langkah-part" class="content" role="tabpanel" aria-labelledby="langkah-part-trigger">
                        <div class="form-group">
                          <label for="exampleInputFile">File Step Resep</label>
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

    myInput.oninput = function () {
    if (this.value.length > 2) {
        this.value = this.value.slice(0,2); 
    }
}
  </script>

<script type="text/javascript">

function add_button() {
  var hidden_number = document.getElementById("hidden_number");
  var new_input_number = parseInt(hidden_number.value)+1;

  var container_id = new_input_number;
  //var input_id = "form_input_"+new_input_number;




  var wrapper = document.getElementById("field_wrapper");
  // var fieldHTML = '<div class="form-group" id="'+container_id+'"><input type="text" name="action[]" style="text-transform      : uppercase;background-color : #FFFFFF; border : #FFFFFF; box-shadow          :-1px -1px 1px #888888;" class="form-control" placeholder="Pleace input your action"><a href="javascript:void(0);" id="remove_button" onclick="remove('+container_id+')"><i class = "fa fa-minus"></i></a></div>'; //New input field html 
  var fieldHTML = '<div class="row" id="'+container_id+'"><div class="col-sm-6"><div class="form-group"><input type="text" name="action[]" class="form-control" placeholder="..."></div></div><div class="col-sm-6"><div class="form-group"><input type="text" name="action2[]" class="form-control" placeholder="...."></div></div><a href="javascript:void(0);" id="remove_button" onclick="remove('+container_id+')"><i class = "fa fa-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

  wrapper.innerHTML += fieldHTML;
  document.getElementById("hidden_number").value = new_input_number;
}

function remove(input_id) {
  //Once remove button is clicked
  var elem = document.getElementById(input_id);
  elem.remove();
}



</script>