<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	global $product;
	extract(etheme_get_single_product_sidebar());
?>



<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class('single-product-page'); ?>>

	<div class="row product-info sidebar-position-<?php echo $position; ?> responsive-sidebar-<?php echo $responsive; ?>">

		<?php if($single_product_sidebar && ($position == 'left' || ($responsive == 'top' && $position == 'right'))): ?>
			<div class="span3 sidebar sidebar-left single-product-sidebar">
				<?php et_product_brand_image(); ?>
				<?php if(etheme_get_option('upsell_location') == 'sidebar') woocommerce_upsell_display(); ?>
				<?php dynamic_sidebar('single-sidebar'); ?>
			</div>
		<?php endif; ?>

		<div class="span<?php echo $images_span; ?>">
			<?php woocommerce_show_product_images(); ?>
		</div>
		<div class="span<?php echo $meta_span; ?> product_meta">

			<?php woocommerce_template_loop_rating(); ?>

			<?php woocommerce_template_single_price(); ?>

		    <?php if ( etheme_get_custom_field('size_guide_img') ) : ?>
		    	<?php $lightbox_rel = (get_option('woocommerce_enable_lightbox') == 'yes') ? 'prettyPhoto' : 'lightbox'; ?>
		        <div class="size_guide">
		    	 <a rel="<?php echo $lightbox_rel; ?>" href="<?php etheme_custom_field('size_guide_img'); ?>"><?php _e('SIZING GUIDE', ETHEME_DOMAIN); ?></a>
		        </div>
		    <?php endif; ?>

			<?php woocommerce_template_single_add_to_cart(); ?>

			<?php woocommerce_template_single_excerpt(); ?>

			<?php
				$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
				echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $size, ETHEME_DOMAIN ) . ' ', '.</span>' );
			?>

			<?php woocommerce_template_single_meta(); ?>

            <?php if(etheme_get_option('share_icons')) echo do_shortcode('[share text="'.get_the_title().'"]'); ?>

			<?php woocommerce_template_single_sharing(); ?>


		</div>

		<?php if($single_product_sidebar && ($position == 'right' || ($responsive == 'bottom' && $position == 'left'))): ?>
			<div class="span3 sidebar sidebar-right single-product-sidebar">
				<?php dynamic_sidebar('single-sidebar'); ?>
				<?php et_product_brand_image(); ?>
				<?php if(etheme_get_option('upsell_location') == 'sidebar'):?>
					<h5>Your Pet May Also Like:</h5>
					<?php woocommerce_upsell_display(); ?>
				<?php endif; ?>

			</div>
		<?php endif; ?>

	</div>

	<?php
		woocommerce_output_product_data_tabs();

		if(etheme_get_custom_field('additional_block') != '') {
			echo '<div class="sidebar-position-without">';
			et_show_block(etheme_get_custom_field('additional_block'));
			echo '</div>';
		}


	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>