@extends('layouts.customer_layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
      <h1>{{__('Produits')}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
            <div class="box-body">
        <h1>Liste des Produits</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom du Produit</th>
                    <th>Description</th>
                    <th>Prix de Vente</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->selling_price }} $</td>
                        <td>
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <input type="number" name="quantity" value="1" min="1" class="form-control"> <!-- Champ pour la quantité -->
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Commander</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</div>
@endsection





