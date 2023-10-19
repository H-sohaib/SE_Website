<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Pfe;
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
        abort(404);
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

        try {
            PfeType::create([
                'type_name' => strtolower($request->type_name)
            ]);
        } catch (\Throwable $th) {
            return redirect(route('admin.pfe_types.index'))->with('error', 'Cannot create PFE Filter type, Please try again !!');
        }
        return redirect(route('admin.pfe_types.index'))->with('message', 'New PFE Filter types created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PfeType $pfeType)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PfeType $pfe_type)
    {
        return view('adminViews.pfe_type_edit', [
            'pfe_types' => PfeType::whereNot('id', $pfe_type->id)->get(),
            'editable_type' => $pfe_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PfeType $pfe_type)
    {
        try {
            $PFEs =  Pfe::all();

            foreach ($PFEs as $pfe) {

                $new_str_types = $this->update_type__types_str($pfe->types, $pfe_type->type_name, $request->type_name);

                // update types
                $pfe->update(
                    [
                        'types' => $new_str_types
                    ]
                );
            }

            $pfe_type->update($request->except(['_method', '_token']));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect(route('admin.pfe_types.index'))->with('error', 'An error occured during update name of ' . $pfe_type->type_name . ' , please try again !!');
        }

        return redirect(route('admin.pfe_types.index'))->with('message', "type name updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PfeType $pfe_type)
    {
        try {
            $PFEs =  Pfe::all();

            foreach ($PFEs as $pfe) {
                $new_str_types = $this->rm_type__types_str($pfe->types, $pfe_type->type_name);
                // update types
                $pfe->update(
                    [
                        'types' => $new_str_types
                    ]
                );
            }
        } catch (\Throwable $th) {
            return redirect(route('admin.pfe_types.index'))->with('error', 'An error occured during filter operation of the existans PFEs , please try again !!');
        }

        try {
            PfeType::findOrFail($pfe_type->id)->delete();
        } catch (\Throwable $th) {
            return redirect(route('admin.pfe_types.index'))->with('error', 'An error occured during delete operation of the type, please try again !!');
        }

        return redirect(route('admin.pfe_types.index'))->with('message', 'PFE Filter type deleted successfully');
    }


    private function rm_type__types_str(string $types_pfe, string $type2destroy)
    {
        // to lower case
        $type2destroy = strtolower($type2destroy);
        $types_pfe = strtolower($types_pfe);
        // str to array
        $types_pfe_array = explode('|', $types_pfe);
        // searsh for index oftype2destroy
        $index = array_search($type2destroy, $types_pfe_array);
        // rm it from array if its exist ( index not false )
        if ($index !== false) unset($types_pfe_array[$index]);
        // construct the pfe typs
        return implode('|', $types_pfe_array);
    }
    private function update_type__types_str(string $types_pfe, string $type2update, string $new_type)
    {
        // to lower case
        $type2update = strtolower($type2update);
        $types_pfe = strtolower($types_pfe);
        $new_type = strtolower($new_type);

        // str to array
        $types_pfe_array = explode('|', $types_pfe);

        // searsh for index oftype2destroy
        $index = array_search($type2update, $types_pfe_array);

        if ($index !== false) {
            $types_pfe_array[$index] = $new_type;
        }
        // if ($index !== false) unset();:
        // construct the pfe typs
        return implode('|', $types_pfe_array);
    }
}