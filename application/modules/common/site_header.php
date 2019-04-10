<!DOCTYPE html>
<html lang="en">
<head>
  <title>EZGOFLY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('asset/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/animate.css')?>">

<!--   <link rel="stylesheet" href="css/docs.theme.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css') ?>">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
  
<link rel="stylesheet" media="all" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

</head>
<body>

  <!--  navbar menu  -->
   <section class="">
      <div class="contact-details">
        <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6 left">
                <p><i class="fa fa-envelope"></i> info@ezgofly.com</p>
              </div>
              <div class="col-xs-12 col-sm-6 right">
                  <p> <i class="fa fa-headphones" ></i> &nbsp;  +1-844-591-9060</p>
              </div>
            </div>
        </div>
      </div>
      <nav class="navbar navbar-default ">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed menu-collapsed-button" data-toggle="collapse" data-target="#navbar-primary-collapse" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand site-logo" href="<?php echo base_url() ?>"><img src="<?php echo base_url('asset/images/Logo-2.png') ?>" alt="Logo" title="Logo"></a>
              </div>
                
              <div class="collapse navbar-collapse navbar-right  header-right-menu" id="navbar-primary-collapse">
                                <ul class="nav navbar-nav ">
                    <li class="nav-item"><a href="<?php echo base_url() ?>" class="active">Home</a></li>
                    <!-- <li class="nav-item"><a class="" id="dropdown1">About Us</a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Top Airlines</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <li class="dropdown-item"><a href="<?php echo base_url('frontend/aeromexico') ?>">Aeromexico</a></li>
                            <li class="dropdown-item dropdown"><a href="<?php echo base_url('frontend/canada') ?>">Air Canada</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Top Destination</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <li class="dropdown-item" href="#"><a href="<?php echo base_url('frontend/amsterdam') ?>">Amsterdam</a></li>
                            <li class="dropdown-item dropdown"><a href="<?php echo base_url('frontend/bangkok') ?>">Bangkok</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quick Links</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <li><a href="<?php echo base_url('frontend/about') ?>">About Us</a></li>
                            <li><a href="<?php echo base_url('frontend/credit') ?>">Credit Card Authorization</a></li>
                            <li><a href="<?php echo base_url('frontend/cruise') ?>">Cruise Info</a></li>
                            <li><a href="<?php echo base_url('frontend/contact') ?>">Contact Us</a></li>
                            <li><a href="<?php echo base_url('frontend/faq') ?>">Faq</a></li>
                            <li><a href="<?php echo base_url('frontend/insurance') ?>">Insurance</a></li>
                            <li><a href="<?php echo base_url('frontend/privacy') ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url('frontend/terms') ?>">Term & Condition</a></li>
                        </ul>
                    </li>

                </ul>
              </div><!-- /.navbar-collapse -->
            </div>
          </nav>
      <!-- end of navbar-->
    </section>
  <!--  End navbar menu -->
