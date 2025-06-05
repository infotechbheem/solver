@extends('layouts.app')
@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/employee.css') }}">
    <style>
        .employee-name-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%
        }

        .employee-name-details p,
        .employee-name-details h2 {
            margin: 0;
            padding: 0;
        }
    </style>
    @include('components.breadcrumb')
    <div class="employee-card">
        <div class="employee-header">
            <div class="employee-name-details">
                <h2 class="employee-name">Project Name</h2>
                <p class="employee-position">{{ $expenseDetail->project_name }}</p>
            </div>
        </div>
        <div class="employee-body">
            <table class="employee-table">
                @if ($expenseDetail->expense_date || $expenseDetail->expense_sector || $expenseDetail->project_name)
                    <tr>
                        <th>Date Of Expense</th>
                        <th>Sector of Expenses</th>
                        <th>Project Name</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->expense_date ? \Carbon\Carbon::parse($expenseDetail->expense_date)->format('d/m/Y') : '' }}
                        </td>
                        <td>{{ $expenseDetail->expense_sector }}</td>
                        <td>{{ $expenseDetail->project_name }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->name || $expenseDetail->type_of_expense || $expenseDetail->administrative_expense)
                    <tr>
                        <th>Name</th>
                        <th>Type of Expenditure</th>
                        <th>Administrative Expenses</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->name }}</td>
                        <td>{{ $expenseDetail->type_of_expense }}</td>
                        <td>{{ $expenseDetail->administrative_expense }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->human_resource || $expenseDetail->hr_expense_date)
                    <tr>
                        <th>Human Resource</th>
                        <th>Date Of Expense (HR)</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->human_resource }}</td>
                        <td>{{ $expenseDetail->hr_expense_date ? \Carbon\Carbon::parse($expenseDetail->hr_expense_date)->format('d/m/Y') : '' }}
                        </td>
                        <td></td>
                    </tr>
                @endif

                @if ($expenseDetail->equip_expense_date || $expenseDetail->equip_cost || $expenseDetail->equip_supplier_name)
                    <tr>
                        <th>Date Of Expense (Equipment)</th>
                        <th>Cost</th>
                        <th>Supplier Name</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->equip_expense_date ? \Carbon\Carbon::parse($expenseDetail->equip_expense_date)->format('d/m/Y') : '' }}
                        </td>
                        <td>{{ $expenseDetail->equip_cost }}</td>
                        <td>{{ $expenseDetail->equip_supplier_name }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->travel_exp_date || $expenseDetail->travel_exp_departure || $expenseDetail->travel_exp_arrival)
                    <tr>
                        <th>Travel Expense Date</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->travel_exp_date ? \Carbon\Carbon::parse($expenseDetail->travel_exp_date)->format('d/m/Y') : '' }}
                        </td>
                        <td>{{ $expenseDetail->travel_exp_departure }}</td>
                        <td>{{ $expenseDetail->travel_exp_arrival }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->travel_exp_mode_of_travel)
                    <tr>
                        <th>Mode of Travel</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{ ucfirst($expenseDetail->travel_exp_mode_of_travel) }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif

                @if ($expenseDetail->date_of_material_exp || $expenseDetail->item || $expenseDetail->quantity)
                    <tr>
                        <th>Material Expense Date</th>
                        <th>Item</th>
                        <th>Quantity</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->date_of_material_exp ? \Carbon\Carbon::parse($expenseDetail->date_of_material_exp)->format('d/m/Y') : '' }}
                        </td>
                        <td>{{ ucfirst($expenseDetail->item) }}</td>
                        <td>{{ $expenseDetail->quantity }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->rate_per_unit || $expenseDetail->total_cost || $expenseDetail->remarks)
                    <tr>
                        <th>Rate Per Unit</th>
                        <th>Total Cost</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->rate_per_unit }}</td>
                        <td>{{ $expenseDetail->total_cost }}</td>
                        <td>{{ $expenseDetail->remarks }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->date_of_accommodation_exp || $expenseDetail->checkin || $expenseDetail->checkout)
                    <tr>
                        <th>Accommodation Expense Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->date_of_accommodation_exp ? \Carbon\Carbon::parse($expenseDetail->date_of_accommodation_exp)->format('d/m/Y') : '' }}
                        </td>
                        <td>{{ $expenseDetail->checkin }}</td>
                        <td>{{ $expenseDetail->checkout }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->no_of_days)
                    <tr>
                        <th>No. of Days</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->no_of_days }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif

                @if ($expenseDetail->date_of_miscellaneous_exp || $expenseDetail->other || $expenseDetail->miscellaneous_exp_remarks)
                    <tr>
                        <th>Miscellaneous Expense Date</th>
                        <th>Other</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->date_of_miscellaneous_exp ? \Carbon\Carbon::parse($expenseDetail->date_of_miscellaneous_exp)->format('d/m/Y') : '' }}
                        </td>
                        <td>{{ $expenseDetail->other }}</td>
                        <td>{{ $expenseDetail->miscellaneous_exp_remarks }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->miscellaneous_exp_discription)
                    <tr>
                        <th>Miscellaneous Description</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td colspan="3">{{ $expenseDetail->miscellaneous_exp_discription }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->amount || $expenseDetail->section || $expenseDetail->tds_deduction_percentage)
                    <tr>
                        <th>Amount</th>
                        <th>Section</th>
                        <th>TDS Deduction %</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->amount }}</td>
                        <td>{{ $expenseDetail->section }}</td>
                        <td>{{ $expenseDetail->tds_deduction_percentage }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->tds_deduction_amount || $expenseDetail->pan || $expenseDetail->tds_deduction_date)
                    <tr>
                        <th>TDS Deduction Amount</th>
                        <th>Pan Number</th>
                        <th>TDS Deduction Date</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->tds_deduction_amount }}</td>
                        <td>{{ $expenseDetail->pan }}</td>
                        <td>{{ $expenseDetail->tds_deduction_date ? \Carbon\Carbon::parse($expenseDetail->tds_deduction_date)->format('d/m/Y') : '' }}
                        </td>
                    </tr>
                @endif

                @if ($expenseDetail->mode_of_payment || $expenseDetail->type_of_payment)
                    <tr>
                        <th>Mode of Payment</th>
                        <th>Type of Payment</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{ ucfirst($expenseDetail->mode_of_payment) }}</td>
                        <td>{{ ucfirst($expenseDetail->type_of_payment) }}</td>
                        <td></td>
                    </tr>
                @endif

                @if ($expenseDetail->sub_total_amount || $expenseDetail->advance || $expenseDetail->net_payment)
                    <tr>
                        <th>Sub Total Amount</th>
                        <th>Advance</th>
                        <th>Net Payment</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->sub_total_amount }}</td>
                        <td>{{ $expenseDetail->advance }}</td>
                        <td>{{ $expenseDetail->net_payment }}</td>
                    </tr>
                @endif

                @if ($expenseDetail->advance_deposit || $expenseDetail->description || $expenseDetail->invoice)
                    <tr>
                        <th>Advance Deposit</th>
                        <th>Description</th>
                        <th>Invoice/Voucher</th>
                    </tr>
                    <tr>
                        <td>{{ $expenseDetail->advance_deposit }}</td>
                        <td>{{ $expenseDetail->description }}</td>
                        <td>
                            @if (!empty($expenseDetail->invoice))
                                <a href="{{ asset('storage/' . $expenseDetail->invoice) }}" target="_blank">Download</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endif

                @if ($expenseDetail->proof_of_payment)
                    <tr>
                        <th>Proof Of Payment</th>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('storage/' . $expenseDetail->proof_of_payment) }}"
                                target="_blank">Download</a>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endsection
