<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Laravel Base App | Authentication</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{ asset('assets/authentication/img/mdb-favicon.ico') }}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/common/plugins/fontawesome/css/all.min.css') }}" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('assets/authentication/css/bootstrap-login-form.min.css') }}" />
</head>

<body>
    <!-- Start your project here-->

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
    <section class="vh-100">
        <div class="container-fluid h-custom">
        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{ asset('assets/authentication/img/draw2.webp') }}" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ url('/sign-up') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Sign up with</p>
                            <button type="button" class="btn btn-success btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-success btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-success btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form1Example3" class="form-control form-control-lg"
                                placeholder="Enter name" name="name" />
                            <label class="form-label" for="form1Example3">Full name</label>
                        </div>

                        <!-- Gender select box -->
                        <div class="mb-4">
                            {{ html()->select('gender', [
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other'
                            ], null)
                                ->id('gender')
                                ->class(['form-select', 'form-select-lg'])
                                ->placeholder('Select Gender')
                                ->required()    
                            }}
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form2Example3" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" name="email" />
                            <label class="form-label" for="form2Example3">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password" name="password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <!-- File input with image preview -->
                        <div class="form-outline mb-4">
                            <input type="file" id="avatar" class="form-control form-control-lg" name="avatar"
                                onchange="previewImage(event)" />
                            <!-- <label class="form-label" for="formFile">Upload file</label> -->
                        </div>
                        <div class="mb-4">
                            <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid"
                                style="display:none; max-width: 100%; height: 100px;" />
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-lg btn-success"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Sing Up</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="#!"
                                    class="link-success">Singn In</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-success">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('assets/authentication/js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript">
        function previewImage(event) {
            var file = event.target.files[0];

            // Validate file type
            var allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            if (!allowedTypes.includes(file.type)) {
                alert('Please upload an image file (PNG, JPG, or JPEG).');
                event.target.value = ''; // Clear the input
                return;
            }

            // Validate file size (3 MB = 3 * 1024 * 1024 bytes)
            var maxSize = 3 * 1024 * 1024; // 3 MB
            if (file.size > maxSize) {
                alert('File size exceeds 3 MB. Please upload a smaller file.');
                event.target.value = ''; // Clear the input
                return;
            }

            // If validation passes, display the image preview
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }// end -:- previewImage()

    </script>
</body>

</html>