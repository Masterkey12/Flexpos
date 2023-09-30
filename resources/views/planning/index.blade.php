@extends('layouts.admin_dynamic')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
      <h1>{{__('Planning de Livraison')}}


        <a class="btn btn-small btn-primary pull-right left-margin-10" href="#PlanningForm" data-toggle="modal"><i class="fa fa-plus"></i> {{trans('Plannifier la Livraison')}}</a>
        <a class="btn btn-small btn-primary pull-right left-margin-10" href="{{ route('livraisons.afficher') }}" data-toggle="modal"> {{trans('Afficher les livraisons')}}</a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
              @include('partials.filters', ['filter_route'=>url('/planning/all'), 'filter_id'=>'planningFilter'])
            </div>
            <div class="box-body">
              @include('planning.livraisons')
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

<div class="modal fade sub-modal" id="PlanningForm">
  <div class="modal-dialog modal-lg">
      @include('planning.create', ['planning'=>''])
  </div>
</div>
@endsection
