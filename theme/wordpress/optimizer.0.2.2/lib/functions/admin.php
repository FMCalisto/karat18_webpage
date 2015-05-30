<?php
 /**
 * The ADMIN functions for OPTIMIZER
 *
 * Stores all the admin functions of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
 


/**************** LOAD RAW CSS & JS ON BACKEND ****************/
add_action('admin_head', 'optimizer_editor_fix');

function optimizer_editor_fix() {
  echo '<script type="text/javascript">var pro_msg = \''.__('These Options Are Only Available in Optimizer PRO', 'optimizer').'\';</script>';
  echo '<style type="text/css">
  #wps_post_id{ width:70px;}
  .form-table td.at-field{border:none;}
  .at-label{ font-size:14px;}
  .simplePanelImagePreview img{ max-width:100%; height:auto;}
  .img_holder{background:#f5f5f5; padding:10px;display: block; margin-bottom:15px;}
  .img_holder img{max-width:60px;margin: 4.5px; height:auto;}
  .remove_media_upload, .custom_media_upload, .bio_media_upload, .image_media_upload{font-family: FontAwesome, Arial;background: #f8f8f8;border: 1px solid #eee;border-radius: 4px;padding: 5px 7px;font-size: 12px;color: #999;margin: 10px 0;cursor: pointer;}
  .remove_media_upload:hover, .custom_media_upload:hover, .bio_media_upload:hover, .image_media_upload:hover{background:#fff; border-color:#ddd; color:#777}
  span.img_holder:empty {display: none;}
  .widget_tips{background: aliceblue;padding: 10px;color: rgb(112, 150, 184);}
  .bio_img_holder img{ max-width:100%; height:auto; margin-top:10px;}

[class*="fa-"]{display: inline-block;font-family: FontAwesome!important;font-style: normal;font-weight: normal;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;}
  </style>';
  
}