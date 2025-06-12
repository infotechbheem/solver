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
                    <th>CSR Partner</th>
                    <th>Partner Organisation</th>
                </tr>
                <tr>
                    <td>{{ $incomeType[$incomeDetail->type_of_income] ?? 'N/A' }}</td>
                    <td>{{ $incomeDetail->csr->company_name ?? 'N/A' }}</td>
                    <td>{{ $incomeDetail->PartnerOrgnization->{'company/ngo_name'} ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th>Type of Donation</th>
                    <th>Email Id</th>
                    <th>Contact Number</th>
                </tr>
                <tr>
                    <td>{{ $donationTypes[$incomeDetail->type_of_donation] ?? 'N/A' }}</td>
                    <td>{{ $incomeDetail->email }}</td>
                    <td>{{ $incomeDetail->contact_number }}</td>
                </tr>

                <tr>
                    <th>Aadhar Number</th>
                    <th>PAN Number</th>
                    <th>Sanction Amount</th>
                </tr>
                <tr>
                    <td>{{ $incomeDetail->aadhar ?? '-' }}</td>
                    <td>{{ $incomeDetail->pan }}</td>
                    <td>₹{{ $incomeDetail->sanction_amount }}</td>
                </tr>

                <tr>
                    <th>Received Amount</th>
                    <th>Alloted Human Resource Amount</th>
                    <th>Alloted Camp Expenses Amount</th>
                </tr>
                <tr>
                    <td>₹{{ $incomeDetail->amount_received }}</td>
                    <td>₹{{ $incomeDetail->human_resource }}</td>
                    <td>₹{{ $incomeDetail->camp_exp }}</td>
                </tr>

                <tr>
                    <th>Alloted Training & Capacity Building Amount</th>
                    <th>Alloted Equipment & Supplies Amount</th>
                    <th>Alloted Travel Expenses Amount</th>
                </tr>
                <tr>
                    <td>₹{{ $incomeDetail->training_exp }}</td>
                    <td>₹{{ $incomeDetail->equipment }}</td>
                    <td>₹{{ $incomeDetail->travel_exp }}</td>
                </tr>

                <tr>
                    <th>Alloted IEC Material Amount</th>
                    <th>Alloted Administrative Amount</th>
                    <th>Alloted Accommodation Expenses Amount</th>
                </tr>
                <tr>
                    <td>₹{{ $incomeDetail->material_exp }}</td>
                    <td>₹{{ $incomeDetail->administrative_exp }}</td>
                    <td>₹{{ $incomeDetail->accomodation_exp }}</td>
                </tr>

                <tr>
                    <th>Alloted Monitoring & Evaluation Amount</th>
                    <th>Alloted Miscellaneous Amount</th>
                    <th>Number of Installment</th>
                </tr>
                <tr>
                    <td>₹{{ $incomeDetail->monitoring_exp }}</td>
                    <td>₹{{ $incomeDetail->miscellaneous_exp }}</td>
                    <td>{{ $incomeDetail->no_of_installment }}</td>
                </tr>

                <tr>
                    <th>Mode of Payment</th>
                    <th>Proof of Evidence</th>
                    <th>Payment Date</th>
                </tr>
                <tr>
                    <td>{{ $incomeDetail->payment_mode }}</td>
                    <td>
                        @if ($incomeDetail->proof_of_evidence)
                            <a href="{{ asset('storage/' . $incomeDetail->proof_of_evidence) }}" class="employee-link"
                                target="_blank">Download</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($incomeDetail->payment_date)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                    <th>Type of Program</th>
                    <th>Project Name</th>
                    <th>Project Duration</th>
                </tr>
                <tr>
                    <td>{{ $incomeDetail->type_of_project }}</td>
                    <td>{{ $incomeDetail->project_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($incomeDetail->project_duration_from)->format('d-m-Y') }} to
                        {{ \Carbon\Carbon::parse($incomeDetail->project_duration_to)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                    <th>Project Location</th>
                    <th>Project Description</th>
                    <th></th>
                </tr>
                <tr>
                    <td>{{ $incomeDetail->district . ', ' . $incomeDetail->state }}</td>
                    <td colspan="2">{{ $incomeDetail->project_description }}</td>
                </tr>
            </table>

        </div>
    </div>
@endsection
