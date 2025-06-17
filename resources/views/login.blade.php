<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Solver</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('assets/css/pages/auth-light.css') }}" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content mt-5">
        <form id="login-form " action="{{ route('post.login') }}" method="post">
            @csrf
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <label for="role">Select Role</label>
                <select class="form-control" id="role" name="role">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                    {{-- <option value="admin_login">Admin Login </option>
                    <option value="department_login">Department Login </option>
                    <option value="donor_login">Doner / CSR Partner login/ </option>
                    <option value="partner_organisaction_login">Partner Organisation login </option>
                    <option value="state_coordinator_login">State coordinator login </option>
                    <option value="dist_coordinator_login">Dist. coordinator login </option>
                    <option value="community_facilitator_login">Community facilitator login </option> --}}
                </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="text" name="username" placeholder="Username" autocomplete="off"
                        value="{{ old('username') }}">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password"
                        value="{{ old('password') }}">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox">
                    <span class="input-span"></span>Remember me</label>
                <a href="{{ url('/forgot_password') }}">Forgot password?</a>
            </div> --}}
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
            {{-- <div class="social-auth-hr">
                <span>Or login with</span>
            </div> --}}
            {{-- <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i
                        class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div>
            <div class="text-center">Not a member?
                <a class="color-blue" href="{{ url('/register') }}">Create accaunt</a>
            </div> --}}
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript">
    </script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('failed'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('failed') }}",
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Welcome',
                    text: "{{ session('success') }}",
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('warning'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: "{{ session('warning') }}",
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</body>

</html>
