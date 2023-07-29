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
</style>
              <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Customer Real</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Data Customer</li>
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
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead style="background-color: #eb6228; color: white">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Chanel</th>
                    <th>Register Date</th>
                    <th>Verified</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach ($list_customer as $customer) {?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td width="20%"><?php echo $customer['fullname']; ?></td>
                      <td width="10%"><?php echo $customer['email']; ?></td>
                      <td  width="10%"><?php echo $customer['phone']; ?></td>
                      <td  width="5%"><?php echo $customer['register_channel']; ?></td>
                      <td  width="10%"><?php echo $customer['register_date']; ?></td>
                      <td  width="10%"><?php if($customer['is_verified'] == 1) { echo 'Verified'; } else { echo 'Not Verified'; } ?></td>
                      <td width="15%">
                        <a href="<?php echo base_url('admin/customerdetail_real/'.$customer['customer_id']); ?>">
                          <button class="btn btn-custom"><i class="fa fa-user"></i></button>
                        </a>
                        <a href="<?php echo base_url('admin/block/'.$customer['customer_id']); ?>">
                          <button class="btn btn-custom"><i class="fa fa-ban"></i></button>
                        </a>
                    </tr>
                  <?php $i++; }?>
                  </tfoot>
                </table>
                

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

