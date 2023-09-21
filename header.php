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


			
			<?php // auth0 cdk ?>
			<script src="https://cdn.auth0.com/js/auth0-spa-js/2.0/auth0-spa-js.production.js"></script>

			<button id="auth0-login">
					auth0 login
			</button>

			<button id="auth0-logout">
					auth0 logout
			</button>

			<div id="profile">
				マイページ
			</div>

			<script type="text/javascript">
				( async function(){
					const loginButton = document.getElementById('auth0-login');
					const logoutButton = document.getElementById('auth0-logout');
					// console.log('buttons', loginButton, logoutButton);

					const auth0Client = await auth0.createAuth0Client({
						domain: "rittor-music-dev.jp.auth0.com",
						clientId: "YqJvsG9ITMx8duXhLUPHmZj7aUoCt369",
						authorizationParams: {
							redirect_uri: window.location.origin
						}
					});
					// console.dir(auth0Client);

					// ログイン
					loginButton.addEventListener('click', (e) => {
						e.preventDefault();
						auth0Client.loginWithRedirect();
						console.log('login');
					});

					if (location.search.includes("state=") && (location.search.includes("code=") || location.search.includes("error="))) {
						await auth0Client.handleRedirectCallback();
						window.history.replaceState({}, document.title, "/");
					}

					// ログアウト
					logoutButton.addEventListener('click', (e) => {
						e.preventDefault();
						auth0Client.logout();
						console.log('logout');
					});

					// マイページ
					const isAuthenticated = await auth0Client.isAuthenticated();
					console.log('isAuthenticated', isAuthenticated);
					const userProfile = await auth0Client.getUser();

					// Assumes an element with id "profile" in the DOM
					const profileElement = document.getElementById("profile");

					if (isAuthenticated) {
						profileElement.style.display = "block";
						profileElement.innerHTML = `
										<p>${userProfile.name}</p>
										<img src="${userProfile.picture}" />
									`;
						console.log('login now');
					} else {
						profileElement.style.display = "none";
						console.log('not login');
					}

					console.log('auth0 cdk scripts');
				})();
			</script>