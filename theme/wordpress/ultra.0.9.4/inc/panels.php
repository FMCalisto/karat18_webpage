<?php
/**
 * Integrates this theme with SiteOrigin Page Builder.
 *
 * @package ultra
 * @since 1.0
 * @license GPL 2.0
 */

/**
 * Adds default page layouts
 *
 * @param $layouts
 */
function ultra_prebuilt_page_layouts($layouts){
	$layouts['default-home'] = array (
		'name' => __('Default Home', 'ultra'),
		'widgets' =>
			array (
				0 =>
					array (
						'features' =>
							array (
								0 =>
									array (
										'container_color' => '#0896fe;',
										'icon' => 'fontawesome-tablet',
										'icon_color' => '#ffffff',
										'icon_image' => 0,
										'title' => __('Responsive Design', 'ultra'),
										'text' => 'Ultra is ready for a multi-device world. Built from the ground up to be fully responsive, you can be sure your site will present beautifully on any device. ',
										'more_text' => __('Read More', 'ultra'),
										'more_url' => '#',
									),
								1 =>
									array (
										'container_color' => '#0896fe;',
										'icon' => 'fontawesome-arrows',
										'icon_color' => '#ffffff',
										'icon_image' => 0,
										'title' => __('Drag and Drop Layouts', 'ultra'),
										'text' => 'We\'ve tightly integrated SiteOrigin\'s powerful Page Builder plugin. Create the layouts you\'ve been dreaming of without touching a line of code.',
										'more_text' => __('Read More', 'ultra'),
										'more_url' => '#',
									),
								2 =>
									array (
										'container_color' => '#0896fe;',
										'icon' => 'fontawesome-comments-o',
										'icon_color' => '#ffffff',
										'icon_image' => 0,
										'title' => __('Professional Support', 'ultra'),
										'text' => 'Keep your project moving forward with quick support on the WordPress.org forums. Beginner or advanced user, we\'re here to help wherever possible.',
										'more_text' => __('Read More', 'ultra'),
										'more_url' => '#',
									),
							),
						'container_shape' => 'round',
						'container_size' => 70,
						'icon_size' => 28,
						'per_row' => 3,
						'responsive' => true,
						'panels_info' =>
							array (
								'class' => 'SiteOrigin_Widget_Features_Widget',
								'grid' => 0,
								'cell' => 0,
								'id' => 1,
								'style' =>
									array (
										'background_image_attachment' => false,
										'background_display' => 'tile',
									),
							),
						'title_link' => false,
						'icon_link' => false,
						'new_window' => false,
					),
				1 =>
					array (
						'type' => 'html',
						'title' => '',
						'text' => '<h1 style="text-align: center;">' . __('Custom Home Page', 'ultra') . '</h1>
						<hr style="max-width: 400px;" />
						<h5 style="font-weight: normal; text-align: center;">' . __("This full-width headline was created using SiteOrigin's Page Builder and the Visual Editor widget.", 'ultra') . '</h5>',
						'filter' => '1',
						'panels_info' =>
							array (
								'class' => 'WP_Widget_Black_Studio_TinyMCE',
								'raw' => false,
								'grid' => 1,
								'cell' => 0,
								'id' => 2,
								'style' =>
									array (
										'background_display' => 'tile',
									),
							),
					),
				2 =>
					array (
						'title' => 'Latest Posts',
						'posts' => '',
						'panels_info' =>
							array (
								'class' => 'SiteOrigin_Widget_PostCarousel_Widget',
								'raw' => false,
								'grid' => 2,
								'cell' => 0,
								'id' => 2,
								'style' =>
									array (
										'background_display' => 'tile',
									),
							),
					),
			),
		'grids' =>
			array (
				0 =>
					array (
						'cells' => 1,
						'style' =>
							array (
								'row_css' => 'padding:0px !important;',
								'background_display' => 'tile',
							),
					),
				1 =>
					array (
						'cells' => 1,
						'style' =>
							array (
								'padding' => '30px',
								'row_stretch' => 'full',
								'background' => '#f6f6f7',
								'background_display' => 'tile',
								'border_color' => '#eaeaeb',
							),
					),
				2 =>
					array (
						'cells' => 1,
						'style' =>
							array (
							),
					),
			),
		'grid_cells' =>
			array (
				0 =>
					array (
						'grid' => 0,
						'weight' => 1,
					),
				1 =>
					array (
						'grid' => 1,
						'weight' => 1,
					),
				2 =>
					array (
						'grid' => 2,
						'weight' => 1,
					),
			),
	);

	return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'ultra_prebuilt_page_layouts');