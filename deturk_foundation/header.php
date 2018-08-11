<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Charity Help Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$show_slider 	  		= get_theme_mod('show_slider', false);
$show_servicesbox 	  	= get_theme_mod('show_servicesbox', false);
$show_socialicons 	  	= get_theme_mod('show_socialicons', false);
?>
<div id="site-holder" <?php if( get_theme_mod( 'sitebox_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($show_slider)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>



     <div class="site-header <?php echo $inner_cls; ?>">  
       <div class="container">    
          <div class="logo">
				<?php charity_help_lite_the_custom_logo(); ?>
                <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_html($description); ?></p>
				<?php endif; ?>
          </div><!-- logo -->
          <div class="head-rightpart">
               <?php if ( ! dynamic_sidebar( 'header-widget' ) ) : ?>                              
               <?php
				   $hdr_add_text = get_theme_mod('hdr_add_text');
				   if( !empty($hdr_add_text) ){ ?>
           		   <div class="infobox">
                     <i class="fa fa-map-marker"></i><span><b><?php esc_html_e('Location','charity-help-lite'); ?></b> <?php echo esc_html($hdr_add_text); ?></span>
                  </div>
	  	       <?php } ?>
               
               <?php
				   $contact_emailid = get_theme_mod('contact_emailid');
				   if( !empty($contact_emailid) ){ ?>
           		   <div class="infobox">
                     <i class="fa fa-envelope"></i><span><b><?php esc_html_e('Email','charity-help-lite'); ?></b> 
                     <a href="<?php echo esc_url('mailto:'.get_theme_mod('contact_emailid')); ?>"><?php echo esc_html(get_theme_mod('contact_emailid')); ?></a></span>
                  </div>
	  	       <?php } ?>            
                
               <?php if( $show_socialicons != ''){ ?> 
               <div class="social-icons">                   
                   <?php $fb_link = get_theme_mod('fb_link');
		 				if( !empty($fb_link) ){ ?>
            			<a title="facebook" class="fa fa-facebook" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a>
           		   <?php } ?>
                
                   <?php $twitt_link = get_theme_mod('twitt_link');
					if( !empty($twitt_link) ){ ?>
					<a title="twitter" class="fa fa-twitter" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
          		   <?php } ?>
            
    			  <?php $gplus_link = get_theme_mod('gplus_link');
					if( !empty($gplus_link) ){ ?>
					<a title="google-plus" class="fa fa-google-plus" target="_blank" href="<?php echo esc_url($gplus_link); ?>"></a>
           		  <?php }?>
            
           		  <?php $linked_link = get_theme_mod('linked_link');
					if( !empty($linked_link) ){ ?>
					<a title="linkedin" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
          		  <?php } ?>                  
              </div><!--end .social-icons--> 
            <?php } ?>   
          <?php endif; // end sidebar widget area ?>      
         </div><!-- .head-rightpart --> 
     	<div class="clear"></div>  
     <div class="mainmenu">
			<div class="toggle">
                 <a class="toggleMenu" href="#"><?php esc_html_e('Menu','charity-help-lite'); ?></a>
               </div><!-- toggle --> 
               <div class="header-menu">                   
                <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>   
               </div><!--.header-menu -->   
            
               <?php $donate_btn_link = get_theme_mod('donate_btn_link');
					if( !empty($donate_btn_link) ){ ?>
					<a class="donatenow" target="_blank" href="<?php echo esc_url($donate_btn_link); ?>">
						<?php
                        $donate_btn_text = get_theme_mod('donate_btn_text');
                        if( !empty($donate_btn_text) ){ ?>
                        <?php echo esc_html($donate_btn_text); ?>
                        <?php } ?>                     
                    </a>
          	  <?php } ?> 
                         
         <div class="clear"></div>      
	 </div><!-- .mainmenu--> 
     </div><!-- container -->   
</div><!--.site-header --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($show_slider != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('sliderpage'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('sliderpage'.$i,true));
	  }
	}
?>                
                
<?php if(!empty($slider_Arr)){ ?>
    <div id="slider" class="nivoSlider">
      
        <?php 
        $i=1;
        $slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
        while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
        <?php if(!empty($image)){ ?>
        <img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" />
        <?php }else{ ?>
        <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" />
        <?php } ?>
        <?php $i++; endwhile; ?>
    </div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">
        <div class="slide_info">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '' ) );  ?></p> 
            <?php
		 $slider_readmore = get_theme_mod('slider_readmore');
		 if( !empty($slider_readmore) ){ ?>
          <a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($slider_readmore); ?></a>
	  	 <?php } ?>                            
        </div>
    </div>      
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>        
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $show_servicesbox != ''){ ?>  
    <section id="section-wrap-1">
            	<div class="container">
                    <div class="page-wrapper">                        
                        <?php for($n=4; $n<=6; $n++) { ?>    
                        <?php if( get_theme_mod('services-pagebox'.$n,false)) { ?>          
                            <?php $queryvar = new WP_Query('page_id='.absint(get_theme_mod('services-pagebox'.$n,true)) ); ?>				
                                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
                                    <div class="threebox <?php if($n % 3 == 0) { echo "last_column"; } ?>">                                    
                                      <?php if(has_post_thumbnail() ) { ?>
                                        <div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                                      <?php } ?>
                                     <div class="pagecontent">
                                     <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
                                     <p><?php echo esc_html( wp_trim_words( get_the_content(), 22, '...' ) );  ?></p>   
                                     <a class="pagemore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','charity-help-lite'); ?></a>                                    
                                     </div>                                   
                                    </div>
                                    <?php endwhile;
                                   		 wp_reset_postdata(); ?>                                    
                       				<?php } } ?>                                 
                    <div class="clear"></div>  
               </div><!-- .page-wrapper--> 
               
            </div><!-- .container -->                  
       </section><!-- .section-wrap-1-->                      	      
<?php } ?>
<?php } ?>