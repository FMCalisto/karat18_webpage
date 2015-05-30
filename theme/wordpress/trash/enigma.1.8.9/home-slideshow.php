<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>        
        <li data-target="#myCarousel" data-slide-to="2"></li>        
      </ol>
      <div class="carousel-inner">
	  <?php $wl_theme_options = weblizar_get_options();
		$ImageUrl1 = WL_TEMPLATE_DIR_URI ."/images/1.png";
		$ImageUrl2 = WL_TEMPLATE_DIR_URI ."/images/2.png";
		$ImageUrl3 = WL_TEMPLATE_DIR_URI ."/images/3.png";  ?>
        <div class="item active">
			<?php if($wl_theme_options['slide_image_1']!='') {  ?>
          <img src="<?php echo esc_url($wl_theme_options['slide_image_1']); ?>" class="img-responsive" alt="<?php echo esc_attr($wl_theme_options['slide_title_1']); ?>">
          <?php } else { ?>
		  <img src="<?php echo esc_url($ImageUrl1); ?>" class="img-responsive" alt="First slide">
		  <?php } ?>		  
		  <div class="container">
            <div class="carousel-caption">
			<?php if($wl_theme_options['slide_title_1']!='') {  ?>
			<div class="carousel-text">
            <h1 class="animated bounceInRight"><?php echo esc_attr($wl_theme_options['slide_title_1']); ?></h1>			
			<?php  	
			 if($wl_theme_options['slide_desc_1']!='') {  ?>
			  <ul class="list-unstyled carousel-list">
			 <li class="animated bounceInLeft"><?php echo esc_attr($wl_theme_options['slide_desc_1']); ?></li>
			 </ul>
			 <?php }
			if($wl_theme_options['slide_btn_text_1']!='') { ?>
            <a class="enigma_blog_read_btn animated bounceInUp" href="<?php if($wl_theme_options['slide_btn_link_1']!='') { echo esc_url($wl_theme_options['slide_btn_link_1']); } ?>" role="button"><?php echo esc_attr($wl_theme_options['slide_btn_text_1']); ?></a>
			<?php } ?>
            </div>
			<?php } ?>
			</div>
          </div>
        </div>		
        <div class="item">		
			<?php if($wl_theme_options['slide_image_2']!='') {  ?>
          <img src="<?php echo esc_url($wl_theme_options['slide_image_2']); ?>" class="img-responsive" alt="<?php echo esc_attr($wl_theme_options['slide_title_2']); ?>">
          <?php } else { ?>
		  <img src="<?php echo esc_url($ImageUrl2); ?>" class="img-responsive" alt="Second slide">
		  <?php } ?>
          <div class="container">
            <div class="carousel-caption">			
			<?php if($wl_theme_options['slide_title_2']!='') {  ?>
			<div class="carousel-text">
              <h1 class="animated bounceInRight"><?php echo esc_attr($wl_theme_options['slide_title_2']); ?></h1>
			<?php 	
			 if($wl_theme_options['slide_desc_2']!='') {  ?>
			 <ul class="list-unstyled carousel-list">
			 <li class="animated bounceInLeft"><?php echo esc_attr($wl_theme_options['slide_desc_2']); ?></li>
			 </ul>
			 <?php }
			if($wl_theme_options['slide_btn_text_2']!='') { ?>
             <a class="enigma_blog_read_btn animated bounceInUp" href="<?php if($wl_theme_options['slide_btn_link_2']!='') { echo esc_attr($wl_theme_options['slide_btn_link_2']); } ?>" role="button"><?php echo esc_attr($wl_theme_options['slide_btn_text_2']); ?></a>
			  <?php } ?>
            </div>
			<?php } ?>
			</div>
          </div>
        </div>
		<div class="item">		
			<?php if($wl_theme_options['slide_image_3']!='') {  ?>
          <img src="<?php echo esc_url($wl_theme_options['slide_image_3']); ?>" class="img-responsive" alt="<?php echo esc_attr($wl_theme_options['slide_title_3']); ?>">
          <?php } else { ?>
		  <img src="<?php echo esc_url($ImageUrl3); ?>" class="img-responsive" alt="Third slide">
		  <?php } ?>
          <div class="container">
            <div class="carousel-caption">
			<?php if($wl_theme_options['slide_title_3']!='') {  ?>
			<div class="carousel-text">
              <h1 class="animated bounceInRight"><?php echo esc_attr($wl_theme_options['slide_title_3']); ?></h1>
			<?php  	
			 if($wl_theme_options['slide_desc_3']!='') {  ?>
			 <ul class="list-unstyled carousel-list">
			 <li class="animated bounceInLeft"><?php echo esc_attr($wl_theme_options['slide_desc_3']); ?></li>
			 </ul>
			 <?php }
			if($wl_theme_options['slide_btn_text_3']!='') { ?>
            <a class="enigma_blog_read_btn animated bounceInUp" href="<?php if($wl_theme_options['slide_btn_link_3']!='') { echo esc_url($wl_theme_options['slide_btn_link_3']); } ?>" role="button"><?php echo esc_attr($wl_theme_options['slide_btn_text_3']); ?></a>
			  <?php } ?>
            </div>
			<?php } ?>
			</div>
          </div>
        </div>
		
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	  <div class="enigma_slider_shadow"></div>
    </div><!-- /.carousel -->