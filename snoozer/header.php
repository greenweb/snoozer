<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <?php global $etheme_responsive, $woocommerce;; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <?php if($etheme_responsive): ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <?php endif; ?>
	<link rel="shortcut icon" href="<?php etheme_option('favicon',true) ?>" />
<meta name="msvalidate.01" content="5FEEEB6FC8412D6B47DA26EDB709CF0F" />
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', ETHEME_DOMAIN ), max( $paged, $page ) );

		?></title>
		
        <!--[if IE 9]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/css/'; ?>ie9.css"><![endif]-->
        
		<?php
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			wp_head();
		?>
        <script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '1516983291855482']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1516983291855482&amp;ev=NoScript" /></noscript>
<meta name="google-site-verification" content="Rq5Furjl9zmmDNi7UL0DiTp8kJvrxCwOIiOIZ0sMyIQ" />
</head>

<body <?php body_class(); ?>>



<script>
  
     jQuery(document).ready(function() {
       
       if (jQuery('#variations_clear').is(':hidden') ) {
       
         jQuery('.single_add_to_cart_button').addClass('half-opacity');
       
       }
       
       });

  
      jQuery(document).ready(function() {
 
      jQuery('.select-option a').on('click', function() {
        
         jQuery('.single_add_to_cart_button').removeClass('half-opacity');
        
      });
      
       });



 
</script>






	<div class="mobile-loader hidden-desktop">
		<div id="floatingCirclesG"><div class="f_circleG" id="frotateG_01"></div><div class="f_circleG" id="frotateG_02"></div><div class="f_circleG" id="frotateG_03"></div><div class="f_circleG" id="frotateG_04"></div><div class="f_circleG" id="frotateG_05"></div><div class="f_circleG" id="frotateG_06"></div><div class="f_circleG" id="frotateG_07"></div><div class="f_circleG" id="frotateG_08"></div></div>
		<h5><?php _e('Loading Snoozer...', ETHEME_DOMAIN); ?></h5>
	</div>

	<div class="mobile-nav side-block">
		<div class="close-mobile-nav close-block"><?php _e('Navigation', ETHEME_DOMAIN) ?></div>
		<?php 
			wp_nav_menu(array(
				'theme_location' => 'mobile-menu'
			)); 
		?>
	</div>

	<?php if(etheme_get_option('right_panel')): ?>
		<div class="side-area side-block hidden-phone hidden-tablet">
			<div class="close-side-area close-block"><i class="icon-remove"></i></div>
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('right-panel-sidebar')): ?>
				
				<div class="sidebar-widget">
					<h4 class="widget-title"><?php _e('Sample HTML', ETHEME_DOMAIN) ?></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, praesentium, recusandae facere sapiente ex impedit ad laborum sunt fugiat fugit. Nesciunt, magni blanditiis excepturi atque optio officiis omnis ab quis.</p>
				</div>

			<?php endif; ?>	
		</div>
	<?php endif; ?>	

	<?php $ht = ''; $ht = apply_filters('custom_header_filter',$ht); ?>


	<?php if (etheme_get_option('fixed_nav')): ?>
		<div class="fixed-header-area fixed-menu-type<?php etheme_option('menu_type'); ?> hidden-phone">
			<div class="fixed-header">
				<div class="container">
					<div class="menu-wrapper">
                        
					    <div class="menu-icon hidden-desktop"><i class="icon-reorder"></i></div>
						<div class="logo-with-menu">
							<img src="/wp-content/uploads/2014/02/snoozer-dog-products-horizontal.png" alt="Snoozer Horizontal Logo">
						</div>

						<div class="modal-buttons">
							<?php if (class_exists('Woocommerce') && etheme_get_option('top_links')): ?>
	                        	<a href="#" class="shopping-cart-link hidden-desktop" data-toggle="modal" data-target="#cartModal">&nbsp;</a>
							<?php endif ?>
							<?php if (is_user_logged_in() && etheme_get_option('top_links')): ?>
								<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="my-account-link hidden-desktop">&nbsp;</a>
							<?php elseif(etheme_get_option('top_links')): ?>
								<a href="#" data-toggle="modal" data-target="#loginModal" class="my-account-link hidden-desktop">&nbsp;</a>
							<?php endif ?>
							<?php if (etheme_get_option('search_form')): ?>
								<a href="#" data-toggle="modal" data-target="#searchModal" class="search-link hidden-desktop">&nbsp;</a>
							<?php endif ?>
						</div>

						<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
							<?php wp_nav_menu(array(
								'theme_location' => 'main-menu',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'depth' => 4,
								'fallback_cb' => false,
								'walker' => new Et_Navigation
							)); ?>
						<?php else: ?>
							Set your main menu in <strong>Apperance &gt; Menus</strong>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>
	
	<?php if (etheme_get_option('top_panel')): ?>
		<div class="top-panel">
			<div class="container">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('top-panel-sidebar')): ?>
				<?php endif; ?>	
			</div>
		</div>
	<?php endif ?>

	<div class="page-wrapper">
	

	<div class="header-wrapper<?php if(etheme_get_option('fade_animation')): ?> fade-in delay1<?php endif; ?> header-type-<?php echo $ht; ?>">
		<?php if (etheme_get_option('top_bar')): ?>
			<div class="top-bar">
				<div class="container">
					<div class="row-fluid">
						<div class="languages-area">
							<?php if(etheme_get_option('languages_area') && (!function_exists('dynamic_sidebar') || !dynamic_sidebar('languages-sidebar'))): ?>
									<div class="languages">
										<ul class="links">
											<li class="facebook"><a href="https://www.facebook.com/SnoozerPetProducts?ref=br_rs"><img src="/wp-content/themes/snoozer/images/facebook.png" target="_blank"></a></li>
											<li class="twitter"><a href="https://twitter.com/SnoozerPP"><img src="/wp-content/themes/snoozer/images/twitter.png" target="_blank"></a></li>
											<li class="pinterest"><a href="http://www.pinterest.com/snoozerpets/"><img src="/wp-content/themes/snoozer/images/pinterest.png" target="_blank"></a></li>
										</ul>
									</div>
							<?php endif; ?>	
						</div>
						
						<?php if (etheme_get_option('top_panel')): ?>
							<div class="show-top-panel hidden-phone"></div>
						<?php endif ?>
						
						<?php if (etheme_get_option('search_form')): ?>
							<div class="search hide-input a-right">
								<span data-toggle="modal" data-target="#searchModal" class="search-link">search</span>
							</div>
						<?php endif ?>

						<?php if (class_exists('Woocommerce')): ?>
                        	<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="shopping-cart-link" >cart</a>
						<?php endif ?>


						<?php if (is_user_logged_in() && etheme_get_option('top_links')): ?>
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="my-account-link hidden-desktop">&nbsp;</a>
						<?php elseif(etheme_get_option('top_links')): ?>
							<a href="#" data-toggle="modal" data-target="#loginModal" class="my-account-link hidden-tablet hidden-desktop">&nbsp;</a>
						<?php endif ?>



						<?php if (etheme_get_option('top_links')): ?>
							<?php if(class_exists('Woocommerce') && !etheme_get_option('just_catalog') && etheme_get_option('cart_widget')): ?>
	                    <?php etheme_top_cart(); ?>
		            <?php endif ;?>
						<?php endif ?>
						
					</div>
				</div>
			</div>
		<?php endif ?>

		<header class="header header<?php echo $ht; ?>">
			
			<div class="container">
				<div class="table-row">

    				<?php if (etheme_get_option('search_form')): ?>
    					<div class="search search-left hidden-phone hidden-tablet a-left">
								<?php echo etheme_search(array()); ?>
    					</div>
    				<?php endif ?>
                    
					<div class="logo"><?php etheme_logo(); ?></div>

					<?php if (etheme_get_option('search_form')): ?>
						<div class="search search-center hidden-phone hidden-tablet">
							<div class="site-description hidden-phone hidden-tablet"><?php bloginfo( 'description' ); ?></div>
								<?php echo etheme_search(array()); ?>
						</div>
					<?php endif ?>
					
					<p class="myacct"><a href="http://www.snoozerpetproducts.com/cart">Cart</a> / <?php
