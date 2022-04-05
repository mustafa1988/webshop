<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>Dashboard - Ace Admin</title>

    <meta name="description" content="overview &amp; stats">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css'); ?>">

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.googleapis.com.css'); ?>">

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style'); ?>">

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ace-skins.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ace-rtl.min.css'); ?>">

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?php echo base_url('assets/css/ace-ie.min.css'); ?>" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url('assets/js/ace-extra.min.js'); ?>"></script><style>@keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-moz-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-webkit-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-ms-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}@-o-keyframes nodeInserted{from{outline-color:#fff}to{outline-color:#000}}.ace-save-state{animation-duration:10ms;-o-animation-duration:10ms;-ms-animation-duration:10ms;-moz-animation-duration:10ms;-webkit-animation-duration:10ms;animation-delay:0s;-o-animation-delay:0s;-ms-animation-delay:0s;-moz-animation-delay:0s;-webkit-animation-delay:0s;animation-name:nodeInserted;-o-animation-name:nodeInserted;-ms-animation-name:nodeInserted;-moz-animation-name:nodeInserted;-webkit-animation-name:nodeInserted}</style>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default          ace-save-state">

        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
          <span class="sr-only">Toggle sidebar</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
          <a href="index.html" class="navbar-brand">
            <small>
              <i class="fa fa-leaf"></i>
              Ace Admin
            </small>
          </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          </div>

 </div>
 <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo base_url('products/'); ?>">Produkter</a>
              </li>
               <?php if($this->ion_auth->in_group(1)){?>
              <li>
                <a href="<?php echo base_url('products/create_update'); ?>">Skapa produkt</a>
              </li>
              <?php }?>
               <li>
                <a href="<?php echo base_url('cart/'); ?>">Kundvagn</a>
              </li>
               <li>
                <a href="<?php echo base_url('auth/logout'); ?>">Logga ut</a>
              </li>
            </ul><!-- /.breadcrumb -->

          </div>
