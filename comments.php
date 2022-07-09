<?php
/*
Comments template file
*/
?>
<?php if ( have_comments() && !post_password_required() ) { ?>

  <!-- Comments Block	-->
  <div id="comments" class="comments__list container">

    <!-- Title	-->
    <h2 class="comments__title">
      <?php printf( _nx( '<span>1</span> Comment', '<span>%1$s</span> Comments', get_comments_number(), 'comments title', 'lpdf' ), number_format_i18n( get_comments_number() ) ); ?>
    </h2>

    <!-- Comments List	-->
    <ul class="comments__block">
      <?php function lpdf_comment($comment, $args, $depth){
      $GLOBALS['comment'] = $comment; ?>
      <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

        <!-- Single Comment -->

        <div id="comment-<?php comment_ID(); ?>" class="comment__single">

          <div class="comment__info">
            <!-- Avatar -->
            <div class="comment__avatar">
              <?php echo get_avatar( $comment->comment_author_email, 40 ); ?>
            </div>

            <!-- Comment -->
            <div class="comment__block">

              <!-- Details -->
              <div class="comment__meta">

                <!-- Author -->
                <?php printf(__('<div class="comment__author">%s</div>', 'lpdf'), get_comment_author_link(''));?>
                <!-- Date -->
                <span class="comment__date"><?php echo human_time_diff(get_comment_time('U'), current_time('timestamp')) ; ?> <?php esc_html_e('ago', 'lpdf') ?></span>

                <!-- Label -->
                <?php global $post; if( $comment->user_id === $post->post_author ) { ?>
                  <span class="comment__author-label"><?php esc_html_e('AUTHOR', 'lpdf') ?></span>
                <?php } ?>
              </div>
              <!-- Moderation -->
              <?php if ($comment->comment_approved == '0') : ?>
                <em><?php esc_html_e('Your comment is awaiting moderation.', 'lpdf') ?></em><br>
              <?php endif; ?>

              <!-- Comment Text-->
              <div class="comment__text">
                <?php comment_text() ?>
              </div>

              <!-- Reply -->
              <div class="comment__reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => 1000))) ?>
              </div>
            </div>
          </div>
        </div>


        <?php }
        $args = array(
          'type' => 'comment',
          'reply_text' => esc_html__('Reply', 'lpdf'),
          'callback' => 'lpdf_comment'
        );
        wp_list_comments($args);
        ?>
    </ul>

    <!-- Pagination -->
    <?php if (get_previous_comments_link() || get_next_comments_link()) :?>
      <div class="comments-nav">
        <?php if (paginate_comments_links()) {?>
          <?php paginate_comments_links() ?>
        <?php } ?>
      </div>
    <?php endif; ?>
  </div>
<?php } ?>

<div class="comments-respond__section container">
  <?php if (comments_open()) { ?>
    <!-- Comment Form -->
    <?php
    $fields = array(
      'author' => '<div class="form-group log-form-group">' .
        '<div class="col-md-4 "><input id="author" placeholder="'. esc_attr__('Name', 'lpdf') .'*" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" class="form-control" /></div>' ,
      'email' => '<div class="col-md-4 "><input id="email" placeholder="'. esc_attr__('Email', 'lpdf') .'*" name="email"  type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" class="form-control" /></div>' ,
      'url' =>  '<div class="col-md-4 "><input id="url" placeholder="'. esc_attr__('Website', 'lpdf') .'" name="url"  type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" class="form-control" /></div>' .
        '</div>'
    );

    if ( is_user_logged_in() ) {
      $args = array(
        'comment_notes_after' => '',
        'comment_field' => '<div>' .
          '<textarea id="comment" placeholder="'. esc_attr__('Comment', 'lpdf') .'*" name="comment" cols="45" rows="8" aria-required="true" class="form-control"></textarea>' .
          '</div>',
        'label_submit' => esc_html__('Post Comment', 'lpdf'),
        'class_submit' => 'btn btn-primary btn-submit',
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'class_container'=> 'comment-form__container',
      );
      comment_form($args);
    } else {
      $args = [
        'comment_notes_after' => '',
        'comment_field' => '<div class="form-group ">' .
          '<textarea id="comment" placeholder="'. esc_attr__('Comment', 'lpdf') .'*" name="comment" cols="45" rows="8" aria-required="true" class="form-control"></textarea>' .
          '</div>',
        'class_submit' => 'btn btn-primary btn-submit',
        'label_submit' => esc_html__('Post Comment', 'lpdf'),
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'class_container'=> 'comment-form__container',
      ];
      comment_form($args);
    } ?>
  <?php } ?>
  <!-- Pingbacks And Trackbacks -->
  <?php foreach ($comments as $comment) : ?>

    <?php if (get_comment_type()!="comment") : ?>
      <p id="comment-<?php comment_ID() ?>">
        <?php comment_type(esc_html__('Comment:', 'lpdf'), esc_html__('Trackback:', 'lpdf'), esc_html__('Pingback:', 'lpdf')); ?>
        <?php comment_author_link(); ?> <?php esc_html_e('on', 'lpdf')?> <?php the_time( get_option('date_format')); ?>
      </p>

    <?php endif; ?>

  <?php endforeach; ?>
</div>