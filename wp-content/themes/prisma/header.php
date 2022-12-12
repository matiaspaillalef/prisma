<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prisma
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'prisma'); ?></a>

		<header id="masthead" class="site-header">
			<?php
			$menuArray = wp_get_nav_menu_items('Menu Ppal');
			$itemsParent = prisma_filter_menu_items($menuArray, 0);

			?>
			<div class="full-container">
				<div class="social-head">
					<a href="<?php echo esc_url(get_field('enlace_linkedin', 'option')); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<div class="site-branding">
					<?php $img = get_field('logo_header', 'option'); ?>
					<a href="/"><img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>"></a>
				</div>
				<div class="menu-hamburger">
					<div id="nav-icon">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<div class="menuNav menu-right" id="menuToggler" style="display:none">
					<h5><b><?php _e('Menú', 'prisma'); ?></b></h5>
					<ul class="navbar-menu">
						<?php foreach ($itemsParent as $itemParent) : ?>
							<?php $itemsChild = prisma_filter_menu_items($menuArray, $itemParent->ID); ?>
							<?php $current = ($itemParent->object_id == get_queried_object_id()) ? 'current-item' : ''; ?>
							<?php if (count($itemsChild) >= 1) : ?>
								<li id="parent-item" class="nav-item parent-item <?php echo $current; ?>">
									<a class="parent-item<?php foreach ($itemParent->classes as $itemClass) : ?><?php echo ' ' . $itemClass; ?><?php endforeach; ?>"><?php echo $itemParent->title; ?> </a>
									<ul id="submenuChild" class="child-items">
										<?php foreach ($itemsChild as $itemChild) : ?>
											<?php $itemsGrandson = prisma_filter_menu_items($menuArray, $itemChild->ID); ?>
											<li class="nav-item child-item">
												<a class="item-child" style="cursor:pointer" href="<?php echo $itemChild->url; ?>">
													<span><?php echo $itemChild->title; ?></span>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php else : ?>
								<li class="nav-item parent-item <?php echo $current; ?>">
									<a class="<?php foreach ($itemParent->classes as $itemClass) : ?><?php echo ' ' . $itemClass; ?><?php endforeach; ?>" href="<?php echo $itemParent->url; ?>"><?php echo $itemParent->title; ?></a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</header><!-- #masthead -->

		<?php if (get_field('b_banner_switch') == 1 || get_field('m_banner_switch') == 1) : ?>
			<div class="prisma-banner-top">

				<?php if (get_field('b_banner_switch') == 1) : ?>
					<div class="full-container prisma-banner--big">
						<?php if (have_rows('grupo_bb')) : ?>
							<?php while (have_rows('grupo_bb')) : the_row(); ?>
								<?php if (get_sub_field('banner_image_b') == 1) : ?>
									<?php $imagen_banner_b = get_sub_field('imagen_banner_b'); ?>
									<?php $size = 'full'; ?>
									<?php if ($imagen_banner_b) : ?>
										<?php echo wp_get_attachment_image($imagen_banner_b, $size); ?>
									<?php endif; ?>
								<?php else : ?>
									<div class="inner-banner">
										<?php if (get_sub_field('custom_title_b') == 1) : ?>
											<h1 class="text-uppercase big-title mb-4"><?php the_sub_field('titulo_banner_b'); ?></h1>
										<?php else : ?>
											<h1 class="text-uppercase big-title mb-4"><?php echo get_the_title(); ?></h1>
										<?php endif; ?>
										<h3><?php the_sub_field('bajada_banner'); ?></h3>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if (get_field('m_banner_switch') == 1) : ?>
					<?php if (have_rows('grupo_mb')) : ?>
						<?php while (have_rows('grupo_mb')) : the_row(); ?>
							<?php $background_color = get_sub_field('banner_color_m'); ?>
							<?php $titulo_color = get_sub_field('titulo_color_m'); ?>
							<div class="fullwidth prisma-banner--medium" style="background-color:<?php echo $background_color ?>;">
								<div class="full-container">
									<div class="inner-banner">
										<?php if (get_sub_field('custom_title_m') == 1) : ?>
											<h1 class="text-uppercase big-title mb-4" style="color:<?php echo $titulo_color; ?>;"><?php the_sub_field('titulo_banner_m'); ?></h1>
										<?php else : ?>
											<h1 class="text-uppercase big-title mb-4"><?php echo get_the_title(); ?></h1>
										<?php endif; ?>
										<?php $enlace_banner_m = get_sub_field('enlace_banner_m'); ?>
										<?php if ($enlace_banner_m) : ?>
											<a class="prisma--button-primary prisma-button--white h5" href="<?php echo esc_url($enlace_banner_m['url']); ?>" target="<?php echo esc_attr($enlace_banner_m['target']); ?>"><?php echo esc_html($enlace_banner_m['title']); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				<?php endif; ?>

			</div>
		<?php endif; ?>