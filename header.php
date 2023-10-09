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
		<?php // auth0 cdk todo ?>
		<script src="https://cdn.auth0.com/js/auth0-spa-js/2.0/auth0-spa-js.production.js"></script>


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

		<?php // 有料会員限定固定ページの時、会員限定タグを表示する
				$page_template = get_page_template_slug();
				if ($page_template === "page-subsc-only.php") :	?>
			<meta property="article:tag" content="サブスク購読">
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

			<?php /* 2023/10/5 変更ファイル
				header.php(以下にスタイルとアラート文HTMLを追加)
				library/js/script.js
				library/js/min/script.min.js
			*/ ?>
			<style>
				.header-upper__alert-text-wrap {
					background-color: #000;
					max-width: 100%;
					overflow: hidden;
					position: relative;
					padding-top: 32px;
				}

				.header-upper__alert-text {
					background-color: #000;
					color: #fff;
					padding: 6px 0 2px;
					font-size: 12px;
					font-weight: bold;
					margin: 0;
					display: inline-block;
					white-space: nowrap;
					overflow: hidden;
					position: absolute;
					left: 0;
					top: -2px;
				}
				@media screen and (max-width: 767px) {
					.header-upper__alert-text-wrap {
						padding-top: 25px;
					}
					.header-upper__alert-text {
						font-size: 10px;
						line-height: 1.7;
						animation-duration: 20s !important;
					}
				}

				.header-start-anime {
					animation: startScrollText 30s linear infinite;
					animation-play-state: paused;
				}
				@keyframes startScrollText {
					0% {
						transform: translateX(0%);
					}
					100% {
						transform: translateX(-100%);
					}
				}

				.header-end-anime {
					animation: endScrollText 30s linear infinite;
				}

				@keyframes endScrollText {
					0% {
						transform: translateX(calc(-100% + 100vw));
					}
					100% {
						transform: translateX(0%);
					}
				}
			</style>

				<header id="main-header" class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
					<?php /*
					*/  ?>
					<div id="jQ-alert-text-wrap" class='header-upper__alert-text-wrap'>
						<p id="js-upperAlertText" class='header-upper__alert-text header-start-anime'>
						【重要】2023年10月16日（月）00:00〜24:00は、システム・メインテナンスのため、「WEBでギタマガ読み放題」の本棚へのアクセス、および全てのブックの閲覧ができなくなります。
						</p>
					</div>

					<script type="text/javascript">
						(function() {
							// 画面の幅
							const alertTextTarget = document.getElementById('js-upperAlertText'); // アラートテキスト
							const textWidth = document.querySelector('.header-upper__alert-text').clientWidth; // テキストの幅
							const windowWidth = window.innerWidth;

							setTimeout(() => {
									alertTextTarget.style.animationPlayState = 'running'; // アニメーションを開始
							}, 3000);

							// alertTextTarget.addEventListener('animationiteration', () => {
							// 		// アニメーションが1回繰り返された後の処理
							// 		alertTextTarget.style.animationPlayState = 'paused'; // アニメーションを一時停止

							// 		setTimeout(() => {
							// 				alertTextTarget.style.animationPlayState = 'running'; // アニメーションを再開
							// 		}, 4000); // 5秒後
							// });
						})();
					</script>
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


							<?php // ヘッダー アカウントログインブロック ?>
							<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/parts/piano/style/piano-header.css">
							<nav class="nav--pc-right nav--sm-top">
								<?php include(get_theme_root() . '/' . get_template() . "/parts/piano/account.php"); ?>
							</nav>


							<!--
							<ul class="sns">
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
