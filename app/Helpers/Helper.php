<?php
// ============================================================
if (!function_exists('cart_get_total')) {
    function cart_get_total()
    {
        return Cart::getTotal();
    }
}
// ============================================================

// ============================================================
if (!function_exists('cart_views')) {
    function cart_views()
    {
        return Cart::getContent();
    }
}
// ============================================================

// ============================================================
if (!function_exists('cart_counts')) {
    function cart_counts()
    {
        return Cart::getContent()->count();
    }
}

if (!function_exists('get_one_cart')) {
    function get_one_cart($id)
    {
        return Cart::get($id);
    }
}
