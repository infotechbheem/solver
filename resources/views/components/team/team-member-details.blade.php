@extends('layouts.app')
@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/employee.css') }}">
    @include('components.breadcrumb')
    <div class="employee-card">
        <div class="employee-header">
            <img src="https://img.freepik.com/free-photo/portrait-smiling-young-businesswoman-standing-with-her-arm-crossed-against-gray-wall_23-2147943827.jpg?ga=GA1.1.559987269.1744107898&semt=ais_hybrid&w=740"
                alt="Employee Image" class="employee-img">
            <div class="employee-name-details">
                <h2 class="employee-name">John Doe</h2>
                <p class="employee-position">HR Manager - Human Resources</p>
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
                    <td>Parmanent</td>
                    <td>Volunteer</td>
                    <td>john doe</td>
                </tr>
                <tr>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td>Michael Doe</td>
                    <td>Sarah Doe</td>
                    <td>johndoe@example.com</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                </tr>
                <tr>
                    <td>+1 234 567 890</td>
                    <td>January 15, 1990</td>
                    <td>Male</td>
                </tr>
                <tr>
                    <th>Qualification</th>
                    <th>Collge/university</th>
                    <th>Experience</th>

                </tr>
                <tr>
                    <td>MBA in Human Resources</td>
                    <td>AIMT</td>
                    <td>8 Years</td>
                </tr>
                <tr>

                    <th>Marital Status</th>
                    <th>Emergency Contact Number</th>
                    <th>Address</th>
                </tr>
                <tr>
                    <td>Single</td>
                    <td>34536457</td>
                    <td>1234 Street, New York, USA</td>
                </tr>
                <tr>
                    <th>Date Of Joining</th>
                    <th>Designation</th>
                    <th>Department</th>
                </tr>
                <tr>
                    <td>20/05/2025</td>
                    <td>Human Resources</td>
                    <td>HR Department</td>
                </tr>
                <tr>
                    <th>Payment Type</th>
                    <th> Amount</th>
                    <th>Resume</th>
                </tr>
                <tr>
                    <td>Stipend</td>
                    <td> ₹23000</td>
                    <td><a href="{{ asset('storage/employees/john_resume.pdf') }}" class="employee-link"
                            target="_blank">Download
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Aadhar Card</th>
                    <th>Pan Card</th>
                    <th>Marksheet</th>
                </tr>
                <tr>
                    <td><a href="{{ asset('storage/employees/john_resume.pdf') }}" class="employee-link"
                            target="_blank">Download
                        </a>
                    </td>
                    <td><a href="{{ asset('storage/employees/john_resume.pdf') }}" class="employee-link"
                            target="_blank">Download
                        </a>
                    </td>
                    <td><a href="{{ asset('storage/employees/john_resume.pdf') }}" class="employee-link"
                            target="_blank">Download
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
