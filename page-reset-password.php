<?php
/*
 Template Name: reset-password
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

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title">リセットパスワードページ</h1>

									<p class="byline vcard">
										<?php printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>


								</header>


							</article>

              リセットパスワード
              <div id="js-resetPasswordContainer"></div>
							<script type='text/javascript'>
								tp.push([
										"init",
										function () {
										// リセットパスワード初期設定
											console.log('reset-password');
											// Password can be reset only if user is anonymous
											if (!tp.user.isUserValid()) {
												// If URL has reset_token parameter
												var tokenMatch = location.search.match(/reset_token=([A-Za-z0-9]+)/);
												if (tokenMatch) {
													// Get value of the token
													var token = tokenMatch[1];
													// Present password reset form with the found token
													tp.pianoId.show({
															'resetPasswordToken': token, loggedIn: function () {
																	// Once user logs in - refresh the page
																	// location.reload();
																	location.href = "/my-account"
															}
													});
												}
											}
										},
									]);
							</script>

					</main>
				</div>

			</div>


<?php get_footer(); ?>
