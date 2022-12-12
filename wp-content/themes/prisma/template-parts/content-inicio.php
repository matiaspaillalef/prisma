<section class="prisma--main-banner">
    <div class="full-container">

        <?php if (get_field('video_banner') == 1) : ?>
            <div class="embed-container">
                <iframe src="https://www.youtube.com/embed/<?=get_field('url_video');?>?controls=0&mute=1&showinfo=0&rel=0&autoplay=1&loop=1&playlist=<?=get_field('url_video');?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php else : ?>
            <?php $img = get_field('imagen_banner'); ?>
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo $img['alt'] ?>">
        <?php endif; ?>
    </div>

</section>

<section class="prisma--company my-5">
    <div class="container">
        <?php if (have_rows('items_presentation')) : ?>
            <div id="swiper-presentation" class="swiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('items_presentation')) : the_row(); ?>
                        <div class="swiper-slide">
                            <h5 class="text-uppercase"><?php the_sub_field('epigrafe_presentation'); ?></h5>
                            <h3 class="my-4"><?php the_sub_field('titulo_presentation'); ?></h3>
                            <p class="fw-bold"> <?php the_sub_field('contenido_presentation'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="prisma--statistics my-5">
    <div class="container">
        <div class="row">
            <?php
            $statistics = get_field('estadisticas');
            foreach ($statistics as $statistic) : ?>
                <div class="col-md-4 col-sm-12">
                    <h2 class="bigger-number"><span><?php echo $statistic['valor']; ?></span><?php echo $statistic['indicador_de_valor']; ?></h2>
                    <h5 class="text-uppercase prisma-color--grey"><?php echo $statistic['texto']; ?></h5>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="prisma--featured-news my-5">
    <div class="container">
        <div class="inner-container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <?php $img = get_field('imagen_izquierda'); ?>
                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                </div>
                <div class="col-md-4 col-sm-12">
                    <article>
                        <h3><?php echo get_field('titulo_noticia')  ?></h3>
                        <a class="h5 mt-5 text-uppercase" href="<?php echo esc_url(get_field('link_noticia')) ?>">Leer noticia</a>
                    </article>
                </div>
                <div class="col-md-4 col-sm-12">
                    <?php $img = get_field('imagen_derecha'); ?>
                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['url']); ?>">
                </div>
                <?php if (wp_is_mobile()) : ?>
                    <a class="prisma--button-primary text-uppercase h5" href="<?php echo esc_url(get_field('link_seccion_noticia_destacada')) ?>">Saber más <span class="icon-arrow-right"></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if (!wp_is_mobile()) : ?>
        <div class="container">
            <div class="row">
                <a class="prisma--button-primary text-uppercase h5" href="<?php echo esc_url(get_field('link_seccion_noticia_destacada')) ?>">Saber más <span class="icon-arrow-right"></span></a>
            </div>
        </div>
    <?php endif; ?>
</section>

<section class="prisma-business mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h2 class="text-uppercase big-title"><?php echo get_field('titulo_seccion_ng'); ?></h2>
                <div class="prisma-content prisma-content-business">
                    <h3><?php echo get_field('texto_resaltado_ng'); ?></h3>
                    <p class="my-5"><?php echo get_field('texto_ng'); ?></p>
                    <a class="prisma--button-primary text-uppercase h5 float-start" href="<?php echo esc_url(get_field('enlace_ng')); ?>">Saber más <span class="icon-arrow-right"></span></a>
                </div>
                <?php if (!wp_is_mobile()) : ?>
                    <div class="prisma-icons">
                        <div class="icon-center">
                            <figure>
                                <?php $img = get_field('imagen_ng'); ?>
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                            </figure>
                        </div>
                        <div class="float-icons">
                            <?php
                            $icons = get_field('iconos_ng');
                            foreach ($icons as $icon) : ?>
                                <figure>
                                    <img src="<?php echo esc_url($icon['imagen']['url']); ?>" al="<?php echo $icon['imagen']['alt']; ?>">
                                    <p class="text-uppercase"><?php echo $icon['titulo']; ?></p>
                                </figure>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <?php $img = get_field('imagen_mapa_ng'); ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                <?php if (wp_is_mobile()) : ?>
                    <div class="prisma-icons mobile">
                        <div class="icon-center">
                            <figure>
                                <?php $img = get_field('prisma_mobile_ng'); ?>
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                            </figure>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="prisma--grow">
    <div class="full-container">
        <figure class="back-text">
            <?php $img = get_field('imagen_crecer'); ?>
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
            <h2 class="xxl-title"><?php echo get_field('texto_crecer'); ?></h2>
        </figure>
    </div>
</section>

