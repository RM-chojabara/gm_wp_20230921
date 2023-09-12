<?php
  $posts = get_posts(array(
      'post_type' => 'magazine',
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC'
  ));
  $post_label = get_post_type_object(get_post_type($posts[0]))->label;
  $post_name = get_post_type_object(get_post_type($posts[0]))->name;
  global $post;
  if($posts):
?>
<section id="magazine" class="top-contents cf">
  <div class="wrap full-wrap">
    <h2 class="section-title outer-title"><a href="<?php echo home_url() . '/' . $post_name; ?>"><?php echo $post_label; ?> <i class="fas fa-chevron-right"></i></a></h2>
    <div class="special-articles-wrap">

      <?php
        foreach($posts as $post):
          setup_postdata($post);
          $image = SCF::get('image');
          $image_url = wp_get_attachment_image_src($image,'large')[0];
          $sub_title = SCF::get('sub_title');
          $price = SCF::get('price');
          $type = SCF::get('type');
          $spec = SCF::get('spec');
          $date = SCF::get('date');
          $btn_group = SCF::get('btn_group');
          $text_color = SCF::get('text_color');


          if (check_ary($image_url)) {
            $main_image = $image_url;
            $color = get_color_data($image,'dominant_color_hex',true);
          } else {
            if (check_ary(get_the_post_thumbnail_url( get_the_ID(), 'full' ))) {
              $main_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
              $color = get_color_data(get_post_thumbnail_id(),'dominant_color_hex',true);
            } else {
              $main_image = get_template_directory_uri() . '/library/images/ec-d.png';
              $color = get_color_data(get_template_directory_uri() . '/library/images/ec-d.png','dominant_color_hex',true);
            }
          }
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
      ?>
      <style>
        .mga .mg-b,.mga .mg-b:visited{border-color: rgb(<?php echo $rgb; ?>); color: rgb(<?php echo $rgb; ?>);}
        .mga .mg-b:hover,.mga .mg-b:visited:hover{color: rgb(<?php echo $rgb; ?>);background: rgb(<?php echo $rgb; ?>); color: #FFF;}
        #mg-sbt, #mg-t,#mg-ex{ color: rgba(<?php echo $rgb; ?>,.87); }
        #mg-dtl{ color: rgba(<?php echo $rgb; ?>,.54); }
        #mg-dtl li{border-color: rgba(<?php echo $rgb; ?>,.12); }
        #mg-btn,#mg-btn:visited{color: rgba(<?php echo $rgb; ?>,1); border-color: rgb(<?php echo $rgb; ?>);}
        #mg-btn:hover,#mg-btn:visited:hover{color: rgba(255,255,255,.87);background-color: rgba(<?php echo $rgb; ?>,1); }
        #mg-btn:after,#mg-btn:visited:after{background-color: rgba(<?php echo $rgb; ?>,1); }
      </style>

        <?php if ($color_info <= 50): ?>
          <img src="<?php echo $main_image;?>" alt="" class="bg blur dark">
        <?php else: ?>
          <img src="<?php echo $main_image;?>" alt="" class="bg blur light">
        <?php endif ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'spa mga t-mga' ); ?> role="article">

          <div class="img">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <img src="<?php echo $main_image;?>" alt="<?php the_title_attribute(); ?>">
            </a>
            <?php if (check_ary($btn_group)): ?>
              <ul class="btn-list">
                <?php foreach ($btn_group as $b): ?>
                  <li><a href="<?php echo $b['btn_url']; ?>" class="btn round-btn mg-b" target="_blank"><?php echo $b['btn_txt']; ?> <i class="fas fa-chevron-right"></i></a></li>
                <?php endforeach ?>
              </ul>
            <?php endif ?>
          </div>

          <div class="titles">
            <?php if (check_ary($sub_title)): ?>
              <h3 id="mg-sbt"><?php the_title(); ?></h3>
              <p id="mg-t" class="h2 entry-title"><?php echo $sub_title ?></p>
            <?php else: ?>
              <h3 id="mg-t" class="h2 entry-title"><?php the_title(); ?></h3>
            <?php endif ?>
            <div id="mg-ex" class="the_excerpt"><?php the_excerpt(); ?></div>
            <?php if (check_ary($price) || check_ary($type) || check_ary($spec) || check_ary($date)): ?>
            <ul id="mg-dtl" class="detail-list">
              <?php if (check_ary($price)): ?>
                <li><span>定価</span><span><?php echo $price; ?></span></li>
              <?php endif ?>
              <?php if (check_ary($type)): ?>
                <li><span>品種</span><span><?php echo $type; ?></span></li>
              <?php endif ?>
              <?php if (check_ary($spec)): ?>
                <li><span>仕様</span><span><?php echo $spec; ?></span></li>
              <?php endif ?>
              <?php if (check_ary($date)): ?>
                <li><span>発売日</span><span><?php echo $date; ?></span></li>
              <?php endif ?>
            </ul>
            <?php endif ?>
            <div class="btn-area">
              <a id="mg-btn" href="<?php the_permalink() ?>" class="btn pc">VIEW MORE <i class="fas fa-chevron-right"></i></a>
              <a id="mg-btn" href="<?php the_permalink() ?>" class="btn round-btn sp">詳細を見る <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </article>

      <?php endforeach; ?>

    </div>

  </div>
</section>

<?php endif; wp_reset_postdata(); ?>