<?php  
/**
 *Charity Help Lite Theme Customizer
 *
 * @package Charity Help Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function charity_help_lite_customize_register( $wp_customize ) {	
	
	function charity_help_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
			'title'	=> __('Site Layout','charity-help-lite'),			
			'priority'	=> 1,
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
			'sanitize_callback' => 'charity_help_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	   'section'   => 'layout_option',    	 
		   'label'	=> __('Check to Box Layout','charity-help-lite'),
		   'description'	=> __('if you want to box layout please check the Box Layout Option.','charity-help-lite'),
    	   'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#f2b23d',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','charity-help-lite'),			
			 'description'	=> __('More color options in PRO Version','charity-help-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('hdr_contactinfo_sec',array(
			'title'	=> __('Header Contact Info','charity-help-lite'),				
			'priority'		=> null
	));
	$wp_customize->add_setting('hdr_add_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('hdr_add_text',array(	
			'type'	=> 'text',
			'label'	=> __('Add address here','charity-help-lite'),
			'section'	=> 'hdr_contactinfo_sec',
			'setting'	=> 'hdr_add_text'
	));	
	
	$wp_customize->add_setting('contact_emailid',array(
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_emailid',array(
			'type'	=> 'text',
			'label'	=> __('Add email address here.','charity-help-lite'),
			'section'	=> 'hdr_contactinfo_sec'
	));	
	
	$wp_customize->add_setting('donate_btn_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('donate_btn_text',array(	
			'type'	=> 'text',
			'label'	=> __('Add button name here','charity-help-lite'),
			'section'	=> 'hdr_contactinfo_sec',
			'setting'	=> 'donate_btn_text'
	));	
	
	$wp_customize->add_setting('donate_btn_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('donate_btn_link',array(
			'label'	=> __('Add donate button link here','charity-help-lite'),
			'section'	=> 'hdr_contactinfo_sec',
			'setting'	=> 'donate_btn_link'
	));//end Header Contact info Section	
	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Header social icons','charity-help-lite'),
			'description' => __( 'Add social icons link here to display icons in header', 'charity-help-lite' ),			
			'priority'		=> null
	));
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','charity-help-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','charity-help-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','charity-help-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','charity-help-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	$wp_customize->add_setting('show_socialicons',array(
				'default' => false,
				'sanitize_callback' => 'charity_help_lite_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_socialicons', array(
			   'settings' => 'show_socialicons',
			   'section'   => 'social_sec',
			   'label'     => __('Check To show This Section','charity-help-lite'),
			   'type'      => 'checkbox'
	 ));//Show Social icons Section 	
	
	// Slider Section		
	$wp_customize->add_section( 'slider_options', array(
            'title' => __('Slider Section', 'charity-help-lite'),
            'priority' => null,
			'description'	=> __('Default image size for slider is 1400 x 827 pixel.','charity-help-lite'),            			
    ));
	
	$wp_customize->add_setting('sliderpage1',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('sliderpage1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','charity-help-lite'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage2',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('sliderpage2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','charity-help-lite'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage3',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('sliderpage3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','charity-help-lite'),
			'section'	=> 'slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('slider_readmore',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('slider_readmore',array(	
			'type'	=> 'text',
			'label'	=> __('Add slider Read more button name here','charity-help-lite'),
			'section'	=> 'slider_options',
			'setting'	=> 'slider_readmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('show_slider',array(
				'default' => false,
				'sanitize_callback' => 'charity_help_lite_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_slider', array(
			   'settings' => 'show_slider',
			   'section'   => 'slider_options',
			   'label'     => __('Check To Show This Section','charity-help-lite'),
			   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	  // Three Column Services Section
	$wp_customize->add_section('pageboxs_section', array(
		'title'	=> __('Three Page Box Section','charity-help-lite'),
		'description'	=> __('Select pages from the dropdown for three column Page section','charity-help-lite'),
		'priority'	=> null
	));		
	
	$wp_customize->add_setting('services-pagebox4',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'services-pagebox4',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));		
	
	$wp_customize->add_setting('services-pagebox5',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'services-pagebox5',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('services-pagebox6',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'services-pagebox6',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('show_servicesbox',array(
			'default' => false,
			'sanitize_callback' => 'charity_help_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_servicesbox', array(
			   'settings' => 'show_servicesbox',
			   'section'   => 'pageboxs_section',
			   'label'     => __('Check To Show This Section','charity-help-lite'),
			   'type'      => 'checkbox'
	 ));//Show Services Section	 
	
		 
}
add_action( 'customize_register', 'charity_help_lite_customize_register' );

function charity_help_lite_custom_css(){
		?>
        	<style type="text/css"> 					
				a, .recent_articles h2 a:hover,
				#sidebar ul li a:hover,									
				.recent_articles h3 a:hover,					
				.recent-post h6:hover,					
				.page-four-column:hover h3,												
				.postmeta a:hover,
				.logo h1 span,
				.social-icons a:hover,				
				.header-menu ul li a:hover, 
				.header-menu ul li.current-menu-item a,
				.header-menu ul li.current-menu-parent a.parent,
				.header-menu ul li.current-menu-item ul.sub-menu li a:hover
				.social-icons a:hover
					{ color:<?php echo esc_attr( get_theme_mod('color_scheme','#f2b23d')); ?>;}			 
					
				.pagination ul li .current, .pagination ul li a:hover, 
				#commentform input#submit:hover,					
				.nivo-controlNav a.active,
				.learnmore,					
				.appbutton:hover,					
				#sidebar .search-form input.search-submit,				
				.wpcf7 input[type='submit'],
				#featureswrap,
				.column-3:hover .learnmore,
				nav.pagination .page-numbers.current,
				.slide_info .slide_more:hover,
				.header-menu ul li:hover > ul,
				.mainmenu,
				.toggle a,
				#section-wrap-1
					{ background-color:<?php echo esc_attr( get_theme_mod('color_scheme','#f2b23d')); ?>;}					
					
					
			</style> 
<?php   
}
         
add_action('wp_head','charity_help_lite_custom_css');	 


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function charity_help_lite_customize_preview_js() {
	wp_enqueue_script( 'charity_help_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'charity_help_lite_customize_preview_js' );