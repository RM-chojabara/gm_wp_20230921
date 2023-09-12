				<div id="sidebar1" class="inr" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<!-- <div class="no-widgets">
							<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div> -->

						<div class="ads">
							<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-05.php"); ?>
							<?php //LOGLY RELATED
							include(get_theme_root() . '/' . get_template() . "/parts/logly_sp_most_popular.php"); ?>
							<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-06.php"); ?>
							<?php include(get_theme_root() . '/' . get_template() . "/parts/ad-area-07.php"); ?>
							<?php //LOGLY RECOMMEND
							include(get_theme_root() . '/' . get_template() . "/parts/logly_sp_recommend.php"); ?>
						</div>
					<?php endif; ?>

				</div>
