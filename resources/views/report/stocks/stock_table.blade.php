<div id="list_stock_report">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="hidden-xs">{{__('UPC')}}</th>
            <th>{{__('Nom de l\'article')}}</th>
            <th>{{__('Stock initial')}}</th>
            <th>{{__('Quantité Sortie')}}</th>
            <th>{{__('Quantité Entrée')}}</th>
            <th>{{__('Solde')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td class="hidden-xs">{{$item->upc_ean_isbn}}</td>
                <td>{{$item->item_name}}</td>
                <td>{{ !empty($stock_reports[$item->id]['in']) ? $stock_reports[$item->id]['in'] : 0 }}</td>
                <td>{{ !empty($stock_reports[$item->id]['out']) ? $stock_reports[$item->id]['out'] : 0 }}</td>
                <td>
                    @if(isset($item->receivingItem))
                        @php
                            $receivingQuantity = 0;
                        @endphp
                        @foreach ($item->receivingItem as $receivingItem)
                            @php
                                $receivingQuantity += $receivingItem->quantity;
                            @endphp
                        @endforeach
                        {{ $receivingQuantity }}
                    @else
                        0
                    @endif
                </td>
                <td>
                    {{ 
                        (!empty($stock_reports[$item->id]['in']) ? $stock_reports[$item->id]['in'] : 0) - 
                        (!empty($stock_reports[$item->id]['out']) ? $stock_reports[$item->id]['out'] : 0) 
                    }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('partials.pagination', ['items'=>$items, 'index_route'=>route('report.stock')])
</div>