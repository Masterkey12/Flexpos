@extends('layouts.customer_layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header"></div>
                    <div class="box-body">
                        <h1>Téléverser la Preuve de Paiement</h1>

                        <form action="{{ route('orders.upload_proof', ['order' => $order->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="proof_of_payment">Preuve de Paiement</label>
                                <input type="file" class="form-control" id="proof_of_payment" name="proof_of_payment" required>
                            </div>
                            <button type="submit" class="btn btn-success">Envoyer Preuve de Paiement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
