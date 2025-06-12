@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/income.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <style>
        .ibox {

            box-shadow: #587c5092 0px 1px 3px 0px, #587c5092 0px 0px 0px 1px;
            padding: 10px;
            border-radius: 5px;
        }

        .ibox .ibox-head {
            border-radius: 0;
            border: 2px solid #587c5092;
        }
    </style>
    @include('components.breadcrumb')

    <div class="scr-registration-section">
        <div class="containers p-0">
            <div class="csr-registration-main-heading">
                <p>Income Status</p>
            </div>
            <form class="scr-registration-form">
                <div class="scr-registration-row">
                    <div class="scr-form-group ">
                        <div class="scr-form-group-main">
                            <div class="scr-form-group-icon">
                                <i class="fa-solid fa-calendar-day"></i>
                            </div>
                            <div class="scr-form-group-content">
                                <p>Total Income</p>
                                <span>₹ {{ $totalIncome }}</span>
                                {{-- <p>Last 6 month Income</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="scr-form-group ">
                        <div class="scr-form-group-main ">
                            <div class="scr-form-group-icon scr-form-group-icon2">
                                <i class="fa-solid fa-hand-holding-heart"></i>
                            </div>
                            <div class="scr-form-group-content">
                                <p>Today's Income </p>
                                <span>₹ {{ $todayIncomeTotal }}</span>
                                <p>Today income</p>
                            </div>
                        </div>
                    </div>
                    <div class="scr-form-group ">
                        <div class="scr-form-group-main">
                            <div class="scr-form-group-icon scr-form-group-icon3">
                                <i class="fa-solid fa-calendar-plus"></i>
                            </div>
                            <div class="scr-form-group-content">
                                <p>Yesterday's Income</p>
                                <span>₹ {{ $yesterdayIncomeTotal }}</span>
                                <p>Yesterday income</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Income</div>
                            </div>
                            <div class="ibox-body p-2">
                                <div style="width: 100%; height: 250px;"> <!-- Added height for responsiveness -->
                                    <canvas id="hiresChart"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Alloted Amount</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-12" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="myPieChart"></canvas>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="grant-list grant-list-govt">
                <div class="mb-4">
                    <form action="{{ route('filter-income') }}" method="POST" id="incomeFilterForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <select name="income_type" class="form-control">
                                    <option value="">Select Income Type</option>
                                    <option value="individual_person_duration"
                                        {{ request('income_type') == 'individual_person_duration' ? 'selected' : '' }}>
                                        Individual Person Donation</option>
                                    <option value="sub_grant" {{ request('income_type') == 'sub_grant' ? 'selected' : '' }}>
                                        Sub Grant</option>
                                    <option value="contract" {{ request('income_type') == 'contract' ? 'selected' : '' }}>
                                        Contract</option>
                                    <option value="csr" {{ request('income_type') == 'csr' ? 'selected' : '' }}>CSR
                                    </option>
                                    <option value="gov_funds"
                                        {{ request('income_type') == 'gov_funds' ? 'selected' : '' }}>Govt. Funds</option>
                                    <option value="training_fees"
                                        {{ request('income_type') == 'training_fees' ? 'selected' : '' }}>Training Fees
                                    </option>
                                    <option value="other" {{ request('income_type') == 'other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="donation_type" class="form-control">
                                    <option value="">Select Donation Type</option>
                                    <option value="general_donation"
                                        {{ request('donation_type') == 'general_donation' ? 'selected' : '' }}>General
                                        Donations</option>
                                    <option value="corpus_donation"
                                        {{ request('donation_type') == 'corpus_donation' ? 'selected' : '' }}>Corpus
                                        Donations</option>
                                    <option value="anonymous_donation"
                                        {{ request('donation_type') == 'anonymous_donation' ? 'selected' : '' }}>Anonymous
                                        Donations</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="project_type" class="form-control">
                                    <option value="">Select Program Type</option>
                                    <option value="social_protection"
                                        {{ request('project_type') == 'social_protection' ? 'selected' : '' }}>
                                        Social Protection
                                    </option>
                                    <option value="livelihood_beneficiray"
                                        {{ request('project_type') == 'livelihood_beneficiray' ? 'selected' : '' }}>
                                        Livelihood Beneficiary
                                    </option>
                                    <option value="community_capacity"
                                        {{ request('project_type') == 'community_capacity' ? 'selected' : '' }}>
                                        Community Capacity
                                    </option>
                                    <option value="digital_literacy"
                                        {{ request('project_type') == 'digital_literacy' ? 'selected' : '' }}>
                                        Digital Literacy & Finacial Inclusion
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary">Apply</button>
                                <button type="button" class="btn btn-secondary ml-4" onclick="resetFilter()">Reset</button>
                                <button type="button" class="btn btn-info ml-4" onclick="exportData()">Export</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="grant-table-scroll">
                    @php
                        $incomes = $filteredIncomes->count() > 0 ? $filteredIncomes : $incomeList;
                    @endphp

                    <table class="table grant-table" id="grantTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type of Income</th>
                                <th>Type of Donation</th>
                                <th>Donor/organisation</th>
                                <th>Email Id</th>
                                <th>Contact Number</th>
                                <th>Sanction Amount</th>
                                <th>Received Amount</th>
                                <th>Payment Mode</th>
                                <th>Payment Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomes as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $list->type_of_income }}</td>
                                    <td>{{ $list->type_of_donation }}</td>
                                    <td>{{ $list->donar_name }}</td>
                                    <td>{{ $list->email }}</td>
                                    <td>{{ $list->contact_number }}</td>
                                    <td>{{ $list->sanction_amount }}</td>
                                    <td>{{ $list->amount_received }}</td>
                                    <td>{{ $list->payment_mode ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($list->payment_date)->format('d-m-Y') }}</td>
                                    <td>
                                        <a
                                            href="{{ url('/finance-department/income/income-details', encrypt($list->id)) }}">
                                            <button class="btn btn-info">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                        </a>
                                        <a
                                            href="{{ url('/finance-department/income/update-income-details', encrypt($list->id)) }}">
                                            <button class="btn btn-success">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('delete-income', $list->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($incomes->count() > 0)
                    <div class="grant-pagination-container">
                        <div class="grant-pagination-info">
                            Showing {{ $incomes->firstItem() }} to {{ $incomes->lastItem() }} of {{ $incomes->total() }}
                            records
                        </div>
                        <div class="grant-pagination">
                            {{-- Previous Button --}}
                            @if ($incomes->onFirstPage())
                                <button class="btn btn-light pagination-btn" disabled>Previous</button>
                            @else
                                <a href="{{ $incomes->previousPageUrl() }}"
                                    class="btn btn-light pagination-btn">Previous</a>
                            @endif

                            {{-- Page Numbers --}}
                            <div class="pagination-numbers">
                                @for ($i = 1; $i <= $incomes->lastPage(); $i++)
                                    <a href="{{ $incomes->url($i) }}">
                                        <button
                                            class="pagination-number {{ $i == $incomes->currentPage() ? 'active' : '' }}">{{ $i }}</button>
                                    </a>
                                @endfor
                            </div>

                            {{-- Next Button --}}
                            @if ($incomes->hasMorePages())
                                <a href="{{ $incomes->nextPageUrl() }}" class="btn btn-light pagination-btn">Next</a>
                            @else
                                <button class="btn btn-light pagination-btn" disabled>Next</button>
                            @endif
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>


    <script>
        const incomeLabels = @json($labels);
        const incomeTotals = @json($totals);
        // Register the plugin for Chart.js
        Chart.register(ChartDataLabels);

        const ctx = document.getElementById('hiresChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: incomeLabels,
                datasets: [{
                    label: 'Amount Received (₹)',
                    data: incomeTotals,
                    backgroundColor: '#587C50',
                    borderRadius: 5
                }]
            },
            options: {
                indexAxis: 'y', // horizontal bar
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'right',
                        color: '#000',
                        font: {
                            weight: 'bold'
                        },
                        formatter: value => value
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });


        const pieCanvas = document.getElementById('myPieChart'); // Use getElementById
        if (pieCanvas) {
            const pieCtx = pieCanvas.getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: [
                        'Human Resource', 'Camps Expenses', 'Training & Capacity Building',
                        'Equipment & Supplies', 'Travel Expenses',
                        'IEC Material Expenses', 'Administrative Expenses',
                        'Accommodation Expenses', 'Monitoring & Evaluation', 'Miscellaneous Expenses'
                    ],
                    datasets: [{
                        label: 'Votes',
                        data: [
                            {{ $pieChartData->human_resource ?? 0 }},
                            {{ $pieChartData->camp_exp ?? 0 }},
                            {{ $pieChartData->training_exp ?? 0 }},
                            {{ $pieChartData->equipment ?? 0 }},
                            {{ $pieChartData->travel_exp ?? 0 }},
                            {{ $pieChartData->material_exp ?? 0 }},
                            {{ $pieChartData->administrative_exp ?? 0 }},
                            {{ $pieChartData->accomodation_exp ?? 0 }},
                            {{ $pieChartData->monitoring_exp ?? 0 }},
                            {{ $pieChartData->miscellaneous_exp ?? 0 }}
                        ],
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCD56', '#2ECC71',
                            '#8E44AD', '#E67E22', '#1ABC9C', '#3498DB',
                            '#F39C12', '#C0392B'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false // 🔥 This hides the labels on top
                        },
                        tooltip: {

                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.parsed || 0;
                                    return `${label}: ₹${value.toLocaleString()}`;
                                }
                            }
                        }
                    }
                }
            });
        } else {
            console.error('Pie chart canvas not found!');
        }
    </script>

    <script>
        function resetFilter() {

            document.getElementById('incomeFilterForm').reset();

            window.location.href = "{{ route('income.view-income') }}";
        }
    </script>

    <script>
        function exportData() {
            const form = document.getElementById('incomeFilterForm');
            const incomeType = form.querySelector('select[name="income_type"]').value;
            const donationType = form.querySelector('select[name="donation_type"]').value;
            const projectType = form.querySelector('select[name="project_type"]').value;

            const queryParams = new URLSearchParams({
                income_type: incomeType,
                donation_type: donationType,
                project_type: projectType
            }).toString();

            const exportUrl = "{{ route('income.export') }}?" + queryParams;
            window.location.href = exportUrl;
        }
    </script>

@endsection
