<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function __invoke(Request $request, $locale)
    {
        $request->session()->put('locale', $locale);

        return redirect()->back();
    }
}
