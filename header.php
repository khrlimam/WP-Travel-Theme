<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Travel HTML-5 Template </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon"
    href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">

  <!-- CSS here -->
  <?php wp_head(); ?>
</head>

<body>
  <!-- Preloader Start -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Preloader Start -->
  <header>
    <!-- Header Start -->
    <div class="header-area">
      <div class="main-header ">
        <div class="header-top top-bg d-none d-lg-block">
          <div class="container">
            <div class="row justify-content-between align-items-center">
              <div class="col-lg-8">
                <div class="header-info-left">
                  <ul>
                    <li>needhelp@gotrip.com</li>
                    <li><a href="https://wa.me/6287802458279?text=Hi, Hassava Transwisata">+62 87802458279</a></li>
                    <li>Sengkerang, Praya Timur. Lombok Tengah</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="header-info-right f-right">
                  <ul class="header-social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-bottom  header-sticky">
          <div class="container">
            <div class="row align-items-center">
              <!-- Logo -->
              <div class="col-xl-2 col-lg-2 col-md-1">
                <div class="logo">
                  <a href="<?php echo home_url(); ?>"><img
                      src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" width="100" alt=""></a>
                </div>
              </div>
              <div class="col-xl-10 col-lg-10 col-md-10">
                <!-- Main-menu -->
                <div class="main-menu f-right d-none d-lg-block">
                  <nav>
                    <ul id="navigation">
                      <li><a href="<?php echo home_url(); ?>">Home</a></li>
                      <li><a href="<?php echo site_url('/packages'); ?>">Packages</a></li>
                      <li><a href="<?php echo site_url('/transportations'); ?>">Transportation</a></li>
                      <li><a href="<?php echo site_url('/#blog-area'); ?>">Blog</a> </li>
                      <li><a href="https://wa.me/6287802458279?text=Hi, Hassava Transwisata">Contact Us</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!-- Mobile Menu -->
              <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->
  </header>