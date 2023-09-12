<?php get_header(); ?>

<div id="content">


  <div id="inner-content" class="cf">

    <main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

     <section id="powerpush" class="top-contents cf">
      <div class="wrap">

        <?php
        $power_push_article = get_post_meta(7, 'power_push_article');
        $cnt = count($power_push_article);
        $morecnt = 1 - $cnt;
        foreach ($power_push_article as $post_id) { $stack[] = $post_id; }
        if ($cnt < 1) {
          $args = array( 'post_type' => array('post','special'), 'post_status' => 'publish', 'orderby' => 'date', 'posts_per_page' => $morecnt );
          $loop = new WP_Query( $args );
          if ($loop->have_posts()) {
            while ($loop->have_posts()) {
              $loop->the_post();
              $stack[] = get_the_ID();
            }
          }
          wp_reset_postdata();
        }
        ?>
        <?php foreach ($stack as $post_id):
         $post_type = get_post_type( $post_id );
         $article_title = get_post($post_id)->post_title;
         $article_title_strip = strip_tags($article_title);
         $color = get_color_data(get_post_thumbnail_id($post_id),'dominant_color_hex',true);
         $color_info = getLuminance($color);
         ?>

         <article id="post-<?php echo $post_id; ?>" <?php post_class( 'cf', $post_id ); ?> role="article">
          <div class="img">
            <a href="<?php the_permalink($post_id) ?>" rel="bookmark" title="<?php echo $article_title_strip; ?>">
              <?php if (check_ary(get_the_post_thumbnail_url($post_id))): ?>
                <img src="<?php echo get_the_post_thumbnail_url( $post_id, 'full' ); ?>" alt="<?php echo $article_title_strip; ?>">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/ec-d.png" alt="<?php echo $article_title_strip; ?>">
                <?php endif ?>
              </a>
            </div>
            <style>
              @media only screen and (max-width: 768px){#powerpush .titles{background-color: <?php echo $color; ?> !important;}}
            </style>
            <div class="titles">
              <div class="meta">
                <time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d',$post_id); ?>" itemprop="datePublished"><?php echo get_the_time('Y-m-d',$post_id); ?></time>
                <ul class="cat">
                  <?php if ($post_type == 'special'): ?>
                    <li class="cat_special"><a href="<?php echo home_url(); ?>/<?php echo $post_type; ?>/"><?php echo $post_type; ?></a></li>
                    <?php else: ?>
                      <?php
                      $cats = get_the_category($post_id);
                      foreach( $cats as $cat ):
                        $cat_num = $cat->term_id;
                        $cat_link = get_category_link( $cat_num );
                        ?>
                        <?php if ($cat->parent==0 && $cat_num != 176): ?>
                          <li class="cat_<?php echo $cat->slug; ?>">
                            <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                          </li>
                        <?php endif; break; ?>
                      <?php endforeach; ?>
                    <?php endif ?>
                  </ul>
                  <ul class="genre">
                    <?php $taxonomy = 'genre'; $custom_terms = get_the_terms( $post_id, $taxonomy ); ?>
                    <?php foreach( $custom_terms as $custom_term ): ?>
                      <li class="cat">
                        <a href="<?php echo home_url(); ?>/genre/<?php echo $custom_term->slug; ?>/" rel="tag">
                          <?php echo $custom_term->name; ?>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <h3 class="h3 entry-title"><a href="<?php the_permalink($post_id) ?>" rel="bookmark" title="<?php echo $article_title_strip; ?>">
                  <?php if ($color_info <= 50): ?>
                    <span class="dark" style="background-color: <?php echo $color; ?>"><?php echo $article_title; ?></span>
                    <?php else: ?>
                      <span class="light" style="background-color: <?php echo $color; ?>"><?php echo $article_title; ?></span>
                    <?php endif ?>
                  </a></h3>
                </div>
              </article>
            <?php endforeach ?>

          </div>
        </section>


        <?php
          //TOP PAGE設定内のコンテンツを出力
          $post_id = get_post(7);
          echo apply_filters('the_content', get_post_field( 'post_content', $post_id ));
        ?>


      </main>


    </div>

  </div>


  <?php get_footer(); ?>
