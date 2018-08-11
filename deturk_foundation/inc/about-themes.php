<?php
/**
 *Charity Help Lite About Theme
 *
 * @package Charity Help Lite
 */

//about theme info
add_action( 'admin_menu', 'charity_help_lite_abouttheme' );
function charity_help_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'charity-help-lite'), __('About Theme Info', 'charity-help-lite'), 'edit_theme_options', 'charity_help_lite_guide', 'charity_help_lite_mostrar_guide');   
} 

//Info of the theme
function charity_help_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'charity-help-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Charity Help Lite is a user-friendly Non-profit free WordPress theme  organizations like NGO WordPress theme. It is a simple and clean but still professional theme that is best suited for Charity, NGO, foundations, churches, political organizations etc. It is very easy to setup and it comes with all the basic features that is needed to create your own website. ','charity-help-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'charity-help-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'charity-help-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'charity-help-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'charity-help-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'charity-help-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'charity-help-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'charity-help-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'charity-help-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'charity-help-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( CHARITY_HELP_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'charity-help-lite'); ?></a> | 
            <a href="<?php echo esc_url( CHARITY_HELP_LITE_PROTHEME_URL ); ?>"><?php esc_html_e('Purchase Pro', 'charity-help-lite'); ?></a> | 
            <a href="<?php echo esc_url( CHARITY_HELP_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'charity-help-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>