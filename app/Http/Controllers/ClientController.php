<?php

namespace App\Http\Controllers;

use App\City;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('city')) {
            $clients = Client::where('city_id', $request->get('city'))->paginate(20);
        } else {
            $clients = Client::paginate(20);
        }

        $cities = City::orderBy('name')->get();

        return view('clients.index', compact('clients', 'cities'));
    }

    public function create()
    {
        $cities = City::orderBy('name')->get();
        return view('clients.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city_id' => 'required|exists:cities,id'
        ]);

        Client::create($request->only('name', 'city_id'));

        return redirect()->route('clients.index')
                         ->with(['status' => 'success', 'message' => 'Se creó el registro']);
    }

    public function edit(Request $request, Client $client)
    {
        $cities = City::orderBy('name')->get();
        return view('clients.edit', compact('client', 'cities'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'city_id' => 'required|exists:cities,id'
        ]);

        $client->update($request->only('name', 'city_id'));

        return redirect()->route('clients.index')
                         ->with(['status' => 'success', 'message' => 'Se actualizó el registro']);
    }

    public function destroy(Request $request, Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
                         ->with(['status' => 'success', 'message' => 'Se eliminó el registro']);
    }
}
