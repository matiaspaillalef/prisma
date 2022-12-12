<section class="prisma-equipo--buttons">
	<div class="full-container">
		<?php if (have_rows('content_equipo')) : ?>
			<div class="prisma-buttons">
				<div class="row">
					<?php while (have_rows('content_equipo')) : the_row(); ?>
						<?php $nameSection = get_sub_field('nombre_seccion_team'); ?>
						<div class="col">
							<a href="#<?php echo remove_accents(strtolower($nameSection)); ?>"><?php echo $nameSection; ?></a>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php if (have_rows('content_equipo')) : ?>
	<?php while (have_rows('content_equipo')) : the_row(); ?>
		<?php $idSection = get_sub_field('nombre_seccion_team'); ?>
		<section id="<?php echo remove_accents(strtolower($idSection)); ?>" class="prisma-equipo--<?php echo remove_accents(strtolower($idSection)); ?> prisma-equipo">
			<div class="container">
				<h2 class="text-uppercase big-title text-center"><?php the_sub_field('nombre_seccion_team'); ?></h2>
				<?php if (have_rows('grupo_team')) : ?>
					<div class="prisma-equipo--miembros">
						<div class="row">
							<?php while (have_rows('grupo_team')) : the_row(); ?>
								<div class="col-md-4 col-sm-12">
									<div class="prisma-member">
										<div class="flip-card">
											<div class="flip-card-inner">
												<div class="flip-card-front card-member">
													<?php $imagen_miembro = get_sub_field('imagen_miembro'); ?>
													<?php $size = '380x485'; ?>
													<?php if ($imagen_miembro) : ?>
														<?php echo wp_get_attachment_image($imagen_miembro, $size); ?>
													<?php endif; ?>
												</div>
												<div class="flip-card-back">
													<p><?php the_sub_field('descripcion_miembro'); ?></p>
													<?php if (get_sub_field('linkedin') == 1) : ?>
														<div class="social-foot-member">
															<a href="<?php the_sub_field('url_linkedin'); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
										<div class="prisma-foot-member text-center">
											<?php if (have_rows('grupo_member')) : ?>
												<?php while (have_rows('grupo_member')) : the_row(); ?>
													<h5 class="prisma-color--grey"><?php the_sub_field('epigrafe_miembro'); ?></h5>
													<h3><?php the_sub_field('nombre_miembro'); ?></h3>
													<p><strong><?php the_sub_field('cargo_miembro'); ?></strong></p>
												<?php endwhile; ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>