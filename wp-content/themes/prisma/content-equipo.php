<section class="prisma-equipo">
    <div class="full-container">
    <?php if ( have_rows( 'content_equipo' ) ) : ?>
        <div class="prisma-equipo-buttons">
            <div class="row">
            <?php while ( have_rows( 'content_equipo' ) ) : the_row(); ?>
            <?php $nameSection = get_sub_field( 'nombre_seccion_team' );?>
            <div class="col-md -col-sm-12">
                <a href="#<?php echo $nameSection ; ?>"><?php the_sub_field( 'nombre_seccion_team' ); ?></a>
            </div>
            <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
        </div>
</section>





<?php if ( have_rows( 'content_equipo' ) ) : ?>
	<?php while ( have_rows( 'content_equipo' ) ) : the_row(); ?>
		<?php the_sub_field( 'nombre_seccion_team' ); ?>
		<?php if ( have_rows( 'grupo_team' ) ) : ?>
			<?php while ( have_rows( 'grupo_team' ) ) : the_row(); ?>
				<?php $imagen_miembro = get_sub_field( 'imagen_miembro' ); ?>
				<?php $size = 'full'; ?>
				<?php if ( $imagen_miembro ) : ?>
					<?php echo wp_get_attachment_image( $imagen_miembro, $size ); ?>
				<?php endif; ?>
				<?php if ( have_rows( 'grupo_team' ) ) : ?>
					<?php while ( have_rows( 'grupo_team' ) ) : the_row(); ?>
						<?php the_sub_field( 'epigrafe_miembro' ); ?>
						<?php the_sub_field( 'cargo_miembro' ); ?>
						<?php the_sub_field( 'nombre_miembro' ); ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php the_sub_field( 'descripcion_miembro' ); ?>
				<?php if ( get_sub_field( '¿linkedin' ) == 1 ) : ?>
					<?php // echo 'true'; ?>
				<?php else : ?>
					<?php // echo 'false'; ?>
				<?php endif; ?>
				<?php the_sub_field( 'url_linkedin' ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
