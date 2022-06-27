<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>


    <!-- Fonts -->
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    {{-- <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />
    {{-- owl carousel --}}
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&family=Work+Sans:ital,wght@0,100;0,400;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&family=Work+Sans:ital,wght@0,100;0,400;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">


</head>

<body class="">

    {{-- @include('layouts.inc.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.inc.adminnav') --}}

    @include('layouts.inc.frontnavbar')

    <div class="container-fluid py-5 mt-5">
        @yield('content')

        {{-- @include('layouts.inc.adminfooter') --}}
        <div class="mt-5">
            <footer class="text-center text-lg-start text-white pt-5 pb-4 " style="background-color: #0d6efd">
                <div class="container text-center text-md-left bottom">
                    <div class="row text-center text-md-left">
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Blue Moon</h5>
                            <p>
                                Here you can use rows and columns to organize your footer content.
                                Lorem ipsum dolor sit amet,
                                ital consectetur lorem ipsum dolor sit amet adipisicing elit.
                            </p>

                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
                            <p>
                                <a href="#" class="text-white" style="text-decoration: none;"> Pricing</a>
                            </p>
                            <p>
                                <a href="#" class="text-white" style="text-decoration: none;"> Features</a>
                            </p>
                            <p>
                                <a href="#" class="text-white" style="text-decoration: none;"> Suggestion</a>
                            </p>
                            <p>
                                <a href="#" class="text-white" style="text-decoration: none;"> Shipping Rates</a>
                            </p>

                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Need Help </h5>
                            <p>
                                <a href="#" class="text-white" style="text-decoration: none;"> Your Account</a>

                            </p>
                            <p>
                                <a href="#" class="text-white" style="text-decoration: none;"> Connect Us</a>
                            </p>
                            <p>
                                <a href="#" class="text-white" style="text-decoration: none;"> About Us</a>
                            </p>
                            <p>
                                <a href="#" class="text-white" style="text-decoration: none;"> Help</a>
                            </p>

                        </div>

                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                            <p>
                                <i class="fas fa-home mr-3"></i>Alexandria, elshatbi
                            </p>
                            <p>
                                <i class="fas fa-envelope mr-3"></i> team98@gmail.com
                            </p>
                            <p>
                                <i class="fas fa-phone mr-3"></i> +92 2543801672
                            </p>
                            <p>
                                <i class="fas fa-print mr-3"></i> +01 335 633 77
                            </p>
                        </div>

                    </div>
                    <hr class="mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-lg-8">
                            <p> Copyright ©2022 All rights reserved by:
                                <a href="about2.html" style="text-decoration: none">
                                    <strong class="text-warning">Blue Team</strong>
                                </a>
                            </p>
                        </div>

                        <div class="col-md-5 col-lg-4">
                            <div class="text-center text-md-right">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/" class="btn-floating btn-sm text-white"
                                            style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a href="https://twitter.com/i/flow/login"
                                            class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a href="https://www.google.com/intl/ar/gmail/about/"
                                            class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
                                                class="fab
                                             fa-google-plus"></i></a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a href="https://www.instagram.com/" class="btn-floating btn-sm text-white"
                                            style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a href="https://www.youtube.com/" class="btn-floating btn-sm text-white"
                                            style="font-size: 23px;"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>


            </footer>
        </div>
    </div>
    {{-- </main> --}}

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        var availableTags = [];


        $.ajax({
            method: "GET",
        url: "{{ route('search.add') }}",
            success: function(response) {
                // console.log(response);
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags)
{
        $("#search_product").autocomplete({
            source: availableTags
        });
    }
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
    @yield('scripts')
</body>

</html>
