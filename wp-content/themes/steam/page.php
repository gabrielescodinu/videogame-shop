<?php 
    if (is_shop()) {
        get_template_part( 'archive/archive-product' );
    } elseif (is_cart() )  {  
        get_template_part( 'cart' );
    }
?>