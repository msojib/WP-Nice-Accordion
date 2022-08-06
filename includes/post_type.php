<?php
//create custom post type for shortcode
function wpnice_accordion_post_create_settings_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'WP Nice Accordions', 'Post Type General Name', 'wpnice-accordion' ),
			'singular_name'       => _x( 'WP Nice Accordion', 'Post Type Singular Name', 'wpnice-accordion' ),
			'menu_name'           => __( 'WP Nice Accordions', 'wpnice-accordion' ),
			'parent_item_colon'   => __( 'Parent WP Nice Accordion', 'wpnice-accordion' ),
			'all_items'           => __( 'All Accordions', 'wpnice-accordion' ),
			'view_item'           => __( 'View WP Nice Accordion', 'rs-team-settingse' ),
			'add_new_item'        => __( 'Create New WP Nice Accordion', 'wpnice-accordion' ),
			'add_new'             => __( 'Add New Accordion', 'wpnice-accordion' ),
			'edit_item'           => __( 'Edit WP Nice Accordion', 'wpnice-accordion' ),
			'update_item'         => __( 'Update WP Nice Accordion', 'wpnice-accordion' ),
			'search_items'        => __( 'Search WP Nice Accordion', 'wpnice-accordion' ),
			'not_found'           => __( 'Not Found', 'wpnice-accordion' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'wpnice-accordion' ),
		);

	// Set other options for Custom Post Type
		$args = array(
			'label'               => __( 'WP Nice Accordions', 'wpnice-accordion' ),
			'description'         => __( 'WP Nice Accordion news and reviews', 'wpnice-accordion' ),
			'labels'              => $labels,
			'supports'            => array( 'title'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,			
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => false,
			'capability_type'     => 'page',
		);

		// Registering your Custom Post Type
		register_post_type( 'wpnice-accordion', $args );

	}

add_action( 'init', 'wpnice_accordion_post_create_settings_type');	




function wpnice_accordion_settings_admin_updated_messages( $messages ) {
global $post, $post_id;
$messages['wpnice-accordion'] = array( 
	1 => __('Shortcode updated.', 'wpnice-accordion'),
	2 => $messages['post'][2],
	3 => $messages['post'][3],
	4 => __('Shortcode updated.', 'wpnice-accordion'),
	5 => isset($_GET['revision']) ? sprintf( __('Shortcode restored to revision from %s', 'wpnice-accordion'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => __('Shortcode published.', 'wpnice-accordion'),
	7 => __('Shortcode saved.', 'wpnice-accordion'),
	8 => __('Shortcode submitted.', 'tcl_team_settings'),
	9 => sprintf( __('Shortcode scheduled for: <strong>%1$s</strong>.', 'wpnice-accordion'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )),
	10 => __('Shortcode draft updated.', 'wpnice-accordion'),
);
return $messages;
}
add_filter( 'post_updated_messages', 'wpnice_accordion_settings_admin_updated_messages' );


/*------------------------------------------
Extra column make for shotcode custom post
-------------------------------------------*/


function wpnice_accordion_settings_add_shortcode_column( $columns ) {
return array_merge( $columns,
	array( 'shortcode' => __( 'Shortcode', 'wpnice-accordion' ) ) 
	
	);
}
add_filter( 'manage_wpnice-accordion_posts_columns' , 'wpnice_accordion_settings_add_shortcode_column' );


/*------------------------------------------
Dynamic Shortcode generator
-------------------------------------------*/

function wpnice_accordion_settings_add_posts_shortcode_display( $column, $post_id ) {
if ($column == 'shortcode'){
	?>
<input style="background:#ccc; width:250px" type="text" onClick="this.select();" value="[wpnice_accordion <?php echo 'id=&quot;'.esc_attr($post_id).'&quot;';?>]" />
<br />
<textarea cols="50" rows="3" style="background:#ddd" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[wpnice_accordion id='; echo "'".esc_attr($post_id)."']"; '"); ?>'; ?></textarea>
<?php
}
}

add_action( 'manage_wpnice-accordion_posts_custom_column' , 'wpnice_accordion_settings_add_posts_shortcode_display', 10, 2 );