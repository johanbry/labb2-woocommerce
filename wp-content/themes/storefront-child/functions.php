<?php

function jb_add_text_to_sort_order()
{
    echo '<span>' . __('Sortera efter: ', 'woocommerce') . '</span>';
}

function jb_change_sorting_block_products_list()
{
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
    add_action('woocommerce_before_shop_loop', 'jb_add_text_to_sort_order', 9);
}

add_action('after_setup_theme', 'jb_change_sorting_block_products_list');
