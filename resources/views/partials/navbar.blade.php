<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        @if(!empty(setting('fevicon_path')))
        <img src="{{asset(\Storage::url(setting('fevicon_path')))}}" alt="" height="40px" width="40px">
        @else
        <img src="{{asset('images/fevicon.png')}}" alt="" height="40px" width="40px">
        @endif

      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
          @if(!empty(setting('logo_path')))
        <img src="{{asset(\Storage::url(setting('logo_path')))}}" alt="" height="40px">
        @else
        <img src="{{asset('images/fpos.png')}}" alt="" height="40px">
        @endif        
        </span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

  
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          @if (Auth::guest())
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-primery">{{__('Deconnexion')}}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
             @else
        @if(auth()->user()->checkSpPermission('sales.create'))
          <li class="{{(Request::is('sales/create')) ? 'active' : ''}}">
              <a href="{{ url('sales/create') }}"><strong><i class="fa fa-file-text-o"></i> </strong></a>
          </li>
        @endif
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ !empty(Auth::user()->avatar) ? Auth::user()->fileUrl('avatar') : asset('dist/img/avatar.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ !empty(Auth::user()->avatar) ? Auth::user()->fileUrl('avatar') : asset('dist/img/avatar.png')}}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }}
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    
                    <a href="{{route('flexiblepossetting.create')}}">{{__('Parametres')}}</a>
                  </div>
                  <div class="col-xs-6 text-center">
                   
                    <a href="{{route('permissions.list')}}">{{__('Permissions')}}</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a data-replace='#editEmployee' href="#editEmployeeModal" data-ajax-url="{{route('employees.edit', Auth::user()->id)}}" data-toggle="modal" class="btn btn-info">{{__('Profil')}}</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-warning">{{__('Deconnexion')}}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </nav>
  </header>
  @include('partials.buy_now_text')
  <div class="modal fade sub-modal" id="editEmployeeModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="editEmployee"></div>
    </div>
  </div>