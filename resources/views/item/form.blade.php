@if(!empty($item))
<div class="modal-content" id="editItem">
        {{ Form::model($item, array('route' => array('items.update', $item->id), 'method' => 'PUT', 'files' => true)) }}
@else
<div class="modal-content" id="addItem">
    {{ Form::open(['url' => 'items', 'files' => true]) }}
@endif
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">@if(!empty($item)) {{__('Edit Item')}} @else {{__('Ajouter un article')}}@endif</h4>
    </div>
    <div class="modal-body" >
        <div class="row">
            <div class="col-md-6">

                @include('item.add_category_btn')

                <div class="form-group row">
                {{ Form::label('upc_ean_isbn', __('UDS').' *', ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('upc_ean_isbn',null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                {{ Form::label('item_name', trans('item.item_name').' *', ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                    {{ Form::text('item_name', null, ['class' => 'form-control','required']) }}
                    </div>
                </div>
                <div class="form-group row">
                {{ Form::label('description', trans('item.description'), ['class'=>'col-sm-3 text-right']) }}
                <div class="col-sm-9"> 
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows'=>4]) }}
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    {{ Form::label('cost_price', trans('item.cost_price').' *', ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('cost_price', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('selling_price', __('Prix de vente').' *', ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('selling_price', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="form-group row" id="quantity">
                    {{ Form::label('quantity', trans('item.quantity'), ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('quantity', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row" id="stock_limit">
                    {{ Form::label('stock_limit', trans('Stock Limite'), ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('tock_limit', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        {{ Form::submit(trans('item.submit'), ['class' => 'btn btn-success']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
    </div>    
    {{ Form::close() }}
</div>