if ( is_user_logged_in() ) { echo '<a href="/account">My Account</a> |';} else {}?> <?php add_modal_login_link(); ?>
<!-- <?php
if ( is_user_logged_in() ) {} else { echo ' | <a href="#">Create an Account</a>';}?>--></p></p>
					
		             
					<div class="menu-icon hidden-desktop"><i class="icon-reorder"></i></div>
				</div>
			</div>

		</header>
		<div class="main-nav visible-desktop">
			<div class="double-border">
				<div class="container">
					<div class="menu-wrapper menu-type<?php etheme_option('menu_type'); ?>">
						<div class="logo-with-menu">
							<?php etheme_logo(); ?>
						</div>
						<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
							<?php wp_nav_menu(array(
								'theme_location' => 'main-menu',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'depth' => 4,
								'fallback_cb' => false,
								'walker' => new Et_Navigation
							)); ?>
						<?php else: ?>
							<br>
							<h4 class="a-center">Set your main menu in <em>Apperance &gt; Menus</em></h4>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		
		<?php if(is_front_page()) : ?>
		
			<div id="sub-header">
				<p class="onethird sub-header-left">Free Shipping on ALL Retail Orders</p>
				<p class="onethird sub-header-center"><a href="/snoozer-distributors-application/">Snoozer Pet Products distributors</a></p>
				<p class="onethird sub-header-right">Not sure which size to get? <strong><a href="/customer-care/snoozer-sizing-guide/">See our size guide</a></strong></p>
			</div>

		<?php endif; ?>
		
	</div>