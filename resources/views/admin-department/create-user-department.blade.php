@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/admin-department.css') }}">
    <style>
        .table-section-main {
            display: flex;
            gap: 20px;

        }
    </style>

    @include('components.breadcrumb')
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
                <!-- Modals -->

                <!-- Create User Type Modal -->
                <div class="modal fade" id="createUserTypeModal" tabindex="-1" aria-labelledby="createUserTypeModalLabel"
                    aria-hidden="true">
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
                                        <input type="text" name="user_type" id="user_type" class="form-control" required
                                            placeholder="Enter user type">
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
                                                placeholder="Enter  authorised email">
                                        </div>
                                        <div class="input-section">
                                            <label>Create Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter password">
                                        </div>
                                    </div>



                                    <button class="btn btn-primary " type="submit">Save</button>
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
                                            <input type="text" class="form-control" name="designation"
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
                                    <button class="btn btn-primary " type="submit">Save</button>
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
@endsection