<div id="accountTable">
    <table id="myTableAccount" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{{__('Nom')}}</th>
            <th>{{__('Compani')}}</th>
            <th class="hidden-xs">{{__('Branche')}}</th>
            <th>{{__('Balance')}}</th>
            <th class="hidden-xs">{{__('Created By')}}</th>
            <th class="text-center">{{__('Action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->company }}</td>
                <td class="hidden-xs">{{ $value->branch}}</td>
                <td>{{$value->balance}}</td>
                <td class="hidden-xs">{{$value->user->name}}</td>
                <td class="item_btn_group">
                    @php
                    $actions = [
                    ['data-replace'=>'#editAccount','url'=>'#editAccountModal','ajax-url'=>url('accounts/'.$value->id.'/edit'), 'name'=>trans('item.edit'), 'icon'=>'pencil'],
                    ];
                    @endphp
                    @include('partials.actions', ['actions'=>$actions])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$accounts, 'index_route'=>route('accounts.index')])
</div>