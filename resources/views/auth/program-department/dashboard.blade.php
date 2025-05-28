@extends('auth.program-department.layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/income.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <style>
        .ibox {

            box-shadow: #323F2F 0px 1px 3px 0px, #323F2F 0px 0px 0px 1px;
            padding: 10px;
            border-radius: 5px;
        }

        .ibox .ibox-head {
            border-radius: 0;
            border: 2px solid #32349758;
        }

        .grapgh-content ul {
            display: flex;
            flex-direction: column;
            padding: 0;
            gap: 4px;
        }

        .grapgh-content ul li {
            font-size: 12px;
            display: flex;
            align-items: center;
        }

        .grapgh-content ul li span {
            font-size: 30px;
            margin-right: 6px;
            line-height: 0.5;
            margin-bottom: 7px;
        }
    </style>
    <div class="scr-registration-section">
        <div class="containers p-0">
            <div class="csr-registration-main-heading">
                <p>Program Status</p>
            </div>
            <form class="scr-registration-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">State</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="state"></canvas>
                                        </div>

                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> Bihar 20% </li>
                                            <li><span style="color:#36A2EB;">●</span> Delhi 20%</li>
                                            <li><span style="color:#FFCD56;">●</span> Jharkhand 20%</li>
                                            <li><span style="color:#2ECC71;">●</span> Punjab 20%</li>
                                            <li><span style="color:#8E44AD;">●</span> Kerla 20%</li>
                                            <li><span style="color:#E67E22;">●</span> Uttar Pradesh 20%</li>
                                        </ul>
                                        <div class="next-prev-btn">
                                            <button class="btn btn-outline-primary">
                                                <i class="fa-solid fa-angle-left"></i>
                                            </button>
                                            <button class="btn btn-outline-success">
                                                <i class="fa-solid fa-angle-right"></i></button>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">District</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="district"></canvas>
                                        </div>

                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> Patna 20% </li>
                                            <li><span style="color:#36A2EB;">●</span> New Delhi 20%</li>
                                            <li><span style="color:#FFD700;">●</span> Ranchi 20%</li>
                                            <li><span style="color:#2ECC71;">●</span> Ludhiana 20%</li>
                                            <li><span style="color:#323F2F;">●</span> Kochi 20%</li>
                                            <li><span style="color:#E67E22;">●</span> Lucknow 20%</li>
                                        </ul>
                                        <div class="next-prev-btn">
                                            <button class="btn btn-outline-primary">
                                                <i class="fa-solid fa-angle-left"></i>
                                            </button>
                                            <button class="btn btn-outline-success">
                                                <i class="fa-solid fa-angle-right"></i></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Area</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="area"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> Rural 25% </li>
                                            <li><span style="color:#36A2EB;">●</span>Urban 75%</li>

                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Project</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="project"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span>Unnato 100%</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Support Patner / Resource Orgnisation</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="support_partner"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> Kunj Innovation Trust </li>
                                            <li><span style="color:#36A2EB;">●</span>Bhrashpati Foundation </li>
                                            <li><span style="color:#FFCD56;">●</span>Yuva Bharat Trust </li>
                                            <li><span style="color:#8E44AD;">●</span>Uplift Live Foundation </li>
                                            <li><span style="color:#E67E22;">●</span>Mathura Health Departmen </li>
                                        </ul>
                                        <div class="next-prev-btn">
                                            <button class="btn btn-outline-primary">
                                                <i class="fa-solid fa-angle-left"></i>
                                            </button>
                                            <button class="btn btn-outline-success">
                                                <i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Team Member Name</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="team_member_name"></canvas>
                                        </div>

                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> Neeru </li>
                                            <li><span style="color:#36A2EB;">●</span>Jatin</li>
                                            <li><span style="color:#FFCD56;">●</span> tarini</li>
                                            <li><span style="color:#2ECC71;">●</span> Ankush</li>
                                            <li><span style="color:#8E44AD;">●</span>Roshani</li>
                                            <li><span style="color:#E67E22;">●</span>Kalpana</li>
                                        </ul>
                                        <div class="next-prev-btn">
                                            <button class="btn btn-outline-primary">
                                                <i class="fa-solid fa-angle-left"></i>
                                            </button>
                                            <button class="btn btn-outline-success">
                                                <i class="fa-solid fa-angle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Age</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="age"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> 1 - 10</li>
                                            <li><span style="color:#36A2EB;">●</span>11 - 18</li>
                                            <li><span style="color:#FFCD56;">●</span>19 - 25 </li>
                                            <li><span style="color:#8E44AD;">●</span>26 - 40</li>
                                            <li><span style="color:#E67E22;">●</span>41 - 59</li>
                                            <li><span style="color:#36A2EB;">●</span>60 - 69 </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Team Member Name</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="gender"></canvas>
                                        </div>

                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> Male </li>
                                            <li><span style="color:#36A2EB;">●</span>Female</li>
                                            <li><span style="color:#FFCD56;">●</span> Transgender</li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Caste</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="caste"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span>General</li>
                                            <li><span style="color:#36A2EB;">●</span>OBC</li>
                                            <li><span style="color:#FFCD56;">●</span>SC </li>
                                            <li><span style="color:#8E44AD;">●</span>ST</li>
                                            <li><span style="color:#E67E22;">●</span>PVTG's</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Religion</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="religion"></canvas>
                                        </div>

                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span>Hindu</li>
                                            <li><span style="color:#36A2EB;">●</span>Muslim</li>
                                            <li><span style="color:#FFCD56;">●</span>Sikh </li>
                                            <li><span style="color:#8E44AD;">●</span>Christian</li>
                                            <li><span style="color:#E67E22;">●</span>Jain</li>
                                            <li><span style="color:#36A2EB;">●</span>Budhist </li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Occupation</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="occupation"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> Handicraft Worker</li>
                                            <li><span style="color:#36A2EB;">●</span>Food Maker</li>
                                            <li><span style="color:#FFCD56;">●</span>Housemaker</li>
                                            <li><span style="color:#8E44AD;">●</span>Textile</li>
                                            <li><span style="color:#E67E22;">●</span>Shopkeeper</li>
                                            <li><span style="color:#36A2EB;">●</span>Tailoring</li>
                                            <li><span style="color:#FF6384;">●</span>Noe of the Above</li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Monthly Income</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="monthly_income"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> No Income</li>
                                            <li><span style="color:#8E44AD;">●</span> 1000 - 5000</li>
                                            <li><span style="color:#36A2EB;">●</span>5001 - 15000</li>
                                            <li><span style="color:#FFCD56;">●</span>15001 - 30000 </li>
                                            <li><span style="color:#8E44AD;">●</span>30001 - 45000</li>
                                            <li><span style="color:#E67E22;">●</span>45001 - 70000</li>
                                            <li><span style="color:#36A2EB;">●</span>70001 Above </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox p-0">
                            <div class="ibox-head">
                                <div class="ibox-title">Support</div>
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
                                <div class="ibox-title">Differently Abled</div>
                            </div>
                            <div class="ibox-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7" style="display: flex; justify-content:center">
                                        <div class="chart-container" style="height: 225px">
                                            <canvas id="differently_abled"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-5 grapgh-content">
                                        <ul>
                                            <li><span style="color:#FF6384;">●</span> Yes</li>
                                            <li><span style="color:#8E44AD;">●</span>No</li>


                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        Chart.register(ChartDataLabels);

        const pieCharts = [{
                id: 'state',
                data: [10, 20, 30, 10, 10, 20],
                labels: ['Bihar', 'Delhi', 'Jharkhand', 'Punjab', 'Uttar Pradesh', 'Kerala']
            },
            {
                id: 'district',
                data: [15, 25, 20, 10, 5, 25],
                labels: ['Patna', 'Ranchi', 'Ludhiana', 'Lucknow', 'Kochi', 'Delhi']
            },
            {
                id: 'area',
                data: [25, 75],
                labels: ['Rural', 'Urban', ]
            },
            {
                id: 'project',
                data: [100],
                labels: ['Unnati', ]
            }, {
                id: 'support_partner',
                data: [50, 25, 25],
                labels: ['Kunj Innovation ', 'Kunj Innovation ', 'Kunj Innovation ']
            }, {
                id: 'team_member_name',
                data: [50, 25, 25, 75, 40, 60],
                labels: ['Nerru ', 'Kunj  ', 'Kunj', "lkjhg", "kalpana"]
            }, {
                id: 'age',
                data: [50, 25, 25, 75, 40, 60],
                labels: ['Nerru ', 'Kunj  ', 'Kunj', "lkjhg", "kalpana"]
            }, {
                id: 'gender',
                data: [25, 50, 25],
                labels: ['male', 'female', 'transgendner']
            }, {
                id: 'caste',
                data: [25, 50, 25, 50, 30],
                labels: ['General', 'OBC', 'SC', 'ST', 'PVTGs']
            }, {
                id: 'religion',
                data: [25, 50, 25, 30],
                labels: ['Hindu', 'muslom', 'sikh', 'christian']
            },
            {
                id: 'occupation',
                data: [50, 15, 25, 30],
                labels: ['Handicraft Worker', 'Food Maker', 'Housemaker', 'Textile', 'Shopkeeper', 'Tailoring']
            },
            {
                id: 'monthly_income',
                data: [25, 50, 25, 30],
                labels: ['1000-5000', '50001-7000', '50001-7000', '50001-7000']
            }, {
                id: 'differently_abled',
                data: [25, 75],
                labels: ['Yes', "No"]
            }
        ];

        const backgroundColors = [
            '#FF6384', '#36A2EB', '#FFD700', '#2ECC71',
            '#587C50', '#E67E22'
        ];

        pieCharts.forEach(chart => {
            const canvas = document.getElementById(chart.id);
            if (canvas) {
                const ctx = canvas.getContext('2d');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: chart.labels,
                        datasets: [{
                            label: 'Expenses',
                            data: chart.data,
                            backgroundColor: backgroundColors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        let value = context.parsed || 0;
                                        return `${label}: ${value.toLocaleString()}%`;
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                console.error(`Canvas with ID "${chart.id}" not found!`);
            }
        });


        Chart.register(ChartDataLabels);

        const ctx = document.getElementById('hiresChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Vocational Training', 'Social Media', 'Branding',
                    'Packaging', 'Online Markenting', 'Offline Marketing',
                    'Governance Training', 'Financila Management', 'Financial Inclusion', 'Row Material'
                ],
                datasets: [{
                    label: 'Hires',
                    data: [153, 133, 129, 127, 115, 99, 94, 49, 38, 67],
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
