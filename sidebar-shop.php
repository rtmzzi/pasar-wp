<div class="col-md-3 col-md-pull-9">
	<div class="sidebar">
		<div class="row">
			<?php if ( !is_404() ) : ?>
				<?php if( is_active_sidebar( 'shop' ) ) : ?>
					<?php dynamic_sidebar( 'shop' ); ?>
				<?php else : ?>
					<div class="col-sm-6 col-md-12 widget">
						<?php $name = __( 'Shop Sidebar', 'tokopress' ); ?>
						<?php $desc = sprintf( __( 'This is "%1$s" widget area. Visit your %2$s to add new widget to this area.', 'tokopress' ), $name, '<a href="'.admin_url('widgets.php').'">'.__('Widgets Page','tokopress').'</a>' ); ?>
						<?php printf( __( '<h4 class="widget-title">%1$s</h4><p>%2$s</p>', 'tokopress' ), $name, $desc ); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>		
	</div>
</div>
