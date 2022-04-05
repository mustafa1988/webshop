 <div class="page-content">

  <div class="page-header">
      <h1>
       Kundvagn
      </h1>
     </div><!-- /.page-header -->


  <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    <div class="row">
      <div class="col-xs-10 ">
           <?php echo ($this->session->flashdata('message_success') ? $this->session->flashdata('message_success') : ''); ?>
      </div>

      <div class="col-xs-12">
        <table id="simple-table" class="table  table-bordered table-hover">
         <?php $total = 0?>
          <?php if(isset($cart) and $cart){ ?>
          <thead>
            <tr>
              <th>Namn</th>
              <th>Pris</th>
              <th>Antal</th>
              <th class="hidden-480">Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

              <?php foreach ($cart as $c) { ?>
                <tr>
                  <td><?=$c['product_name']?></td>
                  <td><?=$c['price']?></td>
                  <td class="hidden-480"><?=$c['qty']?></td>
                  <td><?=$c['total']?></td>
                  <td>
                    <div class="hidden-sm hidden-xs btn-group">

                      <a class="btn btn-xs btn-danger" href="<?php echo base_url('cart/delete_cart/'.$c['product_id']) ?>">
                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                      </a>
                    </div>

                    <div class="hidden-md hidden-lg">
                      <div class="inline pos-rel">
                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                          <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

                          <li>
                            <a href="<?php echo base_url('cart/delete_cart/' .$c['product_id']) ?>" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                              <span class="red">
                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                              </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $total = $total + $c['total'] ?>
             <?php }  ?>

             <tr>
                  <td></td>
                  <td></td>
                  <td class="hidden-480">Att betala</td>
                  <td><?=$total?></td>
                </tr>
          <?php } else {  ?>
            <tr>
              <td>Det finns inga varor i kundvagnen</td>
            </tr>
          <?php    } ?>

          </tbody>
        </table>



      </div><!-- /.span -->
    </div><!-- /.row -->
    <div class="hr hr-18 dotted hr-double"></div>
    <div class="hr hr-18 dotted hr-double"></div>
    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
   <?php if(isset($cart) AND $cart){ ?>
    <div class="page-header">
      <h1>
       Dina uppgifter
      </h1>
     </div><!-- /.page-header -->
     <div class="validation-messages">
           <?php echo ($this->session->flashdata('message') ? $this->session->flashdata('message') : ''); ?>
      </div>
    <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->

            <div class="validation-messages">
                 <?php echo (isset($message) ? $message : ''); ?>
            </div>
            <form action="<?php echo base_url('cart/add_order/'); ?>" method="post"   class="form-horizontal" role="form" autocomplete="off">
                <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Förnamn </label>
                    <div class="col-sm-9">
                        <input type="text" id="in_payment_firstname" name="in_payment_firstname" placeholder="Namn" value="" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Efternamn </label>
                    <div class="col-sm-9">
                        <input type="text" id="in_payment_lastname" name="in_payment_lastname"  placeholder="Pris" value=""  placeholder="Pris" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Adress </label>
                    <div class="col-sm-9">
                        <input type="text" id="in_payment_address_1" name="in_payment_address_1" value="" placeholder="Antal" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Postnummer </label>
                    <div class="col-sm-9">
                        <input type="text" id="in_payment_postcode" name="in_payment_postcode" value="" placeholder="Längd" class="col-xs-10 col-sm-5">
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ort </label>
                    <div class="col-sm-9">
                        <input type="text" id="in_payment_city" name="in_payment_city" value="" placeholder="Vikt" class="col-xs-10 col-sm-5">
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
    <?php }  ?>
</div>

