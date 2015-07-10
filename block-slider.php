<?php if( of_get_option( 'tokopress_rev_slider' ) ) : ?>
	<div id="slider-block">
		<div class="row">
			<?php putRevSlider( of_get_option( 'tokopress_rev_slider' ) ); ?>
		</div>
	</div><!-- Slider -->
<?php endif; ?>