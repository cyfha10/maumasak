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
        <h1 class="m-0">Tambah Metode Pembayaran</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item active">Tambah Metode Pembayaran</li>
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
          <div class="card-header">
            <h3 class="card-title">Tambah Metode Pembayaran</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <?php $id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('paymentmethod/act_addmethod/'.$id); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Metode Pembayaran</label>
                <input type="text" name="metode" class="form-control" placeholder="Masukkan Tipe Pembayaran" required>
              </div>

              <div class="form-group">
                <label for="nama">Icon</label>
                <input type="file" name="upload" class="form-control" placeholder="Masukkan Tipe Pembayaran" required>
              </div>
              
              <div class="form-group">
                <label for="nama">Instruction</label>
                <textarea id="tiny" name="instruction">
                  <p>Demi keamanan transaksi Anda, pastikan untuk tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali MauMasak.</p> <hr /> <p>Mohon untuk tidak membuang bukti transfer pembayaran, dan upload bukti pembayaran tersebut di halaman selanjutnya</p>
                </textarea>
              </div>

              <div class="form-group">
                <label for="nama">Biaya Layanan</label>
                <input type="number" name="fee" class="form-control" placeholder="Masukkan Biaya Layanan" required>
              </div>

              <div class="form-group">
                <label for="nama">Tipe Biaya Layanan</label>
                <input type="text" name="tipe_fee" class="form-control" placeholder="Masukkan Tipe Biaya Layanan" required>
              </div>

              <div class="form-group">
                <label for="nama">Bank</label>
                <select name="bank" id="bank" class="form-control" required>
                  <option value=""><i>- Pilih Bank -</i></option>
                  <?php
                  if($list_bank){
                    foreach($list_bank as $bank){
                      ?>
                      <option value="<?php echo $bank['bank_id'];?>"><?php echo $bank['bank_name']; ?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="nama">Nomor Rekening</label>
                <input type="text" name="norek" class="form-control" placeholder="Masukkan Nomor Rekening" required>
              </div>

              <div class="form-group">
                <label for="nama">Nama di Rekening</label>
                <input type="text" name="nama_rek" class="form-control" placeholder="Masukkan Nama di Rekening" required>
              </div>

              <div class="form-group">
                <label for="nama">Cabang</label>
                <input type="text" name="cabang" class="form-control" placeholder="Masukkan Cabang" required>
              </div>
              
              <div class="form-group">
                <label for="nama">Status</label>
                <select class="form-control" name="status">
                  <option value="">- Status -</option>
                  <option value="1" selected>Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-custom">Submit</button>
              <a href="<?php echo base_url('paymentmethod'); ?>">
                  <button type="button" class="btn btn-danger">Back</button>
              </a>
            </div>
          </form>
        </div>
        <!-- /.card -->

</section>

<script src="<?php echo base_url(); ?>/assets/js/tinymce.min.js"></script>
<script>
 tinymce.init({
   selector: 'textarea#tiny'
 });
</script>