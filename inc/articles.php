<?php

// change excerpt length

function automotiv_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'automotiv_custom_excerpt_length', 999 );