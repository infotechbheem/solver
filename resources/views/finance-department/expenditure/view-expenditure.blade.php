@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/income.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    @include('components.breadcrumb')
    @include('components.expenditure.view-expenditure')

    <script>
        // Register the plugin for Chart.js
        Chart.register(ChartDataLabels);

        const screenWidth = window.innerWidth;

        const labels = [
            'Human Resource', 'Equipment & Suplies', 'Travel Expenses',
            'IEC Material Expenses', 'Accomondation Expenses', 'Miscellaneous'
        ];

        const ctx = document.getElementById('hiresChart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: screenWidth <= 426 ? labels.map(() => '') : labels, // hide labels if screen <= 426px
                datasets: [{
                    label: 'Hires',
                    data: [173, 133, 129, 127, 115, 99],
                    backgroundColor: '#587C50',
                    borderRadius: 5
                }]
            },
            options: {
                indexAxis: 'y',
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

        // Optional: update on resize
        window.addEventListener('resize', () => {
            const newWidth = window.innerWidth;
            chart.data.labels = newWidth <= 426 ? labels.map(() => '') : labels;
            chart.update();
        });


        const pieCanvas = document.getElementById('myPieChart'); // Use getElementById
        if (pieCanvas) {
            const pieCtx = pieCanvas.getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: [
                        'Food & Beverage', 'Rent', 'Utilities',
                        'Insurance', 'Wages & Salaries',
                        'Office Fixtures & Equipment', 'Legal & Finance Services',
                        'Official Supplies', 'Travel', 'IT Service', 'Licence & Subscription'
                    ],
                    datasets: [{
                        label: 'Votes',
                        data: [12, 19, 17, 15, 10, 8, 6, 15, 12, 18, 7],
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCD56', '#2ECC71',
                            '#8E44AD', '#E67E22', '#1ABC9C', '#3498DB',
                            '#F39C12', '#C0392B', '#7F8C8D'
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
