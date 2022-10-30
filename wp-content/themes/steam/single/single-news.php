<!-- get header -->
<?php get_header(); ?>

<!-- custom fields -->
<?php
    $news_date = get_field('news_date');
    $tag = get_field('tag');
    $news_files = get_field('news_files');
    $observatory_name = get_field('observatory_name');
?>

<!-- hero banner -->
<div class="w-full text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-attachment: fixed">
    <div class="flex h-full">
        <div class="lg:w-1/2 w-full flex flex-col justify-center p-8 lg:px-24 4xl:px-96 py-32" style="background-image: linear-gradient(rgba(252, 115, 51, 0.5), rgba(252, 115, 51, 0.5))">
        <p data-aos="fade-right" data-aos-delay="200" class="text-4xl font-bold mt-28"><?php echo the_title(); ?></p>
        </div>
        <div class="w-1/2 hidden lg:block"></div>
    </div>
</div>


<!-- section 1 -->
<div data-aos="fade-up" class="bg-white">
    <div class="lg:flex">
    <div class="lg:w-2/3 lg:pl-24 4xl:pl-96 p-8 py-24">
        <p onclick="history.back()" class="text-xl uppercase cursor-pointer mb-4 font-bol"><i class="fa-solid fa-circle-left text-lsc-orange"></i> Back</p>
        <p class="text-lsc-lightgray"><span class="mr-16"><?php echo $news_date ?></span><span><?php echo $observatory_name ?></span></p>
        <p class="text-lsc-orange font-bold mt-8 text-3xl"><?php echo the_title(); ?></p>
        <p class="mt-8"><?php echo the_content(); ?></p>
    </div>
    <div class="lg:w-1/3 bg-lsc-gray lg:pr-24 4xl:pr-96 p-8 py-24">
        <?php if( get_field('news_files') ): ?>    
        <?php while( the_repeater_field('news_files') ): ?> 
            <div class="flex items-center mb-8 pb-8" style="border-bottom: 0.1px solid gray;">
                <a href="<?php echo the_sub_field('file_link'); ?>" target="_blank"><i class="fa-solid fa-download text-4xl mr-8 text-lsc-orange hover:text-lsc-lightgray"></i> </a>
                <p class="font-bold"><?php echo the_sub_field('file_name'); ?></p>
            </div>  
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    </div>
</div>


<!-- get footer -->
<?php get_footer(); ?>