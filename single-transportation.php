<?php
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
  $pickupLocation = $_POST['pickup_location'];
  $dropOffLocation = $_POST['dropoff_location'];
  $people = $_POST['people'];

  if ((!isset($pickupLocation) && !isset($dropOffLocation)) || !isset($people)) {
    echo '<script>alert("Please fill all the fields")</script>';
  } else {
    $from = esc_html(get_post_meta(get_the_ID(), 'from', true));
    $to = esc_html(get_post_meta(get_the_ID(), 'to', true));

    $pickupLocation = isset($pickupLocation) ? "$from ($pickupLocation)" : $from;
    $dropOffLocation = isset($dropOffLocation) ? "$to ($dropOffLocation)" : $to;

    $waMessage = "Hi, I want to order this transport: " . get_the_title() . "\n";
    $waMessage .= "Pickup Location: " . $pickupLocation . "\nDrop Off Location: " . $dropOffLocation . "\nPeople: " . $people;
    $waUrl = "https://wa.me/6287802458279?text=" . urlencode($waMessage);
    header("Location: " . $waUrl);
  }

}
?>

<?php get_header(); ?>
<main>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Transport Detail</h3>
            <div class="row">
              <div class="col-md-4">
                <img width="100%" class="rounded" src="<?php echo esc_url(the_post_thumbnail_url('medium')); ?>" alt="">
              </div>
              <div class="col-md">
                <h3><?php the_title(); ?></h3>
                <li><strong>Capacity:</strong>
                  <?php echo esc_html(get_post_meta(get_the_ID(), 'car_capacity', true)); ?>
                </li>
                <li><strong>Price:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?></li>
                <li><strong>From:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'from', true)); ?></li>
                <li><strong>To:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), 'to', true)); ?></li>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Interested?</h3>
            <form method="post">
              <?php
              $transportType = esc_html(get_post_meta(get_the_ID(), 'type', true));
              if ($transportType == 'pickup'):
                ?>
                <div class="mb-3">
                  <label class="form-label"><strong>Pickup Location</strong></label>
                  <input type="text" name="pickup_location" class="single-input" required placeholder="Pickup Location">
                </div>
              <?php elseif ($transportType == 'dropoff'): ?>
                <div class="mb-3">
                  <label class="form-label"><strong>Drop Off Location</strong></label>
                  <input type="text" name="dropoff_location" class="single-input" required placeholder="Enter Location">
                </div>
              <?php endif; ?>
              <div class="mb-3">
                <label class="form-label"><strong>How many people?</strong></label>
                <input type="number" name="people" class="single-input" required placeholder="Enter peoples">
              </div>
              <button type="submit" class="genric-btn primary radius btn-block">Book Now <i
                  class="ti-arrow-right"></i></button>
              <a class="genric-btn default radius btn-block" href="<?php echo site_url('/transportations'); ?>">Other
                Transportations</a>
            </form>
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