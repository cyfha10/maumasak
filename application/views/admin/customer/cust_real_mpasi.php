<div class="card-body">
    <div class="tab-content">
      <div class="active tab-pane" id="activity">
        <?php 
        if($recipe_customer){
          
          foreach ($recipe_customer as $recipe) { ?>
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="https://filestocks.maumasak.id/mpasi/<?php echo $recipe['customer_id'].'/'.$recipe['cover_image']; ?>" width = "90%">
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
      <?php } } else { echo "Belum Membuat Resep Mpasi"; }?>

      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="timeline">
        <!-- The timeline -->
        
        <?php 
        if($recipe_trycook){
          
          foreach ($recipe_trycook as $trycook) { ?>
            <!-- Post -->
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="https://filestocks.maumasak.id/mpasi/trycook/<?php echo $trycook['customer_id'].'/'.$trycook['trycook_image']; ?>" width = "90%">
                <span class="username">
                  <a href="#"><?php echo $trycook['title']; ?></a>
                </span>
                <span class="description"><?php echo $trycook['created_date']; ?></span>
              </div>
              <!-- /.user-block -->
              <p>
                <?php echo $trycook['description']; ?>
              </p>
            </div>
          <!-- /.post -->
        <?php } } else { echo "Belum Pernah Trycook Mpasi"; }?>
      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="komentar">
        <?php 
        if($recipe_comment){
          
          foreach ($recipe_comment as $comment) { ?>
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="https://filestocks.maumasak.id/mpasi/<?php echo $comment['customer_id'].'/'.$comment['cover_image']; ?>" width = "90%">
              <span class="username">
                <a href="#"><?php echo $comment['title']; ?></a>
              </span>
              <span class="description"><?php echo $comment['comment_date']; ?></span>
            </div>
            <!-- /.user-block -->
            <p>
              <?php echo base64_decode($comment['comment']); ?>
            </p>
          </div>
        <!-- /.post -->
      <?php } } else { echo "Belum Pernah Komentar"; }?>

      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="like">
        <?php 
        if($recipe_like){
          
          foreach ($recipe_like as $like) { ?>
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="https://filestocks.maumasak.id/mpasi/<?php echo $like['customer_id'].'/'.$like['cover_image']; ?>" width = "90%">
              <span class="username">
                <a href="#"><?php echo $like['title']; ?></a>
              </span>
              <span class="description"><?php echo $like['created_date']; ?></span>
            </div>
            <!-- /.user-block -->
            <p>
              <?php echo $like['action_type']; ?>
            </p>
          </div>
        <!-- /.post -->
      <?php } } else { echo "Belum Pernah Like, Simpan dan Share"; }?>

      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="order">
        <?php 
        if($list_orders){
          
          foreach ($list_orders as $order) { ?>
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="https://filestocks.maumasak.id/mpasi/<?php echo $order['customer_id'].'/'.$order['cover_image']; ?>" width = "90%">
              <span class="username">
                <a href="#"><?php echo $order['title']; ?></a>
              </span>
              <span class="description"><?php echo $order['created_date']; ?></span>
            </div>
            <!-- /.user-block -->
            <p>
              <?php echo "<strong>".$order['order_id']." - ".$order['invoice_no'].'</strong><br> 
              Total Order : Rp. '.number_format($order['grand_total_amount'],0,',','.')."
              <br><br>Delivery : <br>".$order['order_address']."<br>".$order['courier_name']." (".$order['courier_service'].") - ".'Rp. '.number_format($order['shipping_amount'],0,',','.')."<br>".$order['receiver_name']." - ".$order['receiver_phone']; ?>
            </p>
          </div>
        <!-- /.post -->
      <?php } } else { echo "Belum Pernah Like, Simpan dan Share"; }?>

      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="rating">
        <?php 
        if($list_rating){
          
          foreach ($list_rating as $rating) { ?>
          <!-- Post -->
          <div class="post">
            <!-- /.user-block -->
            <p>
              <?php echo "<strong>".$rating['order_id'].'</strong><br>'; ?>
              <?php
                $jumlah = $rating['rating']; 
                for ($i=1; $i <= $jumlah; $i++) {
              ?>
                  <img src="<?php echo base_url('assets/img/rating.png'); ?>" width = "2%">
            <?php } ?> <br> <?php echo $rating['feedback']; ?>
            </p>
          </div>
        <!-- /.post -->
      <?php } } else { echo "Belum Pernah Like, Simpan dan Share"; }?>

      </div>
      <!-- /.tab-pane -->

      
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div><!-- /.card-body -->
</div>
<!-- /.card -->