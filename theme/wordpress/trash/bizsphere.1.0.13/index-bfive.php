<div class="bizfive">

	<div class="bizfive-content-cont">
    		
    		<div class="bizfive-welcome">
    
                    <h1>
                        <?php 
                            if( of_get_option('bfive_welcome_headline') ){
                                echo esc_html( of_get_option('bfive_welcome_headline') );
                            }else {
                                _e('Welcome Headline Comes Here',  'BizSphere');
                            }
                        ?>    
                    </h1>
                    
                    <div class="bizfive-welcome-desc">
                        <?php 
                            if( of_get_option('bfive_welcome_text') ){
                                echo esc_html( of_get_option('bfive_welcome_text') );
                            }else {
                                _e('You can change this text in welcome text box of welcome section block in Biz five tab of theme options page. You can change this text in welcome text box of welcome section block in Biz five tab of theme options page.',  'BizSphere');
                            }
                        ?>                                
                    </div>
                    
			</div><!-- .bizfive-welcome -->
            
            
            <div class="bizfive-products-services">
            
                <div class="bizfive-products">
                
                	<h2>
                        <?php 
                            if( of_get_option('bfive_left_welcome_headline') ){
                                echo esc_html( of_get_option('bfive_left_welcome_headline') );
                            }else {
                                _e('Products',  'BizSphere');
                            }
                        ?>                    
                    </h2>
                    
                    <?php if( of_get_option('bfive_left_welcome_text') ) : ?>
                    <p class="bizfive-products-description">
                    	<?php echo esc_html(of_get_option('bfive_left_welcome_text')); ?>
                    </p>
                    <?php endif; ?>
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizfive-products-services-item">
                    
                            <div class="bizfive-products-services-img">
                            	<?php
									if( of_get_option('bfive_left_image1') ){
										echo '<img src="'.esc_url( of_get_option('bfive_left_image1') ).'" />';
									}else{
										echo '<img src="'.get_template_directory_uri().'/images/cloud.png" />';
									}
								?>
                            </div><!-- .bizfive-products-services-img -->
                            
                            <div class="bizfive-products-services-name-cont">
                            
                                <div class="bizfive-products-services-name">
                                    <a href="
									<?php
                                        if( of_get_option('bfive_left_link1') ){
                                            echo esc_url( of_get_option('bfive_left_link1') );
                                        }else{
                                            echo '#';
                                        }
                                    ?>                                    
                                    ">
									<?php
                                        if( of_get_option('bfive_left_headline1') ){
                                            echo esc_html( of_get_option('bfive_left_headline1') );
                                        }else{
                                            echo 'Product 1';
                                        }
                                    ?> 
                                    </a>
                                </div><!-- .bizfive-products-services-name -->
                                
                                <div class="bizfive-products-services-description">
									<?php
                                        if( of_get_option('bfive_left_desc1') ){
                                            echo '<p>'.esc_html( of_get_option('bfive_left_desc1') ).'</p>';
                                        }else{
                                            echo '<p>Pellentesque accumsan ornare magna a consectetur. Phasellus tristique dui turpis</p>';
                                        }
                                    ?>                                
                                </div><!-- .bizfive-products-services-description -->
                            
                            </div><!-- .bizfive-products-services-name-cont -->
                    
                    </div><!-- .bizfive-products-services-item -->
                    <!-- Product-service item ends Here -->
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizfive-products-services-item">
                    
                            <div class="bizfive-products-services-img">
                            	<?php
									if( of_get_option('bfive_left_image2') ){
										echo '<img src="'.esc_url( of_get_option('bfive_left_image2') ).'" />';
									}else{
										echo '<img src="'.get_template_directory_uri().'/images/code.png" />';
									}
								?>
                            </div><!-- .bizfive-products-services-img -->
                            
                            <div class="bizfive-products-services-name-cont">
                            
                                <div class="bizfive-products-services-name">
                                    <a href="
									<?php
                                        if( of_get_option('bfive_left_link2') ){
                                            echo esc_url( of_get_option('bfive_left_link2') );
                                        }else{
                                            echo '#';
                                        }
                                    ?>                                    
                                    ">
									<?php
                                        if( of_get_option('bfive_left_headline2') ){
                                            echo esc_html( of_get_option('bfive_left_headline2') );
                                        }else{
                                            echo 'Product 2';
                                        }
                                    ?> 
                                    </a>
                                </div><!-- .bizfive-products-services-name -->
                                
                                <div class="bizfive-products-services-description">
									<?php
                                        if( of_get_option('bfive_left_desc2') ){
                                            echo '<p>'.esc_html( of_get_option('bfive_left_desc2') ).'</p>';
                                        }else{
                                            echo '<p>Pellentesque accumsan ornare magna a consectetur. Phasellus tristique dui turpis</p>';
                                        }
                                    ?>                                
                                </div><!-- .bizfive-products-services-description -->
                            
                            </div><!-- .bizfive-products-services-name-cont -->
                    
                    </div><!-- .bizfive-products-services-item -->
                    <!-- Product-service item ends Here -->
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizfive-products-services-item">
                    
                            <div class="bizfive-products-services-img">
                            	<?php
									if( of_get_option('bfive_left_image3') ){
										echo '<img src="'.esc_url( of_get_option('bfive_left_image3') ).'" />';
									}else{
										echo '<img src="'.get_template_directory_uri().'/images/laptop.png" />';
									}
								?>
                            </div><!-- .bizfive-products-services-img -->
                            
                            <div class="bizfive-products-services-name-cont">
                            
                                <div class="bizfive-products-services-name">
                                    <a href="
									<?php
                                        if( of_get_option('bfive_left_link3') ){
                                            echo esc_url( of_get_option('bfive_left_link3') );
                                        }else{
                                            echo '#';
                                        }
                                    ?>                                    
                                    ">
									<?php
                                        if( of_get_option('bfive_left_headline3') ){
                                            echo esc_html( of_get_option('bfive_left_headline3') );
                                        }else{
                                            echo 'Product 3';
                                        }
                                    ?> 
                                    </a>
                                </div><!-- .bizfive-products-services-name -->
                                
                                <div class="bizfive-products-services-description">
									<?php
                                        if( of_get_option('bfive_left_desc3') ){
                                            echo '<p>'.esc_html( of_get_option('bfive_left_desc3') ).'</p>';
                                        }else{
                                            echo '<p>Pellentesque accumsan ornare magna a consectetur. Phasellus tristique dui turpis</p>';
                                        }
                                    ?>                                
                                </div><!-- .bizfive-products-services-description -->
                            
                            </div><!-- .bizfive-products-services-name-cont -->
                    
                    </div><!-- .bizfive-products-services-item -->
                    <!-- Product-service item ends Here -->                                       
                    
                </div><!-- .bizfive-products -->
                
                <div class="bizfive-services">
                
                	<h2>
                        <?php 
                            if( of_get_option('bfive_right_welcome_headline') ){
                                echo esc_html( of_get_option('bfive_right_welcome_headline') );
                            }else {
                                _e('Services',  'BizSphere');
                            }
                        ?>                    
                    </h2>
                    
                    <?php if( of_get_option('bfive_right_welcome_text') ) : ?>
                    <p class="bizfive-services-description">
                    	<?php echo esc_html(of_get_option('bfive_right_welcome_text')); ?>
                    </p>
                    <?php endif; ?>                    
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizfive-products-services-item">
                    
                            <div class="bizfive-products-services-img">
                            	<?php
									if( of_get_option('bfive_right_image1') ){
										echo '<img src="'.esc_url( of_get_option('bfive_right_image1') ).'" />';
									}else{
										echo '<img src="'.get_template_directory_uri().'/images/html5.png" />';
									}
								?>
                            </div><!-- .bizfive-products-services-img -->
                            
                            <div class="bizfive-products-services-name-cont">
                            
                                <div class="bizfive-products-services-name">
                                    <a href="
									<?php
                                        if( of_get_option('bfive_right_link1') ){
                                            echo esc_url( of_get_option('bfive_right_link1') );
                                        }else{
                                            echo '#';
                                        }
                                    ?>                                    
                                    ">
									<?php
                                        if( of_get_option('bfive_right_headline1') ){
                                            echo esc_html( of_get_option('bfive_right_headline1') );
                                        }else{
                                            echo 'Service 1';
                                        }
                                    ?> 
                                    </a>
                                </div><!-- .bizfive-products-services-name -->
                                
                                <div class="bizfive-products-services-description">
									<?php
                                        if( of_get_option('bfive_right_desc1') ){
                                            echo '<p>'.esc_html( of_get_option('bfive_right_desc1') ).'</p>';
                                        }else{
                                            echo '<p>Pellentesque accumsan ornare magna a consectetur. Phasellus tristique dui turpis</p>';
                                        }
                                    ?>                                
                                </div><!-- .bizfive-products-services-description -->
                            
                            </div><!-- .bizfive-products-services-name-cont -->
                    
                    </div><!-- .bizfive-products-services-item -->
                    <!-- Product-service item ends Here -->
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizfive-products-services-item">
                    
                            <div class="bizfive-products-services-img">
                            	<?php
									if( of_get_option('bfive_right_image2') ){
										echo '<img src="'.esc_url( of_get_option('bfive_right_image2') ).'" />';
									}else{
										echo '<img src="'.get_template_directory_uri().'/images/phone.png" />';
									}
								?>
                            </div><!-- .bizfive-products-services-img -->
                            
                            <div class="bizfive-products-services-name-cont">
                            
                                <div class="bizfive-products-services-name">
                                    <a href="
									<?php
                                        if( of_get_option('bfive_right_link2') ){
                                            echo esc_url( of_get_option('bfive_right_link2') );
                                        }else{
                                            echo '#';
                                        }
                                    ?>                                    
                                    ">
									<?php

                                        if( of_get_option('bfive_right_headline2') ){
                                            echo esc_html( of_get_option('bfive_right_headline2') );
                                        }else{
                                            echo 'Service 2';
                                        }
                                    ?> 
                                    </a>
                                </div><!-- .bizfive-products-services-name -->
                                
                                <div class="bizfive-products-services-description">
									<?php
                                        if( of_get_option('bfive_right_desc2') ){
                                            echo '<p>'.esc_html( of_get_option('bfive_right_desc2') ).'</p>';
                                        }else{
                                            echo '<p>Pellentesque accumsan ornare magna a consectetur. Phasellus tristique dui turpis</p>';
                                        }
                                    ?>                                
                                </div><!-- .bizfive-products-services-description -->
                            
                            </div><!-- .bizfive-products-services-name-cont -->
                    
                    </div><!-- .bizfive-products-services-item -->
                    <!-- Product-service item ends Here -->
                    
                    <!-- Product-service item starts Here -->
                    <div class="bizfive-products-services-item">
                    
                            <div class="bizfive-products-services-img">
                            	<?php
									if( of_get_option('bfive_right_image3') ){
										echo '<img src="'.esc_url( of_get_option('bfive_right_image3') ).'" />';
									}else{
										echo '<img src="'.get_template_directory_uri().'/images/desktop.png" />';
									}
								?>
                            </div><!-- .bizfive-products-services-img -->
                            
                            <div class="bizfive-products-services-name-cont">
                            
                                <div class="bizfive-products-services-name">
                                    <a href="
									<?php
                                        if( of_get_option('bfive_right_link3') ){
                                            echo esc_url( of_get_option('bfive_right_link3') );
                                        }else{
                                            echo '#';
                                        }
                                    ?>                                    
                                    ">
									<?php
                                        if( of_get_option('bfive_right_headline3') ){
                                            echo esc_html( of_get_option('bfive_right_headline3') );
                                        }else{
                                            echo 'Service 3';
                                        }
                                    ?> 
                                    </a>
                                </div><!-- .bizfive-products-services-name -->
                                
                                <div class="bizfive-products-services-description">
									<?php
                                        if( of_get_option('bfive_right_desc3') ){
                                            echo '<p>'.esc_html( of_get_option('bfive_right_desc3') ).'</p>';
                                        }else{
                                            echo '<p>Pellentesque accumsan ornare magna a consectetur. Phasellus tristique dui turpis</p>';
                                        }
                                    ?>                                
                                </div><!-- .bizfive-products-services-description -->
                            
                            </div><!-- .bizfive-products-services-name-cont -->
                    
                    </div><!-- .bizfive-products-services-item -->
                    <!-- Product-service item ends Here -->                                       
                    
                </div><!-- .bizfive-services -->
                
            </div><!-- .bizfive-products-services -->                                                          
    
    </div><!-- .bizfive-content-cont -->
    
	<div class="bizfive-blog-cont">
    	
        <div class="bizfive-blog">
        
        	<h2>
                        <?php 
                            if( of_get_option('bfive_news_section_name') ){
                                echo esc_html( of_get_option('bfive_news_section_name') );
                            }else {
                                _e('News',  'BizSphere');
                            }
                        ?>             
            </h2>
            
					<?php 
                    	
						if( of_get_option('bfive_news_section_cat') ){
							$themealley_business_bizfive_news_cat = of_get_option('bfive_news_section_cat');
						}else{
							$themealley_business_bizfive_news_cat = '1';
						}						
                        $themealley_business_bizfive_news_args = array(
                                        // Change these category SLUGS to suit your use.
                                        'category__in' => $themealley_business_bizfive_news_cat,
										'ignore_sticky_posts' => 1,
                                        'posts_per_page'=> 2,
                                      );
        
                        $themealley_business_bizfive_news_list_of_posts = new WP_Query( $themealley_business_bizfive_news_args );
                                        
                    ?>
                    
                    <?php if ( $themealley_business_bizfive_news_list_of_posts->have_posts() ) : ?>
                        <?php /* The loop */ ?>
        
                        <?php $themealley_business_bizfive_news_itemnum = 0; while ( $themealley_business_bizfive_news_list_of_posts->have_posts() ) : $themealley_business_bizfive_news_list_of_posts->the_post(); $themealley_business_bizfive_news_itemnum++ ?>
                        
                        <!-- News item starts Here -->
                    	<div class="bizfive-news-item"> 
                        
                        		<div class="bizfive-news-name">
                                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div><!-- .bizfive-news-name -->
                        
                                <div class="bizfive-news-description">
                                     <?php echo get_the_excerpt(); ?>        
                                </div><!-- .bizfive-news-description --> 
                                
                                <div class="bizfive-news-cta">
                                      <a href="<?php the_permalink(); ?>">Read More</a>       
                                </div><!-- .bizfive-news-cta -->
                        
                        </div><!-- .bizfive-news-item -->
                        <!-- News item ends Here -->                                               
						
						
					<?php endwhile; ?>
                    
                <?php endif; wp_reset_postdata(); ?>            
        
        </div><!-- .bizfive-blog -->  
        
        <?php if( !of_get_option('show_BizSphere_quote_bfive') || of_get_option('show_BizSphere_quote_bfive') == 'true' ) : ?>
        <div class="bizfive-testimonial">
        
            <div class="bizfive-testimonial-text">
                
                <p>
                    <?php 
                         if( of_get_option('bfive_quote_section_text') ){
                              echo esc_html( of_get_option('bfive_quote_section_text') );
                         }else {
                              _e('You can change this text in quote box of quote section block in Biz five tab of theme options page. You can change this text in quote box of quote section block in Biz five tab of theme options page.',  'BizSphere');
                         }
                    ?>
                </p> 
                    
            </div><!-- .bizfour-quote-text -->
            
            <div class="bizfive-testimonial-name">
            
                <span>
                    <?php 
                        if( of_get_option('bfive_quote_section_name') ){
                             echo esc_html( of_get_option('bfive_quote_section_name') );
                        }else {
                             _e('Mac Taylor',  'BizSphere');
                        }
                    ?>
                </span> 
                  
            </div>        
        
        </div><!-- .bizfive-testimonial -->
        <?php endif; ?>         
    
    </div><!-- .bizfive-blog-cont -->    
		
</div><!-- .bizfive -->

<?php if( !of_get_option('show_bfive_posts') || of_get_option('show_bfive_posts') == 'true' ) : ?>
<div class="bizfive">
	
		<?php 
			
			if( 'page' == get_option( 'show_on_front' ) ){	
				get_template_part('index', 'page');
			}else {
				get_template_part('index', 'standard');
			}			 
			
		?>
		
</div><!-- .biz0ne -->
<?php endif; ?> 