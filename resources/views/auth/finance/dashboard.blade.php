@extends('auth.finance.layouts.app')
@section('main_container')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/human-resource-dashboard.css') }}">
    <!-- Chart.js Data Labels Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js">
    </script>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">

                <a href="{{ url('/auth/finance/income/total-income') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> ₹20001</h2>
                        <div class="m-b-5">Total Income</div>
                        <i class="fa-solid fa-sack-dollar widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <a href="{{ url('/auth/finance/expenditure/total-expense') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> ₹125506</h2>
                        <div class="m-b-5">Total Expenditure</div>
                        <i class="fa-solid fa-hands-holding-circle widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <a href="{{ url('/auth/finance/expenditure/total-expense') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">₹1570</h2>
                        <div class="m-b-5">Project Base</div>
                        <i class="fa-solid fa-filter-circle-dollar widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <a href="{{ url('/auth/finance/expenditure/total-expense') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">₹1570</h2>
                        <div class="m-b-5">Office Base</div>
                        <i class="fa-solid fa-hands-holding-circle widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                    </div>
                </a>
            </div>
        </div>
    </div>



    <div class="row mt-4">
        <div class="col-lg-6">
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
        </div>
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Hire by Bussiness Unit</div>
                </div>
                <div class="ibox-body p-0 pt-2">
                    <div style="width: 100%; height: 230px;"> <!-- Added height for responsiveness -->
                        <canvas id="hiresChart"></canvas>

                    </div>
                </div>
            </div>
        </div>

    </div>




    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style>

    <script>
        // Register the plugin for Chart.js
        Chart.register(ChartDataLabels);

        const ctx = document.getElementById('hiresChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Human Resource', 'Transport', 'Food',
                    'Accomondation', 'IT Service',
                    'Printing', 'Equipment',
                    'Training', 'Other/Miscellaneous'
                ],
                datasets: [{
                    label: 'Hires',
                    data: [173, 133, 129, 127, 115, 99, 94, 49, 38],
                    backgroundColor: '#007b8a',
                    borderRadius: 5
                }]
            },
            options: {
                indexAxis: 'y', // Makes it horizontal
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
    </script>
@endsection
