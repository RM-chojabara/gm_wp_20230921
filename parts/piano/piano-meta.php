<?php // ピアノクローラー用メタ ?>
<?php // 作者 ?>
<?php if(the_author()): ?>
  <meta property="cXenseParse:author" content="<?php the_author() ?>"/>
<?php endif; ?>

<?php // サムネイル ?>
<meta property="cXenseParse:image" content="<?php the_post_thumbnail_url('medium') ?>"/>

<?php // タイプ ?>
<?php $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article'; ?>
<meta name = "cXenseParse:pageclass" content="<?php echo $ogp_type ?>" />

<?php // 作成日 ?>
<meta name="cXenseParse:publishtime" content="<?php echo get_date_from_gmt(get_post_time('c', true), 'c');?>"/>
<meta name="cXenseParse:recs:publishtime" content="<?php echo get_date_from_gmt(get_post_time('c', true), 'c');?>"/>

