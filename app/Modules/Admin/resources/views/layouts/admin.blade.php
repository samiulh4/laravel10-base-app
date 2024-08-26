<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Laravel Base App | Admin')</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/admin/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    @include('Admin::partials.font-icon')
    @include('Admin::partials.style')
    @yield('styles')
</head>

<body>
    <div class="wrapper">
        @include('Admin::partials.sidebar')
        <div class="main-panel">
            <div class="main-header">
                @include('Admin::partials.header-logo')
                @include('Admin::partials.navbar')
            </div>
            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div><!--./page-inner-->
            </div><!--./container-->
            @include('Admin::partials.footer')
        </div><!--./main-panel-->
        @include('Admin::partials.setting')
    </div><!--./wrapper-->
    @include('Admin::partials.script')
    @yield('scripts')
</body>

</html>