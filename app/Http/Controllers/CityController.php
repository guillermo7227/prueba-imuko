<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::paginate(5);
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        City::create($request->only('name'));

        return redirect()->route('cities.index')
                         ->with(['status' => 'success', 'message' => 'Se creó el registro']);
    }

    public function edit(Request $request, City $city)
    {
        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate(['name' => 'required']);

        $city->update($request->only('name'));

        return redirect()->route('cities.index')
                         ->with(['status' => 'success', 'message' => 'Se actualizó el registro']);
    }

    public function destroy(Request $request, City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')
                         ->with(['status' => 'success', 'message' => 'Se eliminó el registro']);
    }
}
