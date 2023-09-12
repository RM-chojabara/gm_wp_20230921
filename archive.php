<?php get_header(); ?>

			<div id="content">
        <?php if (is_archive()): ?>
          <?php include(get_theme_root() . '/' . get_template() . "/parts/breadcrumbs.php"); ?>
        <?php endif ?>
				<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-01.php"); ?>


				<div id="inner-content" class="cf">



					<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

            <div class="page-title-area wrap">

              <?php
              if (is_post_type_archive('post')) {
                echo "<h1 class='page-title'>Archive</h1>";
              } else {
                $url = $_SERVER['QUERY_STRING'];
                if(strstr($url,'genre=')==true){
                  $genreslug = substr($url, strrpos($url, '=') + 1);
                  $genreslug = urldecode($genreslug);
                  $idObj = get_term_by( 'slug', $genreslug, 'genre' );
                  echo '<h1 class="page-title">' . get_the_archive_title() . '<small><span>+</span> ' . $idObj->name .'</small></h1>';
                  the_archive_description( '<div class="taxonomy-description">', '</div>' );
                } elseif(strstr($url,'tag=')==true) {
                  $tagslug = substr($url, strrpos($url, '=') + 1);
                  $tagslug = urldecode($tagslug);
                  $idObj = get_term_by( 'slug', $tagslug, 'post_tag' );
                  echo '<h1 class="page-title">' . get_the_archive_title() . '<small><span>+</span> ' . $idObj->name .'</small></h1>';
                  the_archive_description( '<div class="taxonomy-description">', '</div>' );
                } else {
                  the_archive_title( '<h1 class="page-title">', '</h1>' );
                  the_archive_description( '<div class="taxonomy-description">', '</div>' );
                }
              }
              ?>

              <?php if (is_post_type_archive('post')): ?>


                <ul class="cat children-list">
                <?php
                  $uncat_obj = get_category_by_slug('uncategorized');
                  $uncat_id = $uncat_obj->term_id;
                  $args = array(
                    'parent' => 0,
                    'orderby' => 'term_order',
                    'order' => 'ASC',
                    'exclude' => $uncat_id,
                    'hide_empty' => true
                  );
                  $categories = get_categories( $args );
                ?>

                <?php foreach( $categories as $category ) : ?>
                  <li>
                    <a href="<?php echo get_category_link( $category->term_id ); ?>">#<?php echo $category->name; ?> <i class="fas fa-chevron-right"></i></a>
                  </li>
                <?php endforeach; ?>

                </ul>


              <?php elseif (is_category(array('interview','playing'))): ?>


                <ul class="cat children-list">
                  <?php $cat_id = get_query_var('cat');
                    $terms = get_terms('genre');
                    foreach ( $terms as $term ) :
                  ?>
                    <li><a href="<?php echo home_url(); ?>?cat=<?php echo $cat_id; ?>&genre=<?php echo $term->slug; ?>">#<?php echo $term->name; ?> <i class="fas fa-chevron-right"></i></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php


                elseif (is_category()):


                  $categories = get_terms( 'category', array(
                  'orderby' => 'count',
                  'hide_empty' => 0,
                  'parent' => get_query_var('cat'),
                  ) );
                  if(!empty($categories)):
              ?>
                <ul class="cat children-list">
                  <?php foreach($categories as $value): ?>
                  <li><a href="<?php echo get_category_link($value->term_id); ?>">#<?php echo $value->name;?> <i class="fas fa-chevron-right"></i></a></li>
                  <?php endforeach; ?>
                </ul>
                <?php endif; ?>


              <?php elseif (is_post_type_archive('special')) : ?>


                <?php if (is_active_nav_menu('special-menu')): ?>
                      <?php wp_nav_menu(array(
                             'container' => false,                           // remove nav container
                             'menu' => __( 'Special menu', 'bonestheme' ),  // nav name
                             'menu_class' => 'cat children-list',               // adding custom nav class
                             'theme_location' => 'special-menu',                 // where it's located in the theme
                             'before' => '',                                 // before the menu
                               'after' => '',                                  // after the menu
                               'link_before' => '#',                            // before each link
                               'link_after' => ' <i class="fas fa-chevron-right"></i>',                             // after each link
                               'depth' => 0,                                   // limit the depth of the nav
                             'fallback_cb' => ''                             // fallback function (if there is one)
                      )); ?>
                <?php endif; ?>


              <?php elseif (is_post_type_archive('magazine')) : ?>


              <?php elseif (is_tag()) :
                  $uncat_obj = get_category_by_slug('uncategorized');
                  $uncat_id = $uncat_obj->term_id;
                  $categories = get_terms( 'category', array(
                  'orderby' => 'count',
                  'hide_empty' => 0,
                  'exclude' => $uncat_id,
                  'parent' => 0
                  ) );
              ?>
                <ul class="cat children-list">
                  <?php foreach($categories as $value):
                    $id = $value->term_id;
                    ?>
                  <li><a href="/?cat=<?php echo $id; ?>&tag=<?php echo get_query_var('tag'); ?>">#<?php echo $value->name;?> <i class="fas fa-chevron-right"></i></a></li>
                  <?php endforeach; ?>
                </ul>


              <?php else:
                  $uncat_obj = get_category_by_slug('uncategorized');
                  $uncat_id = $uncat_obj->term_id;
                  $categories = get_terms( 'category', array(
                  'orderby' => 'count',
                  'hide_empty' => 0,
                  'exclude' => $uncat_id,
                  'parent' => 0
                  ) );
              ?>
                <ul class="cat children-list">
                  <?php foreach($categories as $value):
                    $id = $value->term_id;
                    ?>
                  <li><a href="/?cat=<?php echo $id; ?>&genre=<?php echo get_query_var('genre'); ?>">#<?php echo $value->name;?> <i class="fas fa-chevron-right"></i></a></li>
                  <?php endforeach; ?>
                </ul>


              <?php endif ?>


            </div>

						<div class="contain-sidebar wrap und-wrap archive-wrap cf">
							<div class="inl">


              <?php
              //指板図くん
              if (is_category( array(2,'shibanzu-kun','shibanzukun'))): ?>

                <?php
                  //TOPページ設定 情報取得
                  $detail_setting_page_id = get_posts('name=top-settings&post_type=toppage_setting');
                  $detail_setting_page_id = $detail_setting_page_id[0];
                  $shibanzu_kun_banner_group = SCF::get('shibanzu_kun_banner_group',$detail_setting_page_id);
                ?>
                <?php if (check_ary($shibanzu_kun_banner_group)): ?>
                  <section id="shibanzu-area" class="top-contents cf ad">
                    <div class="wrap shibanzu-wrap">
                      <div class="banners">
                        <?php foreach ( $shibanzu_kun_banner_group as $fields ) :?>
                          <?php
                          $imgID    = $fields['shibanzu_kun_banner_image'];
                          $imgURL   = wp_get_attachment_image_src($imgID,'full')[0];
                          $linkURL  = esc_html( $fields['shibanzu_kun_banner_url']);
                          ?>
                          <div class="imgwrap"><a href="<?php echo $linkURL; ?>"><img src="<?php echo $imgURL ?>" alt="banner"></a></div>
                        <?php endforeach; ?>
                      </div>

                    </div>
                  </section>
                <?php endif ?>

              <?php endif ?>


								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf norm-article' ); ?> role="article">
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
                  <?php
                    //カスタム投稿タイプアーカイブ時
                    if (is_post_type_archive()):
                  ?>
                    <?php
                      $cats = get_the_category();
                      if (check_ary($cats)):
                    ?>
                      <ul class="cat">
                        <?php
                          foreach( $cats as $cat ):
                            $cat_num = $cat->term_id;
                            $cat_link = get_category_link( $cat_num );
                            $plylst_obj = get_category_by_slug('playlist_article');
                            $plylst_id = $plylst_obj->term_id;
                            if ($cat->parent==0 && $cat_num != $plylst_id):
                        ?>
                          <li class="cat_<?php echo $cat->slug; ?>">
                            <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                          </li>
                        <?php endif; break; endforeach; ?>
                      </ul>
                    <?php endif; ?>

                  <?php
                    //Genreアーカイブ時
                    elseif(is_tax()):
                  ?>
                    <?php
                      $post_type = get_post_type();
                      if ($post_type == 'special'):
                    ?>
                      <ul class="cat">
                        <li class="cat_special">
                          <a href="<?php echo home_url(); ?>/special/">Special</a>
                        </li>
                      </ul>
                    <?php else: ?>
                      <?php
                        $cats = get_the_category();
                        $cat_id = get_query_var('cat');
                        if (check_ary($cats)):
                      ?>
                        <ul class="cat">
                          <?php
                            $plylst_obj = get_category_by_slug('playlist_article');
                            $plylst_id = $plylst_obj->term_id;
                            foreach( $cats as $cat ):
                              $cat_num = $cat->term_id;
                              $cat_link = get_category_link( $cat_num );
                              if ($cat->parent==0 && $cat_num != $plylst_id):
                          ?>
                            <li class="cat_<?php echo $cat->slug; ?>">
                              <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                            </li>
                          <?php endif; endforeach; ?>
                        </ul>
                      <?php endif; ?>
                    <?php endif; ?>


                  <?php
                    //通常投稿アーカイブ時
                    else:
                  ?>
                    <?php
                      $cats = get_the_category();
                      $cat_id = get_query_var('cat');
                      if (check_ary($cats)):
                    ?>
                      <ul class="cat">
                        <?php
                          $plylst_obj = get_category_by_slug('playlist_article');
                          $plylst_id = $plylst_obj->term_id;
                          foreach( $cats as $cat ):
                            $cat_num = $cat->term_id;
                            $cat_link = get_category_link( $cat_num );
                            if ($cat->parent==0 && $cat_num != $plylst_id):
                        ?>
                          <li class="cat_<?php echo $cat->slug; ?>">
                            <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                          </li>
                        <?php endif; endforeach; ?>
                      </ul>
                    <?php endif; ?>

                  <?php endif ?>

                  <h3 class="h3 entry-title pc"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a></h3>
                  <h3 class="h3 entry-title sp"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words( get_the_title(), 42, '…' ); ?></a></h3>

                    <ul class="genre">
                      <?php $taxonomy = 'genre'; $custom_terms = get_the_terms(get_the_ID(), $taxonomy ); ?>
                      <?php foreach( $custom_terms as $custom_term ): ?>
                          <li class="cat">
                            <a href="<?php echo home_url(); ?>/genre/<?php echo $custom_term->slug; ?>/" rel="tag">
                            <?php echo $custom_term->name; ?>
                            </a>
                            </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
              </article>

								<?php endwhile; ?>

										<?php bones_page_navi(); ?>

								<?php else : ?>

										<div class="post-not-found">
                      <p class="sorry">投稿が見つかりません</p>
                    </div>

								<?php endif; ?>
							</div>

							<?php get_sidebar(); ?>

						</div><?php // /.contain-sidebar ?>

					</main>

					<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-02.php"); ?>
          <?php include(get_theme_root() . '/' . get_template() . "/parts/latest.php"); ?>



					<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-03.php"); ?>
					<?php include(get_theme_root() . '/' . get_template() . "/parts/magazine.php"); ?>
					<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-04.php"); ?>

				</div>

			</div>

<?php get_footer(); ?>
