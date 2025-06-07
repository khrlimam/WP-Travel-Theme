<?php get_header(); ?>
<div class="slider-area ">
  <div class="single-slider slider-height2 d-flex align-items-center position-relative"
    data-background="<?php the_post_thumbnail_url('large'); ?>"
    style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);">
    <div style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:1;"></div>
    <div class="container position-relative" style="z-index:2;">
      <div class="row">
        <div class="col-xl-12">
          <div class="hero-cap text-center">
            <h2><?php the_title() ?></h2>
            <ul class="list-unstyled mb-4 text-white">
              <li><strong>Price:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?></li>
              <li><strong>Rating:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'rating', true)); ?></li>
              <li><strong>Duration:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'duration', true)); ?></li>
              <li><strong>Location:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'location', true)); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<main>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-8">
        <?php if (have_posts()):
          while (have_posts()):
            the_post(); ?>

            <?php the_content(); ?>

          <?php endwhile; endif; ?>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Interested?</h3>
            <a href="https://wa.me/6287802458279?text=Hi,%20Hassava%20Transwisata%0AI%20want%20to%20know%20more%20about%20the%20package%20<?php the_title() ?>.%0A<?= the_permalink() ?>%0AThanks."
              target="_blank" class="genric-btn primary radius btn-block">I want this package!</a>
            <a href="<?php echo site_url('/packages'); ?>" class="genric-btn default radius btn-block">Other Packages</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Latest Offerings and Discounts Start -->
  <?php
  // Query latest 3 offerings (custom post type 'offering')
  $offer_args = array(
    'post_type' => 'offering',
    'posts_per_page' => 4
  );
  $offer_query = new WP_Query($offer_args);
  if ($offer_query->have_posts()): ?>
    <div class="favourite-place place-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <hr>
          </div>
          <div class="row">
            <div class="col-12">
              <h3>You might interested to our latest deals!</h3>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <?php while ($offer_query->have_posts()):
            $offer_query->the_post();
            $prev_price = get_post_meta(get_the_ID(), 'prev_price', true);
            $new_price = get_post_meta(get_the_ID(), 'new_price', true);
            $discount_value = get_post_meta(get_the_ID(), 'discount_value', true);
            $offering_name = get_the_title();
            $locations = get_post_meta(get_the_ID(), 'locations', true);
            $durations = get_post_meta(get_the_ID(), 'durations', true);
            ?>
            <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="single-place mb-30">
                <div class="place-img">
                  <img src="<?php echo esc_url(the_post_thumbnail_url('medium')); ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="place-cap">
                  <div class="place-cap-top">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="dolor" style="font-size: 40px;">
                      <span style="text-decoration: line-through"><?php echo esc_html($prev_price); ?></span>
                      <span style="color: red"><?php echo esc_html($discount_value); ?> Off!</span>
                      <br>
                      <?php echo esc_html($new_price); ?>
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
</main>

<?php get_footer(); ?>