<section id="negocios" class="prisma-negocios"><?php if (have_rows('repeater_negocios')) : ?>
        <?php while (have_rows('repeater_negocios')) : the_row(); ?>
            <?php $colorBox = get_sub_field('box_color'); ?>
            <?php while (have_rows('content_box_business')) : the_row(); ?>
                <?php $title = get_sub_field('title_business'); ?>
            <?php endwhile; ?>
            <div class="prisma-box-negocios prisma-box-<?php echo remove_accents(strtolower($title)); ?>" style="background-color:<?php echo $colorBox ?>;">
                <div class="full-container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <?php if (have_rows('content_box_business')) : ?>
                                <?php while (have_rows('content_box_business')) : the_row(); ?>
                                    <h2 class="text-uppercase"><?php the_sub_field('title_business'); ?></h2>
                                    <p><?php the_sub_field('content_business'); ?></p>
                                    <?php $link_business = get_sub_field('link_business'); ?>
                                    <?php if ($link_business && !wp_is_mobile()) : ?>
                                        <a class="prisma--button-primary prisma-button--white text-uppercase h5" href="<?php echo esc_url($link_business['url']); ?>" target="<?php echo esc_attr($link_business['target']); ?>"><?php _e('Saber más', 'prisma'); ?> <span class="icon-arrow-bottom"></span></a>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php $imagen_box = get_sub_field('imagen_box'); ?>
                            <?php $size = 'full'; ?>
                            <?php if ($imagen_box) : ?>
                                <?php echo wp_get_attachment_image($imagen_box, $size); ?>
                            <?php endif; ?>
                            <?php while (have_rows('content_box_business')) : the_row(); ?>
                                <?php $link_business = get_sub_field('link_business'); ?>
                                <?php if ($link_business && wp_is_mobile()) : ?>
                                    <a class="prisma--button-primary prisma-button--white text-uppercase h5 mt-3" href="<?php echo esc_url($link_business['url']); ?>" target="<?php echo esc_attr($link_business['target']); ?>"><?php _e('Saber más', 'prisma'); ?> <span class="icon-arrow-bottom"></span></a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>