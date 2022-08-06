<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
class WPNICE_ACCORDION_SHORTCODE{
    function __construct(){
        add_shortcode( 'wpnice_accordion', array( $this, 'wpnice_accordion_shortcode' ));
    }
    
    function wpnice_accordion_shortcode( $atts ) {
        $atts = shortcode_atts(
            array(
                'id' => '',
            ), $atts 
        );
    
        global $post;
        $post_id = $atts[ 'id' ];   
       
    
        if ( $post_id != 'xx' ) {
            $acoordion_id = $post_id;
            $accordion  = get_post_meta( $post_id, 'wpnp_accordion_options', true );
            $accordion_data = $accordion[ 'wpnp-accordion-data' ];
    
            //geting value from accordion layout
            $accordion_settings_layout  = get_post_meta( $post_id, 'wpnice_accordion_options', true );      
            //select layout     
            $layout = $accordion_settings_layout[ 'accordion_layout' ];
            
            /*select open mode
            */
            $openmode = $accordion_settings_layout[ 'open-mode' ];
            //title typography
            $titleTypograpy = $accordion_settings_layout[ 'opt-typography-title'];
            $title_styling = !empty($titleTypograpy['color']) ? $titleTypograpy['color']  : '';
            
      
            if ( $layout == 'option-1' ) {
               require WPNICE_ACCORDION_INCLUDES.'/view/layout1.php';
               return $layout_1;
          
            }
    
            if ( $layout == 'option-2' ) {            
                require WPNICE_ACCORDION_INCLUDES.'/view/layout2.php';
                return $layout_2;
            }       
            
        }
        ?>
        
        <?php
    }
    
}
new WPNICE_ACCORDION_SHORTCODE();
