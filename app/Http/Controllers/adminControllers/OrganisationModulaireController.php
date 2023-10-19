<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use App\Models\Module;
use App\Models\Semestre;
use Illuminate\Http\Request;

class OrganisationModulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $module_with_no_matiere = 0;
        // rowspan  N matiere + N module don't have a matiere
        foreach (Module::get() as $module) {
            if ($module->matieres->isEmpty()) $module_with_no_matiere++;
        };
        return view('adminViews.se_modules', [
            'semestres' => Semestre::orderBy('id')->get(),
            'module_with_no_matiere' => $module_with_no_matiere
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // (work with disable input field)  
        // choose if he want to add a module or a mateire
        // * select field
        // choose semestre (if add module )  , choose the module (if add matiere)
        // * select field                     , select field
        // for module (M?  ,  module_name)     , for matiere (matiere_name)
        return view('adminViews.add_se_modules', [
            'semestres' => Semestre::orderBy('id')->get(),
            'modules' => Module::orderBy('id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->add_what == 'module') {
            Module::create([
                'semestre_id' => (int)$request->semestre,
                'module_num' => Module::max('module_num') + 1,
                'module_name' => $request->new_module
            ]);
        } elseif ($request->add_what == 'matiere') {
            Matiere::create([
                'semestre_id' => Module::findOrfail($request->module)->semestre_id,
                'module_id' => (int)$request->module,
                'matiere_name' => $request->new_matiere
            ]);
        } else {
            return redirect(route('admin.organisation_modulaire.index'))->with('error', 'there is a error !!');
        }
        return redirect(route('admin.organisation_modulaire.index'))->with('message', $request->add_what . 'a été créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, Request $request)
    {
        $module_name = '';
        $matiere_name = '';
        if ($request->delete_what == 'module') {
            $module = Module::findOrFail($id);
            $module_name = $module->module_name;
            $module->delete();
        } elseif ($request->delete_what == 'matiere') {
            $matiere = Matiere::findOrFail($id);
            $matiere_name = $matiere->matiere_name;
            $matiere->delete();
        } else
            return redirect(route('admin.organisation_modulaire.index'))->with('error', 'there is a error');
        return redirect(route('admin.organisation_modulaire.index'))->with('message', $module_name ? $module_name : $matiere_name . ' deleted successfully');
    }

    public function update_all_modules(Request $request)
    {
        $modules_array = $request->all();
        foreach ($modules_array as $module) {
            Module::findOrFail((int)$module['id'])->update([
                'module_num' => $module['module_num'],
                'module_name' => $module['text'] ? $module['text'] : ''
            ]);
        };
        return "OK";
    }
    public function update_all_matieres(Request $request)
    {
        $matieres_array = $request->all();
        foreach ($matieres_array as $matiere) {
            Matiere::findOrFail((int)$matiere['id'])->update([
                'matiere_name' => $matiere['text'] ? $matiere['text'] : ''
            ]);
        };
        return "OK";
    }
}
