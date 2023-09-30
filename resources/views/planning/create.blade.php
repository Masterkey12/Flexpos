<div class="modal-content" id="PlanningForm">
        {{ Form::open(['route' => 'planifier-livraison', 'method' => 'post']) }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('Ajouter une livraison')}}</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              {{ Form::label('date_livraison', __('Date de Livraison')) }}
              {{ Form::date('date_livraison', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              {{ Form::label('adresse_livraison', __('Adresse de Livraison')) }}
              {{ Form::text('adresse_livraison', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('motif_de_livraison', ('Motif de livraison'), ['class'=>'col-sm-3 text-left']) }}
                {{ Form::textarea('motif_de_livraison', null, ['class' => 'form-control', 'rows'=>4]) }}
                </div
            <div class="form-group">
            {{ Form::label('sale_id', ('Numero de Commandes'), ['class' => 'col-sm-12 ']) }}
                <select autocomplete="off" class="form-control select2" name="sale_id">
                    <option value="">Selectionner le numero de Commande</option>
                    @foreach($sales as $sale)
                <option value="{{ $sale->id }}">{{ $sale->id }} - {{ $sale->nom_client }}</option>
                @endforeach
                </select>
            </div>
          </div>
          <div class="modal-footer">
              {{ Form::submit(trans('Ajouter'), array('class' => 'btn btn-success')) }}
            <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
          </div>
          {{ Form::close() }}
</div>