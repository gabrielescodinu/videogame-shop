<!-- get header -->
<?php get_header(); ?>
<?php $page_title = get_the_title(); ?>

<div data-aos="fade-up" class="text-white p-8 lg:px-24 4xl:px-96 py-40 pt-40 checkout bg-gradient-to-r from-steam-darkblue to-steam-dark">
<p class="text-2xl font-bold mb-8"><?php echo $page_title ?></p>
    <div>
        <?php the_content(); ?>
    </div>
</div>




<!-- get footer -->
<?php get_footer(); ?>