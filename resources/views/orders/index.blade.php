@extends('layouts.admin_dynamic')

@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header m-3"><h1>{{__('Commandes')}} 
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <!-- /.box-header -->
        <div class="box box-success">
          <div class="box-header">
            @include('partials.filters', ['filter_route'=>url('/admins/orders'), 'filter_id'=>'OrdersFilter'])
          </div>
            <div class="box-body">
              @include('orders.command')
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      @include('partials.import_modal', ['name'=>'Items', 'modalId'=>'itemImportModal', 'import_route'=>'items.import'])
    </section>
    <!-- /.content -->
  </div>
@endsection