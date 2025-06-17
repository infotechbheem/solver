@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/admin-department.css') }}">
    <style>
        .table-section-main {
            display: flex;
            gap: 20px;

        }
    </style>

    @include('components.breadcrumb', ['title' => 'User Department'])
    <div class="user_create_department">

        <div class="containers p-0">
            <div class="user-create-section mt-4">
                <!-- Top Buttons -->
                <div class="user-create-section-btn">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserTypeModal">Create User
                        Type</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createDepartmentModal">Create
                        Department</button>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#assignDepartmentModal">CSR Partners
                    </button>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewAllModal">Partner
                        Organisation</button>
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#userModal">User</button>

                </div>
                <!-- Tables Section -->
                <div class="table-section-main" style="padding: 20px">
                    <div class="cards">
                        <div class="card-header">
                            <h5 class="m-0"><b>Created User Type</b></h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S.N.</th>
                                        <th>User Type</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userTypes as $key => $userType)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $userType->user_type }}</td>
                                            <td>{{ __formatDate($userType->created_at) }}</td>
                                            <td><a href="{{ route('delete.user-type', $userType->id) }}"
                                                    class="btn btn-danger btn-sm delete-btn">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Right Table: Departments -->
                    <div class="cards">
                        <div class="card-header">
                            <h5 class="m-0"><b>Created User Department</b></h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Department</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userDepartment as $key => $department)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $department->user_department }}</td>
                                            <td>{{ __formatDate($department->created_at) }}</td>
                                            <td><a href="{{ route('delete.user-department', $department->id) }}"
                                                    class="btn btn-danger btn-sm delete-btn">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-section-main-head">
                    <div class="table-section-main">
                        <div class="cards" style="width:100%">
                            <div class="card-header">
                                <h5 class="m-0"><b>All CSR Partner</b></h5>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>SN</th>
                                            <th>Company Name</th>
                                            <th>Authorised Person Name</th>
                                            <th> Designation</th>
                                            <th> Mobile Number</th>
                                            <th> Email</th>
                                            <th> Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($CSRPartners as $key => $csr)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $csr->company_name }}</td>
                                                <td>{{ $csr->contact_person_name }}</td>
                                                <td>{{ $csr->phone_number }}</td>
                                                <td>{{ $csr->designation }}</td>
                                                <td>{{ $csr->email }}</td>
                                                <td>{{ __formatDate($csr->created_at) }}</td>
                                                <td><a href="{{ route('delete-csr-partner', $csr->csr_id) }}"
                                                        class="btn btn-danger btn-sm delete-btn">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Partner Orgnization Details --}}
                <div class="table-section-main-head">
                    <div class="table-section-main">
                        <div class="cards" style="width:100%">
                            <div class="card-header">
                                <h5 class="m-0"><b>All Partners/NGO's Registered</b></h5>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>SN</th>
                                            <th>Company Name</th>
                                            <th>Authorised Person Name</th>
                                            <th>Designation</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ParterOrOrganization as $key => $partner)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $partner->{'company/ngo_name'} }}</td>
                                                <td>{{ $partner->contact_person_name }}</td>
                                                <td>{{ $partner->phone_number }}</td>
                                                <td>{{ $partner->designation }}</td>
                                                <td>{{ $partner->email }}</td>
                                                <td>{{ __formatDate($partner->created_at) }}</td>
                                                <td><a href="{{ route('delete.partner-or-orgnization', $partner->partner_id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- user details --}}
                <div class="table-section-main-head">
                    <div class="table-section-main">
                        <div class="cards" style="width:100%">
                            <div class="card-header">
                                <h5 class="m-0"><b>All Users</b></h5>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userDetails as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ __formatDate($user->created_at) }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                                                        onclick="openAssignRoleModal({{ $user->id }})">
                                                        Assign Role
                                                    </a>

                                                    <a href="{{ route('delete-user', $user->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Modals -->

                {{-- assign role modal --}}
                <div class="modal fade" id="assignRoleModal" tabindex="-1" aria-labelledby="assignRoleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('assign-role-to-user') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="assignRoleModalLabel">Assign Role</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">

                                    <!-- Hidden User ID -->
                                    <input type="hidden" name="user_id" id="modal_user_id">

                                    <!-- Role Dropdown -->
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Select Role</label>
                                        <select name="role_id" id="role" class="form-control" required>
                                            <option value="">-- Select Role --</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Create User Type Modal -->
                <div class="modal fade" id="createUserTypeModal" tabindex="-1"
                    aria-labelledby="createUserTypeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create User Type</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store.user-department') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label>User Type Name</label>
                                        <input type="text" name="user_type" id="user_type" class="form-control"
                                            required placeholder="Enter user type">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Create Department Modal -->
                <div class="modal fade" id="createDepartmentModal" tabindex="-1"
                    aria-labelledby="createDepartmentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Department</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store-user-department') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Department Name</label>
                                        <input type="text" class="form-control" name="user_department_name" required
                                            id="user_department_name" placeholder="Enter department name">
                                    </div>
                                    <button class="btn btn-success " type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Assign Department Modal -->
                <div class="modal fade" id="assignDepartmentModal" tabindex="-1"
                    aria-labelledby="assignDepartmentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">CSR Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store.csr-partner') }}" method="post">
                                    @csrf
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control" name="company_name"
                                                placeholder="Enter Company Name">
                                        </div>
                                        <div class="input-section">
                                            <label>Authorised Person Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Authorised Person Name">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" name="phone_number"
                                                placeholder="Enter mobile number">
                                        </div>
                                        <div class="input-section">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designation"
                                                placeholder="Enter designation">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Authorised Email Id</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter authorised email">
                                        </div>
                                        <div class="input-section">
                                            <label>Create Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter password">
                                        </div>
                                    </div>



                                    <button class="btn btn-primary" type="submit" id="submitBtn">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View All Modal -->
                <div class="modal fade" id="viewAllModal" tabindex="-1" aria-labelledby="viewAllModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Partner Organisation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store.partner-orgnization') }}" method="post">
                                    @csrf
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Company/NGO Name</label>
                                            <input type="text" class="form-control" name="company_ngo_name"
                                                placeholder="Enter Company Name">
                                        </div>
                                        <div class="input-section">
                                            <label>Authorised Person Name</label>
                                            <input type="text" class="form-control" name="contact_person_name"
                                                placeholder="Enter authorised name">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designationPartner"
                                                placeholder="Enter designation name">
                                        </div>
                                        <div class="input-section">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" name="phone_number"
                                                placeholder="Enter mobile number">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Authorised Email Id</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Enter  authorised email">
                                        </div>
                                        <div class="input-section">
                                            <label>Create Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter password">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit" id="submitBtnPartner">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- user modal --}}
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store-user') }}" method="post">
                                    @csrf
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="user-name"
                                                placeholder="Enter Name">
                                        </div>
                                        <div class="input-section">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="user-designation"
                                                placeholder="Enter designation name">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" name="phone_number"
                                                placeholder="Enter mobile number">
                                        </div>
                                        <div class="input-section">
                                            <label>Authorised Email Id</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Enter  authorised email">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Create Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter password">
                                        </div>
                                        <div class="input-section">
                                            <label>Department</label>
                                            <select name="user-department" class="form-control">
                                                <option value="">Select Department</option>
                                                @foreach ($userDepartment as $department)
                                                    <option value="{{ $department->id }}">
                                                        {{ strtoupper($department->user_department) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit" id="submitBtnUser">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap 5 CSS -->


    <!-- Bootstrap 5 JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- email check --}}
    <script>
        $(document).ready(function() {
            $('input[name="email"]').on('change', function() {
                let emailInput = $(this);
                let email = emailInput.val();
                let errorBox = emailInput.next('.email-error');
                let submitBtn = $('#submitBtn');
                let submitBtnPartner = $('#submitBtnPartner');

                // Remove previous error if any
                if (errorBox.length) {
                    errorBox.remove();
                }

                if (email.length > 0) {
                    emailInput.next('.email-error').remove();
                    $.ajax({
                        url: '{{ route('check-email-availability') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            email: email
                        },
                        success: function(response) {
                            if (response.isEmailAvailable) {
                                emailInput.after(
                                    '<div class="email-error text-danger mt-1">Email already exists.</div>'
                                );
                                submitBtn.prop('disabled', true);
                                submitBtnPartner.prop('disabled', true);
                            } else {
                                submitBtn.prop('disabled', false);
                                submitBtnPartner.prop('disabled', false);
                            }
                        }
                    });
                }
            });
        });
    </script>
    {{-- password validation --}}
    <script>
        $(document).ready(function() {
            $('input[name="password"]').on('change', function() {
                let passwordInput = $(this);
                let password = passwordInput.val();
                let errorBox = passwordInput.next('.password-error');
                let submitBtn = $('#submitBtn');
                let submitBtnPartner = $('#submitBtnPartner');

                // Remove previous error if any
                if (errorBox.length) {
                    errorBox.remove();
                }

                // Password validation: at least 8 characters, 1 letter, 1 number, 1 special character
                let isValid = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/.test(password);

                if (!isValid && password.length > 0) {
                    // Show error message
                    passwordInput.after(
                        '<div class="password-error" style="color: red; font-size: 14px; margin-top: 4px;">Password must be at least 8 characters long and include a letter, a number, and a special character.</div>'
                    );
                    submitBtn.prop('disabled', true);
                    submitBtnPartner.prop('disabled', true);
                } else {
                    passwordInput.after('');
                    submitBtn.prop('disabled', false);
                    submitBtnPartner.prop('disabled', false);
                }
            });
        });
    </script>

    {{-- phone validation --}}
    <script>
        $(document).ready(function() {
            $('input[name="phone_number"]').on('change', function() {
                let phoneInput = $(this);
                let phone = phoneInput.val();
                let errorBox = phoneInput.next('.phone-error');
                let submitBtn = $('#submitBtn');
                let submitBtnPartner = $('#submitBtnPartner');

                // Remove previous error if any
                if (errorBox.length) {
                    errorBox.remove();
                }

                let isValid = /^[6-9]\d{9}$/.test(phone) && !/^(\d)\1{9}$/.test(phone) && phone !==
                    '1234567890' && phone !== '0123456789';

                if (!isValid && phone.length > 0) {
                    // Show error message
                    phoneInput.after(
                        '<div class="phone-error" style="color: red; font-size: 14px; margin-top: 4px;">Mobile number must be exactly 10 digits and contain only numbers and should be a valid number.</div>'
                    );
                    submitBtn.prop('disabled', true);
                    submitBtnPartner.prop('disabled', true);
                } else {
                    phoneInput.after('');
                    submitBtn.prop('disabled', false);
                    submitBtnPartner.prop('disabled', false);
                }
            });
        });
    </script>

    {{-- add required to name, company name and designation --}}
    <script>
        $(document).ready(function() {
            $('#submitBtn').on('click', function(e) {
                let isValid = true;

                let submitBtn = $('#submitBtn');


                // Clear previous errors
                $('.field-error').remove();

                // Define input elements
                let companyNameInput = $('input[name="company_name"]');
                let nameInput = $('input[name="name"]');
                let designationInput = $('input[name="designation"]');

                // Validation checks
                if (!companyNameInput.val().trim()) {
                    companyNameInput.after(
                        '<div class="field-error text-danger mt-1">Company name is required.</div>');
                    isValid = false;
                }

                if (!nameInput.val().trim()) {
                    nameInput.after(
                        '<div class="field-error text-danger mt-1">Authorised Person Name is required.</div>'
                    );
                    isValid = false;
                }

                if (!designationInput.val().trim()) {
                    designationInput.after(
                        '<div class="field-error text-danger mt-1">Designation is required.</div>');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault(); // Stop form submission
                    // Disable buttons
                    submitBtn.prop('disabled', true);

                } else {
                    // Enable buttons
                    submitBtn.prop('disabled', false);

                }
            });

            // Re-enable buttons on any input change
            $('input').on('input', function() {
                $('#submitBtn').prop('disabled', false);
                $(this).next('.field-error').remove(); // remove error on user typing
            });
        });
    </script>

    {{-- add required to name, company name and designation --}}
    <script>
        $(document).ready(function() {
            $('#submitBtnPartner').on('click', function(e) {
                let isValid = true;


                let submitBtnPartner = $('#submitBtnPartner');

                // Clear previous errors
                $('.field-error').remove();

                // Define input elements
                let ngoNameInput = $('input[name="company_ngo_name"]');
                let contactPersonInput = $('input[name="contact_person_name"]');
                let designationInput = $('input[name="designationPartner"]');

                // Validation checks

                if (!ngoNameInput.val().trim()) {
                    ngoNameInput.after(
                        '<div class="field-error text-danger mt-1">Company/NGO name is required.</div>');
                    isValid = false;
                }

                if (!contactPersonInput.val().trim()) {
                    contactPersonInput.after(
                        '<div class="field-error text-danger mt-1">Authorised person name is required.</div>'
                    );
                    isValid = false;
                }

                if (!designationInput.val().trim()) {
                    designationInput.after(
                        '<div class="field-error text-danger mt-1">Designation is required.</div>');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault(); // Stop form submission
                    // Disable buttons

                    submitBtnPartner.prop('disabled', true);
                } else {
                    // Enable buttons

                    submitBtnPartner.prop('disabled', false);
                }
            });

            // Re-enable buttons on any input change
            $('input').on('input', function() {
                $('#submitBtnPartner').prop('disabled', false);
                $(this).next('.field-error').remove(); // remove error on user typing
            });
        });
    </script>
    {{-- add required to name, company name and designation --}}
    <script>
        $(document).ready(function() {
            $('#submitBtnUser').on('click', function(e) {
                let isValid = true;


                let submitBtnUser = $('#submitBtnUser');

                // Clear previous errors
                $('.field-error').remove();

                // Define input elements
                let userNameInput = $('input[name="user-name"]');
                let userDepartment = $('select[name="user-department"]')
                let userInput = $('input[name="user-designation"]');

                // Validation checks

                if (!userNameInput.val().trim()) {
                    userNameInput.after(
                        '<div class="field-error text-danger mt-1">Name is required.</div>');
                    isValid = false;
                }

                if (!userDepartment.val().trim()) {
                    userDepartment.after(
                        '<div class="field-error text-danger mt-1">User Department is required.</div>');
                    isValid = false;
                }

                if (!userInput.val().trim()) {
                    userInput.after(
                        '<div class="field-error text-danger mt-1">Designation is required.</div>');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault(); // Stop form submission
                    // Disable buttons

                    submitBtnUser.prop('disabled', true);
                } else {
                    // Enable buttons

                    submitBtnUser.prop('disabled', false);
                }
            });

            // Re-enable buttons on any input change
            $('input').on('input', function() {
                $('#submitBtnUser').prop('disabled', false);
                $(this).next('.field-error').remove(); // remove error on user typing
            });
        });
    </script>


    <script>
        function openAssignRoleModal(userId) {
            document.getElementById('modal_user_id').value = userId;
            let assignModal = new bootstrap.Modal(document.getElementById('assignRoleModal'));
            assignModal.show();
        }
    </script>
@endsection
