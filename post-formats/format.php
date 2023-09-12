
              <?php
                /*
                 * This is the default post format.
                 *
                 * So basically this is a regular post. if you don't want to use post formats,
                 * you can just copy ths stuff in here and replace the post format thing in
                 * single.php.
                 *
                 * The other formats are SUPER basic so you can style them as you like.
                 *
                 * Again, If you want to remove post formats, just delete the post-formats
                 * folder and replace the function below with the contents of the "format.php" file.
                */
              ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

                <section class="entry-content cf" itemprop="articleBody">
                  <?php
                    // the content (pretty self explanatory huh)
                    the_content();

                    /*
                     * Link Pages is used in case you have posts that are set to break into
                     * multiple pages. You can remove this if you don't plan on doing that.
                     *
                     * Also, breaking content up into multiple pages is a horrible experience,
                     * so don't do it. While there are SOME edge cases where this is useful, it's
                     * mostly used for people to get more ad views. It's up to you but if you want
                     * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                     *
                     * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                     *
                    */
                    wp_link_pages( array(
                      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                      'after'       => '</div>',
                      'link_before' => '<span>',
                      'link_after'  => '</span>',
                    ) );
                  ?>


                  <?php
                    if (get_post_type() == 'special'):
                      $cl = SCF::get('contents_list');
                      if (check_ary($cl)):
                      ?>
                        <h2 class="content-list-title">Contents</h2>
                        <div class="special-content-list">

                          <?php
                          foreach( $cl as $loop ):
                            $post = get_post($loop);
                            $title = get_post($loop)->post_title;
                          ?>

                          <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf norm-article' ); ?> role="article">
                            <div class="img">
                              <?php if( get_post_status($post) == 'publish'): ?>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                  <?php if (check_ary(get_the_post_thumbnail_url())): ?>
                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title_attribute(); ?>">
                                  <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/ec-d.png" alt="<?php the_title_attribute(); ?>">
                                  <?php endif ?>
                                </a>
                              <?php else: ?>
                                <?php if (check_ary(get_the_post_thumbnail_url())): ?>
                                  <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php else: ?>
                                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/ec-d.png" alt="<?php the_title_attribute(); ?>">
                                <?php endif ?>
                              <?php endif ?>
                            </div>
                            <div class="titles">
                              <?php if( get_post_status($post) == 'publish'): ?>
                              <h1 class="h3 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $title; ?></a></h1>
                              <?php else: ?>
                              <h1 class="h3 entry-title"><?php echo $title; ?></h1>
                              <?php endif ?>
                              <div class="the_excerpt"><p><?php echo get_the_excerpt(); ?></p></div>
                              <div class="meta">
                                <?php if( get_post_status($post) == 'publish'): ?>
                                  <time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time('Y-m-d'); ?></time>
                                <?php endif ?>
                                <ul class="cat">
                                    <?php
                                      $cats = get_the_category();
                                      foreach( $cats as $cat ):
                                        $cat_num = $cat->term_id;
                                        $cat_link = get_category_link( $cat_num );
                                        $plylst_obj = get_category_by_slug('playlist_article');
                                        $plylst_id = $plylst_obj->term_id;
                                    ?>
                                      <?php if ($cat->parent==0 && $cat_num != $plylst_id): ?>
                                        <li class="cat_<?php echo $cat->slug; ?>">
                                          <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                                        </li>
                                      <?php endif; break; ?>
                                    <?php endforeach; ?>
                                </ul>
                              </div>
                            </div>

                          </article>

                          <?php endforeach; ?>

                        </div>
                      <?php endif; wp_reset_postdata(); ?>
                  <?php endif; ?>

                  <?php if (get_post_type() == 'magazine'): ?>
                    <div class="mia">
                      <?php
                        $image = SCF::get('image');
                        $image_url = wp_get_attachment_image_src($image,'large')[0];
                        $sub_title = SCF::get('sub_title');
                        $price = SCF::get('price');
                        $type = SCF::get('type');
                        $spec = SCF::get('spec');
                        $date = SCF::get('date');
                        $btn_group = SCF::get('btn_group');
                      ?>
                      <?php if (check_ary($image)): ?>
                      <div class="img">
                        <figure>
                          <img src="<?php echo $image_url;?>" alt="<?php the_title_attribute(); ?>">
                        </figure>
                      </div>
                      <?php endif ?>
                      <div class="txt">
                        <?php if (check_ary($price) || check_ary($type) || check_ary($spec) || check_ary($date)): ?>
                        <ul class="detail-list">
                          <?php if (check_ary($price)): ?>
                            <li><span>定価</span><span><?php echo $price; ?></span></li>
                          <?php endif ?>
                          <?php if (check_ary($type)): ?>
                            <li><span>品種</span><span><?php echo $type; ?></span></li>
                          <?php endif ?>
                          <?php if (check_ary($spec)): ?>
                            <li><span>仕様</span><span><?php echo $spec; ?></span></li>
                          <?php endif ?>
                          <?php if (check_ary($date)): ?>
                            <li><span>発売日</span><span><?php echo $date; ?></span></li>
                          <?php endif ?>
                        </ul>
                        <?php endif ?>
                        <?php if (check_ary($btn_group)): ?>
                          <ul class="btn-list">
                            <?php foreach ($btn_group as $b): ?>
                              <li><a href="<?php echo $b['btn_url']; ?>" class="btn round-btn" target="_blank"><?php echo $b['btn_txt']; ?> <i class="fas fa-chevron-right"></i></a></li>
                            <?php endforeach ?>
                          </ul>
                        <?php endif ?>
                      </div>
                    </div>
                  <?php endif ?>


                </section> <?php // end article section ?>

                <footer class="article-footer">

                  <?php if (check_ary($custom_terms)): ?>
                  <?php $taxonomy = 'genre'; $custom_terms = get_the_terms(get_the_ID(), $taxonomy ); ?>
                  <dl class="genre">
                    <dt>Genre:</dt>
                    <?php foreach( $custom_terms as $custom_term ): ?>
                        <dd>
                          <a href="<?php echo home_url(); ?>/genre/<?php echo $custom_term->slug; ?>/" rel="tag">
                          <?php echo $custom_term->name; ?>
                          </a>
                        </dd>
                    <?php endforeach; ?>
                  </dl>
                  <?php endif ?>
                  <?php
                    $posttags = get_the_tags();
                    if ($posttags) :?>
                  <dl class="tag">
                    <dt>Tag:</dt>
                    <?php
                      foreach ($posttags as $tag):
                        $tag_link = get_tag_link($tag->term_id);
                        $tag_name = $tag->name;
                    ?>
                      <dd><a href="<?php echo $tag_link; ?>"><?php echo $tag_name; ?></a></dd>
                    <?php endforeach; ?>
                  </dl>
                    <?php endif; ?>

                  <?php include(get_theme_root() . '/' . get_template() . "/parts/share.php"); ?>

                  <div class="bottom-categories">
                    <?php if (get_post_type() == 'magazine'):
                        $post_label = get_post_type_object(get_post_type())->label;
                        $post_name = get_post_type_object(get_post_type())->name;
                    ?>

                      <ul class="cat">
                        <li class="cat_magazine">
                          <a href="<?php echo home_url() . '/' . $post_name; ?>" title="<?php echo $post_label; ?>"><?php echo $post_label; ?></a>
                        </li>
                      </ul>

                    <?php else: ?>

                      <?php
                        $cats = get_the_category();
                        if (check_ary($cats)):
                      ?>
                        <ul class="cat">
                          <?php
                            foreach( $cats as $cat ):
                              $cat_num = $cat->term_id;
                              $cat_link = get_category_link( $cat_num );
                              if ($cat->parent==0):
                          ?>
                            <li class="cat_<?php echo $cat->slug; ?>">
                              <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                            </li>
                          <?php endif; endforeach; ?>
                        </ul>
                        <ul class="child">
                          <?php
                            foreach( $cats as $cat ):
                              $cat_num = $cat->term_id;
                              $cat_link = get_category_link( $cat_num );
                              if ($cat->parent!=0):
                          ?>
                            <li class="cat_<?php echo $cat->slug; ?>">
                              <a href="<?php echo esc_url( $cat_link ); ?>" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a>
                            </li>
                          <?php endif; endforeach; ?>
                        </ul>
                      <?php endif; ?>

                    <?php endif ?>

                  </div>

                </footer> <?php // end article footer ?>



              </article> <?php // end article ?>
