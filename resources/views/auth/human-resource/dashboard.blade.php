@extends('auth.human-resource.layouts.app')
@section('main_container')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/human-resource-dashboard.css') }}">
    <!-- Chart.js Data Labels Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">201</h2>
                    <div class="m-b-5">Total Employee</div><i class="ti-user widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">1250</h2>
                    <div class="m-b-5">Total Volunteer</div><i
                        class="fa-solid fa-users-between-lines widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">1570</h2>
                    <div class="m-b-5">TOTAL Intern</div><i class="fa-solid fa-users-viewfinder  widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                </div>
            </div>
        </div>
    </div>


    <div class="all-employe-position-details">
        <div class="demographics-main">
            <div class="demographics-title">
                <h2>Demographiics</h2>
            </div>
            <div class="demographics-card">
                <h3>1,998</h3>
                <h3>Head Count</h3>
                <div class="demographics-image">
                    <img src="https://img.freepik.com/free-photo/diverse-people-character-mockups-set_53876-96056.jpg?ga=GA1.1.559987269.1744107898&w=740"
                        alt="">
                </div>
                <div class="demographics-bottom">
                    <div class="demographics-bottom-content">
                        <h3>803</h3>
                        <h3>Male</h3>
                    </div>
                    <div class="demographics-bottom-content">
                        <h3>754</h3>
                        <h3>Female</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="demographics-main">
            <div class="demographics-title hires-title">
                <h2>Hires</h2>
            </div>
            <div class="demographics-card">
                <h3>1,998</h3>
                <h3> Hires</h3>
                <div class="demographics-image">
                    <img src="https://img.freepik.com/free-vector/business-men-women-holding-blank-banner-professional-people-with-white-announcement-board-poster-hands-copy-space-young-successful-workers-with-billboard_575670-1408.jpg?ga=GA1.1.559987269.1744107898&w=740"
                        alt="">
                </div>
                <div class="demographics-bottom">
                    <div class="demographics-bottom-content">
                        <h3>803</h3>
                        <h3>Permanent</h3>
                    </div>
                    <div class="demographics-bottom-content">
                        <h3>754</h3>
                        <h3>Temporary</h3>
                    </div>
                </div>

            </div>
        </div>
        <div class="demographics-main">
            <div class="demographics-title open-positions-title">
                <h2>Open Positions</h2>
            </div>
            <div class="demographics-card">
                <h3>1,998</h3>
                <h3>Open Positions</h3>
                <div class="demographics-image">
                    <img src="{{ asset('asset/img/opening.png') }}" alt="">
                </div>
                <div class="demographics-bottom">
                    <div class="demographics-bottom-content">
                        <h3>803</h3>
                        <h3>Regular</h3>
                    </div>
                    <div class="demographics-bottom-content">
                        <h3>754</h3>
                        <h3>Contract</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="demographics-main">
            <div class="demographics-title terminations-title">
                <h2>Terminations</h2>
            </div>
            <div class="demographics-card">
                <h3>1,998</h3>
                <h3>Terminations</h3>
                <div class="demographics-image">
                    <img src="https://img.freepik.com/free-vector/business-men-women-holding-blank-banner-professional-people-with-white-announcement-board-poster-hands-copy-space-young-successful-workers-with-billboard_575670-1408.jpg?ga=GA1.1.559987269.1744107898&w=740"
                        alt="">
                </div>
                <div class="demographics-bottom">
                    <div class="demographics-bottom-content">
                        <h3>803</h3>
                        <h3>Full Time</h3>
                    </div>
                    <div class="demographics-bottom-content">
                        <h3>754</h3>
                        <h3>Part Time</h3>
                    </div>
                </div>
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
                    'Operational', 'Communications', 'Program',
                    'Quality', 'Product Development',
                    'Research', 'Human Resource',
                    'Finance', 'Engineering'
                ],
                datasets: [{
                    label: 'Hires',
                    data: [173, 133, 129, 127, 115, 99, 94, 49, 38],
                    backgroundColor: '#587C50',
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
