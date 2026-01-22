<?php

namespace App\Http\Controllers;

use App\Models\Zulo;
use App\Models\Especulador;
use Illuminate\Http\Request;

class ZuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zulos = Zulo::all();
        return view('zulos.index', [
            'zulos' => $zulos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'precio' => 'required|string',
            'superficie' => 'required|string',
        ]);

        $data['especulador_id'] = Especulador::inRandomOrder()->first()->id;
        Zulo::create($data);
        return to_route('index.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('zulos.show', [
            'zulo' => Zulo::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zulo $zulo)
    {
        return response()->json([
            'error' => 'Aun no se ha implementado'
        ], 501);

        // return view('zulos.edit', $zulo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zulo $zulo)
    {
        $data = $request->validate([
            'titulo' => 'nullable',
            'descripcion' => 'nullable',
            'ubicacion' => 'nullable',
            'precio' => 'nullable',
            'superficie' => 'nullable',
        ]);
        $zulo->save(array_filter($data));
        return to_route('index.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zulo $zulo)
    {
        return response()->json([
            'error' => 'Aun no se ha implementado'
        ], 501);

        // $zulo->delete();
        // return to_route('zulos.index');
    }
}
