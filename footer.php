<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Fundraiser Lite
 */

	$fb_link = get_theme_mod('fb_link'); 
	$twitt_link = get_theme_mod('twitt_link');
	$insta_link = get_theme_mod('insta_link');
	$linked_link = get_theme_mod('linked_link');
	$hide_footer = get_theme_mod('hide_footer', 1);
?>  
<div id="footer-wrapper">
		<?php if( $hide_footer == '') { ?>
		<div class="footerarea">
    	<div class="container footer">
             <div class="cols-3 widget-column-1">  
			   <?php $about_title = get_theme_mod('about_title'); 
               if (!empty($about_title)) { ?>
                <h5><?php echo esc_html($about_title);?></h5>             
			   <?php } 
			   $about_description = get_theme_mod('about_description'); 
			   if (!empty($about_description)) { ?>
                <p><?php echo wp_kses_post($about_description);?></p>
			   <?php } ?>  
          </div><!--end .widget-column-1-->                  
               <div class="cols-3 widget-column-2">  
              <?php $newsfeed_title = get_theme_mod('newsfeed_title'); 
			  		if (!empty($newsfeed_title)) { ?>
                <h5><?php echo esc_html($newsfeed_title); ?></h5>            
			  <?php } 
			  		$args = array( 'posts_per_page' => 7, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
					$postquery = new WP_Query( $args );
					while( $postquery->have_posts() ) : $postquery->the_post(); ?>
                        <div class="recent-post">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                        </div>
                    <?php endwhile; 
						  wp_reset_postdata(); ?>                    
              </div><!--end .widget-column-3-->
             <div class="cols-3 widget-column-3">  
				<?php $contact_title = get_theme_mod('contact_title');  
				      if (!empty($contact_title)){  ?>
                <h5><?php echo esc_html($contact_title); ?></h5>              
			   <?php } ?>
                <div class="phone-no">	 
                <?php $contact_add = get_theme_mod('contact_add');
					  if (!empty($contact_add)) { ?>
                <p><?php echo wp_kses_post($contact_add); ?></p>             
			   <?php } ?>                
              <?php $contact_no = get_theme_mod('contact_no'); 
			  		if (!empty($contact_no)) { ?>
                <p><?php echo esc_html_e('Phone:','fundraiser-lite');?> <?php echo esc_html($contact_no); ?></p>              
			   <?php }
			   		 $contact_mail = get_theme_mod('contact_mail');
			   		 if(!empty($contact_mail)){ 
			   		 echo esc_html_e('Email:','fundraiser-lite');?>
              <a href="mailto:<?php echo esc_attr( antispambot(sanitize_email( $contact_mail ) )); ?>"><?php echo esc_html( antispambot( $contact_mail ) ); ?></a>
			  <?php } ?>                             
               </div>
            </div><!--end .widget-column-4-->
            <div class="clear"></div>
        </div><!--end .container--> 
        </div>
        <?php } ?>
         <div class="copyright-wrapper">
        	<div class="container">
           		 <div class="copyright-txt"><?php bloginfo('name'); ?> <?php esc_html_e('Theme By ','fundraiser-lite');?><a href="<?php echo esc_url('https://www.sktthemes.org/');?>" rel="nofollow" target="_blank"><?php esc_html_e('SKT Themes','fundraiser-lite'); ?></a></div>
            	 <div class="design-by">
				<div class="footer-social">
                	<div class="social-icons">
						<?php 
                        if (!empty($fb_link)) { ?>
                        <a title="<?php esc_attr__('facebook','fundraiser-lite'); ?>" class="fb" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a> 
                        <?php } ?>       
                        <?php
                        if (!empty($twitt_link)) { ?>
                        <a title="<?php esc_attr__('twitter','fundraiser-lite'); ?>" class="tw" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
                        <?php } ?>     
                        <?php
                        if (!empty($insta_link)) { ?>
                        <a title="<?php esc_attr__('instagram','fundraiser-lite'); ?>" class="gp" target="_blank" href="<?php echo esc_url($insta_link); ?>"></a>
                        <?php } ?>        
                        <?php
                         if (!empty($linked_link)) { ?> 
                        <a title="<?php esc_attr__('linkedin','fundraiser-lite'); ?>" class="in" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
                        <?php } ?>                   
                      </div>
                </div>
                 </div>
                 <div class="clear"></div>
            </div>           
        </div>
    </div><!--end .footer-wrapper-->
<?php wp_footer(); ?>
</body>
</html>