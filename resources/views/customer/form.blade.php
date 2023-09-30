@if(!empty($customer))
    <div class="modal-content" id="editCustomer">
    {{ Form::model($customer, array('route' => array('customers.update', $customer->id), 'method' => 'PUT', 'files' => true)) }}
@else
    <div class="modal-content" id="addCustomer">
        {{ Form::open(array('url' => 'customers', 'files' => true,)) }}
@endif
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">@if(!empty($customer)) {{__('Modifier Client')}} @else {{__('Ajouter un client')}}@endif</h4>
    </div>
    <div class="modal-body" >
       <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    {{ Form::label('name', trans('customer.name') .' *',['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                        {{ Form::text('name', null, array('class' => 'form-control', 'required')) }}
                    </div>
                </div>
                <div class="form-group row">
                {{ Form::label('email', trans('customer.email'),['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::text('email', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group row">
                {{ Form::label('phone_number', __('Telephone'), ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                        {{ Form::text('phone_number', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('address', trans('customer.address'),['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                        {{ Form::text('address', null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('city', trans('customer.city'),['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('city', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    {{ Form::label('state', trans('customer.state'),['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                        {{ Form::text('state', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('zip', trans('customer.zip'),['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('zip', null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('types', ('Types de client'), ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        <select autocomplete ="off" class="form-control select2" name="types" >
                        <option value="Interne">Interne</option>
                        <option value="Externe">Externe</option>
                        </select>
                    </div>
                </div>

                    <div class="form-group row">
            {{ Form::label('password', ('Mot de Passe'), ['class'=>'col-sm-3 text-right']) }}
        <div class="col-sm-9"> 
            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        @if(!empty($page))
        <input type="hidden" name="page" value="{{$page}}" />
        @endif
        {{ Form::submit(trans('customer.submit'), array('class' => 'btn btn-success')) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Fermer')}}</button>
    </div>
    {{ Form::close() }}
</div>