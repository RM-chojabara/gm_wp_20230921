<?php
/*
 Template Name: members only
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-01.php"); ?>

				<div id="inner-content" class="cf">

						<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<div class="single-title-area">
								<div class="titles">
									<div class="inner">
										<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
									</div>
								</div>
							</div>

							<div class="contain-sidebar wrap und-wrap two-column cf">

								<div class="inl">

									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

										<section class="entry-content cf" itemprop="articleBody">
											<?php
												// the content (pretty self explanatory huh)
												the_content();

												/*
												 * Link Pages is used in case you have posts that are set to break into
												 * multiple pages. You can remove this if you don't plan on doing that.
												 *
												 * Also, breaking content up into multiple pages is a horrible experience,
												 * so don't do it. While there are SOME edge cases where this is useful, it's
												 * mostly used for people to get more ad views. It's up to you but if you want
												 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
												 *
												 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
												 *
												*/
												wp_link_pages( array(
													'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
													'after'       => '</div>',
													'link_before' => '<span>',
													'link_after'  => '</span>',
												) );
											?>
										</section> <?php // end article section ?>

										<footer class="article-footer cf">

										</footer>

										<?php comments_template(); ?>

									</article>

									<?php endwhile; endif; ?>

								</div><?php //inl ?>

								<?php get_sidebar(); ?>

							</div>

						</main>

					<?php
						include(get_theme_root() . '/' . get_template() . "/parts/ad-area-02.php");
						include(get_theme_root() . '/' . get_template() . "/parts/latest.php");
						include(get_theme_root() . '/' . get_template() . "/parts/ad-area-03.php");
						include(get_theme_root() . '/' . get_template() . "/parts/magazine.php");
						include(get_theme_root() . '/' . get_template() . "/parts/ad-area-04.php");
					?>

				</div>

			</div>

<?php get_footer(); ?>
