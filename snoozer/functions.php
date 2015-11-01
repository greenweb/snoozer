<?php

// Replace WooThemes Breadcrumbs with Yoast breadcrumbs
add_action( 'init', 'hh_breadcrumbs' );

function hh_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    add_action( 'woocommerce_before_main_content','hh_yoast_breadcrumb', 20, 0);
    function hh_yoast_breadcrumb() {
        if ( function_exists('yoast_breadcrumb')  && !is_front_page() ) {
            yoast_breadcrumb('<p class="breadcrumbs">','</p>');
        }
    }

}

// Allow Shortcodes in Widgets
add_filter('widget_text', 'do_shortcode');

// WooCommerce Google Analytics Integration
function ia_wc_ga_integration( $order_id ) {
	$order = new WC_Order( $order_id ); ?>
	
	<script type="text/javascript">
	ga('require', 'ecommerce', 'ecommerce.js'); // Load The Ecommerce Tracking Plugin
		
		// Transaction Details
		ga('ecommerce:addTransaction', {
			'id': '<?php echo $order_id;?>',
			'affiliation': '<?php echo get_option( "blogname" );?>',
			'revenue': '<?php echo $order->get_total();?>',
			'shipping': '<?php echo $order->get_total_shipping();?>',
			'tax': '<?php echo $order->get_total_tax();?>',
			'currency': '<?php echo get_woocommerce_currency();?>'
		});

	
	<?php
		//Item Details
	if ( sizeof( $order->get_items() ) > 0 ) {
		foreach( $order->get_items() as $item ) {
			$product_cats = get_the_terms( $item["product_id"], 'product_cat' );
				if ($product_cats) { 
					$cat = $product_cats[0];
				} ?>
			ga('ecommerce:addItem', {
				'id': '<?php echo $order_id;?>',
				'name': '<?php echo $item['name'];?>',
				'sku': '<?php echo get_post_meta($item["product_id"], '_sku', true);?>',
				'category': '<?php echo $cat->name;?>',
				'price': '<?php echo $item['line_subtotal'];?>',
				'quantity': '<?php echo $item['qty'];?>',
				'currency': '<?php echo get_woocommerce_currency();?>'
			});
	<?php
		}	
	} ?>
		ga('ecommerce:send');
		</script>
<?php }
add_action( 'woocommerce_thankyou', 'ia_wc_ga_integration' );


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );
 
if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
function woocommerce_output_upsells() {
woocommerce_upsell_display( 6,3 ); // Display 3 products in rows of 3
}
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
 
    return $tabs;
 
}

/* Disable Related products on single product pages */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);