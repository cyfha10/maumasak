<?php $menu = $this->uri->segment(1); ?>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                  <a href="<?php echo base_url(''); ?>" class="nav-link">
                    <font color="#eb6228">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p><strong>Dashboard</strong></p>
                    </font>
              </a>
              
            </li> 

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User Management
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listadmin'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrator</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listrole'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listcustomerreal'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Real Customer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listcustomeranonim'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Anonymous Customer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('user/sellerverif'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Seller Verification</p>
                  </a>
                </li>
              </ul>
            </li> 

            <li class="nav-item <?php if($menu == 'paymentmethod'){ echo "active"; } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Ecommerce
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('ecommerce'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Payment Confirmation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('ecommerce/new_orders'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>New Orders</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('ecommerce/processed_orders'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Processed Order</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('ecommerce/order_history'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Order History</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('paymentmethod'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Payment Method</p>
                  </a>
                </li>
                
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                  Recipes
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listrecipe'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recipe List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/approvalrecipe'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recipes Approval
                      <span class="right badge badge-danger"><?php echo $resep_approval; ?></span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/reciperecomen'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recommendation List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listcuisine'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cuisines</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listkategori'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listsetmenu'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Set Menus</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listtags'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tags</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listrecipestatus'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recipe Status</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item <?php if($menu == 'paymentmethod'){ echo "active"; } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>
                  Recipe Sale
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('recipe_sale/listrecipesale'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recipe List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('recipe_sale/recipechoice'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recipe Choice</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('recipe_sale/recipeofficial'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recipe Official Fav</p>
                  </a>
                </li>
                
              </ul>
            </li> 

            <li class="nav-item <?php if($menu == 'paymentmethod'){ echo "active"; } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cube"></i>
                <p>
                  MPASI
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('mpasi/categorympasi_list'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category MPasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('mpasi/listmpasi'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MPasi List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('mpasi/listmpasisale'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MPasi Sale</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('mpasi/approvalmpasi'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Approval MPasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('mpasi/mpasichoice'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mpasi Choice</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('mpasi/mpasirecomen'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mpasi Rekomendasi</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item <?php if($menu == 'paymentmethod'){ echo "active"; } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-undo"></i>
                <p>
                  Trycook
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('trycook/trycookrecipe'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Trycook Recipe</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('trycook/trycookmpasi'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Trycook Mpasi</p>
                  </a>
                </li>
                
              </ul>
            </li> 

            <li class="nav-item <?php if($menu == 'paymentmethod'){ echo "active"; } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                  Withdraw
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('withdraw/list'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Withdraw Approval</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('withdraw/history'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Withdraw History</p>
                  </a>
                </li>
                
                
              </ul>
            </li> 

            <li class="nav-item <?php if($menu == 'paymentmethod'){ echo "active"; } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-paw"></i>
                <p>
                    Content & Promo
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listarticle'); ?>" class="nav-link">
                      <i class="nav-icon fas fa-list-alt "></i>
                      <p>Articles</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('admin/listbanner'); ?>" class="nav-link">
                      <i class="nav-icon fas fa-image"></i>
                        <p>Banner</p>
                  </a>
                </li>

              </ul>
            </li>


            <li class="nav-item <?php if($menu == 'paymentmethod'){ echo "active"; } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Setting
                  <i class="fas fa-angle-right right" style="color: #eb6228"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('masterecom/textsuggest'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Text Sugestion</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('masterecom/sellerstatus'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Seller Status</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('masterecom/withdrawstatus'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Withdraw Status</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('masterecom/bank'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bank</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('masterecom/orderstatus'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Order Status</p>
                  </a>
                </li>
                
              </ul>
            </li>

          </ul>
        </nav>