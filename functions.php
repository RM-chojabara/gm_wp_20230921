<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_theme_support( 'editor-styles' );
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  //require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
//add_image_size( 'bones-thumb-600', 600, 150, true );
//add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  wp_enqueue_style('Noto Sans JP', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400;500;700');
  wp_enqueue_style('Roboto', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,500;1,700;1,900&display=swap');
}

add_action('wp_enqueue_scripts', 'bones_fonts');


//配列チェック
function check_ary($array){
    if(is_array($array) && !empty($array)){
        foreach($array as $item){
            if(is_array($item)){
                if(check_ary($item)){
                    return true;
                }
            }else{
                if(!empty($item)){
                    return true;
                }
            }
        }
    }else{
        if(!empty($array)){
            return true;
        }
    }
    return false;
};


//ショートコードを使ったphpファイルの呼び出し
function my_php_Include($params = array()) {
 extract(shortcode_atts(array('file' => 'default'), $params));
 ob_start();
 include(get_theme_root() . '/' . get_template() . "/parts/$file.php");
 return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');


//ナビゲーションメニューに項目が設定されているかの判定
function is_active_nav_menu($location){
    if(has_nav_menu($location)){

        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_items($locations[$location]);

        if(!empty($menu)){
            return true;
        }
    }

    return false;
}

//ドミナントカラーが明るいか暗いか判別する
function getLuminance( $rgb ) {
  $r = hexdec( mb_substr( $rgb, 0, 2 ) );
  $g = hexdec( mb_substr( $rgb, 2, 2 ) );
  $b = hexdec( mb_substr( $rgb, 4, 2 ) );

  return ( $r*299 + $g*587 + $b*114 ) / 2550;
}

/* 投稿アーカイブページの作成 */
function post_has_archive( $args, $post_type ) {

  if ( 'post' == $post_type ) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'archive';
  }
  return $args;

}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );


// パンくずリスト
function breadcrumb(){
};


//「アーカイブ」とかを消す
function custom_archive_title($title){
    $titleParts=explode(': ',$title);
    if($titleParts[1]){
        return $titleParts[1];
    }
    return $title;
}
add_filter('get_the_archive_title','custom_archive_title');

/*********************
EDITOR SETTINGS
*********************/
//エディターのカラーパレット設定
function my_color_set() {
  add_theme_support('editor-color-palette', array(
    array(
      'name' => __('white','ホワイト') ,
      'slug' => 'white',
      'color' => '#FFFFFF',
    ) ,
    array(
      'name' => __('black','ブラック') ,
      'slug' => 'black',
      'color' => '#000000',
    ) ,
    array(
      'name' => __('blue','ブルー') ,
      'slug' => 'blue',
      'color' => '#0468BF',
    ) ,
    array(
      'name' => __('lightblue','ライトブルー') ,
      'slug' => 'lightblue',
      'color' => '#049DBF',
    ) ,
    array(
      'name' => __('green','グリーン') ,
      'slug' => 'green',
      'color' => '#3B592D',
    ) ,
    array(
      'name' => __('red','レッド') ,
      'slug' => 'red',
      'color' => '#BF2C47',
    )
  ));
}
add_action('after_setup_theme', 'my_color_set');
add_theme_support( 'align-wide' );
add_theme_support( 'responsive-embeds' );

//TITLES
register_block_style(
  'core/heading',
  [
    'name'         => 'black-title-big',
    'label'        => '黒地',
  ],
);
register_block_style(
  'core/heading',
  [
    'name'         => 'black-title-small',
    'label'        => 'グレー地',
  ],
);
register_block_style(
  'core/heading',
  [
    'name'         => 'interview-h2',
    'label'        => 'インタビュー見出し H2',
  ],
);
register_block_style(
  'core/heading',
  [
    'name'         => 'interview-h3',
    'label'        => 'インタビュー見出し H3',
  ],
);

//paragraph
register_block_style(
  'core/paragraph',
  [
    'name'         => 'credit',
    'label'        => 'クレジット',
  ],
);
register_block_style(
  'core/group',
  [
    'name'         => 'lead',
    'label'        => 'リード',
  ],
);
register_block_style(
  'core/group',
  [
    'name'         => 'border-box',
    'label'        => 'ボーダーボックス',
  ],
);
register_block_style(
  'core/group',
  [
    'name'         => 'gray-bg',
    'label'        => 'グレー地',
  ],
);
register_block_style(
  'core/columns',
  [
    'name'         => 'border-box',
    'label'        => 'ボーダーボックス',
  ],
);
register_block_style(
  'core/columns',
  [
    'name'         => 'gray-bg',
    'label'        => 'グレー地',
  ],
);
register_block_style(
  'core/group',
  [
    'name'         => 'slider',
    'label'        => 'スライダー',
  ],
);
register_block_style(
  'core/image',
  [
    'name'         => 'main-image',
    'label'        => 'メイン画像',
  ],
);

