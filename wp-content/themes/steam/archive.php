<?php
    if (is_post_type_archive(['product'])) {

        get_template_part( 'archive/archive-product' );

    } elseif (is_post_type_archive(['reports'])) {

        get_template_part( 'archive/archive-reports' );

    } elseif (is_post_type_archive(['events'])) {

        get_template_part( 'archive/archive-events' );

    } elseif (is_post_type_archive(['observatories'])) {

        get_template_part( 'archive/archive-observatories' );
        
    }
?>