<?php

namespace App\Http\Controllers;

use App\Models\PfeExemple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class PfeExemplesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.pfe_index',
            [
                'pfe_exemples' => PfeExemple::orderBy('id', 'desc')->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pfe_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->except('_token', 'image'));
        // validate form 
        $request->validate(
            [
                'name' => 'required|max:255',
                'image' => 'required|image|max:5048'
            ]
        );
        // store the data 
        $image_path = $this->store_image($request);
        // dd($image_path);
        if ($image_path) {
            PfeExemple::create([
                'name' => $request->name,
                'description' => $request->description,
                'image_path' => $image_path,
                'filter_type' => $request->filter_type
            ]);
        } else
            return;

        return redirect(route('admin.pfe_exemples.index'))->with('message', 'catogory created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PfeExemple $pfeExemple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PfeExemple $pfeExemple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PfeExemple $pfeExemple)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PfeExemple $pfeExemple)
    {
        // dd($pfeExemple->id);
        $pfe = PfeExemple::findOrFail($pfeExemple->id);
        // delete category pic 
        if (!Storage::delete($pfe->image_path)) {
            return redirect(route('admin.pfe_exemples.index'))->with('error', "we couldn't delete this pfe exemples ! please try again.");
        };
        $pfe->delete();

        return redirect(route('admin.pfe_exemples.index'))->with('message', 'pfe  exemples deleted successfully');
    }


    private function store_image(Request $request)
    {
        if ($request->hasFile('image')) {
            $image_name = uniqid() . '.' . $request->name . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs(
                'public/pfe_exemples',
                $image_name
            );
            return $path;
        } else
            return null;
    }
}
