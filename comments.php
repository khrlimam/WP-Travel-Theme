<?php
if (post_password_required()) {
  return;
}
?>

<div class="comments-area" id="comments-area">
  <?php if (have_comments()): ?>
    <h4>
      <?php printf(_n('One Comment', '%1$s Comments', get_comments_number(), 'gotrip'), number_format_i18n(get_comments_number())); ?>
    </h4>
    <ul class="comment-list">
      <?php
      wp_list_comments(array(
        'style' => 'ul',
        'short_ping' => true,
        'avatar_size' => 60,
      ));
      ?>
    </ul>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
      <nav class="comment-navigation">
        <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'gotrip')); ?></div>
        <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'gotrip')); ?></div>
      </nav>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (!comments_open() && get_comments_number()): ?>
    <p class="no-comments"><?php _e('Comments are closed.', 'gotrip'); ?></p>
  <?php endif; ?>

  <div class="comment-form">
    <?php
    comment_form(array(
      'title_reply' => __('Tell us what you think', 'gotrip'),
      'class_form' => 'form-contact comment_form',
      'class_submit' => 'button button-contactForm btn_1 boxed-btn',
      'label_submit' => __('Send Message', 'gotrip'),
      'fields' => array(
        'author' => '<div class="form-group"><input class="form-control" name="author" id="author" type="text" placeholder="Name" value="' . esc_attr($commenter['comment_author']) . '" size="30" required /></div>',
        'email' => '<div class="form-group"><input class="form-control" name="email" id="email" type="email" placeholder="Email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" required /></div>',
        'url' => '<div class="form-group"><input class="form-control" name="url" id="url" type="text" placeholder="Website" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>',
      ),
      'comment_field' => '<div class="form-group"><textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment" required></textarea></div>',
      'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a style="color: #999999" href="%1$s">%2$s</a>. <a style="color: #c0392b" href="%3$s" title="Log out of this account">Log out?</a>', 'gotrip'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</p>',
      'comment_notes_before' => '',
      'comment_notes_after' => '',
    ));
    ?>
  </div>
</div>