<?php
get_header(); ?>

<main>
  <div class="container py-5">
    <h1 class="mb-4">All Packages</h1>
    <form method="get" class="row g-3 mb-4">
      <div class="col-md">
        <input type="text" name="s" class="form-control-lg form-control" placeholder="Search by locations..."
          value="<?php echo esc_attr(isset($_GET['s']) ? $_GET['s'] : ''); ?>">
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
      </div>
    </form>
    <div class="favourite-place place-padding">
      <div class="container">
        <div class="row">
          <?php
          if (have_posts()):
            while (have_posts()):
              the_post();
              $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
              $price = get_post_meta(get_the_ID(), 'price', true);
              $rating = get_post_meta(get_the_ID(), 'rating', true);
              $duration = get_post_meta(get_the_ID(), 'duration', true);
              $location_val = get_post_meta(get_the_ID(), 'location', true);
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
                          <?php echo esc_html($rating ?: '8.0 Superb'); ?>
                        </span>
                      </span>
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <p class="dolor">
                        <?php echo esc_html($price ?: 'Free'); ?>
                        <span>/ Per Person</span>
                      </p>
                    </div>
                    <div class="place-cap-bottom">
                      <ul>
                        <li><i class="far fa-clock"></i><?php echo esc_html($duration ?: '-'); ?></li>
                        <li><i class="fas fa-map-marker-alt"></i><?php echo esc_html($location_val ?: 'None'); ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="single-wrap d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                  <?php
                  $big = 999999999;
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $pagination_links = paginate_links(array(
                    'total' => $wp_query->max_num_pages,
                    'current' => $paged,
                    'type' => 'array',
                    'prev_text' => '<span style="font-size: 16px; top: 0px;" class="flaticon-arrow roted left-arrow"></span>',
                    'next_text' => '<span style="font-size: 16px; top: 0px;" class="flaticon-arrow right-arrow"></span>',
                    'add_args' => array('s' => isset($_GET['s']) ? $_GET['s'] : ''),
                  ));
                  if ($pagination_links): ?>
                    <ul class="pagination justify-content-start">
                      <?php foreach ($pagination_links as $link): ?>
                        <?php
                        $active = strpos($link, 'current') !== false ? 'active' : '';
                        $link = str_replace('page-numbers', 'page-link', $link);
                        ?>
                        <li class="page-item <?php echo $active; ?>"><?php echo $link; ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </nav>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="col-12">
            <p>No packages found.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>