@extends('layouts.customer_layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
      <h1>{{__('Historique de Paiements')}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-body">
              @include('payment.history')
			      </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row
    
    -->
    </section>
    <!-- /.content -->
</div>

</div>
@endsection