<section id="compromiso" class="prisma--social">
    <div class="container">
        <h2 class="text-uppercase big-title"><?php the_field('titulo_seccion'); ?></h2>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h3><?php the_field('texto_seccion'); ?></h3>
            </div>
            <div class="col-md-6 col-sm-12">
                <?php $imagen_seccion = get_field('imagen_seccion'); ?>
                <?php if (wp_is_mobile()) : ?>
                    <?php $size = '480x347'; ?>
                <?php else : ?>
                    <?php $size = 'full'; ?>
                <?php endif; ?>
                <figure>
                    <?php if ($imagen_seccion) : ?>
                        <?php echo wp_get_attachment_image($imagen_seccion, $size); ?>
                    <?php endif; ?>
                </figure>
            </div>
        </div>
    </div>
    <div class="container">
        <?php if (have_rows('compromisos')) : ?>
            <div id="swiper-compromisos" class="swiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('compromisos')) : the_row(); ?>
                        <div class="swiper-slide">
                            <?php $logotipo = get_sub_field('logotipo'); ?>
                            <?php $size = 'full'; ?>
                            <?php $enlace_empresa = get_sub_field('enlace_empresa'); ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <?php if ($logotipo) : ?>
                                        <figure>
                                            <?php echo wp_get_attachment_image($logotipo, $size); ?>
                                        </figure>
                                    <?php endif; ?>
                                </div>
                                <?php if (have_rows('contenido')) : ?>
                                    <div class="col-md-6 col-sm-12">
                                        <?php while (have_rows('contenido')) : the_row(); ?>
                                            <h5 class="text-uppercase prisma-color--grey"><?php the_sub_field('epigrafe_empresa'); ?></h5>
                                            <h3 class="mt-3 mb-4"><?php the_sub_field('titulo_empresa'); ?></h3>
                                            <p class="mb-4"><?php the_sub_field('texto_empresa'); ?></p>
                                        <?php endwhile; ?>
                                        <?php if ($enlace_empresa && !wp_is_mobile()) : ?>
                                            <a class="prisma--button-primary text-uppercase h5 float-start" href="<?php echo esc_url($enlace_empresa['url']); ?>" target="<?php echo esc_attr($enlace_empresa['target']); ?>">Saber más <span class="icon-arrow-right"></span></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if ($enlace_empresa && wp_is_mobile()) : ?>
                                <div class="foot-item">
                                    <a class="prisma--button-primary text-uppercase h5 float-start" href="<?php echo esc_url($enlace_empresa['url']); ?>" target="<?php echo esc_attr($enlace_empresa['target']); ?>">Saber más <span class="icon-arrow-right"></span></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="prisma--add">
    <div class="full-container">
        <figure class="back-text">
            <figure class="back-text">
                <?php $img = get_field('imagen_sumar'); ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
                <h2 class="xxl-title"><?php echo get_field('texto_sumar'); ?></h2>
            </figure>
        </figure>
    </div>
</section>

<?php
$args = array(
    'posts_per_page' => -1,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'         => 'date',
    'order'             => 'DESC'
);
$the_query = new WP_Query($args);
?>
<section id="noticias" class="prisma--news">
    <div class="container">
        <h2 class="text-uppercase big-title"><?php _e('Noticias', 'prisma'); ?></h2>
        <div class="row">
            <div id="swiper-news" class="swiper">
                <div class="swiper-wrapper">
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php if (has_post_thumbnail($post->ID)) : ?>
                                <?php $imagePosts = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                            <?php endif; ?>
                            <div class="swiper-slide">
                                <article>
                                    <figure>
                                        <img src="<?php echo esc_url($imagePosts[0]); ?>" alt="">
                                    </figure>
                                    <h5 class="text-uppercase prisma-color--grey"><?php echo get_field('epigrafe_noticias'); ?></h5>
                                    <h3 class="my-4"><?php echo get_the_title(); ?></h3>
                                    <a class="prisma--button-secondary text-uppercase" href="<?php echo esc_url(the_permalink()); ?>">Leer noticia <span class="icon-arrow-right"></span></a>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>

<section class="prisma--opinion">
    <div class="full-container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="opinion-inner">
                    <h5 class="text-uppercase prisma-color--grey"><?php echo get_field('epigrafe_contacto'); ?></h5>
                    <h3 class="mt-3"><?php echo get_field('titulo_contacto'); ?></h3>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <?php $img = get_field('imagen_contacto'); ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_url($img['alt']); ?>">
            </div>
        </div>
    </div>
</section>

<section id="contacto" class="prisma--contacto">
    <div class="container">
        <h2 class="text-uppercase big-title"><?php _e('Contacto', 'prisma'); ?></h2>
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="opinion-inner">
                    <h4 class="text-uppercase"><?php echo get_field('titulo_oficinas_contacto'); ?></h4>
                    <p><span><b>T:</b></span> <?php echo get_field('telefono_contacto'); ?></p>
                    <p><span><b>M:</b></span> <a href="mailto:<?php echo get_field('correo_contacto'); ?>" target="_blank"><?php echo get_field('correo_contacto'); ?></a></p>
                    <p><i class="bi bi-plus-circle"></i> <?php echo get_field('direccion_contacto'); ?></p>
                </div>
            </div>
            <div class="col-md-7 col-sm-12">
                <h4 class="text-uppercase">Escríbenos</h4>
                <?php echo do_shortcode('[contact-form-7 id="8" title="Contacto"]'); ?>
            </div>
        </div>
    </div>
</section>