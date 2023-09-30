  <div id="livraisonTable">
    <table id="myTableLivraison" class="table table-bordered table-striped">
    <thead>
            <tr>
                <th class="hidden-xs">{{__('Date de Livraison')}}</th>
                <th class="hidden-xs">{{__('Adresse de Livraison')}}</th>
                <th class="hidden-xs">{{('Commandes')}}</th>
                <th class="text-center">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($livraisons as $livraison)
            <tr>
                <td class="hidden-xs">{{ $livraison->date_livraison }}</td>
                <td>{{$livraison->adresse_livraison}}</td>
                <td>{{$livraison->sale_id }}</td>
                <td class="item_btn_group">
                    @php
                    $actions = [
                    ['data-replace'=>'#editItem','url'=>'#editItemModal','ajax-url'=>url('livraisons/'.$livraison->id. '/edit'), 'name'=>trans('item.edit'), 'icon'=>'pencil'],
                    ['url'=>'livraisons/'. $livraison->id, 'name'=>'delete']];
                    @endphp
                    @include('partials.actions', ['actions'=>$actions])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</div>