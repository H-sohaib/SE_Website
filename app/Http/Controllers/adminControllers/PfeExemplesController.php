<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\PfeExemple;
use App\Models\PfeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PfeExemplesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'adminViews.pfe_index',
            [
                'pfe_exemples' => PfeExemple::orderBy('id', 'desc')->get(),
                'pfe_types' => PfeType::get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'adminViews.pfe_create',
            [
                'pfe_types' => PfeType::get()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form 
        $request->validate(
            [
                'name' => 'required|max:255',
                'image' => 'required|image|max:5048',
                'pdf' => ['sometimes', 'mimes:pdf', 'max:5048']
            ]
        );
        // store the data 
        $image_path = $this->store_image($request);
        $pdf_path = $this->store_pdf($request);

        $pfe_types = implode("|", $request->except('_token', 'name', 'description', 'image', 'pdf'));

        PfeExemple::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $image_path,
            'pdf_path' => $pdf_path,
            'filter_type' => $pfe_types
        ]);

        return redirect(route('admin.pfe_exemples.index'))->with('message', 'catogory created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PfeExemple $pfe_exemple)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PfeExemple $pfe_exemple)
    {
        return view(
            'adminViews.pfe_update',
            [
                'pfe_exemple' => $pfe_exemple,
                'pfe_types' => PfeType::get()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PfeExemple $pfe_exemple)
    {
        // validate form 
        $request->validate(
            [
                'name' => 'required|max:255',
                'image' => 'sometimes|image|max:5048',
                'pdf' => ['sometimes', 'mimes:pdf', 'max:5048']
            ]
        );
        // if user upload other file (pdf or image)
        if ($request->hasFile('image') || $request->hasFile('pdf')) {
            // ******** if user upload other image 
            if ($request->hasFile('image')) {
                // delete old image if existe
                if ($pfe_exemple->image_path) { // chech if a path of a old image store in db 
                    Storage::delete($pfe_exemple->image_path);
                }
                // update the image path
                $pfe_exemple->update([
                    'image_path' => $this->store_image($request)
                ]);
            }
            // ******** if user upload other pdf 
            if ($request->hasFile('pdf')) {
                // delete old pdf if existe
                if ($pfe_exemple->pdf_path) {
                    Storage::delete($pfe_exemple->pdf_path);
                }
                // update the pdf path
                $pfe_exemple->update([
                    'pdf_path' => $this->store_pdf($request)
                ]);
            }

            // update other felds
            $pfe_exemple->update([
                'name' => $request->name,
                'description' => $request->description,
                'filter_type' => $request->filter_type
            ]);
        } else // if user upload no files 
            $pfe_exemple->update($request->except(['_token', '_method']));

        return redirect(route('admin.pfe_exemples.index'))->with('message', "Pfe Exemple '" . $request->name . "' updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PfeExemple $pfeExemple)
    {
        // dd($pfeExemple->id);
        $pfe = PfeExemple::findOrFail($pfeExemple->id);
        // delete category pic &&                    pdf 
        if (!Storage::delete($pfe->image_path) && !Storage::delete($pfe->pdf_path)) {
            return redirect(route('admin.pfe_exemples.index'))->with('error', "we couldn't delete this pfe exemples ! please try again.");
        };
        $pfe->delete();

        return redirect(route('admin.pfe_exemples.index'))->with('message', 'pfe  exemples deleted successfully');
    }

    public function view_pdf(PfeExemple $pfe_exemple)
    {
        return response()->file('storage/' . str_replace('public/', '', $pfe_exemple->pdf_path));
    }


    private function store_image(Request $request)
    {
        if ($request->hasFile('image')) {
            $origin_name = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $image_name = $origin_name . '.' . uniqid() . '.' . $request->name . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs(
                'public/pfe_exemples/imgs',
                $image_name
            );
            return $path;
        } else
            return null;
    }
    public function store_pdf($request)
    {
        if ($request->pdf && $request->file('pdf')->isValid()) {
            // dd(filter_var($origin_file_name, FILTER_SANITIZE_SPECIAL_CHARS));.
            $origin_name = pathinfo($request->pdf->getClientOriginalName(), PATHINFO_FILENAME);
            $file_name = $origin_name . '.' . uniqid() . '.' . 'pdf';
            $path = $request->file('pdf')->storeAs(
                'public/pfe_exemples/pdf',
                $file_name
            );
            return $path;
        }

        return '';
    }
}