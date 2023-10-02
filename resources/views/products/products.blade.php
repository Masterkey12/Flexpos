@extends('layouts.customer_layout.blade')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
      <h1>{{__('Commandes')}}
        <a class="btn btn-small btn-primary pull-right left-margin-10" href="{{ route('livraisons.afficher') }}" data-toggle="modal"> {{trans('Afficher les livraisons')}}</a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
              @include('partials.filters', ['filter_route'=>url('/product/all'), 'filter_id'=>'productFilter'])
            </div>
            <div class="box-body">
              @include('product.index')
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
