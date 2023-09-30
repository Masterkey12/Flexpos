<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct( Sale $sale)
    {
        $this->middleware('auth');
        $this->sale = $sale;
    }

    public function index()
    {
        $livraisons = Livraison::all();
        $data['sales'] = $this->sale->all();
        return view('planning.index', ['livraisons' => $livraisons], $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sales'] = $this->sale->all();
        return view('planning.create' , $data);
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

    public function planifierLivraison(Request $request)
{
    $validator = Validator::make($request->all(), [
        'date_livraison' => '',
        'adresse_livraison' => '',
        'sale_id' => '',
        'motif_de_livraison' => '',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $livraison = new Livraison();
    $livraison->date_livraison = $request->input('date_livraison');
    $livraison->adresse_livraison = $request->input('adresse_livraison');
    $livraison->sale_id = $request->input('sale_id');
    $livraison->motif_de_livraison = $request->input('motif_de_livraison');
    $livraison->save();

    return response()->json(['message' => 'Livraison planifiée avec succès'], 200);
}


public function afficherPlanification()
{
    $livraisons = Livraison::with('sale.customer')->get();

    $events = [];
    foreach ($livraisons as $livraison) {
        $events[] = [
            'title' => 'Livraison',
            'start' => $livraison->date_livraison,
            'end' => $livraison->date_livraison, 
            'motif'=>$livraison->motif_de_livraison,
            'adresse' => $livraison->adresse_livraison,
            'sale_id' => $livraison->sale_id,
            'nom_client' => $livraison->sale->customer->name,
        ];
    }

    return view('planning.delay', compact('events'));
}





}
