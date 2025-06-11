@extends('layouts.app')
@section('main_container')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <a href="{{ url('/finance-department/income/view-income') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">₹ {{ $totalIncome }}</h2>
                        <div class="m-b-5">Total Income</div>
                        <i class="fa-solid fa-sack-dollar widget-stat-icon"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <a href="{{ url('/finance-department/expenditure/view-expenditure') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">₹ {{ $totalExpenditure }}</h2>
                        <div class="m-b-5">Total Expense </div>
                        <i class="fa-solid fa-hands-holding-circle widget-stat-icon"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <a href="{{ url('/hr-department/team/all-team-member') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $totalMember }}</h2>
                        <div class="m-b-5">Total Member</div>
                        <i class="ti-user widget-stat-icon"></i>
                    </div>
                </a>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">108</h2>
                    <div class="m-b-5">NEW USERS</div>
                    <i class="ti-user widget-stat-icon"></i> --}}
        {{-- <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div> --}}
        {{-- </div>
            </div>
        </div> --}}
    </div>
    {{-- <div class="all-program-all-grant-section">
        <div class="top-section">All Program - All Grant</div>
        <div class="all-program-all-grant">
            <div class="title">NFP Grants</div>
            <div class="all-program-all-grant-dropdown">
                <select class="all-program-all-grant-dropdown">
                    <option>Month</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                </select>
                <select class="all-program-all-grant-dropdown">
                    <option>Program</option>
                    <option>Program A</option>
                    <option>Program B</option>
                    <option>Program C</option>
                </select>
                <select class="all-program-all-grant-dropdown">
                    <option>Grant</option>
                    <option>Grant 1</option>
                    <option>Grant 2</option>
                    <option>Grant 3</option>
                </select>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox" style="min-height: 350px;">
                <div class="ibox-head bg-dark text-white">
                    <div class="ibox-title">Alloted Amount by Program</div>
                </div>
                <div class="ibox-body">
                    <div class="row align-items-center pt-2">
                        <div class="col-md-12">
                            <canvas id="doughnut_chart" style="height: 250px; width: 100%;"></canvas>
                        </div>
                        {{-- Optional dynamic legend --}}
                        {{--
                    <div class="col-md-6">
                        @foreach ($labels as $index => $label)
                            <div class="m-b-20">
                                <i class="fa fa-circle-o m-r-10"
                                    style="color: {{ ['#FF6384', '#36A2EB', '#FFD700', '#587C50', '#8A2BE2'][$index % 5] }}"></i>
                                {{ $label }} - {{ number_format(($totals[$index] / $totals->sum()) * 100, 1) }}%
                            </div>
                        @endforeach
                    </div>
                    --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ibox" style="min-height: 350px;">
                <div class="ibox-head bg-dark text-white">
                    <div class="ibox-title">Alloted Target by Program</div>
                </div>
                <div class="ibox-body">
                    <div class="row align-items-center pt-2">
                        <div class="col-md-12">
                            <div class="chart-container d-flex justify-content-center align-items-center"
                                style="height: 250px;">
                                <canvas id="myPieChart" style="height: 250px; width: auto; max-width: 250px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Grant Required vs Grant Declined By Program</div>
                </div>
                <div class="ibox-body p-0 pt-2">
                    <div class="double-chart" style="width: 100%; height: 230px;">
                        @include('components.double-bar-chart')
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Encombered & Balance Actual to Budget By Grant</div>
                </div>
                <div class="ibox-body p-0 pt-2">
                    <div style="width: 100%; height: 230px;">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}

    <div class="row">
        {{-- <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Encombered by Program</div>
                </div>
                <div class="ibox-body p-0 pt-2">
                    <div class="encombered-program">
                        <div class="comunity-services">
                            <h4>Education</h4>
                            <h6>10:30pm</h6>
                        </div>
                        <div class="comunity-education-ervices">
                            <div class="comunity-education-ervices-right">
                                <div class="education-right">
                                    <h4>Education</h4>
                                    <h6>10:30pm</h6>

                                </div>
                                <div class="health-right">
                                    <h4>Health</h4>
                                    <h6>10:30pm</h6>
                                </div>
                            </div>
                            <div class="comunity-education-ervices-right">
                                <div class="education-right environment-right">
                                    <h4>Environment</h4>
                                    <h6>10:30pm</h6>

                                </div>
                                <div class="health-right economic-right">
                                    <h4>Economic</h4>
                                    <h6>10:30pm</h6>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Beneficiary Details</div>
                </div>
                <div class="ibox-body p-0 pt-2">
                    <div class="grant-table-scroll">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Program Type</th>
                                    <th>Donar Organisatiion</th>
                                    <th>Project</th>
                                    <th>Support Partner</th>
                                    <th>Team Member</th>

                                </tr>
                            </thead>
                            @php
                                $programType = [
                                    'social_protection' => 'Social Protection',
                                    'livelihood_beneficiray' => 'Livelihood Beneficiary',
                                    'community_capacity' => 'Community Capacity',
                                    'digital_literacy' => 'Digital Literacy & Financial Inclusion',
                                ];
                                $donar = [
                                    'npcl' => 'NPCL',
                                    'tata' => 'TATA Trust',
                                    'smile' => 'Smile Foundation',
                                ];
                                $project = [
                                    'sahyog' => 'Sahyog',
                                    'unnati' => 'Unnati',
                                    'saksham' => 'Saksham',
                                    'uttkarsh' => 'Uttkarsh',
                                    'others' => 'Others',
                                ];
                                $supportPartner = [
                                    'kunj' => 'Kunj Innovation Trust',
                                    'bhraspati' => 'Bhrashpati Foundation',
                                    'yuva' => 'Yuva Bharat Trust',
                                    'uplift' => 'Uplift Live Foundation',
                                    'mathura' => 'Mathura Health Department',
                                ];
                            @endphp
                            <tbody>
                                @foreach ($beneficiaryInProgram as $beneficiary)
                                    <tr>
                                        <td>{{ $beneficiary->beneficiary_name ?? '' }}</td>
                                        <td>{{ $programType[$beneficiary->program_type] ?? $beneficiary->program_type }}
                                        </td>
                                        <td>{{ $donar[$beneficiary->donar_organisation] ?? $beneficiary->donar_organisation }}
                                        </td>
                                        <td>{{ $project[$beneficiary->project] ?? $beneficiary->project }}</td>
                                        <td>{{ $supportPartner[$beneficiary->support_partner] ?? $beneficiary->support_partner }}
                                        </td>
                                        <td>{{ $beneficiary->team->full_name ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>





    {{-- <script src="{{ asset('asset/js/index-pie-chart.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pieCanvas = document.getElementById('doughnut_chart');
            if (pieCanvas) {
                const pieCtx = pieCanvas.getContext('2d');
                new Chart(pieCtx, {
                    type: 'doughnut',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label: 'Grant Allocation',
                            data: @json($totals),
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFD700', '#587C50',
                                '#8A2BE2'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            } else {
                console.error('Pie chart canvas not found!');
            }
        });
    </script>
    <script>
        const pieCanvas = document.getElementById('myPieChart');

        if (pieCanvas) {
            const pieCtx = pieCanvas.getContext('2d');

            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: @json($labelsAlotedTarget),
                    datasets: [{
                        data: @json($totalsAlotedTarget),
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFD700', '#587C50', '#8A2BE2'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    const index = tooltipItem.dataIndex;
                                    const full = @json($tooltipsAlotedTarget)[index];

                                    const items = full.split(',');
                                    const grouped = [];
                                    for (let i = 0; i < items.length; i += 2) {
                                        grouped.push(items.slice(i, i + 2).join(', '));
                                    }

                                    return grouped;
                                }
                            }
                        },
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true
                            }
                        }
                    }
                }
            });
        } else {
            console.error('Pie chart canvas not found!');
        }
    </script>

    {{-- <script>
        const barCanvas = document.getElementById('barChart');
        if (barCanvas) {
            const barCtx = barCanvas.getContext('2d');

            const salesData = [12, 19, 3, 5, 8, 10, 14, 9, 6, 7, 11, 15];

            // Splitting data into halves
            const bottomHalf = salesData.map(value => value / 2); // Blue bottom half
            const topHalf = salesData.map(value => value / 2); // Red top half

            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: [
                        'January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'
                    ],
                    datasets: [{
                            label: 'Bottom Half',
                            data: bottomHalf,
                            backgroundColor: '#323F2F',
                            stack: 'stack1'
                        },
                        {
                            label: 'Top Half',
                            data: topHalf,
                            backgroundColor: '#587c50',
                            stack: 'stack1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Ensures full width usage
                    scales: {
                        y: {
                            beginAtZero: true,
                            stacked: true
                        }
                    }
                }
            });
        } else {
            console.error('Bar chart canvas not found!');
        }
    </script> --}}
@endsection
