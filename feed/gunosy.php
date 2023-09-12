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
	xmlns:gnf="http://assets.gunosy.com/media/gnf"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:media="http://search.yahoo.com/mrss/"
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
	<title><![CDATA[<?php wp_title_rss(); ?>]]></title>
	<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
	<link><?php bloginfo_rss( 'url' ); ?></link>
	<description><![CDATA[<?php bloginfo_rss( 'description' ); ?>]]></description>
	<lastBuildDate><?php echo get_feed_build_date( 'D, d M Y H:i:s +0900', true ); ?></lastBuildDate>
	<image>
		<url>http://st.guitarmagazine.jp/wp-content/themes/guitarmagazine/feed/img/gm_logo_black_492x492.png</url>
 		<title><![CDATA[<?php wp_title_rss(); ?>]]></title>
		<link>https://guitarmagazine.jp/</link>
	</image>
	<gnf:wide_image_link>http://st.guitarmagazine.jp/wp-content/themes/guitarmagazine/feed/img/gm_logo_black_135x44.png</gnf:wide_image_link>
	<language><?php bloginfo_rss( 'language' ); ?></language>
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
		<title><![CDATA[<?php the_title_rss(); ?>]]></title>
		<link><?php the_permalink_rss(); ?></link>
		<dc:creator><![CDATA[<?php the_author(); ?>]]></dc:creator>
		<pubDate><?php echo get_post_time( 'D, d M Y H:i:s +0900', true); ?></pubDate>
		<gnf:modified><?php echo get_post_modified_time( 'D, d M Y H:i:s +0900', true); ?></gnf:modified>
		<?php the_category_rss( 'rss2' ); ?>
		<guid isPermaLink="false"><?php the_guid(); ?></guid>

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
		<media:status state="<?php echo $post->post_status=='publish' ? 'active' : 'deleted';?>" />
		<?php if ( has_post_thumbnail() ):?>
			<enclosure url="<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>" type="image/jpeg" length="0" caption="<?php echo get_the_post_thumbnail_caption();?>" />
		<?php endif;?>

		<gnf:analytics><![CDATA[
			<script async src="https://www.googletagmanager.com/gtag/js?id=G-749ES9N6BF"></script> 
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', 'G-749ES9N6BF',{
				'page_referrer': 'https://newspass.jp/',
				'page_location': '<?php the_permalink_rss(); ?>',
				'app_name': 'newspass' });
			</script>
		]]></gnf:analytics>
		<gnf:analytics_gn><![CDATA[
			<script async src="https://www.googletagmanager.com/gtag/js?id=G-749ES9N6BF"></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', 'G-749ES9N6BF',{
				'page_referrer': 'https://gunosy.com',
				'page_location': '<?php the_permalink_rss(); ?>',
				'app_name': 'gunosy' });
			</script>
		]]></gnf:analytics_gn>
		<gnf:analytics_lc><![CDATA[
			<script async src="https://www.googletagmanager.com/gtag/js?id=G-749ES9N6BF"></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				gtag('config', 'G-749ES9N6BF',{
				'page_referrer': 'https://lucra.jp',
				'page_location': '<?php the_permalink_rss(); ?>',
				'app_name': 'lucra' });
			</script>
		]]></gnf:analytics_lc>
		<gnf:analytics_st><![CDATA[
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-749ES9N6BF"></script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				gtag('config', 'G-749ES9N6BF',{
				'page_referrer': 'https://service-top.jp',
				'page_location': '<?php the_permalink_rss(); ?>',
				'app_name': 'au-service-today' });
			</script>
		]]></gnf:analytics_st>
		<gnf:category>entertainment</gnf:category>
		<?php $tags = get_the_tags($post->ID);
			if ( !empty($tags) ):
				$cats = [];
				foreach ($tags as $tag) {
					if ( !in_array($tag->name, $cats) ) $cats[] = $tag->name;
					if ( count($cats) >= 10 ) break;
			}?>
			<gnf:keyword><?php echo implode(',', $cats);?></gnf:keyword>
		<?php endif;?>

		<?php
			$args = array(
				'post_type' => 'special',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'order' => 'DESC',
				'orderby' => 'date'
			);
			$the_query = new WP_Query($args);

		if($the_query->have_posts()):
			while ($the_query->have_posts()): $the_query->the_post();
				$title = str_replace('<br>', ' ', get_the_title());
		?>
		<gnf:relatedLink title="<?php echo $title; ?>" link="<?php the_permalink(); ?>" thumbnail="<?php if(has_post_thumbnail()) echo get_the_post_thumbnail_url($post->ID, 'thumbnail');?>" />
		<?php endwhile;
			wp_reset_postdata();
		endif; ?>

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
