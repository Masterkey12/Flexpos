<!-- Sidebar -->
<aside class="main-sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
    </div>
    <!-- Sidebar menu -->
    <ul class="sidebar-menu" data-widget="tree">
        <!-- Ajoutez ici les éléments de menu de la barre latérale -->
        <li class="header">MENU</li>
        <li><a href="{{ url('/products') }}"><i class="fa fa-list"></i> <span>Produits</span></a></li>
        <li><a href="{{ route('payment.history') }}"><i class="fa fa-money"></i> <span>Historiques</span></a></li>
        
    </ul>
</aside>
