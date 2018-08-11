<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Charity Help Lite
 */
?>

<div class="footer-copyright">
        	<div class="container">
            	<div class="copyright-txt">
					<?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'charity-help-lite');?>           
                </div>
                <div class="design-by">
				  <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/charity-help-lite/', 'charity-help-lite' ) ); ?>"><?php printf( __( 'Theme by %s', 'charity-help-lite' ), 'Grace Themes' ); ?></a>
                </div>
                 <div class="clear"></div>
            </div>           
        </div>        
</div><!--#end site-holder-->

<?php wp_footer(); ?>
</body>
</html>