@extends('layouts.sale')

@section('content')
<div class="content-wrapper" ng-app="tutapos">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Recettes/factures d'achat</h1>
    </section>
    <!-- Main content -->
    @include('receiving.print_invoice')
</div>
@endsection