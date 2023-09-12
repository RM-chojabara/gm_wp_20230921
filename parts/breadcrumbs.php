<?php
if (is_archive()) {
  //ARCHIVE!!


  if (is_post_type_archive('post')){
    //LATESTページ
    $cat01 = "Archive";
    $cat01_url = home_url() . '/archive/';

  } elseif(is_post_type_archive('magazine')) {
    //MAGAZINEページ
    $cat01 = "Magazine";
    $cat01_url = home_url() . '/magazine/';

  } elseif(is_category()) {
    //CATEGORYページ
    $current_cat_id = get_query_var("cat");
    $category = get_category($current_cat_id);
    $cat_parent = $category->category_parent;
    if ($cat_parent == 0) {
      $cat01 = $category->name;
      $cat01_id = $category->term_id;
      $cat01_url = get_category_link($cat01_id);
    } else {
      $cat02 = $category->name;
      $cat02_id = $category->term_id;
      $cat02_url = get_category_link($cat02_id);
      $pare_cat = get_category($cat_parent);
      $cat01 = $pare_cat->name;
      $cat01_id = $pare_cat->term_id;
      $cat01_url = get_category_link($cat01_id);
    }

    //ジャンルがある場合
    $current_cat_term = get_query_var("term");
    $term    = get_term_by('slug', $current_cat_term, 'genre');
    $term_id = $term->term_id;
    $genre = $term->name;
    $genre_url = home_url() . '?cat=' . $cat01_id . '&genre=' . $term->slug;

  } elseif(is_post_type_archive('special')) {
    //SPECIALページ
    $cat01 = "Special";
    $cat01_url = home_url() . '/special/';

  } elseif(is_tax('genre')) {
    //GENREページ
    $current_cat_id = get_query_var("term");
    $term    = get_term_by('slug', $current_cat_id, 'genre');
    $term_id = $term->term_id;
    $genre = single_term_title("", false);
    $genre_url = get_category_link($term_id);

  } elseif(is_tag()) {
    //TAGページ
    $current_cat_id = get_query_var("tag_id");
    $term    = get_term($current_cat_id);
    $tag     = $term->name;
    $tag_url = get_tag_link($current_cat_id);
  }


} elseif(is_single()) {
  //SINGLE!!


  //MAGAZINEページ
  if (get_post_type() == 'magazine' || get_post_type() == 'special'){

    $cat01 = get_post_type_object(get_post_type())->label;
    $cat01_url = home_url() . '/' . get_post_type_object(get_post_type())->name;
  } else {

    $cats = get_the_category();
    if (check_ary($cats)) {
      $i = '0';
      foreach( $cats as $cat ) {
        if ($cat->parent==0) {
          $cat01_group[$i] = $cat->term_id;
          $i++;
        } else {
          $cat02_group[$i] = $cat->term_id;
          $i++;
        }
      }
    }

  }

  $taxonomy = 'genre';
  $custom_terms = get_the_terms(get_the_ID(), $taxonomy );
  if (check_ary($custom_terms)) {
    $i = '0';
    foreach ($custom_terms as $custom_term) {
      $genre_group[$i] = $custom_term->term_id;
      $i++;
    }
  }


}
?>

<script type="application/ld+json">
<?php if(is_archive()): ?>

{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "name": "GM BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "<?php echo site_url(); ?>",
        "name": "GuitarMagazine"
      }
    },
    <?php if (is_tax('genre')): ?>
      {
        "@type": "ListItem",
        "position": 2,
        "item": {
          "@id": "<?php echo $genre_url; ?>",
          "name": "<?php echo $genre; ?>"
        }
      }
    <?php elseif(is_tag()): ?>
      {
        "@type": "ListItem",
        "position": 2,
        "item": {
          "@id": "<?php echo $tag_url; ?>",
          "name": "<?php echo $tag; ?>"
        }
      }
    <?php else: ?>
      {
        "@type": "ListItem",
        "position": 2,
        "item": {
          "@id": "<?php echo $cat01_url; ?>",
          "name": "<?php echo $cat01; ?>"
        }
      }
      <?php if (check_ary($cat02) || check_ary($cat02_url)): ?>
      ,{
        "@type": "ListItem",
        "position": 3,
        "item": {
          "@id": "<?php echo $cat02_url; ?>",
          "name": "<?php echo $cat02; ?>"
        }
      }
      <?php endif; ?>
      <?php if (isset($genre)): ?>
      ,{
        "@type": "ListItem",
        "position": 3,
        "item": {
          "@id": "<?php echo $genre_url; ?>",
          "name": "<?php echo $genre; ?>"
        }
      }
      <?php endif; ?>
    <?php endif ?>
  ]
}

<?php elseif(is_single()): ?>

<?php
  // image（画像）の指定のためにアイキャッチ画像の情報を取得します
  $thumbnail_id = get_post_thumbnail_id($post->ID); // アタッチメントIDの取得
  $image = wp_get_attachment_image_src( $thumbnail_id, 'full' ); // アイキャッチの情報を取得
  $src = $image[0];    // URL
  $width = $image[1];  // 横幅
  $height = $image[2]; // 高さ
 ?>
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage":{
    "@type":"WebPage",
    "@id":"<?php echo post_permalink(); ?>"
  },
  "headline": "<?php echo the_title_attribute(); ?>",
  "image": {
    "@type": "ImageObject",
    "url": "<?php echo $src; ?>",
    "height": <?php echo $height; ?>,
    "width": <?php echo $width; ?>
  },

  "datePublished": "<?php echo get_the_date(DATE_ISO8601); ?>",
  "dateModified": "<?php if ( get_the_date() != get_the_modified_time() ){ the_modified_date(DATE_ISO8601); } else { echo get_the_date(DATE_ISO8601); } ?>",
  "author": {
    "@type": "Person",
    "name": "<?php the_author_meta('nickname'); ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "<?php bloginfo('name'); ?>"
  },
  "description": "<?php echo get_the_excerpt(); ?>"
}

