<?php

namespace App\Helpers;

use App\Language;


if (!function_exists('getLangId')) {

    function getLangId()
    {
        return Language::select('id')
                ->where('code', session()->get('locale', 'en'))
                ->first()->id ?? 1;
    }

}