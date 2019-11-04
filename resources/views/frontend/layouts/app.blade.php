<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'A Reservation and Ordering System with Recommendation Analysis')">
        <meta name="author" content="@yield('meta_author', 'JPD')">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

        @stack('after-styles')
    </head>
    <body>
        @include('includes.partials.demo')

        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')
        
            @if( !Active::checkRoute('frontend.index') && !Active::checkRoute('frontend.user.dashboard') && (Active::checkUriPattern('branches/') ) )
                <div class="container-fluid">
                    @include('includes.partials.messages')
                    @yield('content')
                </div><!-- container -->
            @else
                @include('includes.partials.messages')
                @yield('content')
            @endif  
        </div><!-- #app -->

        <div id="demo"></div>
        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}
        <script>
                var x = document.getElementById("demo");
                function getLocation() {
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                  } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                  }
                }
                
                function showPosition(position) {
                    $.ajax({
                        url : '{{ route("frontend.location.set") }}' + "?lat="+position.coords.latitude+ "&lng=" +position.coords.longitude,
                        method : 'get',
                        success:function(response){
                            console.log(response);
                        },
                        error:function(response){
                            console.log(response);
                        }
                    })
                //   x.innerHTML = "Latitude: " + position.coords.latitude +
                //   "<br>Longitude: " + position.coords.longitude;
                }
                getLocation();
        </script>
        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
