 <div class="page-content">

  <div class="page-header">
      <h1>
       Produkter
      </h1>
     </div><!-- /.page-header -->

  <div class="row">
    <?php if(isset($product_data) AND $product_data){ ?>
    <?php foreach ($product_data as $productdata) { ?>
      <div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 center">
        <div>
            <span class="profile-picture">
                  <img alt="<?=$productdata->name?>" src="<?=$productdata->image?>">
            </span>

            <div class="space-4"></div>

            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
              <div class="inline position-relative">
                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                <i class="ace-icon fa fa-circle light-green"></i>
                &nbsp;
                <span class="white"><?=$productdata->name?></span>
                </a>

              </div>
            </div>
        </div>

        <div class="space-6"></div>

        <div class="profile-contact-info">
          <div class="profile-contact-links align-left">
              <?php if($this->ion_auth->in_group(1)){?>
                 <a href="<?php echo base_url('products/create_update/'.$productdata->id); ?>" class="btn btn-link">
                  Hantera produkt
                </a>
             <?php }?>
              <form action="<?php echo base_url('cart/add_to_cart/'); ?>" method="post"  class="form-horizontal" role="form">
                <input type="hidden" id="in_product_id" name="in_product_id" value="<?php echo  $productdata->id   ?>" class="col-xs-10 col-sm-5">
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="text" id="form-field-1-1" name="in_qty" placeholder="Antal" class="form-control">
                    </div>
                  </div>
                <button type="submit" name="add" class="btn btn-block btn-inverse buy-button qs-cart-submit"><i class="fa fa-shopping-basket"></i> KÖP</button>
              </form>
          </div>
          <div class="space-6"></div>
        </div>

        <div class="hr hr12 dotted"></div>

        <div class="hr hr16 dotted"></div>
      </div>
    <?php } } else { ?>
      <div class="form-group">
          <div class="col-sm-12">
            Det finns inga produkter
          </div>
        </div>
    <?php }  ?>
  </div>


</div>

