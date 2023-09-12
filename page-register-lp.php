<?php
/*
 Template Name: register-lp
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

<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">



		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php include(get_theme_root() . '/' . get_template() . "/parts/piano/piano-meta.php"); ?>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>


		<?php // ピアノ初期化 ?>
		<script type="text/javascript" src="https://tsekino.demo.piano.io/wp-includes/js/jquery/jquery.js?ver=1.12.3"></script>

		<?php // drop Google Analytics Here ?>
			<?php //GTMタグ for Head ?>
			<?php include(get_theme_root() . '/' . get_template() . "/parts/gtm_head.php"); ?>
		<?php // end analytics ?>

		<?php if (is_home()): ?><!-- logly_noindex --><?php endif; ?>
		<?php // 記事タグの表示 ?>
		<?php
			$posttags = get_the_tags();
			if (!is_front_page() || !is_home() && $posttags) :?>
			<?php
				foreach ($posttags as $tag):
					$tag_name = $tag->name;
			?>
				<meta property="article:tag" content="<?php echo $tag_name; ?>">
			<?php endforeach; ?>
		<?php endif; ?>

		<?php // 会員限定固定ページの時、会員限定タグを表示する
				$page_template = get_page_template_slug();
				if ($page_template === "page-members-only.php") :	?>
			<meta property="article:tag" content="会員限定">
		<?php endif; ?>

	</head>

	<?php
		//TOPページ設定 情報取得
		$post_data = get_posts('name=top-settings&post_type=toppage_setting');
		$post_id = $post_data[0]->ID;
		$logo_main_color = get_post_meta($post_id, 'logo_main_color')[0];
		$logo_sub_color = get_post_meta($post_id, 'logo_sub_color')[0];
			$strings = $logo_sub_color;
			$v = str_split($strings,2);
			$n1 = hexdec($v[0]);
			$n2 = hexdec($v[1]);
			$n3 = hexdec($v[2]);
		$header_image = get_post_meta($post_id, 'header_image')[0];
		$header_image_url = wp_get_attachment_image_src($header_image,'full')[0];
		$instagram = get_post_meta($post_id, 'instagram')[0];
		$twitter = get_post_meta($post_id, 'twitter')[0];
		$facebook = get_post_meta($post_id, 'facebook')[0];
		$youtube = get_post_meta($post_id, 'youtube')[0];
		$applemusic = get_post_meta($post_id, 'applemusic')[0];
		if (is_home()) {
			global	$power_push_article;
			      	$power_push_article = get_post_meta($post_id, 'power_push_article');
		};
	?>
	<style>
		#header-image{background-image: url(<?php echo $header_image_url;?>);}
		/* #logo{background: rgba(<?php echo $n1.','.$n2.','.$n3;?>,.54);} */
		.header .gm_logo svg{ fill: #<?php echo "$logo_main_color";?>; }
	</style>


	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php //GTMタグ for Body ?>
	<?php include(get_theme_root() . '/' . get_template() . "/parts/gtm_body.php"); ?>

	<?php // Piano 初期化JS ?>
	<script src="<?php echo get_template_directory_uri(); ?>/parts/piano/js/piano-init.js" ></script>

	<div class="page-wrapper"></div>
		<div id="container">

			<header id="main-header" class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="header-image">
					<div class="wrap cf">
						<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
						<div id="logo" class="h1" itemscope itemtype="http://schema.org/Organization">
							<a href="<?php echo home_url(); ?>" rel="nofollow">
								<?php
								//ロゴ読み込み
								get_template_part('library/images/GM_logo'); ?>
							</a>
						</div>
					</div>

					<div class="navbar">
						<div class="navbarBtn">
							<div href="#" class="menuTrigger">
								<span class="bdr"></span>
							</div>
						</div>
					</div>

				</div>


				<div class="nav-wrap">
					<div class="inner">
					<div id="nav01" class="nav-area">
						<div class="wrap cf">
							<div id="logo_hidden" class="h1" itemscope itemtype="http://schema.org/Organization">
								<a href="<?php echo home_url(); ?>" rel="nofollow">
									<?php
									//ロゴ読み込み
									get_template_part('library/images/GM_logo'); ?>
								</a>
							</div>
							<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement"  ontouchstart="">
								<?php wp_nav_menu(array(
							         'container' => false,                           // remove nav container
							         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
							         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
							         'menu_class' => 'nav top-nav cf',               // adding custom nav class
							         'theme_location' => 'main-nav',                 // where it's located in the theme
							         'before' => '',                                 // before the menu
					               'after' => '',                                  // after the menu
					               'link_before' => '',                            // before each link
					               'link_after' => '',                             // after each link
					               'depth' => 0,                                   // limit the depth of the nav
							         'fallback_cb' => ''                             // fallback function (if there is one)
								)); ?>
							</nav>
							<nav class="nav-search" ontouchstart="">
								<ul class="nav top-nav cf">
									<!-- <li class="menu-item-has-children">
										<a href="#" class="disabled">Genre</a>
										<ul class="sub-menu">
										<?php
										  $terms = get_terms('genre');
										  foreach ( $terms as $term ) :
										?>
											<li><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
										<?php endforeach; ?>
										</ul>
									</li> -->
									<li><?php get_search_form(); ?></li>
								</ul>
							</nav>

							<nav class="nav--pc-right nav--sm-top">
								<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/parts/piano/style/piano-header.css">
								<style>
									.header .subscribe-gm {
										background-color: #000;
									}
									.header a.subscribe-gm:visited {
										color: #FFF;
									}
									.header a.subscribe-gm:hover {
										color: #000;
									}

									@media screen and (max-width: 768px) {
										.header a.subscribe-gm:visited {
											color: #FFF;
										}
									}
								</style>

								<div id="piano-login-container" class="piano-login-container">
									<span class="js-PianoLoginBlock" style="display:none;">
										<button id="js-PianoLoginBtn" class="js-PianoLoginBtn">
											<span class="hidden-769-1099">GM会員ログイン</span><i class="fas fa-sign-in-alt"></i>
										</button>
									</span>

									<span class="js-PianoAccountBlock" style="display:none;">
										<a href="/my-account"><span class="hidden-769-1099">マイページ</span><i class="far fa-user-circle fa-lg"></i></a>
									</span>
								</div>

								<a href="https://backnumber.guitarmagazine.jp/" class="subscribe-gm" target="_blank" rel="noopener noreferrer">
									<span class="hidden-769-1099">ギタマガ読み放題</span><i class="fas fa-book"></i>
								</a>
							</nav>

							<!-- <ul class="sns">
								<?php if (isset($instagram)): ?>
									<li><a href="<?php echo $instagram; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<?php endif ?>
								<?php if (isset($twitter)): ?>
									<li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<?php endif ?>
								<?php if (isset($facebook)): ?>
									<li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<?php endif ?>
							</ul> -->
						</div>
						</div>


						<?php if (is_active_nav_menu('sub-nav')): ?>
						<div id="nav02" class="nav-area">
							<div class="wrap cf">
								<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			            <?php wp_nav_menu(array(
			                   'container' => false,                           // remove nav container
			                   'container_class' => 'menu cf',                 // class of container (should you choose to use it)
			                   'menu' => __( 'The Sub Menu', 'bonestheme' ),  // nav name
			                   'menu_class' => 'nav sub-nav cf',               // adding custom nav class
			                   'theme_location' => 'sub-nav',                 // where it's located in the theme
			                   'before' => '',                                 // before the menu
			                     'after' => '',                                  // after the menu
			                     'link_before' => '',                            // before each link
			                     'link_after' => '',                             // after each link
			                     'depth' => 0,                                   // limit the depth of the nav
			                   'fallback_cb' => ''                             // fallback function (if there is one)
			            )); ?>
								</nav>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>



			</header>


		<?php //　↑ ヘッダー  ?>

			<div id="content">
			<?php // スマホサイズで表示するメニュー ; ?>
  <?php include(get_theme_root() . '/' . get_template() . "/parts/piano/sp-top-account.php"); ?>

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title">会員登録プラン（テスト用にヘッダーをコードで直に埋め込み）</h1>

								</header>


							</article>


							<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/parts/piano/style/register-lp-style.css">

							<div id="piano-plans"></div>

							<div style="margin: 60px 0;">
									<h2>ボタンサンプル</h2>
									<div style="display: flex; flex-direction: column;">
										<button style="padding: 20px; font-size: 18px; letter-spacing: 0.1em; max-width: 525px; margin: 0 auto 20px;" class="js-PianoRegisterBtn">
											新規登録 クラス名 js-PianoRegisterBtn
										</button>

										<button style="padding: 20px; font-size: 18px; letter-spacing: 0.1em; max-width: 525px; margin: 0 auto 20px;" class="js-PianoLoginBtn">
											ログイン クラス名 js-PianoLoginBtn
										</button>

										<button style="padding: 20px; font-size: 18px; letter-spacing: 0.1em; max-width: 525px; margin: 0 auto 20px;" class="js-PianoLogoutBtn">
											ログアウト クラス名 js-PianoLogoutBtn
										</button>
									</div>
							</div>

					</main>
				</div>

			</div>


<?php get_footer(); ?>
