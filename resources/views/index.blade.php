@extends('layouts.app')
@section('main_container')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <a href="{{ url('/finance-department/income/total-income') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">₹ 2001</h2>
                        <div class="m-b-5">Total Income</div>
                        <i class="fa-solid fa-sack-dollar widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <a href="{{ url('/finance-department/expenditure/total-expense') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">₹ 1250</h2>
                        <div class="m-b-5">Total Expense </div>
                        <i class="fa-solid fa-hands-holding-circle widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <a href="{{ url('/hr-department/team/all-team-member') }}" style="color: white">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">1570</h2>
                        <div class="m-b-5">Total Member</div>
                        <i class="ti-user widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">108</h2>
                    <div class="m-b-5">NEW USERS</div>
                    <i class="ti-user widget-stat-icon"></i>
                    <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                </div>
            </div>
        </div>
    </div>
    <div class="all-program-all-grant-section">
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
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Grant Amount by Program</div>
                </div>
                <div class="ibox-body">
                    <div class="row align-items-center pt-2">
                        <div class="col-md-6">
                            <canvas id="doughnut_chart" style="height:160px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Economic
                                52%</div>
                            <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Improvement 27%
                            </div>
                            <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Education
                                21%</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Grant Amount Ratio</div>
                </div>
                <div class="ibox-body">
                    <div class="row align-items-center">
                        <div class="col-md-6" style="display: flex; justify-content:center">
                            <div class="chart-container">
                                <canvas id="myPieChart"></canvas>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="m-b-20 text-success"><i class="fa fa-circle-o m-r-10"></i>Economic
                                52%</div>
                            <div class="m-b-20 text-info"><i class="fa fa-circle-o m-r-10"></i>Improvement 27%
                            </div>
                            <div class="m-b-20 text-warning"><i class="fa fa-circle-o m-r-10"></i>Education
                                21%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
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
                    <div class="ibox-title">Grant Requested v/s Grant Declined</div>
                </div>
                <div class="ibox-body p-0 pt-2">
                    <div class="grant-table-scroll">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Grant</th>
                                    <th>Grant Required</th>
                                    <th>Grant Declined</th>
                                    <th>Percentage (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Education Fund</td>
                                    <td>$10,000</td>
                                    <td>$2,000</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>Health Support</td>
                                    <td>$15,000</td>
                                    <td>$3,000</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>Research Grant</td>
                                    <td>$25,000</td>
                                    <td>$5,000</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>Research Grant</td>
                                    <td>$25,000</td>
                                    <td>$5,000</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>$25,000</td>
                                    <td>$5,000</td>
                                    <td>20%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
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
                    <div style="width: 100%; height: 230px;"> <!-- Added height for responsiveness -->
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <script src="{{ asset('asset/js/index-pie-chart.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pieCanvas = document.getElementById('doughnut_chart');
            if (pieCanvas) {
                const pieCtx = pieCanvas.getContext('2d');
                new Chart(pieCtx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            label: 'Votes',
                            data: [12, 19, 17, 15],
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFD700', '#587C50'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            } else {
                console.error('Pie chart canvas not found!');
            }
        });
    </script>
@endsection