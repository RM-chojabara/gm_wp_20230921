<?php
/*
 Template Name: my-account
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

				<div id="inner-content" class="wrap cf piano-my-page">

						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/parts/piano/style/my-page-style.css">

								<header class="article-header piano-my-page__header">
									<h1 class="page-title">マイページ</h1>

									<button class="js-PianoLogoutBtn piano-my-page__logout-button">
										<i class="fas fa-sign-out-alt"></i>
										<span>ログアウト</span>
									</button>
								</header>

                <div id="my-account"></div>

								<p style="text-align: center;"><a href="/law/" target="_blank" rel="noopener noreferrer">特定商取引に関する表示</a>はこちら</p>

                <script type='text/javascript'>
                  // // tp オブジェクトを取得します
                  tp = window [ "tp" ] || [];

                  tp.push([ "init" ,function() {
                      tp.myaccount.show({
                          displayMode: "inline" ,
                          containerSelector: "#my-account"
                      });
                  }]);
                </script>
							</article>

						</main>
				</div>

			</div>


<?php get_footer(); ?>
