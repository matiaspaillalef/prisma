<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prisma
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', 'inicio');

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_footer();

?>
<script>
    const swiperPresentation = new Swiper('#swiper-presentation', {
        direction: 'horizontal',
        spaceBetween: 15,
        threshold: 20,
        //autoplay: true,
        loopFillGroupWithBlank: true,
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: 1,
                loop: true,
                autoplay: true,
            },
            768: {
                slidesPerView: 1,
                loop: true,
                autoplay: true,
            },
            1024: {
                slidesPerView: 3,
                loop: false,
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    const swiperPostventa = new Swiper('#swiper-news', {
        direction: 'horizontal',
        spaceBetween: 15,
        threshold: 20,
        loop: true,
        autoplay: true,
        breakpoints: {
            640: {
                slidesPerView: 1,

            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiperCompromiso = new Swiper("#swiper-compromisos", {
        slidesPerView: 1,
        threshold: 20,
        autoplay: true,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,

            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 30,
                grid: {
                    rows: 2,
                },
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });
</script>