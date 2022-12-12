<?php
$title = get_the_title();
$color = get_field('color_business');
?>
<section class="prisma-intro-negocio prisma-<?php echo remove_accents(strtolower($title)); ?>">
    <div class="fit-container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <?php the_content(); ?>
                <?php if (wp_is_mobile()) : ?>
                    <?php $enlace_business = get_field('enlace_business'); ?>
                    <?php if ($enlace_business) : ?>
                        <a class="prisma--button-primary h5" href="<?php echo esc_url($enlace_business['url']); ?>" target="<?php echo esc_attr($enlace_business['target']); ?>"><?php _e('Ver más', 'prisma'); ?> <i class="fas fa-angle-right"></i></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php if (!wp_is_mobile()) : ?>
                <div class="col-md-4 col-sm-12">
                    <div class="prisma-negocio--logo">
                        <?php $logotipo = get_field('logotipo'); ?>
                        <?php $size = 'full'; ?>
                        <?php if ($logotipo) : ?>
                            <?php echo wp_get_attachment_image($logotipo, $size); ?>
                        <?php endif; ?>
                    </div>
                    <?php if (have_rows('contenido_hitos')) : ?>
                        <div class="prisma-negocio--hitos">
                            <div class="row-hito">
                                <h4><?php _e('Hitos Relevantes', 'prisma'); ?></h4>
                            </div>
                            <?php while (have_rows('contenido_hitos')) : the_row(); ?>
                                <div class="row-hito">
                                    <p class="mb-3"><strong><?php the_sub_field('titulo_hito'); ?></strong></p>
                                    <p><?php the_sub_field('contenido_hito'); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (have_rows('content_estadisticas_business')) : ?>
    <section class="prisma-negocio--estadisticas">
        <div class="fit-container" style="border-top:1px solid <?php echo $color; ?>">
            <div class="row">
                <?php while (have_rows('content_estadisticas_business')) : the_row(); ?>
                    <?php if (get_field('cambiar_color_numeros') == 1) : ?>
                        <?php $NumberColor = get_field('color_numerales_negocios'); ?>
                    <?php else : ?>
                        <?php $NumberColor = $color; ?>
                    <?php endif; ?>
                    <div class="col-md-4 col-sm-12">
                        <h2 class="bigger-number" style="color:<?php echo $NumberColor; ?>;"><span><?php the_sub_field('cantidad_estadistica'); ?><?php the_sub_field('simbolo_estadistica'); ?></span></h2>
                        <h5 class="text-uppercase"><?php the_sub_field('titulo_estadistica'); ?></h5>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php /* Sólo aprecerá en mobile*/; ?>
<?php if (wp_is_mobile()) : ?>
    <div class="prisma-hitos--mobile">
        <div class="prisma-negocio--logo">
            <?php $logotipo = get_field('logotipo'); ?>
            <?php $size = 'full'; ?>
            <?php if ($logotipo) : ?>
                <?php echo wp_get_attachment_image($logotipo, $size); ?>
            <?php endif; ?>
        </div>
        <?php if (have_rows('contenido_hitos')) : ?>
            <div class="prisma-negocio--hitos">
                <div class="row-hito">
                    <h4><?php _e('Hitos Relevantes', 'prisma'); ?></h4>
                </div>
                <?php while (have_rows('contenido_hitos')) : the_row(); ?>
                    <div class="row-hito">
                        <p class="mb-3"><strong><?php the_sub_field('titulo_hito'); ?></strong></p>
                        <p><?php the_sub_field('contenido_hito'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (have_rows('galeria_business')) : ?>
    <section class="prisma-negocio--gallery">
        <div class="fit-container" style="border-top:1px solid <?php echo $color; ?>">
            <div class="row">
                <?php while (have_rows('galeria_business')) : the_row(); ?>
                    <div class="col-md-4 col-sm-12">
                        <?php $imagen_galeria_business = get_sub_field('imagen_galeria_business'); ?>
                        <?php $size = 'full'; ?>
                        <?php if ($imagen_galeria_business) : ?>
                            <?php echo wp_get_attachment_image($imagen_galeria_business, $size); ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    .prisma-negocio--hitos .row-hito {
        border-top-color: <?php echo $color; ?>;
    }
</style>