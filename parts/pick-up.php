<?php
  //TOPページ設定 情報取得
  $post_data = get_posts('name=top-settings&post_type=toppage_setting');
  $post_id = $post_data[0]->ID;
  $pick_up_article = get_post_meta($post_id, 'pick_up_article');
  global $exc_pp;
?>
<section id="pick-up" class="top-contents cf">
  <div class="wrap">
  <h2 class="section-title">Pick Up</h2>
      <?php
        $cnt = count($pick_up_article);
        $morecnt = 3 - $cnt;

        if ($cnt < 3) {

          //PICK UPを選択していない場合
          if (check_ary($exc_pp)) {
            $args = array( 'post_type' => array('post','special'), 'post_status' => 'publish', 'orderby' => 'rand', 'post__not_in'=> array($exc_pp), 'posts_per_page' => $morecnt );
          }else{
            $args = array( 'post_type' => array('post','special'), 'post_status' => 'publish', 'orderby' => 'rand', 'offset'=> 1, 'posts_per_page' => $morecnt );
          }
          $loop = new WP_Query( $args );
          if ($loop->have_posts()) {
            while ($loop->have_posts()) {
              $loop->the_post();
              $stacks[] = get_the_ID();
            }
          }
          wp_reset_postdata();

          foreach ($pick_up_article as $post_id) {
            $stackpu[] = $post_id;
            shuffle($stackpu);
            $stackpu = array_slice($stackpu, 0, 3);
          }

          if (isset($stackpu)) {
            $stack = array_merge($stackpu,$stacks);
            shuffle($stack);
          } else {
            $stack = $stacks;
          }

        } else {

          //PICK UPを選択している場合
          foreach ($pick_up_article as $post_id) {
            $stackpu[] = $post_id;
          }
          shuffle($stackpu);
          $stackpu = array_slice($stackpu, 0, 3);
          $stack = $stackpu;

        }
      ?>

      <div class="articles-wrap articles-wrap-pu">
        <?php foreach ($stack as $post_id):
          $post_type = get_post_type( $post_id );
          $article_title = get_post($post_id)->post_title;
          $article_title_strip = strip_tags($article_title);
        ?>
          <article id="post-<?php echo $post_id; ?>" <?php post_class( 'cf pua', $post_id ); ?> role="article">
            <div class="img">
              <a href="<?php the_permalink($post_id) ?>" rel="bookmark" title="<?php echo $article_title_strip; ?>">
                <?php if (check_ary(get_the_post_thumbnail_url($post_id))): ?>
                  <img src="<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>" alt="<?php echo $article_title_strip; ?>">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/ec-d.png" alt="<?php echo $article_title_strip; ?>">
                <?php endif ?>
              </a>
            </div>
            <div class="titles">
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
                      $plylst_obj = get_category_by_slug('playlist_article');
                      $plylst_id = $plylst_obj->term_id;
                  ?>
                    <?php if ($cat->parent==0 && $cat_num != $plylst_id): ?>
                      <li class="cat_<?php echo $cat->slug; ?>">
                        <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                      </li>
                    <?php endif; break;?>
                  <?php endforeach; ?>
                <?php endif ?>
              </ul>
              <h3 class="h3 entry-title pc"><a href="<?php the_permalink($post_id) ?>" rel="bookmark" title="<?php echo $article_title_strip; ?>"><span><?php echo $article_title; ?></span></a></h3>
              <h3 class="h3 entry-title sp"><a href="<?php the_permalink($post_id) ?>" rel="bookmark" title="<?php echo $article_title_strip; ?>"><span><?php echo wp_trim_words( $article_title, 40, '…' ); ?></span></a></h3>
              <?php $taxonomy = 'genre'; $custom_terms = get_the_terms( $post_id, $taxonomy ); ?>
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
        <?php endforeach ?>
      </div>

  </div>
</section>