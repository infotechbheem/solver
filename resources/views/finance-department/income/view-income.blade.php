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
            <div class="grant-list grant-list-govt ">
                <div class="grant-searchbar">
                    <input type="text" id="grant-search-bar" class="form-control grant-search" placeholder="Search..."
                        onkeyup="searchGrants()">
                </div>
                <div class="grant-table-scroll">
                    <table class="table grant-table" id="grantTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type of Income</th>
                                <th>Type of Donation</th>
                                <th>Donor/organisation</th>
                                <th>Email Id</th>
                                <th>Contact Number</th>
                                <th>Sanction Amount </th>
                                <th>Received Amount </th>
                                <th>Payment Mode </th>
                                <th>Payment Date </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomeList as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $list->type_of_income }}</td>
                                    <td>{{ $list->type_of_donation }}</td>
                                    <td>{{ $list->donar_name }}</td>
                                    <td>{{ $list->email }}</td>
                                    <td>{{ $list->contact_number }}</td>
                                    <td>{{ $list->sanction_amount }}</td>
                                    <td>{{ $list->amount_received }}</td>
                                    <td>{{ isset($list->payment_mode) ? $list->payment_mode : '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($list->payment_date)->format('d-m-Y') }}</td>
                                    <td>
                                        <a
                                            href="{{ url('/finance-department/income/income-details', encrypt($list->id)) }}">
                                            <button class="btn btn-info">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ url('/finance-department/income/update-income-details') }}">
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

                <div class="grant-pagination-container">
                    <div class="grant-pagination-info">
                        Showing {{ $incomeList->firstItem() }} to {{ $incomeList->lastItem() }} of
                        {{ $incomeList->total() }} records
                    </div>
                    <div class="grant-pagination">
                        {{-- Previous Button --}}
                        @if ($incomeList->onFirstPage())
                            <button class="btn btn-light pagination-btn" disabled>Previous</button>
                        @else
                            <a href="{{ $incomeList->previousPageUrl() }}"
                                class="btn btn-light pagination-btn">Previous</a>
                        @endif

                        {{-- Page Numbers --}}
                        <div class="pagination-numbers">
                            @for ($i = 1; $i <= $incomeList->lastPage(); $i++)
                                <a href="{{ $incomeList->url($i) }}">
                                    <button
                                        class="pagination-number {{ $i == $incomeList->currentPage() ? 'active' : '' }}">{{ $i }}</button>
                                </a>
                            @endfor
                        </div>

                        {{-- Next Button --}}
                        @if ($incomeList->hasMorePages())
                            <a href="{{ $incomeList->nextPageUrl() }}" class="btn btn-light pagination-btn">Next</a>
                        @else
                            <button class="btn btn-light pagination-btn" disabled>Next</button>
                        @endif
                    </div>
                </div>

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
@endsection
