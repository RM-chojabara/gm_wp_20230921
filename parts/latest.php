<?php
  $posts = get_posts(array(
      'post_type' => 'post',
      'posts_per_page' => 6,
      'orderby' => 'date',
      'order' => 'DESC'
  ));
  global $post;
  if($posts):
?>

<section id="latest" class="top-contents cf">
  <div class="wrap">
    <h2 class="section-title"><a href="<?php echo home_url(); ?>/archive/" rel="nofollow">Latest <i class="fas fa-chevron-right"></i></a></h2>
    <div class="articles-wrap articles-wrap-lt">

      <?php foreach($posts as $post): setup_postdata($post);?>


        <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf pua lta' ); ?> role="article">
          <div class="img">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <?php if (check_ary(get_the_post_thumbnail_url())): ?>
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title_attribute(); ?>">
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/library/images/ec-d.png" alt="<?php the_title_attribute(); ?>">
              <?php endif ?>
            </a>
          </div>
          <div class="titles">
            <time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time('Y-m-d'); ?></time>
            <ul class="cat">
                <?php
                  $cats = get_the_category();
                  foreach( $cats as $cat ):
                    $cat_num = $cat->term_id;
                    $cat_link = get_category_link( $cat_num );
                    $plylst_obj = get_category_by_slug('playlist_article');
                    $plylst_id = $plylst_obj->term_id;
                ?>
                  <?php if ($cat->parent==0 && $cat_num != $plylst_id): ?>
                    <li class="cat_<?php echo $cat->slug; ?>">
                      <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                    </li>
                  <?php endif; break; ?>
                <?php endforeach; ?>
            </ul>
            <h3 class="h3 entry-title pc"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><span><?php the_title_attribute(); ?></span></a></h3>
            <h3 class="h3 entry-title sp"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><span><?php echo wp_trim_words( get_the_title(), 42, '…' ); ?></span></a></h3>
            <?php $taxonomy = 'genre'; $custom_terms = get_the_terms(get_the_ID(), $taxonomy ); ?>
            <?php if (check_ary($custom_terms)): ?>
              <ul class="genre">
                <?php foreach( $custom_terms as $custom_term ): ?>
                    <li class="cat">
                      <a href="<?php echo home_url(); ?>/genre/<?php echo $custom_term->slug; ?>/" rel="tag">
                      <?php echo $custom_term->name; ?>
                      </a>
                      </li>
                <?php endforeach; ?>
              </ul>
            <?php endif ?>

          </div>
        </article>

      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php endif; wp_reset_postdata(); ?>