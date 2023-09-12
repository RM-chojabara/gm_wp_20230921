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
							<?php //LOGLY MOST POPULAR PC
							include(get_theme_root() . '/' . get_template() . "/parts/logly_pc_most_popular.php"); ?>
							<?php //LOGLY MOST POPULAR SP
							include(get_theme_root() . '/' . get_template() . "/parts/logly_sp_most_popular.php"); ?>
							<?php //LOGLY RECOMMEND PC
							include(get_theme_root() . '/' . get_template() . "/parts/logly_pc_recommend.php"); ?>
							<?php //LOGLY RECOMMEND SP
							include(get_theme_root() . '/' . get_template() . "/parts/logly_sp_recommend.php"); ?>
						</div>

					<?php endif; ?>

				</div>
