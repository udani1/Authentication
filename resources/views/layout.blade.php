<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>

        @include('partials.styles')
    </head>
    
    <body class="sb-nav-fixed">
        {{-- Top Bar --}}
        @include('partials.topbar')
        <div id="layoutSidenav">
            {{-- Side Bar --}}
            @include('partials.sidebar')
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        {{-- Page content --}}
                        @yield('content')
                        
                    </div>
                </main>
                {{-- Footer --}}
                @include('partials.footer')
            </div>
        </div>
        {{-- Scripts --}}
        @include('partials.script')
    </body>
</html>