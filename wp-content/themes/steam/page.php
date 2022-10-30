<?php 
    if (is_shop()) {
        get_template_part( 'archive/archive-product' );
    } elseif (is_cart())  {  
        get_template_part( 'index.php' );
    } else {  
        get_template_part( 'archive/archive-product' );
    }
?>

<div data-aos="fade-right" data-aos-delay="1000" class="parent-container aos-init hidden">
    <!-- get default content -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
    <?php endwhile;
    endif; ?>
</div>