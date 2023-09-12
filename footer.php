<?php // Piano アカウント作成 ?>
<script src="<?php echo get_template_directory_uri(); ?>/parts/piano/js/piano-account.js" ></script>

<?php
  $post_data = get_posts('name=top-settings&post_type=toppage_setting');
  $post_id = $post_data[0]->ID;
  $other_links = SCF::get('other_links',$post_id);
  $instagram = SCF::get('instagram',$post_id);
  $twitter = SCF::get('twitter',$post_id);
  $facebook = SCF::get('facebook',$post_id);
  $youtube = SCF::get('youtube',$post_id);
  $applemusic = SCF::get('applemusic',$post_id);

?>
			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

        <div class="gm-area">
          <div class="wrap cf">

            <div class="h1" itemscope itemtype="http://schema.org/Organization">
              <a href="<?php echo home_url(); ?>" rel="nofollow">
                <?php
                //ロゴ読み込み
                get_template_part('library/images/GM_logo'); ?>
              </a>
            </div>

            <?php if (isset($instagram) || isset($twitter) || isset($facebook) || isset($youtube) || isset($applemusic)): ?>
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
                <?php if (isset($youtube)): ?>
                  <li><a href="<?php echo $youtube; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <?php endif ?>
                <?php if (isset($applemusic)): ?>
                  <li><a href="<?php echo $applemusic; ?>" target="_blank"><i class="fas fa-music"></i></a></li>
                <?php endif ?>
              </ul>
            <?php endif ?>

            <nav role="navigation">
              <?php wp_nav_menu(array(
                'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
                'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
                'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
                'menu_class' => 'nav footer-nav cf',            // adding custom nav class
                'theme_location' => 'footer-links',             // where it's located in the theme
                'before' => '',                                 // before the menu
                'after' => '',                                  // after the menu
                'link_before' => '',                            // before each link
                'link_after' => '',                             // after each link
                'depth' => 0,                                   // limit the depth of the nav
                'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
              )); ?>
            </nav>

            <?php if (is_active_nav_menu('footer-tags')): ?>
            <nav role="navigation">
              <?php wp_nav_menu(array(
                'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
                'container_class' => 'footer-tags cf',         // class of container (should you choose to use it)
                'menu' => __( 'Footer Tags', 'bonestheme' ),   // nav name
                'menu_class' => 'nav footer-nav cf',            // adding custom nav class
                'theme_location' => 'footer-tags',             // where it's located in the theme
                'before' => '',                                 // before the menu
                'after' => '',                                  // after the menu
                'link_before' => '',                            // before each link
                'link_after' => '',                             // after each link
                'depth' => 0,                                   // limit the depth of the nav
                'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
              )); ?>
            </nav>
            <?php endif; ?>

          </div>

        </div>

        <?php
          if (check_ary($other_links)) :
        ?>
        <div class="os-area">
          <div class="wrap cf">
            <ul class="other-links">
              <?php foreach ($other_links as $field_name => $field_value ): ?>
                <?php
                  $icon = $field_value['icon'];
                  $icon_url = wp_get_attachment_image_src($icon,'full')[0];
                ?>
                <li><a href="<?php echo $field_value['url']; ?>" target="_blank"><img src="<?php echo $icon_url; ?>" alt="<?php echo $field_value['url']; ?>"></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <?php endif; ?>

        <div class="com-area">
          <div class="wrap cf">

            <nav role="navigation">
              <?php wp_nav_menu(array(
                'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
                'container_class' => 'footer-com-links cf',         // class of container (should you choose to use it)
                'menu' => __( 'Footer Company Links', 'bonestheme' ),   // nav name
                'menu_class' => 'nav footer-nav cf',            // adding custom nav class
                'theme_location' => 'footer-com-links',             // where it's located in the theme
                'before' => '',                                 // before the menu
                'after' => '',                                  // after the menu
                'link_before' => '',                            // before each link
                'link_after' => '',                             // after each link
                'depth' => 0,                                   // limit the depth of the nav
                'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
              )); ?>
            </nav>

					 <p class="source-org copyright">Copyright © Rittor Music,Inc., an Impress Group company. All rights reserved.</p>
          </div>
        </div>


			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
