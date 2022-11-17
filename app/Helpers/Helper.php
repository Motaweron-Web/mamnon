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


if (!function_exists('upload_file')) {
    function upload_file($file,$firebase_storage_path)
    {
//        dd($file->getClientOriginalExtension());
        $localfolder = public_path('firebase-temp-uploads') . '/';
        $extension = $file->getClientOriginalExtension();
        $file_name = $file->getClientOriginalName()  . '.' . $extension;
        if ($file->move($localfolder, $file_name)) {
            $uploadedfile = fopen($localfolder . $file_name, 'r+');
            $req = app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file->getClientOriginalName()]);
            //will remove from local laravel folder
            unlink($localfolder . $file_name);
            return $req->info()['mediaLink'];
        }
        return '';

    }
}
