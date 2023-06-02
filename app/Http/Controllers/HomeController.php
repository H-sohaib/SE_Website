<?php

namespace App\Http\Controllers;

use App\Models\PfeExemple;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view(
            'index',
            [
                'pfe_exemples' => PfeExemple::orderBy('id', 'desc')->get()
            ]
        );
    }
}
