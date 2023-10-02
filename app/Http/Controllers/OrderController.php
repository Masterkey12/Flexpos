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

// Dans OrderController.php

public function showUploadProofForm(Order $order)
{
    return view('orders.upload_proof', compact('order'));
}

public function uploadProof(Request $request, Order $order)
{
    // Vérifier si un fichier de preuve de paiement a été téléchargé
    if ($request->hasFile('proof_of_payment')) {
        // Gérer le téléchargement de la preuve de paiement
        $proofOfPayment = $request->file('proof_of_payment');
        $proofOfPaymentPath = $proofOfPayment->store('public/proofs_of_payment');

        // Associer la preuve de paiement à la commande
        $order->proof_of_payment = $proofOfPaymentPath;

        $order->save();

        return redirect('/home')->with('success', 'Preuve de paiement envoyée avec succès');
    } else {
        return redirect('/home')->with('error', 'Aucun fichier de preuve de paiement téléchargé');
    }
}
 
}

