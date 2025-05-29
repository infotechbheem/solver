@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/admin-department.css') }}">

    @include('components.breadcrumb')
    <div class="user_create_department">

        <div class="containers p-0">
            <div class="user-create-section mt-4">
                <!-- Top Buttons -->
                <div class="user-create-section-btn d-flex align-items-center"
                    style="justify-content: space-between; padding: 10px 20px;">
                    <!-- Search Bar -->
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="Search Letter Box" style="width: 250px;">
                    </div>

                    <!-- Add Button -->
                    <button class="btn" style="background-color: #323F2F; color:white" data-bs-toggle="modal"
                        data-bs-target="#viewAllModal">
                        Add Letter Box
                    </button>
                </div>


                <div class="table-section-main-head">
                    <div class="table-section-main">
                        <div class="cards" style="width:100%">
                            <div class="card-body p-0">
                                <table class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Receipt Type</th>
                                            <th>Date</th>
                                            <th>Letter Box </th>
                                            <th>Type Of Letter</th>
                                            <th>Reference No</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($latterBoxes as $key => $latterBox)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $latterBox->name ?? '-' }}</td>
                                                <td>{{ $latterBox->department->user_department ?? '-' }}</td>
                                                <td>{{ $latterBox->receipt_type ?? '-' }}</td>
                                                <td>{{ $latterBox->date ?? '-' }}</td>
                                                <td>{{ $latterBox->latter_box_type ?? '-' }}</td>
                                                <td>{{ $latterBox->latter_type ?? '-' }}</td>
                                                <td>{{ $latterBox->{'latter/reference_no'} ?? '-' }}</td>
                                                <td>{{ $latterBox->subject ?? '-' }}</td>
                                                <td>{{ $latterBox->description ?? "Not Available" }}</td>
                                                <td>
                                                    {{-- edit --}}
                                                    <button class="btn btn-success btn-sm edit-btn"
                                                        data-id="{{ $latterBox->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#editLetterbox">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                    {{-- delete --}}
                                                    <form action="{{ route('letter-box.destroy', $latterBox->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this?');"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>

                                                    <button class="btn btn-primary btn-sm view-description-btn"
                                                        data-description="{{ $latterBox->description ?? 'Not Available' }}"
                                                        data-bs-toggle="modal" data-bs-target="#descriptionModal">
                                                        View Description
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="table-footer">
                        <span id="showing-text">Showing 1 of 2</span>
                        <div class="pagination" id="pagination">
                            <button onclick="changePage(currentPage - 1)">Previous</button>
                            <!-- Page numbers will be populated by JavaScript -->
                            <button onclick="changePage(currentPage + 1)">Next</button>
                        </div>
                    </div>

                </div>
                <!-- Modals -->

                <!-- View All Modal -->
                <div class="modal fade" id="viewAllModal" tabindex="-1" aria-labelledby="viewAllModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Letter Box</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store-letter-box') }}" method="post">
                                    @csrf
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Receipt Type <span style="color: red">*</span></label>
                                            <select class="form-control" name="receipt_type" id="receipt_type">
                                                <option value="" disabled selected>Select receipt type</option>
                                                <option value="received">Received</option>
                                                <option value="dispatch">Dispatch</option>

                                            </select>
                                        </div>

                                        <div class="input-section">
                                            <label>Date <span style="color: red">*</span></label>
                                            <input type="date" class="form-control" name="date" id="date">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Letter Box <span style="color: red">*</span></label>
                                            <select class="form-control" id="letter_box" name="letter_box">
                                                <option value="" disabled selected>Select letter box</option>
                                                <option value="sender">Sender</option>
                                                <option value="receiver">Receiver</option>

                                            </select>
                                        </div>
                                        <div class="input-section">
                                            <label>Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter name" name="name">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Department</label>
                                            <select name="department_id" id="department_id" class="form-control">
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->user_department }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-section">
                                            <label>Letter No./Reference No. <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter letter number"
                                                name="reference_no">
                                        </div>

                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Type Of Letter <span style="color: red">*</span></label>
                                            <select class="form-control" name="types_of_letter">
                                                <option value="" disabled selected>Select Letter type</option>
                                                <option value="offer_letter">Offer Letter</option>
                                                <option value="appointment_letter">Appointment Letter</option>
                                                <option value="office_order">Office Order</option>
                                                <option value="govt_notice">Govt. Notice</option>
                                                <option value="letter_recomndation">Letter Of Recomndation</option>
                                                <option value="cover_letter">Cover Letter</option>
                                                <option value="resignation_letter">Resignation Letter</option>
                                                <option value="annoucement_letter">Annoucement Letter</option>
                                                <option value="complaint_letter">Complaint Letter</option>
                                                <option value="thank_you_letter">Thank You Letter</option>
                                                <option value="interview_follow_up_letter">Interview Follow Up Letter
                                                </option>
                                                <option value="termination_letter">Termination Letters</option>
                                                <option value="other">Other</option>

                                            </select>
                                        </div>
                                        <div class="input-section">
                                            <label>Subject <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter subject"
                                                name="subject">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section" style="width:100%">
                                            <label>Description <span style="color: red">*</span></label>
                                            <textarea class="form-control" id="" rows="3" name="description"></textarea>
                                        </div>
                                    </div>



                                    <button class="btn btn-primary" type="submit" id="saveBtn">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- edit letter box --}}
                <div class="modal fade" id="editLetterbox" tabindex="-1" aria-labelledby="editLetterboxLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Letter Box</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update-letterbox') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <input type="hidden" name="id" id="letterboxId">
                                            <label>Receipt Type <span style="color: red">*</span></label>
                                            <select class="form-control" name="receipt_type" id="receipt_type">
                                                <option value="" disabled selected>Select receipt type</option>
                                                <option value="received">Received</option>
                                                <option value="dispatch">Dispatch</option>

                                            </select>
                                        </div>

                                        <div class="input-section">
                                            <label>Date <span style="color: red">*</span></label>
                                            <input type="date" class="form-control" name="date" id="edit-date">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Letter Box <span style="color: red">*</span></label>
                                            <select class="form-control" id="letter_box" name="letter_box">
                                                <option value="" disabled selected>Select letter box</option>
                                                <option value="sender">Sender</option>
                                                <option value="receiver">Receiver</option>

                                            </select>
                                        </div>
                                        <div class="input-section">
                                            <label>Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter name" name="name">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Department</label>
                                            <select name="department_id" id="department_id" class="form-control">
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->user_department }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-section">
                                            <label>Letter No./Reference No. <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter letter number"
                                                id="reference_no" name="reference_no">
                                        </div>

                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section">
                                            <label>Type Of Letter <span style="color: red">*</span></label>
                                            <select class="form-control" id="types_of_letter" name="types_of_letter">
                                                <option value="" disabled selected>Select Letter type</option>
                                                <option value="offer_letter">Offer Letter</option>
                                                <option value="appointment_letter">Appointment Letter</option>
                                                <option value="office_order">Office Order</option>
                                                <option value="govt_notice">Govt. Notice</option>
                                                <option value="letter_recomndation">Letter Of Recomndation</option>
                                                <option value="cover_letter">Cover Letter</option>
                                                <option value="resignation_letter">Resignation Letter</option>
                                                <option value="annoucement_letter">Annoucement Letter</option>
                                                <option value="complaint_letter">Complaint Letter</option>
                                                <option value="thank_you_letter">Thank You Letter</option>
                                                <option value="interview_follow_up_letter">Interview Follow Up Letter
                                                </option>
                                                <option value="termination_letter">Termination Letters</option>
                                                <option value="other">Other</option>

                                            </select>
                                        </div>
                                        <div class="input-section">
                                            <label>Subject <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter subject" id="subject"
                                                name="subject">
                                        </div>
                                    </div>
                                    <div class="modal-body-main mb-3">
                                        <div class="input-section" style="width:100%">
                                            <label>Description <span style="color: red">*</span></label>
                                            <textarea class="form-control" id="description" rows="3"
                                                name="description"></textarea>
                                        </div>
                                    </div>



                                    <button class="btn btn-primary" type="submit" id="editBtn">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- edit letter box --}}

                {{-- View Description of modal --}}
                <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Letter Description</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="modalDescriptionContent">
                                <!-- Description will be loaded here -->
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const descriptionButtons = document.querySelectorAll('.view-description-btn');

            descriptionButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const description = this.getAttribute('data-description');
                    document.getElementById('modalDescriptionContent').textContent = description;
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- add required to the fields --}}
    <script>
        $(document).ready(function () {
            $('#saveBtn').on('click', function (e) {
                let isValid = true;
                let saveBtn = $('#saveBtn');

                // Clear previous errors
                $('.field-error').remove();

                // Get values correctly
                const fields = {
                    receipt_type: $('[name="receipt_type"]'),
                    date: $('[name="date"]'),
                    letter_box: $('[name="letter_box"]'),
                    name: $('[name="name"]'),
                    department_id: $('[name="department_id"]'),
                    reference_no: $('[name="reference_no"]'),
                    types_of_letter: $('[name="types_of_letter"]'),
                    subject: $('[name="subject"]'),
                    description: $('[name="description"]')
                };

                const messages = {
                    receipt_type: 'Receipt Type is required.',
                    date: 'Date is required.',
                    letter_box: 'Letter Box is required.',
                    name: 'Name is required.',
                    department_id: 'Department is required.',
                    reference_no: 'Letter No./Reference No. is required.',
                    types_of_letter: 'Type Of Letter is required.',
                    subject: 'Subject is required.',
                    description: 'Description is required.'
                };

                // Validate each field
                $.each(fields, function (key, $field) {
                    if (!$field.val() || $field.val().trim() === '') {
                        $field.after(`<div class="field-error text-danger mt-1">${messages[key]}</div>`);
                        isValid = false;
                    }
                });

                if (!isValid) {
                    e.preventDefault(); // Prevent form submission
                    saveBtn.prop('disabled', true);
                } else {
                    saveBtn.prop('disabled', false);
                }
            });

            // Re-enable and clean error messages on any input
            $(':input').on('input change', function () {
                $('#saveBtn').prop('disabled', false);
                $(this).next('.field-error').remove();
            });
        });
    </script>
   
    {{-- data populate for edit --}}
    <script>
        $(document).on('click', '.edit-btn', function () {
            var id = $(this).data('id');

            $.ajax({
                url: '/get-letterbox-data/' + id,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    var data = response.data;

                    $('#letterboxId').val(data.id);
                    $('#receipt_type option[value="' + data.receipt_type + '"]').attr('selected', 'selected');
                    $('#edit-date').val(data.date);
                    $('#letter_box option[value="' + data.latter_box_type + '"]').attr('selected', 'selected');
                    $('input[name="name"]').val(data.name);
                    $('#department_id option[value="' + data.department_id + '"]').attr('selected', 'selected');
                    $('#reference_no').val(`${data['latter/reference_no']}`);
                    $('#types_of_letter option[value="' + data.latter_type + '"]').attr('selected', 'selected');
                    $('#subject').val(data.subject);
                    $('#description').val(data.description);

                    // Show modal if needed
                    $('#editLetterbox').modal('show');
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    alert('Failed to fetch data');
                }
            });
        });
    </script>

@endsection