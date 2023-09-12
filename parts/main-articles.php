<?php
$plylst_obj = get_category_by_slug('playlist_article');
$plylst_id = $plylst_obj->term_id;
$gmsp_obj = get_category_by_slug('gm_special_session');
$gmsp_id = $gmsp_obj->term_id;
$axis_obj = get_category_by_slug('the_axis_gear_movie');
$axis_id = $axis_obj->term_id;
$uncat_obj = get_category_by_slug('uncategorized');
$uncat_id = $uncat_obj->term_id;
$categories = get_categories(
  array(
    'parent' => 0,
    'hide_empty' => true,
    'exclude' => array($plylst_id,$gmsp_id,$axis_id,$uncat_id) //GM Special Session , Playlist Article , The Axis’ Gear Movie , Uncategorized
  )
);
if (check_ary($categories)) :?>
<section id="main-articles" class="top-contents cf">
  <div class="wrap norm-wrap contain-sidebar">

    <div class="inl">

      <?php foreach ($categories as $category): $counter++;?>

        <?php if ($counter == 4): ?>
            <?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-02.php"); ?>
        <!--div class="top-contents cf ad inloop">
          <div class="wrap">
            <div class="adblock">AD 02</div>
          </div>
        </div-->
        <?php endif ?>

        <?php
        $args = array( 'post_type' => array('post','special'), 'post_status' => 'publish', 'orderby' => 'date', 'posts_per_page' => 4 ,'cat' => $category->term_id );
        $my_query = new WP_Query( $args );
        if ($my_query->have_posts()):
        ?>
          <h2 class="section-title"><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?> <i class="fas fa-chevron-right"></i></a></h2>

          <div class="articles-wrap articles-wrap-main">
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
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
                        $parent_id = $cat->category_parent;
                        $now_id = $category->term_taxonomy_id;
                        if ($parent_id == $now_id):
                    ?>
                      <li class="cat_<?php echo $cat->slug; ?>">
                        <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                      </li>
                    <?php endif; endforeach; ?>
                  </ul>

                  <h3 class="h3 entry-title pc"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a></h3>
                  <h3 class="h3 entry-title sp"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words( get_the_title(), 42, '…' ); ?></a></h3>
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

            <?php endwhile; wp_reset_postdata(); ?>
          </div>
          <div class="contain-categories">
            <p><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo $category->name; ?></a></p>
            <?php
              if ($category->name == 'Playing' || $category->name == 'Interview' || $category->name == 'Interview' || $category->name == 'For Beginners'):
                $terms = get_terms('genre');
            ?>
              <ul class="sub-cat">
                <?php foreach( $terms as $term ): ?>
                  <li><a href="?cat=<?php echo $category->term_id; ?>&genre=<?php echo $term->name; ?>">
                    <?php echo $term->name; ?>
                  </a></li>
                <?php endforeach; ?>
              </ul>

            <?php else: ?>
              <?php
                $args = array(
                  'child_of'                 => $category->term_id,
                  'hide_empty'               => FALSE,
                  'hierarchical'             => 1
                );
                $child_categories = get_categories($args );
                if (check_ary($child_categories)):
              ?>
                <ul class="sub-cat">
                  <?php foreach( $child_categories as $category ): ?>
                    <li><a href="<?php echo get_category_link( $category->term_id ); ?>">
                      <?php echo $category->cat_name; ?>
                    </a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            <?php endif ?>
          </div>

        <?php endif; ?>
      <?php endforeach; ?>

    </div>
    <?php get_sidebar(); ?>
  </div>
</section>
<?php endif; ?>