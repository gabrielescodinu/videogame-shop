<!-- get header -->
<?php get_header(); ?>

<!-- hero banner -->
<div class="w-full text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-attachment: fixed">
    <div class="flex h-full">
        <div class="lg:w-1/2 w-full flex flex-col justify-center p-8 lg:px-24 4xl:px-96 py-32" style="background-image: linear-gradient(rgba(252, 115, 51, 0.5), rgba(252, 115, 51, 0.5))">
        <p data-aos="fade-right" data-aos-delay="200" class="text-4xl font-bold mt-28">Eventi</p>
        </div>
        <div class="w-1/2 hidden lg:block"></div>
    </div>
</div>

<!-- last posts -->
<div class="p-8 lg:px-24 4xl:px-96 bg-white py-24">
    <h1 data-aos="fade-up" class="text-3xl font-bold text-lsc-orange">Ultimi Eventi</h1>
    <div data-aos="fade-up" class="lg:grid grid-cols-3 gap-16 mt-16">
        <?php
            $args = array(
                'post_type' => 'events',
                'posts_per_page' => '3',
                'order' => 'DESC',
                'orderby'=>'publish_date',
                'post_status'    => 'publish',
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php 
                    $date = strtotime(get_field('event_date'));
                    $day = date('d', $date);
                    $month = date('M', $date);
                    $hours = date('h:i', $date);
                ?>

                <div class="mb-16">
                    <div class="h-60 w-full rounded-3xl" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover;">
                        <div class="p-4 m-4 transform translate-y-4 rounded-3xl shadow text-lsc-orange uppercase font-bold text-center h-20 w-20 bg-white"><span class="text-2xl"><?php echo $day ?></span><br><span><?php echo $month ?></span></div>
                    </div>
                    <div class="flex mt-4">
                        <p class="mr-8"><i class="fa-solid text-lsc-orange fa-location-dot"></i> <?php echo get_field('event_location') ?></p>
                        <p><i class="fa-solid text-lsc-orange fa-clock"></i> <?php echo $hours ?></p>
                    </div>
                    <h2 class="text-lg mt-4 font-bold"><?php echo get_the_title(); ?></h2>
                    <p><?php $content = substr(get_the_content(), 0, 100); echo $content ?></p>
                    <p class="mt-4 font-bold"><a class="text-lsc-orange hover:text-lsc-lightgray" href="<?php echo get_permalink() ?>">READ MORE <i class="fa-solid fa-arrow-right"></i></a></p>
                </div>

            <?php endwhile; else: ?>
        <?php endif; wp_reset_query(); ?>
    </div>
</div>

<!-- old posts -->
<div class="p-8 lg:px-24 4xl:px-96 bg-lsc-gray py-24">
    <h1 data-aos="fade-up" class="text-3xl font-bold text-lsc-orange">Archivio</h1>

    <div data-aos="fade-up" class="lg:grid grid-cols-3 gap-16 mt-16">
        <?php
            $args = array(
                'post_type' => 'events',
                'posts_per_page' => '-1',
                'order' => 'ASC',
                'orderby'=>'publish_date',
                'post_status'    => 'publish',
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php 
                    $date = strtotime(get_field('event_date'));
                    $day = date('d', $date);
                    $month = date('M', $date);
                    $hours = date('h:i', $date);
                ?>

                <div class="mb-16">
                    <div class="h-60 w-full rounded-3xl" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover;">
                        <div class="p-4 m-4 transform translate-y-4 rounded-3xl shadow text-lsc-orange uppercase font-bold text-center h-20 w-20 bg-white"><span class="text-2xl"><?php echo $day ?></span><br><span><?php echo $month ?></span></div>
                    </div>
                    <div class="flex mt-4">
                        <p class="mr-8"><i class="fa-solid text-lsc-orange fa-location-dot"></i> <?php echo get_field('event_location') ?></p>
                        <p><i class="fa-solid text-lsc-orange fa-clock"></i> <?php echo $hours ?></p>
                    </div>
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