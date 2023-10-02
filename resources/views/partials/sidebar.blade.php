@if (Auth::check())
<aside class="main-sidebar">
	<section class="sidebar">
	
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      
        <li class=""><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>{{trans('menu.dashboard')}}</span></a></li>

        @if(auth()->user()->checkSpPermission('planning.index'))
        <li class="{{(Request::is('planning')) ? 'active' : ''}} "><a href="{{ url('/planning/all') }}"><i class="fa fa-truck"></i> <span>{{('Livraison')}}</span></a></li>
        @endif

        @if(auth()->user()->checkSpPermission('planning.index'))
        <li class="{{(Request::is('Orders')) ? 'active' : ''}} "><a href="{{ url('/admin/orders') }}"><i class="fa fa-check"></i> <span>{{('Commandes')}}</span></a></li>
        @endif

      @if(auth()->user()->checkSpPermission('customers.index'))
        <li class="{{(Request::is('customers')) ? 'active' : ''}} "><a href="{{ url('/customers') }}"><i class="fa fa-users"></i> <span>{{trans('menu.customers')}}</span></a></li>
      @endif

      @if(auth()->user()->checkSpPermission('items.index'))
    <li class="{{(Request::is('items')) ? 'active' : ''}} "><a href="{{ url('/items') }}"><i class="fa fa-bars"></i> <span>Stocks</span></a></li>
      @endif
<!-- <li><a href="{{ url('/item-kits') }}">{{trans('menu.item_kits')}}</a></li> -->
      @if(auth()->user()->checkSpPermission('suppliers.index'))
        <li class="{{(Request::is('suppliers')) ? 'active' : ''}} "><a href="{{ url('/suppliers') }}"><i class="fa fa-cubes"></i> <span>{{trans('menu.suppliers')}}</span></a></li>
      @endif

      @if(auth()->user()->checkSpPermission('receivings.index') || auth()->user()->checkSpPermission('receivings.create'))
      <li class="{{(Request::is('receivings') || Request::is('receivings/create')) ? 'active' : ''}} treeview">
          <a href="#"><i class="fa fa-sitemap"></i> <span>{{__('Receptions')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
              @if(auth()->user()->checkSpPermission('receivings.index'))
              <li class="{{(Request::is('receivings')) ? 'active' : ''}} ">
                  <a href="{{ url('/receivings') }}"><i class="fa fa-circle-o"></i> <span>{{__('Liste de reception')}}</span></a>
              </li>
              @endif
              @if(auth()->user()->checkSpPermission('receivings.create'))
                <li class="{{(Request::is('receivings/create')) ? 'active' : ''}} "><a href="{{ url('/receivings/create') }}"><i class="fa fa-circle-o"></i> <span>{{__('Créer un bon')}}</span></a></li>
              @endif
          </ul>
</li>
        
      @endif
      @if(auth()->user()->checkSpPermission('sales.index') || auth()->user()->checkSpPermission('sales.create'))
      <li class="{{(Request::is('sales') || Request::is('sales/create')) ? 'active' : ''}} treeview">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>{{__('Ventes')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
              @if(auth()->user()->checkSpPermission('sales.index'))
              <li class="{{(Request::is('sales')) ? 'active' : ''}} ">
                  <a href="{{ url('/sales') }}"><i class="fa fa-circle-o"></i> <span>{{__('Liste des ventes')}}</span></a>
              </li>
              @endif
              @if(auth()->user()->checkSpPermission('sales.create'))
              <li class="{{(Request::is('sales/create')) ? 'active' : ''}}">
                  <a href="{{ url('sales/create') }}"><i class="fa fa-circle-o"></i> {{__('Ajouter une facture')}}</a>
              </li>
              @endif
          </ul>
      </li>
      @endif
      

      @if(auth()->user()->checkSpPermission('accounts.index') || auth()->user()->checkSpPermission('transactions.index'))
      <li class="{{(Request::is('accounts') || Request::is('transactions')) ? 'active' : ''}} treeview">
          <a href="#"><i class="fa fa-university"></i> <span>{{trans('menu.accounts')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
              @if(auth()->user()->checkSpPermission('accounts.index'))
              <li class="{{(Request::is('accounts')) ? 'active' : ''}} ">
                  <a href="{{ url('/accounts') }}"><i class="fa fa-circle-o"></i> <span>{{trans('menu.accounts')}}</span></a>
              </li>
              @endif
              @if(auth()->user()->checkSpPermission('transactions.index'))
              <li class="{{(Request::is('transactions')) ? 'active' : ''}}">
                  <a href="{{ url('transactions') }}"><i class="fa fa-circle-o"></i> Transactions</a>
              </li>
              @endif
          </ul>
      </li>
      @endif

    @if(auth()->user()->checkSpPermission('dailyreport.index') || auth()->user()->checkSpPermission('dailyreport.create') || auth()->user()->checkSpPermission('report.sale') || auth()->user()->checkSpPermission('report.receving') || auth()->user()->checkSpPermission('report.stock'))
    <li class="{{(Request::is('reports/receivings') || Request::is('reports/sales') || Request::is('reports/dailyreport/create')) ? 'active' : ''}} treeview">
      <a href="#">
        <i class="fa fa-money"></i> <span>{{trans('menu.reports')}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
      </a>
      <ul class="treeview-menu">
        @if(auth()->user()->checkSpPermission('report.receiving'))
        <li class="{{(Request::is('reports/receivings')) ? 'active' : ''}}"><a href="{{ url('/reports/receivings') }}"><i class="fa fa-circle-o"></i> {{__('Rapport des dépense')}}</a></li>
        @endif
        @if(auth()->user()->checkSpPermission('report.sale'))
        <li class="{{(Request::is('reports/sales')) ? 'active' : ''}}"><a href="{{ url('/reports/sales') }}"><i class="fa fa-circle-o"></i> {{__('Rapport d\'activité')}}</a></li>
        @endif
        @if(auth()->user()->checkSpPermission('report.stock'))
        <li class="{{(Request::is('reports/stocks')) ? 'active' : ''}}"><a href="{{ route('report.stock') }}"><i class="fa fa-circle-o"></i> {{__('Rapport de stock')}}</a></li>
        @endif
        @if(auth()->user()->checkSpPermission('dailyreport.create'))
        <li class="{{(Request::is('reports/dailyreport/create')) ? 'active' : ''}}"><a href="{{ url('/reports/dailyreport/create') }}"><i class="fa fa-circle-o"></i> {{trans('menu.daily_report')}}</a></li>
        @endif
        @if(auth()->user()->checkSpPermission('dailyreport.index'))
        <li class="{{(Request::is('reports/dailyreport')) ? 'active' : ''}}"><a href="{{route('dailyreport.index')}}"><i class="fa fa-circle-o" aria-hidden="true"></i> {{__('Résumé du rapport')}}</a></li>
        @endif
      </ul>
    </li>
    @endif

      @if(auth()->user()->checkSpPermission('employees.index'))
        <li class="{{(Request::is('employees')) ? 'active' : ''}}"><a href="{{ url('/employees') }}"><i class="fa fa-user"></i> <span>{{trans('menu.employees')}}</span></a></li>
      @endif

      

      @if(Auth::user()->checkSpPermission('flexiblepossetting.create'))
        <li class="{{(Request::is('flexiblepossetting/create')) ? 'active' : ''}}"><a href="{{ route('flexiblepossetting.create') }}"><i class="fa fa-gear"></i> <span>{{__('Settings')}}</span></a></li>
      @endif
    </ul>
    
</section>
</aside>
@endif