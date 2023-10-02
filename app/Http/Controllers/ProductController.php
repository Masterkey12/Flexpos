<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $items = Item::all(); // Récupérer tous les produits
        return view('products.index', compact('items'));
    }

    
}
