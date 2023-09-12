<?php get_header(); ?>

			<div id="content">

				<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-01.php"); ?>

				<div id="inner-content" class="cf">



					<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

            <div class="page-title-area wrap">

              <h1 class="page-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>


            </div>

						<div class="contain-sidebar wrap und-wrap archive-wrap cf">
							<div class="inl">



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
