<?php get_header(); ?>
<style>@media only screen and (max-width: 768px){#powerpush .titles{background-color: <?php echo $color; ?> !important;}}</style>
<div id="content">

  <?php // スマホサイズで表示するメニュー ; ?>
  <?php include(get_theme_root() . '/' . get_template() . "/parts/piano/sp-top-account.php"); ?>

  <div id="inner-content" class="cf">

    <main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

     <section id="powerpush" class="top-contents cf">
      <div class="wrap full-wrap">

        <?php
        $cnt = count($power_push_article);

        if ($cnt < 1) {

          //POWER PUSHを選択していない場合
          $args = array( 'post_type' => array('post','special'), 'post_status' => 'publish', 'orderby' => 'rand');
          $loop = new WP_Query( $args );
          if ($loop->have_posts()) {
            while ($loop->have_posts()) {
              $loop->the_post();
              $stack[] = get_the_ID();
            }
          }
          wp_reset_postdata();

        } else {

          //POWER PUSHを選択している場合
          foreach ($power_push_article as $post_id) {
            $stack[] = $post_id;
          }
          $key = array_rand($stack);
          $stack[0] = $stack[$key];

        }
        ?>
        <?php
          $post_id = $stack[0];
          $post_type           = get_post_type( $post_id );
          $article_title       = get_post($post_id)->post_title;
          $article_title_strip = strip_tags($article_title);
          $article_excerpt     = get_the_excerpt($post_id);
          $color               = get_color_data(get_post_thumbnail_id($post_id),'dominant_color_hex',true);
          $color_info          = getLuminance($color);
          $text_color          = get_post_meta($post_id,'text_color')[0];

          //背景色設定
          $bg_color          = get_post_meta($post_id,'pp_bg_color')[0];
          if($bg_color == 'image_color' || $bg_color == null){
            $bg_color_fix = null;
          } elseif($bg_color == 'white'){$bg_color_fix = '#FAFAFA'; $text_color = 'black'; $bg_color_fix_hue = '250,250,250';}
          else {$bg_color_fix = '#1A1A1A'; $text_color = 'white'; $bg_color_fix_hue = '26,26,26';};


          global $exc_pp;
          $exc_pp         = $post_id;

          $code_red = hexdec(substr($color, 1, 2));
          $code_green = hexdec(substr($color, 3, 2));
          $code_blue = hexdec(substr($color, 5, 2));
          $color_rgb =  $code_red . ", " . $code_green . ", " . $code_blue;
        ?>

         <article id="post-<?php echo $post_id; ?>" <?php post_class( 'cf ppa', $post_id ); ?> role="article">
          <div class="img">
            <a href="<?php the_permalink($post_id) ?>" rel="bookmark" title="<?php echo $article_title_strip; ?>">
              <?php if (check_ary(get_the_post_thumbnail_url($post_id))): ?>
                <img src="<?php echo get_the_post_thumbnail_url( $post_id, 'full' ); ?>" alt="<?php echo $article_title_strip; ?>">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/ec-d.png" alt="<?php echo $article_title_strip; ?>">
                <?php endif ?>
              </a>
            </div>

            <?php if ($color_info <= 50): ?>
              <div class="titles dark <?php echo $text_color; ?>" style="background-color: <?php if(isset($bg_color_fix)){echo $bg_color_fix;} else{echo $color;};?>">
            <?php else: ?>
              <div class="titles light <?php echo $text_color; ?>" style="background-color: <?php if(isset($bg_color_fix)){echo $bg_color_fix;} else{echo $color;};?>">
            <?php endif ?>
              <div class="in-b">
                <p class="pp">POWER PUSH</p>

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
                        <?php endif; break; ?>
                      <?php endforeach; ?>
                    <?php endif ?>
                  </ul>
                </div>

                <h3 class="h3 entry-title pc"><a href="<?php the_permalink($post_id) ?>" rel="bookmark" title="<?php echo $article_title_strip; ?>">
                  <?php if (mb_strlen($article_title)>45) {
                    $article_title= mb_substr($article_title,0,45);
                    echo $article_title . '…';
                    } else {echo $article_title;}
                  ?>
                </a></h3>

                <h3 class="h3 entry-title sp"><a href="<?php the_permalink($post_id) ?>" rel="bookmark" title="<?php echo $article_title_strip; ?>">
                <?php echo wp_trim_words( $article_title, 40, '…' ); ?>
                </a></h3>
                <p class="the_excerpt">
                  <?php
                    if (mb_strlen($article_excerpt)>150) {
                      $article_excerpt= mb_substr($article_excerpt,0,150);
                      echo $article_excerpt . '…';
                    } else { echo $article_excerpt;}
                  ?>
                  <span class="gradient sp" style="background: linear-gradient(rgba(<?php if(isset($bg_color_fix)){echo $bg_color_fix_hue;} else{echo $color_rgb;};?>,0), rgba(<?php if(isset($bg_color_fix)){echo $bg_color_fix_hue;} else{echo $color_rgb;};?>,.8));"></span>
                  </p>
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

          </div>
        </section>

        <?php
          //TOPページ設定 情報取得
          $post_data = get_posts('name=top-settings&post_type=toppage_setting');
          $post_id = $post_data[0]->ID;
          global $post_id;
          $top_custom_links = SCF::get('top_custom_links',$post_id);
          if(check_ary($top_custom_links[0]['top_custom_link_article']) OR check_ary($top_custom_links[0]['top_custom_link_txt'])):
        ?>
        <section id="custom_links" class="top-contents cf">
          <div class="wrap norm-wrap custom_link_wrap">
            <?php
             foreach ($top_custom_links as $fields ):
              $cl_article = $fields['top_custom_link_article'][0];
              $cl_txt = $fields['top_custom_link_txt'];
              $cl_img = $fields['top_custom_link_img'];
              $cl_url = $fields['top_custom_link_url'];
              $cl_target = $fields['top_custom_link_target'];

              if(isset($cl_article)){
                $cl_txt_in = get_post($cl_article)->post_title;
                $cl_txt_in_strip = strip_tags($cl_txt_in);
                $cl_img_in = get_the_post_thumbnail_url( $cl_article, 'large' );
                $cl_url_in = get_the_permalink($cl_article);
              } else {
                $cl_txt_in = $fields['top_custom_link_txt'];
                $cl_txt_in_strip = strip_tags($cl_txt_in);
                $cl_img_in = wp_get_attachment_image_src( $cl_img, 'large' )[0];
                $cl_url_in = $fields['top_custom_link_url'];
              };
            ?>
            <?php if(isset($cl_txt_in_strip,$cl_img_in,$cl_url_in)): ?>
            <div class="custom_link">
              <div class="img">
                <a href="<?php echo $cl_url_in; ?>" rel="bookmark" title="<?php echo $cl_txt_in_strip; ?>" target="<?php echo $cl_target; ?>">
                <img src="<?php echo $cl_img_in; ?>" alt="<?php echo $cl_txt_in_strip; ?>">
                </a>
              </div>
              <div class="title">
              <a href="<?php echo $cl_url_in; ?>" rel="bookmark" title="<?php echo $cl_txt_in_strip; ?>" target="<?php echo $cl_target; ?>">
              <p><?php echo wp_trim_words( $cl_txt_in_strip, 52, '…' ); ?></p>
              </a>
              </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </section>
        <?php endif; ?>


        <?php
          //TOP PAGE設定内のコンテンツを出力
          echo apply_filters('the_content', get_post_field( 'post_content', $post_id ));
        ?>


      </main>


    </div>

  </div>


  <?php get_footer(); ?>
