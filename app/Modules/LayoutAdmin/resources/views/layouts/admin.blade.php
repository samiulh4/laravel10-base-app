<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Laravel Base App | Admin')</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/admin/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    @include('LayoutAdmin::partials.font-icon')
    @include('LayoutAdmin::partials.style')
    @stack('css')
    @yield('styles')
</head>

<body>
    <div class="wrapper">
        @include('LayoutAdmin::partials.sidebar')
        <div class="main-panel">
            <div class="main-header">
                @include('LayoutAdmin::partials.header-logo')
                @include('LayoutAdmin::partials.navbar')
            </div>
            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div><!--./page-inner-->
            </div><!--./container-->
            @include('LayoutAdmin::partials.footer')
        </div><!--./main-panel-->
        @include('LayoutAdmin::partials.setting')
    </div><!--./wrapper-->
    @include('LayoutAdmin::partials.script')
    @stack('js')
    @yield('scripts')
</body>

</html>