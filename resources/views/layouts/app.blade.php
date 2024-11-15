<!DOCTYPE html>
<html lang="en">
    
    @include('layouts.head')
    @include('layouts.style')

    <body data-sidebar="dark">
        <div id="layout-wrapper">
            @include('layouts.top_nav_item')
            @include('layouts.headers')

            @yield('content')
            
            @include('layouts.footer')
            @include('layouts.script')
        </div>
    </body>
</html>