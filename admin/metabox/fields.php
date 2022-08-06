<?php require  ( WPNICE_ACCORDION_PATH.'admin/wpnp-framework/classes/setup.class.php' );
if ( class_exists( 'CSF' ) ) {    
    // Set a unique slug-like ID
    $prefix = 'wpnp_accordion_options';
    // Create a metabox
    CSF::createMetabox( $prefix, array(
        'title'     => 'WPNP Accordion',
        'post_type' => 'wpnice-accordion',
    ) );
    // Create a section
    CSF::createSection( $prefix, array(
        'fields' => array(
            array(
                'id'        => 'wpnp-accordion-data',
                'type'      => 'group',
                'title'     => 'Accordion Info',
                'fields'    => array(
                    array(
                        'id'    => 'wpnp-accordion-title',
                        'type'  => 'text',
                        'title' => 'Accordion Title',
                        'default' => 'Accordion Title 1',
                    ),
                    array(
                        'id'    => 'wpnp-text-content',
                        'type'  => 'textarea',
                        'default' => 'Accordion Simple Descritpion Here',
                        'title' => 'Accordion Text',
                    ),                    
                ),
            ),        

        )
    ) );    
  // Set a unique slug-like ID
  $prefix = 'wpnice_accordion_options';
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => 'Accordion Settins',
    'post_type' => 'wpnice-accordion',
  ) ); 
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Accordion Layout',
    'fields' => array(
        array(
            'id'          => 'accordion_layout',
            'type'        => 'select',
            'title'       => 'Select Accordion Layout',
            'placeholder' => 'Select an layout',
            'options'     => array(
              'option-1'  => 'Layout 1',
              'option-2'  => 'Layout 2',
            ),
            'default'     => 'option-1'
        ),        
        array(
            'id'         => 'open-mode',
            'type'       => 'radio',
            'title'      => 'Select Open Mode',
            'options'    => array(
              'open' => 'First One Open',             
              'all-close' => 'All Close',
            ),
            'default'    => 'open'
          ),
    	)
  ) );
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Disyplay Settings',
    'fields' => array(     
      array(
        'id'      => 'opt-typography-title',
        'type'    => 'typography',
        'title'   => 'Item Title Typography',        
        'default' => array(          
          'font-family'    => '',
          'font-size'      => '',
          'line-height'    => '',
          'letter-spacing' => '',
          'text-align'     => '',
          'text-transform' => '',
          'subset'         => '',
          'type'           => 'google',
          'unit'           => 'px',
          'color'          => '',
        ),
      ),
      array(
        'id'    => 'active-title-color',
        'type'  => 'color',
        'title' => 'Active Title Color',
      ),

      array(
        'id'    => 'title-bg-color',
        'type'  => 'color',
        'title' => 'Title Background Color',
      ),

      array(
        'id'    => 'active-title-bg-color',
        'type'  => 'color',
        'title' => 'Active Title Background Color',
      ),
      
    )
  ) );
}