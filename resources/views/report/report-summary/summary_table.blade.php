<div id="report_summary_table">
<table id="myTable5" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="90">{{__('Date')}}</th>
            <th>{{__('Solde précédent')}}</th>
            <th>{{__('Ventes')}}</th>
            <th>{{__('Profit de vente')}}</th>
            <th>{{__('Dépenses')}}</th>
            <th>{{__('Recettes')}}</th>
            <th>{{__('Recettes Paiements')}}</th>
            <th>{{__('Coût total')}}</th>
            <th>{{__('Brut')}}</th>
            <th>{{__('Solde net')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($dailyreports as $value)
        <tr>
          <td>{{ date('d M Y', strtotime($value->created_at)) }}</td>
          <td>{{ currencySymbol().$value->prev_balance }}</td>
          <td>{{ currencySymbol().$value->total_sales }}</td>
          <td>{{currencySymbol().$value->total_dues}}</td>
          <td>{{currencySymbol().$value->sale_profit}}</td>
          <td>{{currencySymbol().$value->total_expense}}</td>
          <td>{{currencySymbol().$value->total_receivings}}</td>
          <td>{{currencySymbol().$value->total_receivings_payment}}</td>
          <td>{{currencySymbol().$value->total_costing}}</td>
          <td>{{currencySymbol().$value->total_profit}}</td>
          <td>{{currencySymbol().$value->net_balance}}</td>
          <td class="item_btn_group">
            @php $actions = [
                  ['url'=>route('dailyreport.create').'?date='.$value->created_at->format('Y-m-d'), 'name'=>'Voir Rapport', 'icon'=>'list'], 
                  ['url'=>route('dailyreport.edit', $value->created_at->format('Y-m-d')), 'name'=>trans('item.edit'), 'icon'=>'pencil'],
                  ['url'=>'reports/dailyreport/'.$value->id,'name'=>'delete']];
            @endphp
            @include('partials.actions', ['actions'=>$actions])
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @include('partials.pagination', ['items'=>$dailyreports, 'index_route'=>route('dailyreport.index')])
</div>