<div class="page-content">
     <!-- /.ace-settings-container -->

     <div class="page-header">
      <h1>
       Produkter
       <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
        ..........
       </small>
      </h1>
     </div><!-- /.page-header -->



  <div class="row">
      <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

          <div class="validation-messages">
               <?php echo (isset($message) ? $message : ''); ?>
          </div>
          <form action="<?php echo base_url('products/create_update/'.$product_id); ?>" method="post"  class="form-horizontal" role="form">
              <div class="form-group">
                 <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Namn </label>
                  <div class="col-sm-9">
                      <input type="text" id="in_name" name="in_name" placeholder="Namn" value="<?php echo ( isset($product_data->name) ? $product_data->name : '' );  ?>" class="col-xs-10 col-sm-5">
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pris </label>
                  <div class="col-sm-9">
                      <input type="text" id="in_price" name="in_price" name="in_name" placeholder="Pris" value="<?php echo ( isset($product_data->price) ? $product_data->price : '' );  ?>"  placeholder="Pris" class="col-xs-10 col-sm-5">
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Antal </label>
                  <div class="col-sm-9">
                      <input type="text" id="in_qty" name="in_qty" value="<?php echo ( isset($product_data->quantity) ? $product_data->quantity : '' );  ?>" placeholder="Antal" class="col-xs-10 col-sm-5">
                  </div>
              </div>

               <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vikt </label>
                  <div class="col-sm-9">
                      <input type="text" id="in_weight" name="in_weight" value="<?php echo ( isset($product_data->weight) ? $product_data->weight : '' );  ?>" placeholder="Vikt" class="col-xs-10 col-sm-5">
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Längd </label>
                  <div class="col-sm-9">
                      <input type="text" id="in_length" name="in_length" value="<?php echo ( isset($product_data->length) ? $product_data->length : '' );  ?>" placeholder="Längd" class="col-xs-10 col-sm-5">
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bredd </label>
                  <div class="col-sm-9">
                      <input type="text" id="in_width" name="in_width" value="<?php echo ( isset($product_data->width) ? $product_data->width : '' );  ?>" placeholder="Bredd" class="col-xs-10 col-sm-5">
                  </div>
              </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Höjd </label>
                  <div class="col-sm-9">
                      <input type="text" id="in_height" name="in_height" value="<?php echo ( isset($product_data->height) ? $product_data->height : '' );  ?>" placeholder="Höjd" class="col-xs-10 col-sm-5">
                  </div>
              </div>

             <div class="space-4"></div>
              <div class="clearfix form-actions">
                  <div class="col-md-offset-3 col-md-9">
                      <button class="btn btn-info" >
                      <i class="ace-icon fa fa-check bigger-110"></i>
                      Spara
                      </button>
                  </div>
              </div>
             <hr>
          </form>
      </div>
  </div>
  </div>