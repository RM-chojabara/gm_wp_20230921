<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1>404 Page not found.</h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>
								<p><a href="<?php echo home_url(); ?>" rel="nofollow" class="btn round-btn">ギター・マガジン Web TOPページはこちら</a></p>

							</section>

						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
