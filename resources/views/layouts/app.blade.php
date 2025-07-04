<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solver</title>

    <link href="{{ asset('/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- Font Awesome Free CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet" />

    <link rel="shortcut icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwLv8xBuqypzluFLuULfx7aDVgvza_FzeKKw&s" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    {{--
    <link rel="stylesheet" href="{{ asset('assets/css/breadcrum.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    @vite('resources/js/app.js')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper ">
        @include('layouts.header')
        <nav class="page-sidebar" id="sidebar">
            @include('layouts.sidebar')
        </nav>
        <div class="content-wrapper">
            <div class="page-content fade-in-up">
                @yield('main_container')
            </div>
            @include('layouts.footer')
        </div>

    </div>
    <script src="{{ asset('/assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="{{ asset('/assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('/assets/vendors/chart.js/dist/Chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}"
        type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('/assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>

    {{-- mobilemenu-sidebar --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="{{ asset('asset/js/mobilemenu-sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/assets/js/statecity.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Attach a click event listener to all delete buttons
            document.querySelectorAll('.delete-btn').forEach(function (button) {
                button.addEventListener('click', function (event) {
                    // alert("clicked");
                    event.preventDefault(); // Prevent the default link behavior

                    // Use SweetAlert2 to show a confirmation dialog
                    Swal.fire({
                        title: 'Are you sure you want to proceed?',
                        text: 'Once you delete this, it will be permanently removed and cannot be recovered.!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If confirmed, redirect to the delete URL
                            window.location.href = button.getAttribute('href');
                        }
                    });
                });
            });
        });

    </script>

    @if (session('sweet_failed'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error'
                    , title: 'Oops...'
                    , text: "{{ session('sweet_failed') }}"
                    , showConfirmButton: true
                    , confirmButtonText: 'OK',
                    // timer: 2000 // Close alert after 2 seconds
                });
            });

        </script>
    @endif
    @if (session('sweet_info'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'info'
                    , title: 'Yeah...'
                    , text: "{{ session('sweet_info') }}"
                    , showConfirmButton: true
                    , confirmButtonText: 'OK',
                    // timer: 2000 // Close alert after 2 seconds
                });
            });

        </script>
    @endif
    @if (session('sweet_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success'
                    , title: 'Welcome'
                    , text: "{{ session('sweet_success') }}"
                    , showConfirmButton: true
                    , confirmButtonText: 'OK',
                    // timer: 2000 // Close alert after 2 seconds
                });
            });

        </script>
    @endif
    @if (session('sweet_warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'warning'
                    , title: 'Sorry'
                    , text: "{{ session('sweet_warning') }}"
                    , showConfirmButton: true
                    , confirmButtonText: 'OK',
                    // timer: 2000 // Close alert after 2 seconds
                });
            });

        </script>
    @endif


    <script>
        $(document).ready(function () {
            // Toastr Options (optional)
            toastr.options = {
                "progressBar": true,
            };
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @elseif (session('error'))
                toastr.error("{{ session('error') }}");
            @elseif (session('failed'))
                toastr.error("{{ session('failed') }}");
            @elseif (session('warning'))
                toastr.warning("{{ session('warning') }}");
            @elseif (session('info'))
                toastr.info("{{ session('info') }}");
            @endif
        });
    </script>

</body>

</html>
