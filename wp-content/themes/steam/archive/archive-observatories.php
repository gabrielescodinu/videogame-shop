<!-- get header -->
<?php get_header(); ?>

<!-- hero banner -->
<div class="w-full text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-attachment: fixed">
    <div class="flex h-full">
        <div class="lg:w-1/2 w-full flex flex-col justify-center p-8 lg:px-24 4xl:px-96 py-32" style="background-image: linear-gradient(rgba(252, 115, 51, 0.5), rgba(252, 115, 51, 0.5))">
        <p data-aos="fade-right" data-aos-delay="200" class="text-4xl font-bold mt-28">Osservatori</p>
        </div>
        <div class="w-1/2 hidden lg:block"></div>
    </div>
</div>

<!-- last posts -->
<div class="p-8 lg:px-24 4xl:px-96 bg-white py-24">
    <p data-aos="fade-up">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et.</p>
    <div data-aos="fade-up" class="lg:grid grid-cols-3 gap-16 mt-16">
        <?php
            $args = array(
                'post_type' => 'observatories',
                'posts_per_page' => '-1',
                'order' => 'ASC',
                'orderby'=>'alphabetical',
                'post_status'    => 'publish',
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

                <div class="mb-16">
                    <div class="h-60 w-full rounded-3xl" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover;"></div>
                    <h2 class="text-lg mt-4 font-bold"><?php echo get_the_title(); ?></h2>
                    <p><?php $content = substr(get_the_content(), 0, 100); echo $content ?></p>
                    <p class="mt-4 font-bold"><a class="text-lsc-orange hover:text-lsc-lightgray" href="<?php echo get_permalink() ?>">READ MORE <i class="fa-solid fa-arrow-right"></i></a></p>
                </div>

            <?php endwhile; else: ?>
        <?php endif; wp_reset_query(); ?>
    </div>
</div>

<!-- get footer -->
<?php get_footer(); ?>