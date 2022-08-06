<?php
	function wpnice_accordion_front_scripts() {		
		wp_enqueue_style( 'bootstrap-css', plugins_url('../assets/css/bootstrap.min.css', __FILE__), array(), null, 'all' );		
		wp_enqueue_style( 'fontawesome', plugins_url('../assets/css/all.min.css', __FILE__), array(), null, 'all' );		
		wp_enqueue_style( 'wpnice-accordion', plugins_url('../assets/css/wpnice-accordion.css', __FILE__), array(), null, 'all' );		
		
		//adding dynamic css
	
		require (WPNICE_ACCORDION_PATH.'includes/dynamic-css.php');
		wp_add_inline_style( 'wpnice-accordion', $wpnp_dynamic_css );

		wp_enqueue_script( 'bootstrap', plugins_url('../assets/js/bootstrap.min.js', __FILE__) , array('jquery'), 3.0, true );		
		wp_enqueue_script( 'wpnice-accordion-main', plugins_url('../assets/js/main.js', __FILE__) , array('jquery'), time(), true );	
	}
	add_action('wp_enqueue_scripts', 'wpnice_accordion_front_scripts' );

	add_action( 'admin_enqueue_scripts', 'wpnice_accordion_add_color_picker' );
	function wpnice_accordion_add_color_picker( $hook ) {	 
	    if( is_admin() ) {       
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'wpnice-accordion-admin', plugins_url('../assets/admin/css/admin-logo.css', __FILE__), array(), null, 'all' );	
			wp_enqueue_script( 'custom-script-handle', plugins_url( '../assets/admin/js/custom-script.js', __FILE__ ), array( 'wp-color-picker','jquery-ui-tabs' ), false, true ); 
	    }
	}