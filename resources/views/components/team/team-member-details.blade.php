@extends('layouts.app')
@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/employee.css') }}">
    @include('components.breadcrumb')
    <div class="employee-card">
        <div class="employee-header">
            <img src="{{ $teamDetail->photo ? asset('storage/' . $teamDetail->photo) : 'https://via.placeholder.com/150' }}"
                alt="Employee Image" class="employee-img">
            <div class="employee-name-details">
                <h2 class="employee-name">{{ $teamDetail->full_name }}</h2>
                <p class="employee-position">{{ $teamDetail->designation }}</p>
            </div>
        </div>
        <div class="employee-body">
            <table class="employee-table">
                <tr>
                    <th>Type of Employement</th>
                    <th>Type of Position</th>
                    <th>Full Name</th>
                </tr>
                <tr>
                    <td>{{ $teamDetail->employment_type }}</td>
                    <td>{{ $teamDetail->position_type }}</td>
                    <td>{{ $teamDetail->full_name }}</td>
                </tr>
                <tr>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td>{{ $teamDetail->fathers_name }}</td>
                    <td>{{ $teamDetail->mothers_name }}</td>
                    <td>{{ $teamDetail->email }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                </tr>
                <tr>
                    <td>{{ $teamDetail->phone_number }}</td>
                    <td>{{ \Carbon\Carbon::parse($teamDetail->dob)->format('d-m-Y') }}</td>
                    <td>{{ $teamDetail->gender }}</td>
                </tr>
                <tr>
                    <th>Qualification</th>
                    <th>Collge/university</th>
                    <th>Experience</th>

                </tr>
                <tr>
                    <td>{{ $teamDetail->qualification }}</td>
                    <td>{{ $teamDetail->college_university }}</td>
                    <td>{{ $teamDetail->experience }}</td>
                </tr>
                <tr>

                    <th>Marital Status</th>
                    <th>Emergency Contact Number</th>
                    <th>Address</th>
                </tr>
                <tr>
                    <td>{{ $teamDetail->marital_status }}</td>
                    <td>{{ $teamDetail->emergency_contact_number }}</td>
                    <td>{{ $teamDetail->address }}</td>
                </tr>
                <tr>
                    <th>Date Of Joining</th>
                    <th>Designation</th>
                    <th>Department</th>
                </tr>
                <tr>
                    <td>{{ \Carbon\Carbon::parse($teamDetail->date_of_joining)->format('d-m-Y') }}</td>
                    <td>{{ $teamDetail->designation }}</td>
                    <td>{{ $teamDetail->department }}</td>
                </tr>
                <tr>
                    <th>Payment Type</th>
                    <th> Amount</th>
                    <th>Resume</th>
                </tr>
                <tr>
                    <td>{{ $teamDetail->payment_type }}</td>
                    <td>₹ {{ number_format($teamDetail->basic_amount) }}</td>
                    <td>
                        @if ($teamDetail->cv_resume)
                            <a href="{{ asset('storage/' . $teamDetail->cv_resume) }}" class="employee-link"
                                target="_blank">
                                Download
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Aadhar Card</th>
                    <th>Pan Card</th>
                    <th>Marksheet</th>
                </tr>
                <tr>
                    <td>
                        @if ($teamDetail->aadhar_card)
                            <a href="{{ asset('storage/' . $teamDetail->cv_resume) }}" class="employee-link"
                                target="_blank">
                                Download
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($teamDetail->pan_card)
                            <a href="{{ asset('storage/' . $teamDetail->cv_resume) }}" class="employee-link"
                                target="_blank">
                                Download
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($teamDetail->marksheet)
                            <a href="{{ asset('storage/' . $teamDetail->cv_resume) }}" class="employee-link"
                                target="_blank">
                                Download
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
