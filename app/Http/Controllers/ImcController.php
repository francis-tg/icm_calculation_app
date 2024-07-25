<?php

namespace App\Http\Controllers;

use App\Models\Imc;
use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function index()
    {
        $imcs = Imc::with('user')->get();
        return response()->json($imcs);
    }

    public function store(Request $request)
    {
        $imc = Imc::create($request->all());
        return response()->json($imc, 201);
    }

    public function show($id)
    {
        $imc = Imc::with('user')->find($id);
        return response()->json($imc);
    }

    public function update(Request $request, $id)
    {
        $imc = Imc::findOrFail($id);
        $imc->update($request->all());
        return response()->json($imc, 200);
    }

    public function destroy($id)
    {
        Imc::destroy($id);
        return response()->json(null, 204);
    }
}
