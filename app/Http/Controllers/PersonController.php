<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Crypt;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('People/Index', [
            'people' => Person::all(),
        ]);
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
    public function store(Request $request): RedirectResponse
    {
        $person = new Person;

        $person->id = $request->id;
        $person->names = $request->names;
        $person->last_names = $request->last_names;
        $person->phone = $request->phone;
        $person->email = Crypt::encryptString($request->email);

        $person->timestamps = false;

        $person->save();

        return redirect(route('people.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person): RedirectResponse
    {
        $person->phone = $request->phone;

        $person->timestamps = false;

        $person->update();

        return redirect(route('people.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person): RedirectResponse
    {
        $person->delete();

        return redirect(route('people.index'));
    }
}
