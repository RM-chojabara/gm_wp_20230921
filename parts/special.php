<?php
  $post_data = get_posts('name=top-settings&post_type=toppage_setting');
  global $exc_pp;

  if (empty($exc_pp)) {
    $posts = get_posts(array( 'post_type' => 'special', 'posts_per_page' => 4, 'orderby' => 'date', 'order' => 'DESC' ));
  } else {
    $posts = get_posts(array( 'post_type' => 'special', 'posts_per_page' => 4, 'orderby' => 'date', 'order' => 'DESC', 'post__not_in'=> array($exc_pp) ));
  }
  $post_label = get_post_type_object(get_post_type($posts[0]))->label;
  $post_name = get_post_type_object(get_post_type($posts[0]))->name;
  global $post;
  if($posts):
?>
<section id="special" class="top-contents cf">
  <div class="wrap full-wrap">
    <h2 class="section-title outer-title"><a href="<?php echo home_url() . '/' . $post_name; ?>"><?php echo $post_label; ?> <i class="fas fa-chevron-right"></i></a></h2>




    <div class="special-articles-wrap">
    <div class="articles-wrap special-articles-wrap-inner">

      <?php
        $first_article_flag = true; //ループの最初かどうか判別する　「if($first_article_flag)」

        foreach($posts as $post):
          setup_postdata($post);

          //画像関連情報取得
          $main_image = SCF::get('main_image');
          $main_image_url = wp_get_attachment_image_src($main_image,'large')[0];

          $bg_color = SCF::get('bg_color');
          if($bg_color == 'image_color' || $bg_color == null){
            $bg_color_fix = null;
          } elseif($bg_color == 'white'){$bg_color_fix = '#FAFAFA';}
          else {$bg_color_fix = '#1A1A1A';};
          
          if (check_ary($main_image_url)) { //メイン画像が存在する場合
            $special_image = $main_image_url;
            $color = get_color_data($main_image,'dominant_color_hex',true);
          } else { //メイン画像が存在しないがサムネイルが設定されている場合
            if (check_ary(get_the_post_thumbnail_url( get_the_ID(), 'full' )) || !check_ary($main_image_url)) {
              $special_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
              $color = get_color_data(get_post_thumbnail_id(),'dominant_color_hex',true);
            } else { //メイン画像もサムネイルも設定されていない場合
              $special_image = get_template_directory_uri() . '/library/images/ec-d.png';
              $color = get_color_data(get_template_directory_uri() . '/library/images/ec-d.png','dominant_color_hex',true);
            }
          };

          //タイトル等
          $article_title       = get_the_title();
          $article_excerpt     = get_the_excerpt();

          if($first_article_flag){
            $text_color = SCF::get('text_color');
            $color_info = getLuminance($color);
            $color = preg_replace("/#/", "", $color);
            $ccode["r"] = hexdec(substr($color, 0, 2));
            $ccode["g"] = hexdec(substr($color, 2, 2));
            $ccode["b"] = hexdec(substr($color, 4, 2));
            if ($text_color == 'white') {
              $rgb = '255,255,255';
            } elseif ($text_color == 'black') {
              $rgb = '0,0,0';
            } else{
              $rgb = $ccode["r"] . ',' . $ccode["g"] . ',' . $ccode["b"];
            }
          }
      ?>

      <?php if($first_article_flag): //1記事目 ?>
      <style>
        #sp-tt a,#sp-tt a:visited{color: rgba(<?php echo $rgb; ?>, 1 );}
        #sp-tt a:hover,#sp-tt a:visited:hover{color: rgba(<?php echo $rgb; ?>, .87 );}
        .special_excerpt{color: rgba(<?php echo $rgb; ?>, .87 );}
        #sp-t{color: rgba(<?php echo $rgb; ?>, .34 );}
        #sp-c a,#sp-g a{color: rgba(<?php echo $rgb; ?>, .54 );}
        #sp-c a:hover,#sp-g a:hover{color: rgba(<?php echo $rgb; ?>, .87 );}
        #sp-g li:before{color: rgba(<?php echo $rgb; ?>, .54 );}
        a.special_btn,a.special_btn:visited{color: rgba(<?php echo $rgb; ?>, 1 );}
        a.special_btn:after,a.special_btn:visited:after{background-color: rgba(<?php echo $rgb; ?>, 1 );}
        <?php if ($text_color == 'white'): ?>
          a.special_btn:hover,a.special_btn:visited:hover{color: rgba(0,0,0,1);}
        <?php elseif ($text_color == 'black'): ?>
          a.special_btn:hover,a.special_btn:visited:hover{color: rgba(255,255,255,1);}
        <?php else: ?>
          .light a.special_btn:hover,.light a.special_btn:visited:hover{color: rgba(0,0,0,1);}
          .dark a.special_btn:hover,.dark a.special_btn:visited:hover{color: rgba(255,255,255,1);}
        <?php endif ?>
        <?php if($bg_color_fix): ?>
          .special-articles-wrap{background: <?php echo $bg_color_fix; ?>;}
        <?php endif; ?>
      </style>
      <?php endif; ?>

      <?php if($first_article_flag): if(!isset($bg_color_fix)): //1記事目 ?>
        <?php if ($color_info <= 50): ?>
          <img src="<?php echo $special_image;?>" alt="" class="bg blur dark">
        <?php else: ?>
          <img src="<?php echo $special_image;?>" alt="" class="bg blur light">
        <?php endif; endif ?>
      <?php endif ?>
        <article id="post-<?php the_ID(); ?>" <?php if($first_article_flag){post_class( 'spa' );} else{post_class( 'spa' );};  ?> role="article">

          <div class="titles">
            <time id="sp-t" class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time('Y-m-d'); ?></time>
            <ul id="sp-c" class="cat">
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
            <h3 id="sp-tt" class="h2 entry-title"><a href="<?php echo the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <?php if (mb_strlen($article_title)>45) {
                  $article_title= mb_substr($article_title,0,45);
                  echo $article_title . '…';
                  } else {echo $article_title;}
                ?>
              </a></h3>

              
              <?php if($first_article_flag): //1記事目 ?><div class="the_excerpt special_excerpt">
                <p class="pc">
                  <?php
                    if (mb_strlen($article_excerpt)>150) {
                      $article_excerpt= mb_substr($article_excerpt,0,150);
                      echo $article_excerpt . '…';
                    } else { echo $article_excerpt;}
                  ?>
                </p>
                <p class="sp">
                  <?php
                    if (mb_strlen($article_excerpt)>84) {
                      $article_excerpt= mb_substr($article_excerpt,0,84);
                      echo $article_excerpt . '…';
                    } else { echo $article_excerpt;}
                  ?>
                </p>
              </div><?php endif; ?>
              

            <?php $taxonomy = 'genre'; $custom_terms = get_the_terms(get_the_ID(), $taxonomy ); ?>
            <?php if (check_ary($custom_terms)): ?>
              <ul id="sp-g" class="genre">
                <?php foreach( $custom_terms as $custom_term ): ?>
                    <li class="cat">
                      <a href="<?php echo home_url(); ?>/genre/<?php echo $custom_term->slug; ?>/" rel="tag">
                      <?php echo $custom_term->name; ?>
                      </a>
                      </li>
                <?php endforeach; ?>
              </ul>
            <?php endif ?>
            <?php if($first_article_flag): //1記事目 ?><a href="<?php the_permalink() ?>" class="btn special_btn">VIEW DETAIL <i class="fas fa-chevron-right"></i></a><?php endif; ?>
          </div>

          <div class="img">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <img src="<?php echo $special_image;?>" alt="<?php the_title_attribute(); ?>">
            </a>
          </div>
        </article>

      <?php $first_article_flag = false; endforeach; ?>

    </div>
    </div>

  </div>
</section>

<?php endif; wp_reset_postdata(); ?>