<!-- get header -->
<?php get_header(); 
  $page_title = get_the_title();
  global $product;  
?>

<!-- search -->
<div data-aos="fade-up" class="p-8 lg:px-24 4xl:px-96 pt-40">
    <form class="w-full flex justify-between items-center" action="<?php echo home_url(); ?>" id="search-form" method="get">
        <input class="w-full px-8 py-2 rounded-lg text-white bg-steam-grey" type="text" name="s" id="s" placeholder="Search" onblur="if(this.value=='')this.value='type your search'" onfocus="if(this.value=='type your search')this.value=''" />
        <input type="hidden" value="submit" />
        <i class="fa-solid fa-magnifying-glass pl-4 text-2xl text-white"></i>
    </form>    
</div>

<?php 
    if ( $page_title != 'Shop' ) { ?>
        <!-- last posts by category -->
        <div class="p-8 lg:px-24 4xl:px-96 pb-24 text-white">
            <p data-aos="fade-up" class="text-2xl font-bold mb-8"><?php echo $page_title ?></p>
            <div data-aos="fade-up" class="mt-8 grid grid-cols-1 lg:grid-cols-4 gap-4">
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => '9',
                        'order' => 'DESC',
                        'orderby' => 'publish_date',
                        'post_status'    => 'publish',
                        'tax_query' => array(
                            'relation' => 'OR',
                            array (
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => $page_title,
                            ),
                            array (
                                'taxonomy' => 'product_tag',
                                'field' => 'slug',
                                'terms' => $page_title,
                            ),
                        ),
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();?>
                        <a class="videogame-card" style="border: 3px solid #121212" href="<?php echo get_permalink() ?>">
                            <div class="h-96 flex flex-col justify-end relative" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-position: center;">
                                <div style="border-bottom-right-radius: 10px;" class="bg-green-500 absolute top-0 p-2 text-xs">-20 %</div>
                                <div style="background-color: rgba(0, 0, 0, 0.5);" class="px-8 py-4">
                                    <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                    <p><?php echo get_the_title(); ?></p>
                                    <p class="text-sm text-steam-blue"><?php echo wc_price( $price ); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; else: ?>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div> <?php
    } else { ?>
        <!-- last posts -->
        <div class="p-8 lg:px-24 4xl:px-96 pb-24 text-white">
        <p data-aos="fade-up" class="text-2xl font-bold mb-8"><?php echo $page_title ?></p>
        <div data-aos="fade-up" class="mt-8 grid grid-cols-1 lg:grid-cols-4 gap-4">
            <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => '9',
                    'order' => 'DESC',
                    'orderby' => 'publish_date',
                    'post_status'    => 'publish',
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();?>
                    <a class="videogame-card" style="border: 3px solid #121212" href="<?php echo get_permalink() ?>">
                        <div class="h-96 flex flex-col justify-end relative" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-position: center;">
                            <div style="border-bottom-right-radius: 10px;" class="bg-green-500 absolute top-0 p-2 text-xs">-20 %</div>
                            <div style="background-color: rgba(0, 0, 0, 0.5);" class="px-8 py-4">
                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                <p><?php echo get_the_title(); ?></p>
                                <p class="text-sm text-steam-blue"><?php echo wc_price( $price ); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endwhile; else: ?>
            <?php endif; wp_reset_query(); ?>
        </div>
        </div> <?php
    } ?>

<div class="w-full lg:w-1/3 mx-auto mt-8 text-sm"><?php the_posts_pagination(); ?></div>


<!-- get footer -->
<?php get_footer(); ?>