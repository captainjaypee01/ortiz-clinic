<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <a href="{{ route('frontend.index') }}" class="navbar-brand">{{ app_name() }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav"> 

            @auth
            

            @endauth

            <li class="nav-item"><a href="{{route('frontend.record.branch.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.record.branch.index')) }}">Branches</a></li>
            {{-- <li class="nav-item"><a href="{{route('frontend.record.service.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.record.service.index')) }}">Services</a></li> --}}
            <li class="nav-item"><a href="{{route('frontend.production.product.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.production.product.index')) }}">Products</a></li>
            @auth
                
            <li class="nav-item"><a href="{{route('frontend.transaction.order.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.transaction.order.index')) }}">Orders</a></li>
            <li class="nav-item"><a href="{{route('frontend.transaction.reservation.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.transaction.reservation.index')) }}">Reservations</a></li>
            <li class="nav-item">
                <a href="{{route('frontend.transaction.cart.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.transaction.reservation.index')) }}">
                Cart <span class="badge">
                    {!! session()->has('cart') ? ( isset(session()->get('cart')["reservations"]) || isset(session()->get('cart')["products"]) ? '<i class="text-success fa fa-check"></i>' : '<i class="text-danger fa fa-trash"></i>') : '<i class="text-danger fa fa-trash"></i>' !!}
                </span>
                </a>
            </li>
            
            @endauth
            @guest

                <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>

                @if(config('access.registration'))
                    <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        @can('view backend')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                        @endcan

                        <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                        <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                    </div>
                </li>
            @endguest
            
 
        </ul>
    </div>
</nav>
