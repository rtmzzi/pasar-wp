<section class="footer-widgets-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<?php if( is_active_sidebar( 'footer-widget-top-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widget-top-1' ); ?>
				<?php else : ?>
					<div class="widget">
						<?php $name = sprintf( __( 'Top Footer Widget %1$s', 'tokopress' ), '#1' ); ?>
						<?php $desc = sprintf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?>
						<?php printf( __( '<h4 class="widget-title">%1$s</h4><p>%2$s</p>', 'tokopress' ), $name, $desc ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-6 col-md-3">
				<?php if( is_active_sidebar( 'footer-widget-top-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widget-top-2' ); ?>
				<?php else : ?>
					<div class="widget">
						<?php $name = sprintf( __( 'Top Footer Widget %1$s', 'tokopress' ), '#2' ); ?>
						<?php $desc = sprintf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?>
						<?php printf( __( '<h4 class="widget-title">%1$s</h4><p>%2$s</p>', 'tokopress' ), $name, $desc ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="clearfix visible-sm-block"></div>
			<div class="col-sm-6 col-md-3">
				<?php if( is_active_sidebar( 'footer-widget-top-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widget-top-3' ); ?>
				<?php else : ?>
					<div class="widget">
						<?php $name = sprintf( __( 'Top Footer Widget %1$s', 'tokopress' ), '#3' ); ?>
						<?php $desc = sprintf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?>
						<?php printf( __( '<h4 class="widget-title">%1$s</h4><p>%2$s</p>', 'tokopress' ), $name, $desc ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-6 col-md-3">
				<?php if( is_active_sidebar( 'footer-widget-top-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widget-top-4' ); ?>
				<?php else : ?>
					<div class="widget">
						<?php $name = sprintf( __( 'Top Footer Widget %1$s', 'tokopress' ), '#4' ); ?>
						<?php $desc = sprintf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?>
						<?php printf( __( '<h4 class="widget-title">%1$s</h4><p>%2$s</p>', 'tokopress' ), $name, $desc ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>