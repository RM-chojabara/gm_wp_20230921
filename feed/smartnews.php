<?php
/**
 * RSS2 Feed Template for displaying RSS2 Posts feed.
 *
 * @package WordPress
 */

header( 'Content-Type: ' . feed_content_type( 'rss2' ) . '; charset=' . get_option( 'blog_charset' ), true );
$more = 1;

echo '<?xml version="1.0" encoding="' . get_option( 'blog_charset' ) . '"?' . '>';

/**
 * Fires between the xml and rss tags in a feed.
 *
 * @since 4.0.0
 *
 * @param string $context Type of feed. Possible values include 'rss2', 'rss2-comments',
 *                        'rdf', 'atom', and 'atom-comments'.
 */
do_action( 'rss_tag_pre', 'rss2' );
?>

<rss version="2.0"
	xmlns:snf="http://www.smartnews.be/snf"
	xmlns:media="http://search.yahoo.com/mrss/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	<?php
	/**
	 * Fires at the end of the RSS root to add namespaces.
	 *
	 * @since 2.0.0
	 */
	do_action( 'rss2_ns' );
	?>
>

<channel>
	<title><?php wp_title_rss(); ?></title>
	<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
	<link><?php bloginfo_rss( 'url' ); ?></link>
	<description>月刊誌『ギター・マガジン』が展開するWEBメディア。通称ギタマガWEB。アーティスト・インタビュー、ギター、アンプ、エフェクターといった機材情報、奏法解説やフレーズ分析など。</description>
	<pubDate><?php echo get_feed_build_date( 'D, d M Y H:i:s +0900', true ); ?></pubDate>
	<language><?php bloginfo_rss( 'language' ); ?></language>
	<ttl>1</ttl>
	<snf:logo><url>http://st.guitarmagazine.jp/wp-content/themes/guitarmagazine/feed/img/gm_logo_black_308x100.png</url></snf:logo>
	<snf:darkModeLogo><url>http://st.guitarmagazine.jp/wp-content/themes/guitarmagazine/feed/img/gm_logo_white_308x100.png</url></snf:darkModeLogo>
	<sy:updatePeriod>
	<?php
		$duration = 'hourly';

		/**
		 * Filters how often to update the RSS feed.
		 *
		 * @since 2.1.0
		 *
		 * @param string $duration The update period. Accepts 'hourly', 'daily', 'weekly', 'monthly',
		 *                         'yearly'. Default 'hourly'.
		 */
		echo apply_filters( 'rss_update_period', $duration );
	?>
	</sy:updatePeriod>
	<sy:updateFrequency>
	<?php
		$frequency = '1';

		/**
		 * Filters the RSS update frequency.
		 *
		 * @since 2.1.0
		 *
		 * @param string $frequency An integer passed as a string representing the frequency
		 *                          of RSS updates within the update period. Default '1'.
		 */
		echo apply_filters( 'rss_update_frequency', $frequency );
	?>
	</sy:updateFrequency>
	<?php
	/**
	 * Fires at the end of the RSS2 Feed Header.
	 *
	 * @since 2.0.0
	 */
	do_action( 'rss2_head' );

	while ( have_posts() ) :
		the_post();
		?>
	<item>
		<title><?php the_title_rss(); ?></title>
		<link><?php the_permalink_rss(); ?></link>
		<guid><?php the_permalink_rss(); ?></guid>
		<dc:creator>ギター・マガジンWEB</dc:creator>
		<pubDate><?php echo get_post_time( 'D, d M Y H:i:s +0900', true); ?></pubDate>
		<?php if ( get_option( 'rss_use_excerpt' ) ) : ?>
			<description><![CDATA[<?php the_excerpt_rss(); ?>]]></description>
		<?php else : ?>
			<description><![CDATA[<?php the_excerpt_rss(); ?>]]></description>
			<?php $content = get_the_content_feed( 'rss2' ); ?>
			<?php if ( strlen( $content ) > 0 ) : ?>
				<content:encoded><![CDATA[<?php echo $content; ?>]]></content:encoded>
			<?php else : ?>
				<content:encoded><![CDATA[<?php the_excerpt_rss(); ?>]]></content:encoded>
			<?php endif; ?>
		<?php endif; ?>
		<?php
			$categories = get_the_category($post->ID);
			if ( !empty($categories) ):
				$cats = [];
				foreach ($categories as $category) {
					if ( !in_array($category->name, $cats) ) $cats[] = $category->name;
					if ( count($cats) >= 10 ) break;
			}
		?>
		<category><?php echo implode(',', $cats);?></category>
		<?php endif;?>
		<?php if ( has_post_thumbnail() ):?>
			<media:thumbnail url="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" />
		<?php endif;?>

    <snf:analytics ><![CDATA[
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0RQ2KJJSPT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-0RQ2KJJSPT',{'page_path':'<?php echo str_replace(home_url(), '', get_permalink());
 ?>',
        'page_referrer':'http://www.smartnews.com/',
         'campaign_source':'SmartNews',
        'campaign_medium':'app'
        });
    </script>
    ]]>
    </snf:analytics>

		<?php rss_enclosure(); ?>
		<?php
		/**
		 * Fires at the end of each RSS2 feed item.
		 *
		 * @since 2.0.0
		 */
		do_action( 'rss2_item' );
		?>
	</item>
	<?php endwhile; ?>
</channel>
</rss>
