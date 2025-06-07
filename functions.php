<?php
add_theme_support('post-thumbnails');
add_action('wp_enqueue_scripts', 'gotrip_enqueue_scripts');

function gotrip_enqueue_scripts()
{

  wp_enqueue_style(
    'theme-slug-style',
    get_stylesheet_uri()
  );

  wp_enqueue_style('gotrip-style1', get_parent_theme_file_uri('assets/css/bootstrap.min.css'));
  wp_enqueue_style('gotrip-style2', get_parent_theme_file_uri('assets/css/owl.carousel.min.css'));
  wp_enqueue_style('gotrip-style3', get_parent_theme_file_uri('assets/css/flaticon.css'));
  wp_enqueue_style('gotrip-style4', get_parent_theme_file_uri('assets/css/slicknav.css'));
  wp_enqueue_style('gotrip-style5', get_parent_theme_file_uri('assets/css/animate.min.css'));
  wp_enqueue_style('gotrip-style6', get_parent_theme_file_uri('assets/css/magnific-popup.css'));
  wp_enqueue_style('gotrip-style7', get_parent_theme_file_uri('assets/css/fontawesome-all.min.css'));
  wp_enqueue_style('gotrip-style8', get_parent_theme_file_uri('assets/css/themify-icons.css'));
  wp_enqueue_style('gotrip-style9', get_parent_theme_file_uri('assets/css/slick.css'));
  wp_enqueue_style('gotrip-style10', get_parent_theme_file_uri('assets/css/nice-select.css'));
  wp_enqueue_style('gotrip-style11', get_parent_theme_file_uri('assets/css/style.css'));


  // <!-- All JS Custom Plugins Link Here here -->
  wp_enqueue_script('gotrip-js1', get_parent_theme_file_uri('assets/js/vendor/modernizr-3.5.0.min.js'), array(), '1.0.0', true);

  // <!-- Jquery, Popper, Bootstrap -->
  wp_enqueue_script('gotrip-js', get_parent_theme_file_uri('assets/js/vendor/jquery-1.12.4.min.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js3', get_parent_theme_file_uri('assets/js/popper.min.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js4', get_parent_theme_file_uri('assets/js/bootstrap.min.js'), array(), '1.0.0', true);
  // <!-- Jquery Mobile Menu -->
  wp_enqueue_script('gotrip-js5', get_parent_theme_file_uri('assets/js/jquery.slicknav.min.js'), array(), '1.0.0', true);

  // <!-- Jquery Slick , Owl-Carousel Plugins -->
  wp_enqueue_script('gotrip-js6', get_parent_theme_file_uri('assets/js/owl.carousel.min.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js7', get_parent_theme_file_uri('assets/js/slick.min.js'), array(), '1.0.0', true);
  // <!-- One Page, Animated-HeadLin -->
  wp_enqueue_script('gotrip-js8', get_parent_theme_file_uri('assets/js/wow.min.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js9', get_parent_theme_file_uri('assets/js/animated.headline.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js10', get_parent_theme_file_uri('assets/js/jquery.magnific-popup.js'), array(), '1.0.0', true);

  // <!-- Scrollup, nice-select, sticky -->
  wp_enqueue_script('gotrip-js11', get_parent_theme_file_uri('assets/js/jquery.scrollUp.min.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js12', get_parent_theme_file_uri('assets/js/jquery.nice-select.min.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js13', get_parent_theme_file_uri('assets/js/jquery.sticky.js'), array(), '1.0.0', true);

  // <!-- contact js -->
  wp_enqueue_script('gotrip-js14', get_parent_theme_file_uri('assets/js/contact.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js15', get_parent_theme_file_uri('assets/js/jquery.form.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js16', get_parent_theme_file_uri('assets/js/jquery.validate.min.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js17', get_parent_theme_file_uri('assets/js/mail-script.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js18', get_parent_theme_file_uri('assets/js/jquery.ajaxchimp.min.js'), array(), '1.0.0', true);

  // <!-- Jquery Plugins, main Jquery -->
  wp_enqueue_script('gotrip-js19', get_parent_theme_file_uri('assets/js/plugins.js'), array(), '1.0.0', true);
  wp_enqueue_script('gotrip-js20', get_parent_theme_file_uri('assets/js/main.js'), array(), '1.0.0', true);
}

function gotrip_register_package_post_type()
{
  $labels = array(
    'name' => 'Packages',
    'singular_name' => 'Package',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Package',
    'edit_item' => 'Edit Package',
    'new_item' => 'New Package',
    'all_items' => 'All Packages',
    'view_item' => 'View Package',
    'search_items' => 'Search Packages',
    'not_found' => 'No packages found',
    'not_found_in_trash' => 'No packages found in Trash',
    'menu_name' => 'Packages'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'packages'),
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'show_in_rest' => true,
  );
  register_post_type('package', $args);
}
add_action('init', 'gotrip_register_package_post_type');

function gotrip_package_custom_fields()
{
  add_meta_box(
    'gotrip_package_fields',
    'Package Details',
    'gotrip_package_fields_callback',
    'package',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'gotrip_package_custom_fields');

function gotrip_package_fields_callback($post)
{
  $price = get_post_meta($post->ID, 'price', true);
  $rating = get_post_meta($post->ID, 'rating', true);
  $duration = get_post_meta($post->ID, 'duration', true);
  $location = get_post_meta($post->ID, 'location', true);
  ?>
  <p>
    <label>Price:</label><br>
    <input type="text" name="package_price" value="<?php echo esc_attr($price); ?>" />
  </p>
  <p>
    <label>Rating:</label><br>
    <input type="text" name="package_rating" value="<?php echo esc_attr($rating); ?>" />
  </p>
  <p>
    <label>Duration:</label><br>
    <input type="text" name="package_duration" value="<?php echo esc_attr($duration); ?>" />
  </p>
  <p>
    <label>Location:</label><br>
    <input type="text" name="package_location" value="<?php echo esc_attr($location); ?>" />
  </p>
  <?php
}

function gotrip_save_package_fields($post_id)
{
  if (array_key_exists('package_price', $_POST)) {
    update_post_meta($post_id, 'price', sanitize_text_field($_POST['package_price']));
  }
  if (array_key_exists('package_rating', $_POST)) {
    update_post_meta($post_id, 'rating', sanitize_text_field($_POST['package_rating']));
  }
  if (array_key_exists('package_duration', $_POST)) {
    update_post_meta($post_id, 'duration', sanitize_text_field($_POST['package_duration']));
  }
  if (array_key_exists('package_location', $_POST)) {
    update_post_meta($post_id, 'location', sanitize_text_field($_POST['package_location']));
  }
}
add_action('save_post', 'gotrip_save_package_fields');

add_action('pre_get_posts', function ($query) {
  if (!is_admin() && $query->is_main_query() && is_post_type_archive('package')) {
    // Handle search by location
    if (!empty($_GET['s'])) {
      $query->set('meta_query', array(
        array(
          'key' => 'location',
          'value' => sanitize_text_field($_GET['s']),
          'compare' => 'LIKE',
        )
      ));
      // Remove the default search on title/content
      $query->set('s', '');
    }
    $query->set('posts_per_page', 9);
  }
});

// Register Offerings/Discounts Custom Post Type
function gotrip_register_offering_post_type()
{
  $labels = array(
    'name' => 'Offerings & Discounts',
    'singular_name' => 'Offering',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Offering',
    'edit_item' => 'Edit Offering',
    'new_item' => 'New Offering',
    'all_items' => 'All Offerings',
    'view_item' => 'View Offering',
    'search_items' => 'Search Offerings',
    'not_found' => 'No offerings found',
    'not_found_in_trash' => 'No offerings found in Trash',
    'menu_name' => 'Offerings & Discounts'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'offerings'),
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'show_in_rest' => true,
  );
  register_post_type('offering', $args);
}
add_action('init', 'gotrip_register_offering_post_type');

// Add custom fields for Offerings/Discounts
function gotrip_offering_custom_fields()
{
  add_meta_box(
    'gotrip_offering_fields',
    'Offering/Discount Details',
    'gotrip_offering_fields_callback',
    'offering',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'gotrip_offering_custom_fields');

function gotrip_offering_fields_callback($post)
{
  $prev_price = get_post_meta($post->ID, 'prev_price', true);
  $new_price = get_post_meta($post->ID, 'new_price', true);
  $discount_value = get_post_meta($post->ID, 'discount_value', true);
  $offering_name = get_post_meta($post->ID, 'offering_name', true);
  $locations = get_post_meta($post->ID, 'locations', true);
  $durations = get_post_meta($post->ID, 'durations', true);
  ?>
  <p>
    <label>Previous Price:</label><br>
    <input type="text" name="offering_prev_price" value="<?php echo esc_attr($prev_price); ?>" />
  </p>
  <p>
    <label>New Price:</label><br>
    <input type="text" name="offering_new_price" value="<?php echo esc_attr($new_price); ?>" />
  </p>
  <p>
    <label>Discount Value:</label><br>
    <input type="text" name="offering_discount_value" value="<?php echo esc_attr($discount_value); ?>" />
  </p>
  <p>
    <label>Locations:</label><br>
    <input type="text" name="offering_locations" value="<?php echo esc_attr($locations); ?>" />
  </p>
  <p>
    <label>Durations:</label><br>
    <input type="text" name="offering_durations" value="<?php echo esc_attr($durations); ?>" />
  </p>
  <?php
}

function gotrip_save_offering_fields($post_id)
{
  if (array_key_exists('offering_prev_price', $_POST)) {
    update_post_meta($post_id, 'prev_price', sanitize_text_field($_POST['offering_prev_price']));
  }
  if (array_key_exists('offering_new_price', $_POST)) {
    update_post_meta($post_id, 'new_price', sanitize_text_field($_POST['offering_new_price']));
  }
  if (array_key_exists('offering_discount_value', $_POST)) {
    update_post_meta($post_id, 'discount_value', sanitize_text_field($_POST['offering_discount_value']));
  }
  if (array_key_exists('offering_locations', $_POST)) {
    update_post_meta($post_id, 'locations', sanitize_text_field($_POST['offering_locations']));
  }
  if (array_key_exists('offering_durations', $_POST)) {
    update_post_meta($post_id, 'durations', sanitize_text_field($_POST['offering_durations']));
  }
}
add_action('save_post', 'gotrip_save_offering_fields');


// Register Transportation Custom Post Type
function gotrip_register_transportation_post_type()
{
  $labels = array(
    'name' => 'Transportations',
    'singular_name' => 'Transportation',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Transportation',
    'edit_item' => 'Edit Transportation',
    'new_item' => 'New Transportation',
    'all_items' => 'All Transportations',
    'view_item' => 'View Transportation',
    'search_items' => 'Search Transportations',
    'not_found' => 'No transportations found',
    'not_found_in_trash' => 'No transportations found in Trash',
    'menu_name' => 'Transportations'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'transportations'),
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'show_in_rest' => true,
  );
  register_post_type('transportation', $args);
}
add_action('init', 'gotrip_register_transportation_post_type');

// Add custom fields for Transportation
function gotrip_transportation_custom_fields()
{
  add_meta_box(
    'gotrip_transportation_fields',
    'Transportation Details',
    'gotrip_transportation_fields_callback',
    'transportation',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'gotrip_transportation_custom_fields');

function gotrip_transportation_fields_callback($post)
{
  $car_capacity = get_post_meta($post->ID, 'car_capacity', true);
  $price = get_post_meta($post->ID, 'price', true);
  $from = get_post_meta($post->ID, 'from', true);
  $to = get_post_meta($post->ID, 'to', true);
  $type = get_post_meta($post->ID, 'type', true);
  ?>
  <p>
    <label>Car Capacity:</label><br>
    <input type="text" name="transportation_car_capacity" value="<?php echo esc_attr($car_capacity); ?>" />
  </p>
  <p>
    <label>Price:</label><br>
    <input type="text" name="transportation_price" value="<?php echo esc_attr($price); ?>" />
  </p>
  <p>
    <label>From:</label><br>
    <input type="text" name="transportation_from" value="<?php echo esc_attr($from); ?>" />
  </p>
  <p>
    <label>To:</label><br>
    <input type="text" name="transportation_to" value="<?php echo esc_attr($to); ?>" />
  </p>
  <p>
    <label>Type:</label><br>
    <select name="transportation_type">
      <option value="pickup" <?php selected($type, 'pickup'); ?>>Pickup</option>
      <option value="dropoff" <?php selected($type, 'drop off'); ?>>Drop Off</option>
    </select>
  </p>
  <?php
}

function gotrip_save_transportation_fields($post_id)
{
  if (array_key_exists('transportation_car_capacity', $_POST)) {
    update_post_meta($post_id, 'car_capacity', sanitize_text_field($_POST['transportation_car_capacity']));
  }
  if (array_key_exists('transportation_price', $_POST)) {
    update_post_meta($post_id, 'price', sanitize_text_field($_POST['transportation_price']));
  }
  if (array_key_exists('transportation_from', $_POST)) {
    update_post_meta($post_id, 'from', sanitize_text_field($_POST['transportation_from']));
  }
  if (array_key_exists('transportation_to', $_POST)) {
    update_post_meta($post_id, 'to', sanitize_text_field($_POST['transportation_to']));
  }
  if (array_key_exists('transportation_type', $_POST)) {
    update_post_meta($post_id, 'type', sanitize_text_field($_POST['transportation_type']));
  }
}
add_action('save_post', 'gotrip_save_transportation_fields');

add_action('pre_get_posts', function ($query) {
  if (!is_admin() && $query->is_main_query() && is_post_type_archive('transportation')) {
    // Handle search by location
    if (!empty($_GET['s'])) {
      $query->set('meta_query', array(
        array(
          'key' => 'from',
          'value' => sanitize_text_field($_GET['s']),
          'compare' => 'LIKE',
        ),
        array(
          'key' => 'to',
          'value' => sanitize_text_field($_GET['s']),
          'compare' => 'LIKE',
        ),
        'relation' => 'OR'
      ));
      // Remove the default search on title/content
      $query->set('s', '');
    }
    $query->set('posts_per_page', 9);
  }
});