<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <a href="{{ route('frontend.index') }}" class="navbar-brand">{{ app_name() }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        
            {{ html()->form('GET', route('frontend.record.symptom.index'))->class('form-inline input-group')->open() }}
        
                <select name="symptoms[]" id="symptoms" class="selectpicker form-control" style="width:25%;"multiple="multiple"  data-live-search="true">      
                    <option value="" class="float-right" selected>Search for symptoms</option>
                </select> 
                <div class="input-group-prepend">
                    
                    <div class="dropdown-menu">

                    </div>
                    <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>  
                </div> 
            {{ html()->form()->close() }}

        <ul class="navbar-nav"> 

<!-- Search form -->

            @auth
            

            @endauth

            <li class="nav-item"><a href="{{route('frontend.nearest')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.nearest')) }}">Nearest</a></li> 
            <li class="nav-item"><a href="{{route('frontend.record.branch.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.record.branch.index')) }}">Branches</a></li>  
            <li class="nav-item"><a href="{{route('frontend.production.product.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.production.product.index')) }}">Products</a></li>
            @auth

            <li class="nav-item"><a href="{{route('frontend.transaction.transaction.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.transaction.transaction.index')) }}">Transactions</a></li> 
            <li class="nav-item">
                <a href="{{route('frontend.transaction.cart.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.transaction.reservation.index')) }} {!! session()->has('cart') ? ( isset(session()->get('cart')["reservations"]) || isset(session()->get('cart')["products"]) ? 'text-success' : ' text-warning') : 'text-warning' !!}">
                Cart 
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


@push('after-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        
        $('#symptoms').selectpicker();
        $.ajax({
            url : "{{ route('frontend.record.symptom.all') }}" ,
            type : "GET",
            dataType : 'json',
            success : function(response){
                if(response.success){
                    $("#symptoms").html(response.html);  
                    $('.selectpicker').selectpicker('refresh');  
                }  
            },
            error : function(response){
                console.log(response);
            }
        })
        $('#symptoms').selectpicker();
    });
</script>
@endpush

