<?php

namespace App\Http\Controllers;

use App\Models\Imc;
use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function index()
    {
        $imcs = Imc::with('user')->get();
        return view('user.app',[
            'imcs'=>$imcs
        ]);
    }

    public function store(Request $request)
    {
        // Valider les données d'entrée
        $validatedData = $request->validate([
            'poids' => 'required|numeric',
            'taille' => 'required|numeric'
        ]);

        // Calculer l'IMC
        $poids = $request->input('poids');
        $taille = $request->input('taille');
        $imc_value = $poids / ($taille * $taille);


        // Créer une nouvelle entrée dans la table Imc
        $imc = Imc::create([
            'poids' => $poids,
            'taille' => $taille,
            'valeur' => $imc_value,
            'user_id'=> auth('web')->id()
        ]);

        // Rediriger vers une vue avec les données calculées
        return view('user.result', ['imc' => $imc]);
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
