@extends('layouts.app')
@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/employee.css') }}">
    @include('components.breadcrumb')
    <style>
        .employee-name-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%
        }

        .employee-name-details p,
        .employee-name-details h2 {
            padding: 0;
            margin: 0;
        }
    </style>
    <div class="employee-card">
        <div class="employee-header">
            <div class="employee-name-details">
                <h2 class="employee-name">Donor / Organisation Name</h2>
                <p class="employee-position">Sam Bahadur</p>
            </div>
        </div>
        <div class="employee-body">
            <table class="employee-table">
                <tr>
                    <th>Type of Income</th>
                    <th>Type of Donation</th>
                    <th>Email Id</th>
                </tr>
                <tr>
                    <td>Indivisual Person Donation</td>
                    <td>Volunteer</td>
                    <td>john doe</td>
                </tr>
                <tr>
                    <th>Contact Number </th>
                    <th>Aadhar Number</th>
                    <th>Pan Number</th>
                </tr>
                <tr>
                    <td>23453647</td>
                    <td>213242536475</td>
                    <td>JKw r2rlkqej</td>
                </tr>
                <tr>
                    <th>Sanction Amount</th>
                    <th>Received Amount</th>
                    <th>Alloted Human Resource Amount</th>
                </tr>
                <tr>
                    <td>₹24245</td>
                    <td>₹533647</td>
                    <td>₹234567</td>
                </tr>
                <tr>
                    <th>Alloted Camp Expenses Amount</th>
                    <th>Alloted Training & Capacity Building Amount</th>
                    <th>Alloted Equipment & Suplies Amount</th>
                </tr>
                <tr>
                    <td>₹24245</td>
                    <td>₹533647</td>
                    <td>₹234567</td>
                </tr>
                <tr>
                    <th>Alloted Travel Expenses Amount</th>
                    <th>Alloted IEC Material Amount</th>
                    <th>Alloted Administrative Amount</th>

                </tr>
                <tr>
                    <td>₹24245</td>
                    <td>₹533647</td>
                    <td>₹234567</td>
                </tr>
                <tr>
                    <th>Alloted Accomondation Expenses Amount</th>
                    <th>Alloted Monitoring & Evaluation Amount</th>
                    <th>Alloted Miscellaneous Amount</th>

                </tr>
                <tr>
                    <td>₹24245</td>
                    <td>₹533647</td>
                    <td>₹234567</td>
                </tr>
                <tr>

                    <th>Number of Installment</th>
                    <th>Mode of Payment</th>
                    <th>Proof of Evidence </th>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Bank Transfer</td>
                    <td><a href="{{ asset('storage/employees/john_resume.pdf') }}" class="employee-link"
                            target="_blank">Download
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Payment Date</th>
                    <th>Type of Project</th>
                    <th>Project Name</th>
                </tr>
                <tr>
                    <td>20/05/2025</td>
                    <td>Social Protection</td>
                    <td>JST PRoject</td>
                </tr>
                <tr>
                    <th>Project Duration</th>
                    <th> Project Location</th>
                    <th>Project Description</th>
                </tr>
                <tr>
                    <td>20/04/2025 - 20/05/2025</td>
                    <td> Motihari, Bihar </td>
                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                </tr>

            </table>
        </div>
    </div>
@endsection
