<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Pfe;
use App\Models\PfeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PfeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'adminViews.pfe_index',
            [
                'pfe_exemples' => Pfe::orderBy('id', 'desc')->get(),
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

        try {
            // store the data 
            $image_path = 'uploads/' . $this->store_image($request);
            $pdf_path = $this->store_pdf($request) ? 'uploads/' . $this->store_pdf($request) : null;

            $pfe_types = implode("|", $request->except('_token', 'name', 'description', 'image', 'pdf'));

            Pfe::create([
                'name' => $request->name,
                'description' => $request->description,
                'image_path' => $image_path,
                'pdf_path' => $pdf_path,
                'types' => $pfe_types
            ]);
        } catch (\Throwable $th) {
            return redirect(route('admin.pfe_exemples.index'))->with('error', 'Pfe not created , please try again !!');
        }

        return redirect(route('admin.pfe_exemples.index'))->with('message', 'Pfe created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pfe $pfe_exemple)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pfe $pfe_exemple)
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
    public function update(Request $request, Pfe $pfe_exemple)
    {

        // validate form 
        $request->validate(
            [
                'name' => 'required|max:255',
                'image' => 'sometimes|image|max:5048',
                'pdf' => ['sometimes', 'mimes:pdf', 'max:5048']
            ]
        );
        try {
            // if user upload other file (pdf or image)
            if ($request->hasFile('image') || $request->hasFile('pdf')) {
                // ******** if user upload other image 
                if ($request->hasFile('image')) {
                    // delete old image if existe
                    if ($pfe_exemple->image_path) { // chech if a path of a old image store in db 
                        File::delete($pfe_exemple->image_path);
                    }
                    // update the image path
                    $pfe_exemple->update([
                        'image_path' => 'uploads/' . $this->store_image($request)
                    ]);
                }
                // ******** if user upload other pdf 
                if ($request->hasFile('pdf')) {
                    // delete old pdf if existe
                    if ($pfe_exemple->pdf_path) {
                        File::delete($pfe_exemple->pdf_path);
                    }
                    // update the pdf path
                    $pfe_exemple->update([
                        'pdf_path' => 'uploads/' . $this->store_pdf($request)
                    ]);
                }
            }

            // update other felds
            $pfe_exemple->update([
                'name' => $request->name,
                'description' => $request->description,
                'types' => implode('|', $request->filter_type)
            ]);
        } catch (\Throwable $th) {
            return redirect(route('admin.pfe_exemples.index'))->with('error', "Pfe Exemple '" . $request->name . "' not updated , please try agaion !!");
        }

        return redirect(route('admin.pfe_exemples.index'))->with('message', "Pfe Exemple '" . $request->name . "' updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pfe $pfe_exemple)
    {

        $warning = '';
        try {
            //  ** PDF Logic
            // check if pdf path exist in db 
            if ($pfe_exemple->pdf_path) {
                // check if the pdf file is exist 
                if (Storage::disk('public_uploads')->exists(str_replace('uploads/', '', $pfe_exemple->pdf_path))) {
                    // delete the pdf & check if deleted successfuly 
                    if (!File::delete($pfe_exemple->pdf_path)) {
                        // redirect with error if not 
                        // return redirect(route('admin.pfe_exemples.index'))->with('error', "we couldn't delete this pfe exemples cuz of pdf ! please try again.");
                    }
                } else {
                    // set a Warning if the pdf in db & is not in uploads folder
                    $warning = 'Warning : the pdf file for this PFE is not exist in our server !';
                }
            }
            // ** Image Logic
            // chekc if the image exist in the uploads folder
            if (Storage::disk('public_uploads')->exists(str_replace('uploads/', '', $pfe_exemple->image_path))) {

                // check if its deleted or not 
                if (!File::delete($pfe_exemple->image_path)) {
                    // return redirect(route('admin.pfe_exemples.index'))->with('error', "We couldn't delete this pfe exemples cuz of image ! please try again.");
                };
            } else {
                $warning = $warning . 'Warning : the image for this PFE is not exist in our server !';
            }


            $pfe_exemple->delete();
        } catch (\Throwable $th) {
            return redirect(route('admin.pfe_exemples.index'))->with('error', 'pfe exemples not deleted , please try again !!');
        }

        if ($warning !== '') {
            return redirect(route('admin.pfe_exemples.index'))->with('warning', 'PFE delete with :' . $warning);
        }


        return redirect(route('admin.pfe_exemples.index'))->with('message', 'pfe  exemples deleted successfully');
    }

    public function view_pdf(Pfe $pfe)
    {
        if (Storage::disk('public_uploads')->exists(str_replace('uploads/', '', $pfe->pdf_path)))
            return response()->file($pfe->pdf_path);
        else return abort(404);
    }


    private function store_image(Request $request)
    {
        if ($request->hasFile('image')) {
            $origin_name = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $image_name = $origin_name . '.' . uniqid() . '.' . $request->name . '.' . $request->image->extension();

            try {
                $path = $request->file('image')->storeAs(
                    'pfe_exemples/imgs',
                    $image_name,
                    ['disk' => 'public_uploads']
                );
            } catch (\Throwable $e) {
                return redirect(route('admin.pfe_exemples.index'))->with('error', "An error occured during PFE image save , please try agaion !!");
            }
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
                'pfe_exemples/pdf',
                $file_name,
                ['disk' => 'public_uploads']
            );

            return $path;
        }

        return null;
    }
}