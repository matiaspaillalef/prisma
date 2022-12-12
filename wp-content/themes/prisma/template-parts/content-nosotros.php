<section class="prisma-history--presentation">
    <div class="container">
        <h1 class="text-uppercase big-title mb-4"><?php the_field('titulo_historia'); ?></h1>
        <?php if (get_field('agregar_video') == 1) : ?>
            <div class="embed-container">
                <?php the_field('vide_iframe'); ?>
            </div>
        <?php else : ?>
            <?php $imagen_historia = get_field('imagen_historia'); ?>
            <?php $size = 'full'; ?>
            <?php if ($imagen_historia) : ?>
                <?php echo wp_get_attachment_image($imagen_historia, $size); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<section class="prisma-history--cancha">
    <div class="container">
        <h2 class="text-uppercase big-title mb-4"><?php the_field('titulo_seccion_cancha'); ?></h2>
        <p class="fw-bold"><?php the_field('bajada_seccion_cancha'); ?></p>
        <?php if (have_rows('numeros_card')) : ?>
            <div class="prisma-card--number">
                <div class="row">
                    <?php $i = 1; ?>
                    <?php while (have_rows('numeros_card')) : the_row(); ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front number-<?php echo $i ?>">
                                        <h2 class="bigger-number"><?php echo $i ?></h2>
                                    </div>
                                    <div class="flip-card-back">
                                        <p><?php the_sub_field('contenido_numero'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>