function my_admin_script(){
    wp_enqueue_script( 'my_admin_script', get_stylesheet_directory_uri() . '/library/js/admin-scripts.js', array('jquery'), '', true);
}
add_action( 'admin_enqueue_scripts', 'my_admin_script' );


//要らない項目を削除
function remove_post_support() {
  remove_post_type_support('post','trackbacks');
  remove_post_type_support('post','comments');
}
add_action('init','remove_post_support');


//抜粋
function new_excerpt_more($more){
    global $post;
    return '';
}
add_filter('excerpt_more','new_excerpt_more',9999);

add_filter( 'excerpt_length', function ( $length ) {
return 150;
}, 999 );


/**********************
OGP設定
*********************/
function my_meta_ogp()
{
if (is_front_page() || is_home() || is_singular()) {

/*初期設定*/

// 画像 （アイキャッチ画像が無い時に使用する代替画像URL）
$ogp_image = get_template_directory_uri() . '/library/images/ogp.jpg';
// Twitterのアカウント名 (@xxx)
$twitter_site = '@guitarmagazine1';
// Twitterカードの種類（summary_large_image または summary を指定）
$twitter_card = 'summary_large_image';
// Facebook APP ID
$facebook_app_id = '';

/*初期設定 ここまで*/

global $post;
$ogp_title = '';
$ogp_description = '';
$ogp_url = '';
$html = '';
if (is_singular()) {
// 記事＆固定ページ
setup_postdata($post);
$ogp_title = strip_tags($post->post_title) . ' | ' . get_bloginfo('name');
$ogp_description = mb_substr(get_the_excerpt(), 0, 100);
$ogp_url = get_permalink();
wp_reset_postdata();
} elseif (is_front_page() || is_home()) {
// トップページ
$ogp_title = get_bloginfo('name');
$ogp_description = get_bloginfo('description');
$ogp_url = home_url();
}

// og:type
$ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';

// og:image
if (is_singular() && has_post_thumbnail()) {
$ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
$ogp_image = $ps_thumb[0];
}

// 出力するOGPタグをまとめる
$html = "\n";
$html .= '<meta name="description" content="' . esc_attr($ogp_description) . '">' . "\n";
$html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
$html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
$html .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
$html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
$html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
$html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
$html .= '<meta name="twitter:card" content="' . $twitter_card . '">' . "\n";
$html .= '<meta name="twitter:site" content="' . $twitter_site . '">' . "\n";
$html .= '<meta property="og:locale" content="ja_JP">' . "\n";
$html .= '<meta name="robots" content="index, follow">' . "\n";

if ($facebook_app_id != "") {
$html .= '<meta property="fb:app_id" content="' . $facebook_app_id . '">' . "\n";
}

echo $html;
}
}
// headタグ内にOGPを出力する
add_action('wp_head', 'my_meta_ogp');


add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
        remove_menu_page( 'edit-comments.php' ); //コメントメニュー
}


//TITLE
function wp_document_title_parts( $title ) {
  if ( is_home() || is_front_page() ) {
    unset( $title['tagline'] ); // キャッチフレーズを出力しない
  } else if ( is_category() || is_tag() || is_tax() || is_post_type_archive('special') || is_post_type_archive('magazine') ) {
    $title['title'] = $title['title'] . ' 記事一覧';
  } else if ( is_archive() ) {
    $title['title'] = '記事一覧';
  }
  return $title;
}
add_filter( 'document_title_parts', 'wp_document_title_parts', 10, 1 );
function wp_document_title_separator( $separator ) {
  $separator = '|';
  return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );
add_theme_support( 'title-tag' );

//ページネーションの不具合修正
function adjust_category_paged( $query = []) {
  if (isset($query['name'])
   && $query['name'] === 'page'
   && isset($query['page'])
   && isset($query['category_name'])) {
    $query['paged'] = intval($query['page']); // 念のため整数化しておく
    unset($query['name']);
    unset($query['page']);
  }
  return $query;
}
add_filter('request', 'adjust_category_paged');

