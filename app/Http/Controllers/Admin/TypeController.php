<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Functions\Helper;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    public function typeProjects(){

        $types = Type::all();

        return view('admin.types.type-projects', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida i dati della richiesta
        $request->validate([
            'name' => 'required|string|max:255',
        ],
        [
            'name.required' => 'È richiesto il campo nome',
            'name.max' => 'Il campo nome deve contenere non piu di :max caratteri'
        ]);

        // Controlla se il tipo esiste già
        $exists = Type::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.types.index')->with('error', 'Tipo già esistente');
        } else {
            // Crea un nuovo tipo
            $new = new Type();
            $new->name = $request->name;
            $new->slug = Helper::generateSlug($new->name, Type::class);
            $new->save();

            return redirect()->route('admin.types.index')->with('success', 'Tipo creato correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20'
        ],
        [
            'name.required' => 'Devi inserire il nome del tipo',
            'name.min' => 'Il tipo deve contenere almeno :min caratteri',
            'name.max' => 'Il tipo deve contenere non piu di :max caratteri',
        ]);

        $exists = Type::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.types.index')->with('error', 'Tipo già esistente');
        }else{
            $val_data['slug'] = Helper::generateSlug($request->name, Type::class);
            $type->update($val_data);
            return redirect()->route('admin.types.index')->with('success', 'Tipo modificato correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', 'Tipo eliminato correttamente');
    }
}
