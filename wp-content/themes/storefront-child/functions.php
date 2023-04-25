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

function jb_remove_storefront_sidebar()
{
    if (is_woocommerce()) {
        remove_action('storefront_sidebar', 'storefront_get_sidebar', 10);
    }
}

add_action('after_setup_theme', 'jb_change_sorting_block_products_list');
add_action('get_header', 'jb_remove_storefront_sidebar');
