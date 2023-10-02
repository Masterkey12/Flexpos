<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function store(Request $request)
{
    if (auth()->guard('web_customers')->check()) {
        // Valider les données
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $item = Item::findOrFail($request->input('item_id'));
        $quantity = $request->input('quantity');
        $totalPrice = $item->selling_price * $quantity;

        // Créer la commande
        $order = new Order();
        $order->item_id = $item->id;
        $order->customer_id = auth()->guard('web_customers')->user()->id; // Utilisation correcte de auth()->guard('web_customers')->user()
        $order->quantity = $quantity;
        $order->total_price = $totalPrice;
        $order->save();

        $admins = User::where('name', 'admin')->get();
        Notification::send($admins, new NewOrderNotification($order));
        
        return back()->with('success', 'Commande passée avec succès');
    } else {
        // L'utilisateur n'est pas authentifié, rediriger vers la page de connexion
        return redirect()->route('auth.customer_login')->withErrors(['message' => 'Veuillez vous connecter pour passer une commande']);
    }
}

}
