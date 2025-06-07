<?php get_header(); ?>
<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>
    <!-- slider Area Start-->
    <div class="slider-area ">
      <div class="single-slider slider-height2 d-flex align-items-center"
        data-background="<?php echo get_template_directory_uri() . '/assets/img/hero/contact_hero.jpg'; ?>"
        style="background-image: url(<?php echo get_template_directory_uri() . '/assets/img/hero/contact_hero.jpg'; ?>);">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="hero-cap text-center">
                <h2>Travel Story</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- slider Area End-->
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 posts-list">
            <div class="single-post">
              <div class="feature-img">
                <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">
              </div>
              <div class="blog_details">
                <h2>
                  <?php the_title(); ?>
                </h2>
                <ul class="blog-info-link mt-3 mb-4">
                  <li><?php echo the_date(); ?> </li>
                  <li><?php echo the_category(',') ?></li>
                  <li><a href="#comments-area"><i class="fa fa-comments"></i>
                      <?php echo get_comment_count(get_the_ID())['approved']; ?> Comments</a></li>
                </ul>
                <?php the_content(); ?>
              </div>
            </div>
            <div class="navigation-top">
              <div class="d-sm-flex justify-content-between text-center">
                <div class="col-sm-4 text-center my-2 my-sm-0">
                </div>
              </div>
              <div class="navigation-area">
                <div class="row">
                  <?php
                  $prev = get_adjacent_post(true, '', true);
                  $next = get_adjacent_post(true, '', false);
                  ?>
                  <?php if ($prev): ?>
                    <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                      <div class="thumb">
                        <a href="<?php echo get_permalink($prev->ID); ?>">
                          <img width="60" class="img-fluid"
                            src="<?= has_post_thumbnail($prev) ? get_the_post_thumbnail_url($prev, 'thumbnail') : get_template_directory_uri() . '/assets/img/service/services5.jpg'; ?>"
                            alt="">
                        </a>
                      </div>
                      <div class="arrow">
                        <a href="<?php echo get_permalink($prev->ID); ?>">
                          <span class="lnr text-white ti-arrow-left"></span>
                        </a>
                      </div>
                      <div class="detials">
                        <p>Prev Post</p>
                        <a href="<?php echo get_permalink($prev->ID); ?>">
                          <h4><?php echo get_the_title($prev->ID); ?></h4>
                        </a>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if ($next): ?>
                    <div
                      class="<?= (empty($prev)) ? 'offset-6' : 'some' ?> col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                      <div class="detials">
                        <p>Next Post</p>
                        <a href="<?php echo get_permalink($next->ID); ?>">
                          <h4><?php echo get_the_title($next->ID); ?></h4>
                        </a>
                      </div>
                      <div class="arrow">
                        <a href="<?php echo get_permalink($next->ID); ?>">
                          <span class="lnr text-white ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="thumb">
                        <a href="<?php echo get_permalink($next->ID); ?>">
                          <img width="60" class="img-fluid"
                            src="<?= has_post_thumbnail($next) ? get_the_post_thumbnail_url($next, 'thumbnail') : get_template_directory_uri() . '/assets/img/service/services5.jpg'; ?>"
                            alt="">
                        </a>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="blog-author">
              <div class="media align-items-center">
                <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="">
                <div class="media-body">
                  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <h4><?php the_author(); ?></h4>
                  </a>
                  <p><?php the_author_meta('description'); ?></p>
                </div>
              </div>
            </div>

            <?php comments_template(); ?>
          </div>
          <div class="col-lg-4">
            <div class="blog_right_sidebar">
              <aside class="single_sidebar_widget search_widget">
                <form action="#">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Search Keyword'">
                      <div class="input-group-append">
                        <button class="btns" type="button"><i class="ti-search"></i></button>
                      </div>
                    </div>
                  </div>
                  <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                </form>
              </aside>
              <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Recent Post</h3>
                <?php
                $recent_args = array(
                  'post_type' => 'post',
                  'posts_per_page' => 4,
                  'post__not_in' => array(get_the_ID()),
                  'category__not_in' => array(
                    get_cat_ID('offerings'),
                    get_cat_ID('discounts')
                  ),
                  'ignore_sticky_posts' => 1
                );
                $recent_query = new WP_Query($recent_args);
                if ($recent_query->have_posts()):
                  while ($recent_query->have_posts()):
                    $recent_query->the_post(); ?>
                    <div class="media post_item">
                      <img width="80"
                        src="<?= has_post_thumbnail() ? the_post_thumbnail_url('thumbnail') : get_template_directory_uri() . '/assets/img/service/services5.jpg'; ?>"
                        alt="<?php the_title(); ?>">

                      <div class="media-body">
                        <a href="<?php the_permalink(); ?>">
                          <h3><?php the_title(); ?></h3>
                        </a>
                        <p><?php echo get_the_date(); ?></p>
                      </div>
                    </div>
                  <?php endwhile;
                  wp_reset_postdata();
                else: ?>
                  <p>No recent posts found.</p>
                <?php endif; ?>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Blog Area end =================-->
  <?php endwhile; endif; ?>
<?php get_footer(); ?>