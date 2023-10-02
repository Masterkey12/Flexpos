<div id="historyTable">
<table table id="myTablePayment" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Paiement</th>
        </tr>
    </thead>
    <tbody>
        @forelse($customer_payments as $payment)
            <tr>
                <td>{{ $payment->created_at->format('M d, Y') }}</td>
                <td>{{ currencySymbol() . $payment->payment }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center">Aucun paiement trouvé</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
