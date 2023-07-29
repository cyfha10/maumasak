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
            <li class="breadcrumb-item active">Tambah Resep</li>
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
              <h3 class="card-title">Form Tambah Resep</h3>
            </div>
            <!--  -->
            <form action="<?php echo base_url('mpasi/updatempasi/') ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body p-0">
                <div class="bs-stepper">

                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#addresep-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="addresep-part" id="addresep-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Data Resep</span>
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
                    <div class="step">
                      <button type="button" class="step-trigger" role="tab" aria-controls="task-part" id="task-part-trigger">
                        <span class="bs-stepper-circle">5</span>
                        <span class="bs-stepper-label">Cover Image</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="addresep-part" class="content" role="tabpanel" aria-labelledby="addresep-part-trigger">
                      <div class="form-group">
                        <label for="nama">Customer</label>
                        <input type="text" name="customer" class="form-control" id="nama" value="<?php echo $customer->fullname; ?>" readonly>
                        <input type="hidden" name="customer_id" value="<?php echo $customer->customer_id; ?>">
                        <input type="hidden" name="mpasi_id" value="<?php echo $recipes->mpasi_id; ?>">
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Resep</label>
                        <input type="text" value="<?php echo $recipes->title ?>" name="nama_resep" class="form-control" id="nama" placeholder="Masukkan Nama Recipe" maxlength="50" required>
                      </div>

                      <div class="form-group">
                        <label for="nama">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsiresep" rows="8" maxlength="4000"><?php echo $recipes->about ?></textarea>
                      </div>

                      <div class="form-group">
                        <label for="nama">Kategori Hidangan</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                          <option value=""><i>- Pilih Kategori Hidangan -</i></option>
                          <?php
                          if($datacategory){
                            foreach($datacategory as $kategori){
                              ?>
                              <option <?php echo $recipes->category_mpasi_id==$kategori['category_mpasi_id']?'selected':'' ?> value="<?php echo $kategori['category_mpasi_id'];?>"><?php echo $kategori['category_name']; ?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="nama">Status</label>
                        <select name="recipe_status" id="recipe_status" class="form-control" required>
                          <option value=""><i>- Pilih Status -</i></option>
                          <?php
                          if($datarecipestatus){
                            foreach($datarecipestatus as $statuss){
                              ?>
                              <option <?php echo $recipes->recipe_status_id==$statuss['recipe_status_id']?'selected':'' ?> value="<?php echo $statuss['recipe_status_id'];?>"><?php echo $statuss['recipe_status']; ?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next <i class="fa fa-angle-double-right"></i></button>
                    </div>
                    <div id="porsi-part" class="content" role="tabpanel" aria-labelledby="porsi-part-trigger">
                      <div class="form-group">
                        <label for="nama">Porsi</label>
                        <input type="text" value="<?php echo $recipes->portion ?>" name="porsi" class="form-control">
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
                            <input type="number" value="<?php echo $recipes->preparation_time ?>" name="waktupersiapanbahan" min="1" max="60" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Dalam Menit....">
                          </div>
                        </div>
                      </div>

                      <!-- <div class="row"> -->
                        <!-- <div class="col-sm-6"> -->
                          <!-- text input -->
                          <!-- <div class="form-group">
                            <label>Persiapan Bumbu</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="number" value="<?php echo $recipes->inactive_time ?>" name="waktupersiapanbumbu" min="0" max="60" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Dalam Menit....">
                          </div>
                        </div>
                      </div> -->

                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Memasak</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="number"  value="<?php echo $recipes->cooking_time ?>"name="waktupersiapanmasak" min="1" max="60" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Dalam Menit....">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Kesulitan</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="radio" <?php echo $recipes->difficulties=='MUDAH'?'checked':'' ?> name="difficult" value="MUDAH" required> MUDAH
                            <input type="radio" <?php echo $recipes->difficulties=='SEDANG'?'checked':'' ?> name="difficult" value="SEDANG"> SEDANG
                            <input type="radio" <?php echo $recipes->difficulties=='SULIT'?'checked':'' ?> name="difficult" value="SULIT"> SULIT
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()"> <i class="fa fa-angle-double-left"></i> Previous</button> 
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next <i class="fa fa-angle-double-right"></i></button>

                    </div>
                    <div id="ingridient-part" class="content" role="tabpanel" aria-labelledby="ingridient-part-trigger">
                      <br>
                      <div class="form-group">
                        <div class="input-group">
                          <a href="javascript:void(0);" class="addform" title="Add field">
                            <button type="button"  class="btn btn-custom">Tambah List Baru</button>
                          </a>
                        </div>
                      </div>
                      <div class="field_wrapper1">
                        <div id="ingredients1">

                          <input type="hidden" name="i[]" value="1">
                          <div class="field_wrapper">
                            <div class="row">
                              <div class="col-sm-5">
                                <!-- text input -->
                                <div class="form-group">
                                  <input type="text" class="form-control" value="ingredients" name="headtitle1" readonly>
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
                          <div class="field_wrapper" id="fieldWrapper1">
                            <div class="row">
                              <div class="col-sm-5">
                                <!-- text input -->
                                <div class="form-group">
                                  <input type="text" class="form-control" name="title11[]" placeholder="...." maxlength="45">
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="desc11[]" placeholder="...." maxlength="10">
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="form-group">

                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <button type="button" class="btn btn-custom2 btn-block" onclick="addField(1)" style="background-color: #ffffff; color: #eb6228">Tambah Ingridient Lainnya</button>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()"> <i class="fa fa-angle-double-left"></i> Previous</button> 
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next <i class="fa fa-angle-double-right"></i></button>

                    </div>

                    
                    <div id="langkah-part" class="content" role="tabpanel" aria-labelledby="langkah-part-trigger">
                      <div id="fieldWrapperz">
                        <div class="field_wrapperz">
                          <div class="form-group">
                            <label>File Step Resep</label>

                            <input type="file" name="userfile[]" class="form-control" id="exampleInputFile">

                          </div>
                          <div class="form-group">                                
                            <textarea class="form-control" name="deskripsistep[]"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="button"  class="btn btn-custom2 btn-block" onclick="addField_step()" style="background-color: #ffffff; color: #eb6228">Tambah Step Lainnya</button>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-md-4">
                          <button type="button" class="btn btn-primary" onclick="stepper.previous()"> <i class="fa fa-angle-double-left"></i> Previous</button> 
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4" align="right">
                          <a href="<?php echo base_url('mpasi/listmpasi') ?>">
                            <button type="button" class="btn btn-danger"><i class="fa fa-time"></i> Batal</button>
                          </a>
                          <!-- <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button> -->
                          <input type="submit" name="" class="btn btn-success" value="Ubah Data"><!-- <i class="fa fa-check"></i> --> 
                        </div>
                      </div>
                    </div>

                    <div id="task-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputFile">Files</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <!-- <input type="file" name="cover_image" class="form-control" id="exampleInputFile" required> -->
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
                    
                  </div>
                </div>
              </div>
            </div>
          </form>  
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">

            </div>



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
    var x = 1; //Initial field counter is 1
    
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
      e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
      });
  });

      function removeIngridient(x) {
        $('#ingridients'+x).remove();
      }

      function addField(x='') {
        var wrapper = $('#fieldWrapper'+x); 

        if (x!='') {
          var fieldHTML = '<div class="row"><div class="col-sm-5"><div class="form-group"><input type="text" class="form-control" name ="title1'+x+'[]" placeholder="...." maxlength="45"></div></div><div class="col-sm-5"><div class="form-group"><input type="text" class="form-control" name = "desc1'+x+'[]" placeholder="...." maxlength="10"></div></div><a href="javascript:void(0);" class="remove_button"><button type = "button" class = "btn btn-custom"><i class = "fa fa-minus"></i></button></a></div>';
        }
        var x = 1; 
        $(wrapper).append(fieldHTML);
        x++; 
      }
      function editIngredients() {
        let data = '<?= $recipes->ingredients ?>'
        let item = JSON.parse(data)
        var wrapp = $('.field_wrapper1');
        var fieldHTMLs = '';
        let x = 1;
        let readonly = ''
        for (var i = 0; i <(item.length); i++) {
          x++;
          let items = item[i].items;
          if (i==0) {
            readonly = "readonly";
          } else {
            readonly = '';
          }

          fieldHTMLs += '<div  id="ingridients'+x+'">'
          fieldHTMLs += '  <input type="hidden" name="i[]" value="'+x+'"><br>'
          fieldHTMLs += '  <div class="ingredients">'
          fieldHTMLs += '    <div class="row">'
          fieldHTMLs += '      <div class="col-sm-5">'
          fieldHTMLs += '        <div class="form-group">'
          fieldHTMLs += '          <input type="text" name = "headtitle'+x+'" '+readonly+' class="form-control" value="'+item[i].title_item+'">'
          fieldHTMLs += '        </div>'
          fieldHTMLs += '      </div>'
          fieldHTMLs += '      <div class="col-sm-5">'
          fieldHTMLs += '        <div class="form-group">'
          if (i!==0) {

            fieldHTMLs += '          <button class = "btn btn-custom" onclick="removeIngridient('+x+')"><i class = "fa fa-minus"></i> Delete</button>'
          }
          fieldHTMLs += '        </div>'
          fieldHTMLs += '      </div>'
          fieldHTMLs += '    </div>'
          fieldHTMLs += '  </div>'
          fieldHTMLs += '  <div class="field_wrapper" id="fieldWrapper'+x+'">'
          for (var j = 0; j <(items.length); j++) {

            fieldHTMLs += '    <div class="row"> '
            fieldHTMLs += '      <div class="col-sm-5"> '
            fieldHTMLs += '        <div class="form-group"> '
            fieldHTMLs += '          <input type="text" class="form-control" name ="title1'+x+'[]" value="'+items[j].title+'"> '
            fieldHTMLs += '        </div> '
            fieldHTMLs += '      </div> '
            fieldHTMLs += '      <div class="col-sm-5"> '
            fieldHTMLs += '        <div class="form-group"> '
            fieldHTMLs += '          <input type="text" class="form-control" name = "desc1'+x+'[]" value="'+items[j].desc+'"> '
            fieldHTMLs += '        </div> '
            fieldHTMLs += '      </div> '
            fieldHTMLs += '      <a href="javascript:void(0);" class="remove_button"> '
            fieldHTMLs += '        <button type = "button" class = "btn btn-custom"><i class = "fa fa-minus"></i></button> '
            fieldHTMLs += '      </a> '
            fieldHTMLs += '    </div>'
          }
          fieldHTMLs += '  </div>'
          fieldHTMLs += '  <div class="form-group">'
          fieldHTMLs += '    <button type="button" onclick="addField('+x+')" class="btn btn-custom btn-block">Tambah Ingridient Lainnya</button>'
          fieldHTMLs += '  </div>'
          fieldHTMLs += '</div>'

        }
        $(wrapp).html(fieldHTMLs);
      }

      function editStep() {
        let data = '<?= $recipes->steps ?>'
        let item = JSON.parse(data).steps
        var wrapperz = $('#fieldWrapperz');
        var append = ''

        let x = 1;
        for (var i = 0; i <(item.length); i++) {
          x++;
          let items = item[i];
          console.log(items)
          append+= '<div class="field_wrapperz">'
          append+= '  <div class="form-group">'
          append+= '    <label>File Step Resep</label>'
          append+= '        <input type="file" name="userfile[]" class="form-control" id="exampleInputFile">'
          append+= '   </div><br>'
          append+= '  <div class="form-group">'
          append+= '    <textarea class="form-control" name="deskripsistep[]" value="">'+items.remark+'</textarea>'
          append+= '  </div>'
          append+= '  <a href="javascript:void(0);" class="remove_buttonz"><button class = "btn btn-custom">'
          append+= '    <i class = "fa fa-minus"></i> Hapus Step</button><br><hr><br>'
          append+= '  </a>'
          append+= '</div>'
          append+= '</div>'
        }
        $(wrapperz).html(append); 

        $(wrapperz).on('click', '.remove_buttonz', function(e){
          e.preventDefault();
          $(this).parent('div').remove();
        });
      }
      $(document).ready(function(){
        editIngredients()
        editStep()
    var maxjum = 10000; //Input fields increment limitation
    var addform = $('.addform'); //Add button selector
    var wrapp = $('.field_wrapper1'); //Input field wrapper
    // var x = 1; //Initial field counter is 1
    let data = '<?= $recipes->ingredients ?>'
    let x = (JSON.parse(data).length+1)
    
    //Once add button is clicked
    $(addform).click(function(){
        //Check maximum number of input fields
        if(x < maxjum){ 
            x++; //Increment field counter
            var fieldHTMLs = '<div  id="ingridients'+x+'"><input type="hidden" name="i[]" value="'+x+'"><br><div class="ingridients"><div class="row"><div class="col-sm-5"><div class="form-group"><input type="text" name = "headtitle'+x+'" class="form-control" placeholder="Contoh : Tepung Krispi" maxlength="45"></div></div><div class="col-sm-5"><div class="form-group"><button class = "btn btn-custom" onclick="removeIngridient('+x+')"><i class = "fa fa-minus"></i> Delete</button></div></div></div></div><div class="field_wrapper" id="fieldWrapper'+x+'"><div class="row"><div class="col-sm-5"><div class="form-group"><input type="text" name = "title1'+x+'[]" class="form-control" placeholder="...." maxlength="45"></div></div><div class="col-sm-5"><div class="form-group"><input type="text" name = "desc1'+x+'[]" class="form-control" placeholder="...." maxlength="10"></div></div><div class="col-sm-2"><div class="form-group"></div></div></div></div><div class="form-group"><button type="button" onclick="addField('+x+')" class="btn btn-custom btn-block">Tambah Ingridient Lainnya</button></div></div>'; //New input field html 
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

// STEP JQUERY


function addField_step(x='') {
    var wrapperz = $('#fieldWrapperz'); //Input field wrapper
    var append = ''
    append+= '<div class="field_wrapperz">'
    append+= '  <div class="form-group">'
    append+= '    <label>File Step Resep</label>'
    append+= '        <input type="file" name="userfile[]" class="form-control" id="exampleInputFile">'
    append+= '   </div><br>'
    append+= '  <div class="form-group">'
    append+= '    <textarea class="form-control" name="deskripsistep[]"></textarea>'
    append+= '  </div>'
    append+= '  <a href="javascript:void(0);" class="remove_buttonz"><button class = "btn btn-custom">'
    append+= '    <i class = "fa fa-minus"></i> Hapus Step</button><br><hr><br>'
    append+= '  </a>'
    append+= '</div>'
    append+= '</div>'
    var x = 1; //Initial field counter is 1
        //Check maximum number of input fields
            $(wrapperz).append(append); //Add field html
            x++; //Increment field counter
  // $('#addField')

  $(wrapperz).on('click', '.remove_buttonz', function(e){
    e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
      });
}
// CLOSE STEP JQUERY

</script>
<script type="text/javascript">
  $('.select2').select2()
  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })


  $('#tokenfield').tokenfield({
    autocomplete: {
      source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
      delay: 1
    },
    showAutocompleteOnFocus: true
  });

</script>