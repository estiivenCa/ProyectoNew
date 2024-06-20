<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsables;

class ResponsablesController extends Controller
{
     
    public function index()
    {
        $Responsables = Responsables::paginate(5);
        return response()->json($Responsables);
    }

    public function store(Request $request)
    {
        Responsables::create($request->all());
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Responsables = Responsables::find($id);
        return response()->json($Responsables);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'nullable|string'
        ]);

        $Responsables = Responsables::findOrFail($id);
        $Responsables->update($request->all());
    }

    public function destroy($id)
    {
        $Responsables = Responsables::find($id);
        $Responsables->delete();
    }
}
