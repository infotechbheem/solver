@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/income.css') }}">

    @include('components.breadcrumb')

    <div class="scr-registration-section">
        <div class="containers p-0">
            <div class="csr-registration-main-heading" style="justify-content: space-between">
                <p>All Registered Users</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
            </div>

            <div class="grant-list grant-list-govt ">
                <div class="grant-searchbar">
                    <input type="text" id="grant-search-bar" class="form-control grant-search" placeholder="Search..."
                        onkeyup="searchGrants()">
                </div>
                <div class="grant-table-scroll">
                    <table class="table grant-table" id="grantTable">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Email </th>
                                <th>Designation</th>
                                <th>Department </th>
                                <th>Status </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ Str::ucfirst($user->userType->user_type) }}</td>
                                    <td>{{ Str::ucfirst($user->department->user_department) }}</td>
                                    <td class="{{ $user->user_status ? "active" : "inactive" }}">
                                        <a
                                            href="{{ route('user-status-change', $user->username) }}"><span>{{ $user->user_status ? "Active" : "Inactive" }}</span></a>
                                    </td>
                                    <td>
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="grant-pagination-container">
                    <div class="grant-pagination-info">Showing 1 to 4 of 20 records</div>
                    <div class="grant-pagination">
                        <button class="btn btn-light pagination-btn" disabled>Previous</button>
                        <div class="pagination-numbers">
                            <button class="pagination-number active">1</button>
                            <button class="pagination-number">2</button>
                        </div>
                        <button class="btn btn-light pagination-btn">Next</button>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Optional: modal-lg for wider modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                    placeholder="Enter mobile number">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="col-md-6">
                                <label for="designation" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation"
                                    placeholder="Enter designation">
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" name="department" id="department"
                                    placeholder="Enter department">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--  Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog "> <!-- Optional: modal-lg for wider modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-user-registration') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                    placeholder="Enter mobile number">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="addUserEmail"
                                    placeholder="Enter email">
                                <span id="emailError" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="designation" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="designation" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="designation" class="form-label">Designation</label>
                                <select name="designation" id="designation" class="form-control">
                                    <option value="">Select Designation</option>
                                    @foreach ($userTypes as $userType)
                                        <option value="{{ $userType->id }}">{{ $userType->user_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <select name="department" id="department" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->user_department }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            // Check Email Availability
            $('#addUserEmail').blur(function () {
                var email = $(this).val();
                $.ajax({
                    url: "{{ route('check-email-availability') }}",
                    method: 'POST',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.isEmailAvailable) {
                            $('#emailError').text('');
                        } else {
                            $('#emailError').text('Email already exists');
                        }
                    }
                });
            });

            // Pagination
        })
    </script>




@endsection