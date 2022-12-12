<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prisma
 */

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-12">
				<?php $img = get_field('logo_footer','option'); ?>
				<img class="mb-4" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
				<p><?php echo get_field('texto_logo_footer','option'); ?></p>
			</div>
			<div class="col-md-3 col-sm-12">
				<p><b><?php _e('Canal de Denuncias', 'prisma'); ?></b></p>
			</div>
			<div class="col-md-3 col-sm-12">
				<div class="head-col">
					<p><b><?php _e('Grupo Prisma', 'prisma'); ?></b></p>
				</div>
				<div class="body-col">
					<?php echo get_field('grupo_prisma','option'); ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-12">
				<div class="head-col">
					<p><b>Links</b></p>
				</div>
				<div class="body-col">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>