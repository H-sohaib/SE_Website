<?php

namespace App\Http\Controllers;

use App\Models\Pfe;
use App\Models\PfeType;
use App\Models\Semestre;
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
                'pfe_exemples' => Pfe::orderBy('id', 'desc')->get(),
                'pfe_types' => PfeType::get(),
                'semestres' => Semestre::orderBy('id')->get()
            ]
        );
    }
}
