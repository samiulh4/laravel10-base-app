<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laravel Base App | Web</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/web/img/favicon.jpg') }}"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    @include('partials.web.style')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    @include('partials.web.topbar')

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        @include('partials.web.navbar')
        @include('partials.web.carousel')
    </div>
    <!-- Navbar & Hero End -->

    @include('partials.web.about')
    @include('partials.web.service')
    @include('partials.web.feature')
    @include('partials.web.offer')
    @include('partials.web.blog')
    @include('partials.web.faq')
    @include('partials.web.team')
    @include('partials.web.testimonial')
    @include('partials.web.footer')
    @include('partials.web.copyright')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    @include('partials.web.script')
</body>

</html>