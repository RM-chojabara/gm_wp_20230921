<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

					<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<div class="single-title-area">
                <div class="img">
	                <?php if (check_ary(get_the_post_thumbnail_url())): ?>
	                  <img class="bg" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="<?php the_title_attribute(); ?>">
	                  <img class="layer" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="<?php the_title_attribute(); ?>">
	                <?php else: ?>
	                  <img class="bg" src="<?php echo get_template_directory_uri(); ?>/library/images/ec-d.png" alt="<?php the_title_attribute(); ?>">
	                  <img class="layer" src="<?php echo get_template_directory_uri(); ?>/library/images/ec-d.png" alt="<?php the_title_attribute(); ?>">
	                <?php endif ?>
                </div>
                <?php include(get_theme_root() . '/' . get_template() . "/parts/breadcrumbs.php"); ?>
                <div class="titles">
									<div class="inner">
										<h1 class="h3 entry-title"><?php the_title(); ?></h1>
										<time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time('Y-m-d'); ?></time>
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
                </div>
						</div>



						<?php
							global $page_layout;
							$page_layout = SCF::get('page_layout');
							if ($page_layout == 'two-column'): ?>
							<div class="contain-sidebar wrap und-wrap two-column cf">
							<?php elseif ($page_layout == 'one-column') : ?>
							<div class="contain-sidebar wrap und-wrap one-column cf">
							<?php else: ?>
							<div class="contain-sidebar wrap und-wrap one-column no-ad cf">
						<?php endif; ?>
							<div class="inl">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<?php
										/*
										 * Ah, post formats. Nature's greatest mystery (aside from the sloth).
										 *
										 * So this function will bring in the needed template file depending on what the post
										 * format is. The different post formats are located in the post-formats folder.
										 *
										 *
										 * REMEMBER TO ALWAYS HAVE A DEFAULT ONE NAMED "format.php" FOR POSTS THAT AREN'T
										 * A SPECIFIC POST FORMAT.
										 *
										 * If you want to remove post formats, just delete the post-formats folder and
										 * replace the function below with the contents of the "format.php" file.
										*/
										get_template_part( 'post-formats/format', get_post_format() );
									?>

								<?php endwhile; ?>

								<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
											</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
											</section>
											<footer class="article-footer">
													<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
											</footer>
									</article>

								<?php endif; ?>

								<?php //ISE TAG ?>
								<div id="csw_block"></div>
								<script async>
								(function(d,s,o,f,p,c,t){c=d.createElement(s);c.type='text/javascript';c.charset='UTF-8';c.async=true;c.src=o+f+'?i='+p;t=d.getElementsByTagName(s)[0];t.parentNode.insertBefore(c,t);})(document,'script','//client.contents-search-windows.com/','csw_cl_b.js','mukHp7L3Tv6lbmAj')
								</script>

								<?php //LOGLY RELATED PC
								include(get_theme_root() . '/' . get_template() . "/parts/logly_pc_related.php"); ?>
								<?php //LOGLY RELATED SP
								include(get_theme_root() . '/' . get_template() . "/parts/logly_sp_related.php"); ?>

							</div>
							<?php
								if ($page_layout == 'no-ads') {
									get_sidebar('no-ad');
								} elseif ($page_layout == 'two-column') {
									get_sidebar();
								};
							?>
						</div>

					</main>

					<?php
						if ($page_layout != 'no-ads'){
							include(get_theme_root() . '/' . get_template() . "/parts/ad-area-02.php");
						}
					?>
          <?php include(get_theme_root() . '/' . get_template() . "/parts/latest.php"); ?>
					<?php
						if ($page_layout != 'no-ads'){
							include(get_theme_root() . '/' . get_template() . "/parts/ad-area-03.php");
						}
					?>
					<?php include(get_theme_root() . '/' . get_template() . "/parts/magazine.php"); ?>
					<?php
						if ($page_layout != 'no-ads'){
							include(get_theme_root() . '/' . get_template() . "/parts/ad-area-04.php");
						}
					?>

				</div>

			</div>

<?php get_footer(); ?>
