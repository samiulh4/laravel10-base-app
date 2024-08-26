<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Laravel Base App | Admin</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/admin/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    @include('Admin::partials.font-icon')
    @include('Admin::partials.style')
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
                    @include('Admin::partials.page-header')
                    @include('Admin::partials.dashboard-card')
                    <div class="row">
                        <div class="col-md-8">
                            @include('Admin::partials.dashboard-user-statistic')
                        </div>
                        <div class="col-md-4">
                            @include('Admin::partials.dashboard-daily-sale')
                            @include('Admin::partials.dashboard-user-online')
                        </div>
                    </div>
                    @include('Admin::partials.dashboard-user-geolocation')
                    <div class="row">
                        <div class="col-md-4">
                            @include('Admin::partials.dashboard-new-customer')
                        </div>
                        <div class="col-md-8">
                            @include('Admin::partials.dashboard-transaction-history')
                        </div>
                    </div>
                </div><!--./page-inner-->
            </div><!--./container-->
            @include('Admin::partials.footer')
        </div><!--./main-panel-->
        @include('Admin::partials.setting')
    </div><!--./wrapper-->
    @include('Admin::partials.script')
</body>

</html>