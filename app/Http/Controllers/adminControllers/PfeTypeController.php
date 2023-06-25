<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\PfeType;
use Illuminate\Http\Request;

class PfeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminViews.pfe_type_index', [
            'pfe_types' => PfeType::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create ";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'type_name' => 'required'
            ]
        );
        PfeType::create($request->except('_token'));
        return redirect(route('admin.pfe_types.index'))->with('message', 'New PFE Filter type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PfeType $pfeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PfeType $pfeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PfeType $pfeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PfeType $pfe_type)
    {
        PfeType::findOrFail($pfe_type->id)->delete();
        return redirect(route('admin.pfe_types.index'))->with('message', 'PFE Filter type deleted successfully');
    }
}