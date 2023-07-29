<style type="text/css">
  .btn-custom { 
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

  /* The customcheck */
.customcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eb6228;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #eb6228;
    border-radius: 5px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
              <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Checklist Tag</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Checklist Tag</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?php echo base_url('admin/actindexing/') ?>" method = "post">
                  <div class="col-md-6">
                    <label for="nama">Nama Resep</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Recipe" value="<?php echo $row->title; ?>" readonly required>
                    <input type="hidden" name="recipe_id" value="<?php echo $row->recipe_id; ?>">
                  </div>
                  <br>
                    <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#addhastag">Tambah Hastag</button>
                  <br>
                  <br>
                  <table  class="table">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Tag</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; 
                      foreach ($list_tag as $tag) {?>
                      <tr>
                        <td width="2%"><?php echo $i; ?></td>
                        <td><?php echo $tag['tag_name']; ?></td>
                        <td width="20%">

                          <label class="customcheck">
                            <input type="checkbox" name="tags_check[]" value="<?php echo $tag['tag_id'].'_'.$tag['tag_name']; ?>">
                            <span class="checkmark"></span>
                          </label>

                      </tr>
                    <?php $i++; }?>
                    </tfoot>
                  </table>
                  <input type="submit" class="btn btn-custom" value="Submit">
                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal -->
  <div class="modal fade" id="addhastag" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <label>Tambah Hastag</label>
        </div>
        <div class="modal-body">
          <?php $id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('admin/act_recipetags/'.$id); ?>" method="post">
                <label for="nama">Nama Tag</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Tag" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-custom">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Bbatal</button>
        </div>
            </form>
      </div>
    </div>
  </div>
</div>
