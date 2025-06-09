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
    @php
        $donationTypes = [
            'general_donation' => 'General Donations',
            'corpus_donation' => 'Corpus Donations',
            'anonymous_donation' => 'Anonymous Donations',
        ];
        $incomeType = [
            'individual_person_duration' => 'Indivisual Person Donation',
            'sub_grant' => 'Sub Grant',
            'contract' => 'Contract',
            'csr' => 'CSR',
            'gov_funds' => 'Govt. Funds',
            'training_fees' => 'Training Fees',
            'other' => 'Other',
        ];
    @endphp
    <div class="employee-card">
        <div class="employee-header">
            <div class="employee-name-details">
                <h2 class="employee-name">Donor / Organisation Name</h2>
                <p class="employee-position">{{ $donationTypes[$incomeDetail->type_of_donation] ?? 'N/A' }}</p>
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
                    <td>{{ $incomeType[$incomeDetail->type_of_income] ?? 'N/A' }}</td>
                    <td>{{ $donationTypes[$incomeDetail->type_of_donation] ?? 'N/A' }}</td>
                    <td>{{ $incomeDetail->email }}</td>
                </tr>
                <tr>
                    <th>Contact Number </th>
                    <th>Aadhar Number</th>
                    <th>Pan Number</th>
                </tr>
                <tr>
                    <td>{{ $incomeDetail->contact_number }}</td>
                    <td>{{ isset($incomeDetail->aadhar) ? $incomeDetail->aadhar : '-' }}</td>
                    <td>{{ $incomeDetail->pan }}</td>
                </tr>
                <tr>
                    <th>Sanction Amount</th>
                    <th>Received Amount</th>
                    <th>Alloted Human Resource Amount</th>
                </tr>
                <tr>
                    <td>₹{{ $incomeDetail->sanction_amount }}</td>
                    <td>₹{{ $incomeDetail->amount_received }}</td>
                    <td>₹{{ $incomeDetail->human_resource }}</td>
                </tr>
                <tr>
                    <th>Alloted Camp Expenses Amount</th>
                    <th>Alloted Training & Capacity Building Amount</th>
                    <th>Alloted Equipment & Suplies Amount</th>
                </tr>
                <tr>
                    <td>₹{{ $incomeDetail->camp_exp }}</td>
                    <td>₹{{ $incomeDetail->training_exp }}</td>
                    <td>₹{{ $incomeDetail->equipment }}</td>
                </tr>
                <tr>
                    <th>Alloted Travel Expenses Amount</th>
                    <th>Alloted IEC Material Amount</th>
                    <th>Alloted Administrative Amount</th>

                </tr>
                <tr>
                    <td>₹{{ $incomeDetail->travel_exp }}</td>
                    <td>₹{{ $incomeDetail->material_exp }}</td>
                    <td>₹{{ $incomeDetail->administrative_exp }}</td>
                </tr>
                <tr>
                    <th>Alloted Accomondation Expenses Amount</th>
                    <th>Alloted Monitoring & Evaluation Amount</th>
                    <th>Alloted Miscellaneous Amount</th>

                </tr>
                <tr>
                    <td>₹{{ $incomeDetail->accomodation_exp }}</td>
                    <td>₹{{ $incomeDetail->monitoring_exp }}</td>
                    <td>₹{{ $incomeDetail->miscellaneous_exp }}</td>
                </tr>
                <tr>

                    <th>Number of Installment</th>
                    <th>Mode of Payment</th>
                    <th>Proof of Evidence </th>
                </tr>
                <tr>
                    <td>{{ $incomeDetail->no_of_installment }}</td>
                    <td>{{ $incomeDetail->payment_mode }}</td>
                    <td>
                        @if ($incomeDetail->proof_of_evidence)
                            <a href="{{ asset('storage/' . $incomeDetail->proof_of_evidence) }}" class="employee-link"
                                target="_blank">
                                Download
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Payment Date</th>
                    <th>Type of Project</th>
                    <th>Project Name</th>
                </tr>
                <tr>
                    <td>{{ \Carbon\Carbon::parse($incomeDetail->payment_date)->format('d-m-Y') }}</td>
                    <td>{{ $incomeDetail->type_of_project }}</td>
                    <td>{{ $incomeDetail->project_name }}</td>
                </tr>
                <tr>
                    <th>Project Duration</th>
                    <th>Project Location</th>
                    <th>Project Description</th>
                </tr>
                <tr>
                    <td>
                        {{ \Carbon\Carbon::parse($incomeDetail->project_duration_from)->format('d-m-Y') }} to
                        {{ \Carbon\Carbon::parse($incomeDetail->project_duration_to)->format('d-m-Y') }}
                    </td>
                    <td> {{ $incomeDetail->district . ', ' . $incomeDetail->state }} </td>
                    <td>{{ $incomeDetail->project_description }}
                    </td>
                </tr>

            </table>
        </div>
    </div>
@endsection
