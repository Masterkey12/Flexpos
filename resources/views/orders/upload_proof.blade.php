<!-- Dans resources/views/orders/upload_proof.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Téléverser la Preuve de Paiement</h1>

    <form action="{{ route('orders.upload_proof', ['order' => $order->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="proof_of_payment" required>
        <button type="submit">Envoyer Preuve de Paiement</button>
    </form>
@endsection
