<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuackRequest;
use App\Models\Quack;
use App\Models\User;
use Auth;

class QuackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('quacks.index', [
            'quacks' => Quack::with(['user', 'quashtags'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuackRequest $request)
    {
        Quack::create($request->validated() + ['user_id' => auth()->id()]);
        return to_route('quacks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quack $quack)
    {
        return view('quacks.show', [
            'quack' => $quack
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quack $quack)
    {
        $this->authorize('manage', $quack);

        return view('quacks.edit', [
            'quack' => $quack
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuackRequest $request, Quack $quack)
    {
        $this->authorize('manage', $quack);

        $quack->update($request->validated());
        return to_route('quacks.show', [$quack]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quack $quack)
    {
        $this->authorize('manage', $quack);

        $quack->delete();
        return to_route('quacks.index');
    }

    public function quav(Quack $quack)
    {
        Auth::user()->quavs()->toggle($quack->id);
        return back();
    }

    public function requack(Quack $quack)
    {
        Auth::user()->requacks()->toggle($quack->id);
        return back();
    }
}