/**********************
RSS設定
*********************/

//フィード追加
add_action('init', function() {
    add_feed('linenews', function() { get_template_part('/feed/linenews'); });
    add_feed('smartnews', function() { get_template_part('/feed/smartnews'); });
    add_feed('gunosy', function() { get_template_part('/feed/gunosy'); });
});

//クエリ変更
add_action('pre_get_posts', function($query) {
    if ( is_admin() ) return $query;
    if ( $query->is_main_query() && $query->is_feed(array('linenews', 'smartnews', 'gunosy')) ) {
        //投稿タイプ追加
//        $query->set('post_type', ['post', 'special', 'magazine']);
        $query->set('post_type', ['post']);
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'DESC' );
        //特定タグIDを除く
        //PR 348(開発環境) 2248(本番環境)
        //GM Mono 349(開発環境) 2249(本番環境)
        //Rittor Music 1673(本番環境)
        $tag_slugs = array(
          'pr', 
          'gm-mono', 
          'rittor-music');
        $tag_ids = array();
        foreach ( $tag_slugs as $slug ) {
          $getID = get_tags( array('slug' => $slug))[0]->term_id;
          array_push($tag_ids, $getID);
        }
        $query->set( 'tag__not_in', $tag_ids );
    }

    if ( $query->is_main_query() && $query->is_feed('linenews') ) {
        //特定カテゴリのみ
        // 4 News, 8 Interview, 16 Playing, 17 Article, 
        $query->set( 'category__in', array(4, 8, 16, 17) );
        // 指板図を除外、337(開発環境) 1730(本番環境)
        $Shibanzu_catid = get_category_by_slug( 'shibanzukun' )->cat_ID;
        $query->set( 'category__not_in', array($Shibanzu_catid) );
    }

    return $query;
});

//リンクの削除
add_filter('the_excerpt_rss', 'remove_link_from_feed');
add_filter('the_content_feed', 'remove_link_from_feed');
function remove_link_from_feed($content) {
  if ( is_admin() ) return $content;
  if ( is_main_query() && is_feed(array('linenews', 'smartnews', 'gunosy')) ) {
    //「rss-remove-block」の削除
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');

    $dom = new DOMDocument('1.0', 'UTF-8');
    @$dom->loadHTML("<span>" . $content . "</span>", LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xpath = new DOMXPath($dom);

    $nodes = $xpath->query('//*[contains(@class,"rss-remove-block")]');
    foreach ($nodes as $node) {
      $node->parentNode->removeChild($node);
    }
    $content = $dom->saveHTML($dom->documentElement);

    //リード「is-style-lead」内のstronタグを除去する
    $nodes = $xpath->query('//div[contains(@class,"is-style-lead")]');
    foreach ($nodes as $node) {
        $oldLead = $dom->saveHTML($node);
        $newLead = preg_replace('/<(\/?)strong>/', "", $oldLead);
        $content = str_replace($oldLead, $newLead, $content);
    }


    $content = str_replace("<p></p>", "", $content);
    
    $replaceData = array(
      '/<a[^<>]*>(.*?)<\/a>/' => '<span>$1</span>',  //Aタグの削除
    );

    $pattern = array_keys($replaceData);
    $replace = array_values($replaceData);
    $content = preg_replace($pattern, $replace, $content);

  }

  if ( is_main_query() && is_feed('linenews') ) {
    $content = str_replace(array("\r\n", "\r", "\n"), "", $content);
    $content = str_replace("</p>", "</p><br>", $content);
    //連続する改行をひとつにする
    //$pattern = '/(\n|\r|\r\n)+/us';
    //$replace = "\n";
    //$content = preg_replace($pattern, $replace, $content);
    
    $replaceData = array(
      '/<h3(.*?)<\/h3>/' => '<h2$1</h2>',  //H3タグをh2にする
      '/<h4.*?>(.*?)<\/h4>/' => '<strong>$1</strong><br><br>',  //H4タグを消して改行を加える
      '/alt="(.*?)"/' => 'data-caption="$1"',  //altをdata-captionに
      '/<figcaption.*?<\/figcaption>/' => ''  //figcaptionの削除
    );

    $pattern = array_keys($replaceData);
    $replace = array_values($replaceData);
    $content = preg_replace($pattern, $replace, $content);
  }

  return $content;
}
/* DON'T DELETE THIS CLOSING TAG */ ?>
