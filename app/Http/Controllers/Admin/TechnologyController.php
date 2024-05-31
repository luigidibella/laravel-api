<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Functions\Helper;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
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

        // Controlla se la tecnologia esiste già
        $exists = Technology::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già esistente');
        } else {
            // Crea una nuova tecnologia
            $new = new Technology();
            $new->name = $request->name;
            $new->slug = Helper::generateSlug($new->name, Technology::class);
            $new->save();

            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia creata correttamente');
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
    public function update(Request $request, Technology $technology)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20'
        ],
        [
            'name.required' => 'Devi inserire il nome della tecnologia',
            'name.min' => 'La tecnologia deve contenere almeno :min caratteri',
            'name.max' => 'LA tecnologia deve contenere non piu di :max caratteri',
        ]);

        $exists = Technology::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già esistente');
        }else{
            $val_data['slug'] = Helper::generateSlug($request->name, Technology::class);
            $technology->update($val_data);
            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia modificata correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia eliminata correttamente');
    }
}