{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "name": "GM BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "<?php echo site_url(); ?>",
        "name": "GuitarMagazine"
      }
    }
    <?php if (get_post_type() == 'magazine' || get_post_type() == 'special'): ?>
    ,{
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "<?php echo get_post_type_object(get_post_type())->label; ?>",
        "name": "<?php echo home_url() . '/category/' . get_post_type_object(get_post_type())->name; ?>"
      }
    }
    <?php else: ?>
      <?php if (check_ary($cat01_group)): ?>
      <?php foreach ($cat01_group as $value): ?>
        <?php
          $cat01_info = get_category($value);
          $cat01 = $cat01_info->name;
          $cat01_url = home_url() . '/category/' . $cat01_info->slug;
        ?>
        ,{
          "@type": "ListItem",
          "position": 2,
          "item": {
            "@id": "<?php echo $cat01_url; ?>",
            "name": "<?php echo $cat01; ?>"
          }
        }
      <?php endforeach ?>
      <?php endif ?>
    <?php endif ?>

    <?php if (check_ary($cat02_group)): ?>
      <?php foreach ($cat02_group as $value): ?>
        <?php
          $cat02_info = get_category($value);
          $cat02 = $cat02_info->name;
          $cat02_url = home_url() . '/category/' . $cat02_info->slug;
        ?>
        ,{
          "@type": "ListItem",
          "position": 3,
          "item": {
            "@id": "<?php echo $cat02_url; ?>",
            "name": "<?php echo $cat02; ?>"
          }
        }
      <?php endforeach ?>
    <?php endif; ?>
    ,{
      "@type": "ListItem",
      "position": 4,
      "item": {
        "@id": "<?php echo post_permalink(); ?>",
        "name": "<?php echo the_title_attribute(); ?>"
      }
    }
  ]
}



<?php endif; ?>
</script>


<?php if (is_archive()): ?>
<div class="breadcrumbs_wrap brd_arc wrap cf">
<?php else: ?>
<div class="breadcrumbs_wrap brd_single wrap cf">
<?php endif ?>
  <ol class="breadcrumbs">
    <li><a href="<?php echo home_url(); ?>">ギター・マガジン</a></li>
    <?php if (is_archive()): ?>

      <?php if (check_ary($cat01)): ?>
        <?php if (check_ary($genre) || check_ary($cat02) || is_tag()): ?>
          <li><a href="<?php echo $cat01_url; ?>"><?php echo $cat01; ?></a></li>
        <?php else: ?>
          <li><?php echo $cat01; ?></li>
        <?php endif ?>
      <?php endif ?>

      <?php if (check_ary($genre)) : ?><li><?php echo $genre; ?></li><?php endif; ?>
      <?php if (check_ary($cat02)) : ?><li><?php echo $cat02; ?></li><?php endif; ?>
      <?php if (is_tag()): ?>
      <?php if (check_ary($tag)) : ?><li><?php echo $tag; ?></li><?php endif; ?>
      <?php endif ?>

    <?php else:
      // is_NOT_archive
    ?>

      <?php if (get_post_type() == 'magazine' || get_post_type() == 'special'): ?>
        <li><a href="<?php echo $cat01_url; ?>"><?php echo $cat01; ?></a></li>
      <?php endif ?>

      <?php if (check_ary($cat01_group)): ?>
      <li>
        <?php foreach ($cat01_group as $value): ?>
          <?php
            $cat01_info = get_category($value);
            $cat01 = $cat01_info->name;
            $cat01_url = home_url() . '/category/' . $cat01_info->slug;
          ?>
          <span><a href="<?php echo $cat01_url; ?>"><?php echo $cat01; ?></a></span>
        <?php endforeach ?>
      </li>
      <?php endif ?>
      <?php if (check_ary($cat02_group) || check_ary($genre_group)): ?>
        <?php if (check_ary($cat02_group)): ?>
          <li>
            <?php foreach ($cat02_group as $value): ?>
              <?php
                $cat02_info = get_category($value);
                $cat02 = $cat02_info->name;
                $cat02_url = home_url() . '/category/' . $cat02_info->slug;
              ?>
              <span><a href="<?php echo $cat02_url; ?>"><?php echo $cat02; ?></a></span>
            <?php endforeach ?>
          </li>
        <?php endif ?>
        <?php if (check_ary($genre_group)): ?>
          <li>
            <?php foreach ($genre_group as $value): ?>
              <?php
                $genre_info = get_term_by('id',$value,$taxonomy);
                $genre = $genre_info->name;
                $genre_url = home_url() . "/genre/" . $genre_info->slug;
              ?>
              <span><a href="<?php echo $genre_url; ?>"><?php echo $genre; ?></a></span>
            <?php endforeach ?>
          </li>
        <?php endif ?>
      <?php endif ?>


    <?php endif ?>
  </ol>
</div>