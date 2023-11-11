<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compras;

class ComprasController extends Controller
{
    public function index()
    {
        return view ('compras.index');
    }


    public function consultarRuc(Request $request)
    {
        $ruc = $request->input('ruc');

        $data = null;

        if ($ruc) {
            $response = Http::timeout(30)->get('https://api.apis.net.pe/v1/ruc', [
                'numero' => $ruc,
                'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
            ]);

            $data = $response->json();
        }

        return view('compras.index', compact('data'));
    }

    public function store(Request $request)
    {
        compras::create($request->all());
        return response()->json(['success' => true]);
    }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
