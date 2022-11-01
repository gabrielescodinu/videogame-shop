<?php 
    if (is_shop()) {
        get_template_part( 'archive/archive-product' );
    } elseif (is_cart() )  {  
        get_template_part( 'cart' );
    } elseif (is_checkout() )  {  
        get_template_part( 'checkout' );
    } elseif (is_account_page() )  {  
        get_template_part( 'account' );
    } else {
        get_template_part( 'archive/archive-product' );
    }
?>