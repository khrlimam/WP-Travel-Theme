<?php get_header() ?>

<main>

  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
      <div class="single-slider hero-overly  slider-height d-flex align-items-center"
        data-background="<?php echo get_template_directory_uri(); ?>/assets/img/hero/h1_hero.jpg">
        <div class="container">
          <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-9">
              <div class="hero__caption">
                <h1>Let's explore with <span>Hassava Transwisata!</span> </h1>
                <p>Where would you like to go?</p>
              </div>
            </div>
          </div>
          <!-- Search Box -->
          <div class="row">
            <div class="col-xl-12">
              <!-- form -->
              <form action="<?php echo site_url('/packages/'); ?>" method="get" class="search-box">
                <div class="input-form mb-30" style="width: 100%;">
                  <input type="text" name="s" placeholder="Find your next destination...">
                  <input type="hidden" name="post_type" value="package">
                </div>
                <div class="search-form mb-30">
                  <button type="submit">Let's Explore!</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- slider Area End-->
  <!-- Our Services Start -->
  <div class="our-services servic-padding">
    <div class="container">
      <div class="row d-flex justify-contnet-center">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
          <div class="single-services text-center mb-30">
            <div class="services-ion">
              <span class="flaticon-tour"></span>
            </div>
            <div class="services-cap">
              <h5>Experienced Tour<br>Guides</h5>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
          <div class="single-services text-center mb-30">
            <div class="services-ion">
              <span class="flaticon-pay"></span>
            </div>
            <div class="services-cap">
              <h5>100% Trusted Tour<br>Agency</h5>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
          <div class="single-services text-center mb-30">
            <div class="services-ion">
              <span class="flaticon-experience"></span>
            </div>
            <div class="services-cap">
              <h5>Professional Service<br>Provider</h5>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
          <div class="single-services text-center mb-30">
            <div class="services-ion">
              <span class="flaticon-good"></span>
            </div>
            <div class="services-cap">
              <h5>98% Our Travelers<br>are Happy</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Our Services End -->
  <!-- Favourite Places Start -->
  <div class="favourite-place place-padding">
    <div class="container">
      <!-- Section Tittle -->
      <div class="row">
        <div class="col-lg-12">
          <div class="section-tittle text-center">
            <span>FEATURED TOURS Packages</span>
            <h2>Favourite Places</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        // Query 4 latest packages (custom post type 'package')
        $args = array(
          'post_type' => 'package',
          'posts_per_page' => 3,
        );
        $package_query = new WP_Query($args);
        if ($package_query->have_posts()):
          while ($package_query->have_posts()):
            $package_query->the_post();
            $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            ?>
            <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="single-place mb-30">
                <div class="place-img">
                  <?php if ($image): ?>
                    <img src="<?php echo esc_url($image); ?>" alt="">
                  <?php endif; ?>
                </div>
                <div class="place-cap">
                  <div class="place-cap-top">
                    <span>
                      <i class="fas fa-star"></i>
                      <span>
                        <?php echo esc_html(get_post_meta(get_the_ID(), 'rating', true) ?: '8.0 Superb'); ?>
                      </span>
                    </span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="dolor">
                      <?php echo esc_html(get_post_meta(get_the_ID(), 'price', true) ?: '$1870'); ?>
                      <span>/ Per Person</span>
                    </p>
                  </div>
                  <div class="place-cap-bottom">
                    <ul>
                      <li><i
                          class="far fa-clock"></i><?php echo esc_html(get_post_meta(get_the_ID(), 'duration', true) ?: '3 Days'); ?>
                      </li>
                      <li><i
                          class="fas fa-map-marker-alt"></i><?php echo esc_html(get_post_meta(get_the_ID(), 'location', true) ?: 'Los Angeles'); ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        else: ?>
          <p class="col-12 text-center">No packages found.</p>
        <?php endif; ?>
      </div>
      <div class="row">
        <div class="col-12 text-center mt-3">
          <a href="<?php echo site_url('/packages'); ?>" class="btn border-btn">View All Packages</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Favourite Places End -->


  <!-- Latest Offerings and Discounts Start -->
  <?php
  // Query latest 3 offerings (custom post type 'offering')
  $offer_args = array(
    'post_type' => 'offering',
    'posts_per_page' => 3
  );
  $offer_query = new WP_Query($offer_args);
  if ($offer_query->have_posts()): ?>
    <div class="favourite-place place-padding" id="offering-area">
      <div class="container">
        <div class="section-tittle text-center">
          <span>Latest Offerings & Discounts</span>
          <h2>Special Deals</h2>
        </div>
        <div class="row d-flex justify-content-center">
          <?php while ($offer_query->have_posts()):
            $offer_query->the_post();
            $prev_price = get_post_meta(get_the_ID(), 'prev_price', true);
            $new_price = get_post_meta(get_the_ID(), 'new_price', true);
            $discount_value = get_post_meta(get_the_ID(), 'discount_value', true);
            $offering_name = get_the_title();
            $locations = get_post_meta(get_the_ID(), 'locations', true);
            $durations = get_post_meta(get_the_ID(), 'durations', true);
            ?>
            <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="single-place mb-30">
                <div class="place-img">
                  <img src="<?php echo esc_url(the_post_thumbnail_url('medium')); ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="place-cap">
                  <div class="place-cap-top">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="dolor" style="font-size: 44px;">
                      <?php echo esc_html($new_price); ?>
                      <span style="text-decoration: line-through"><?php echo esc_html($prev_price); ?></span>
                      <span style="color: red"><?php echo esc_html($discount_value); ?> Off!</span>
                      <span>/ Per Person</span>
                    </p>
                  </div>
                  <div class="place-cap-bottom">
                    <ul>
                      <li><i class="far fa-clock"></i><?php echo esc_html($durations); ?>
                      </li>
                      <li><i class="fas fa-map-marker-alt"></i><?php echo esc_html($locations); ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- Latest Offerings and Discounts End -->

  <!-- Blog Area Start -->
  <div id="blog-area" class="home-blog-area section-padding2">
    <div class="container">
      <!-- Section Tittle -->
      <div class="row">
        <div class="col-lg-12">
          <div class="section-tittle text-center">
            <span>Our Recent Story</span>
            <h2>Traveling Blog</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        $blog_args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
        );
        $blog_query = new WP_Query($blog_args);
        if ($blog_query->have_posts()):
          while ($blog_query->have_posts()):
            $blog_query->the_post(); ?>
            <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="home-blog-single mb-30">
                <div class="blog-img-cap">
                  <div class="blog-img">
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" height="369"
                      width="570">
                  </div>
                  <div class="blog-cap">
                    <p><?php the_category(', '); ?></p>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <a href="<?php the_permalink(); ?>" class="more-btn">Read more »</a>
                  </div>
                </div>
                <div class="blog-date text-center">
                  <span><?php echo get_the_date('d'); ?></span>
                  <p><?php echo get_the_date('M'); ?></p>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        else: ?>
          <p class="col-12 text-center">No articles found.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- Blog Area End -->
  <!-- Video Start Arera -->
  <!-- <div class="video-area video-bg pt-200 pb-200"
    data-background="<?php echo get_template_directory_uri(); ?>/assets/img/service/video-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="video-caption text-center">
            <div class="video-icon">
              <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU" tabindex="0"><i
                  class="fas fa-play"></i></a>
            </div>
            <p class="pera1">Love where you're going in the perfect time</p>
            <p class="pera2">Tripo is a World Leading Online</p>
            <p class="pera3"> Tour Booking Platform</p>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Video Start End -->
  <!-- Support Company Start-->
  <div class="support-company-area support-padding fix">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-6 col-lg-6">
          <div class="support-location-img mb-50">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service/support-img.jpg" alt="">
            <!-- <div class="support-img-cap">
              <span>Since 1992</span>
            </div> -->
          </div>
        </div>
        <div class="col-xl-6 col-lg-6">
          <div class="right-caption">
            <!-- Section Tittle -->
            <div class="section-tittle section-tittle2">
              <span>About Hassava Transwisata</span>
              <h2>We are Hassava Transwisata <br>The Travel Company</h2>
            </div>
            <div class="support-caption">
              <p>Your onestop travel company will accompany you accross all your dreamed journey on the most prestigouse
                paradise Lombok.</p>
              <div class="select-suport-items">
                <label class="single-items">Explore all places around Lombok
                  <input type="checkbox" checked="checked active">
                  <span class="checkmark"></span>
                </label>
                <label class="single-items">Will get you the most recommended places
                  <input type="checkbox" checked="checked active">
                  <span class="checkmark"></span>
                </label>
                <label class="single-items">Many packages variations
                  <input type="checkbox" checked="checked active">
                  <span class="checkmark"></span>
                </label>
                <label class="single-items">Will take you and get you everywhere!
                  <input type="checkbox" checked="checked active">
                  <span class="checkmark"></span>
                </label>
              </div>
              <!-- <a href="#" class="btn border-btn">About us</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Support Company End-->
  <!-- Testimonial Start -->

  <!-- Testimonial End -->
</main>
<?php get_footer(); ?>