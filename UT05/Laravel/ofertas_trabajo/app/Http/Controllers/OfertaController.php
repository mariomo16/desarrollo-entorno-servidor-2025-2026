<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ofertas.index', [
            'ofertas' => Oferta::with([
                'empresa:id,nombre',
                'empresa.user'
            ])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ofertas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Oferta::create($request->all());
        return redirect('/ofertas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Oferta $oferta)
    {
        return view('ofertas.show', [
            'oferta' => $oferta
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oferta $oferta)
    {
        return view('ofertas.edit', [
            'oferta' => $oferta
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oferta $oferta)
    {
        $oferta->update($request->all());
        return redirect('/ofertas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oferta $oferta)
    {
        $oferta->delete();
        return redirect('/ofertas');

    }
}
