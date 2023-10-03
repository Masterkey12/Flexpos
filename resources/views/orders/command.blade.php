<!-- orders.blade.php -->
   
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID Commande</th>
                <th>Article</th>
                <th>Nom du Client</th>
                <th>Quantité</th>
                <th>Preuve de Paiement</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->item->item_name }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>
                    @if($order->proof_of_payment)
    <a href="{{ asset('/storage/' . $order->proof_of_payment) }}" download> Télécharger la preuve de paiement</a>
@else
    Aucune preuve de paiement disponible
@endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
