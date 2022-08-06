<?php
class WPNICE_ACCORDION_INIT{
	function __construct(){
		require('assets.php');
		require  WPNICE_ACCORDION_PATH.'includes/template.php';
		require  WPNICE_ACCORDION_PATH.'includes/post_type.php';

		//Adding Metaboxes	
		//for admin purpose
		require  ( WPNICE_ACCORDION_PATH.'admin/metabox/fields.php');
	}
}
new WPNICE_ACCORDION_INIT();
