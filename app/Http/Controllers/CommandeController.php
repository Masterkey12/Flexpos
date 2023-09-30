<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function passerCommande(Request $request)
{
    $request->validate([
        'produit' => 'required|exists:produits,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $produit = Produit::find($request->input('produit'));

    if (!$produit) {
        return redirect()->back()->with('error', 'Le produit sélectionné n\'existe pas.');
    }

    // Vérifiez si la quantité demandée est disponible en stock
    if ($produit->stock < $request->input('quantite')) {
        return redirect()->back()->with('error', 'La quantité demandée n\'est pas disponible en stock.');
    }

    // Enregistrez la commande dans la base de données
    // Assurez-vous de mettre à jour le stock du produit

    // Exemple de sauvegarde de commande (adapté à votre modèle de données)
    $commande = new Commande();
    $commande->produit_id = $produit->id;
    $commande->quantite = $request->input('quantite');
    $commande->save();

    // Mettez à jour le stock du produit
    $produit->stock -= $request->input('quantite');
    $produit->save();

    return redirect('/commander')->with('success', 'La commande a été passée avec succès.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
