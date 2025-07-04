@extends('layouts.app')

@section('main_container')
    <link rel="stylesheet" href="{{ asset('asset/css/csr-company.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/income.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    @include('components.breadcrumb')
    @include('components.expenditure.view-expenditure')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const hireLabels = @json($hireChartLabel);
        const hireData = @json($hireChartTotal);
        // Register the plugin for Chart.js
        Chart.register(ChartDataLabels);

        const screenWidth = window.innerWidth;

        const labels = hireLabels;
        const data = hireData;

        const ctx = document.getElementById('hiresChart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: screenWidth <= 426 ? labels.map(() => '') : labels, // hide labels if screen <= 426px
                datasets: [{
                    label: 'Expense Type',
                    data: data,
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

        const pieLabel = @json($labels);
        const pieData = @json($data);
        const pieCanvas = document.getElementById('myPieChart'); // Use getElementById
        if (pieCanvas) {
            const pieCtx = pieCanvas.getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: pieLabel,
                    datasets: [{
                        label: 'Expenditure Distribution',
                        data: pieData,
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

    <script>
        function resetFilter() {

            document.getElementById('expenditureFilter').reset();

            window.location.href = "{{ route('expenditure.view-expenditure') }}";
        }
    </script>

    <script>
        function toggleExpenseFields() {
            var selected = $('#expenseSector').val();

            // Always hide and reset both sections
            $('#administrativeExpense').hide();
            $('#expenditureType').hide();

            // Show the relevant section based on selected sector
            if (selected === 'project_based') {
                $('#expenditureType').show();
            } else if (selected === 'office_expenses') {
                $('#administrativeExpense').show();
            }
        }

        $(document).ready(function() {
            toggleExpenseFields(); // Run on page load

            $('#expenseSector').on('change', function() {
                toggleExpenseFields(); // Run on dropdown change
            });
        });
    </script>

    <script>
        function exportExpenseFilter() {
            const form = document.getElementById('expenditureFilter');
            const expenseSector = form.querySelector('select[name="expenseSector"]').value;
            const expenseType = form.querySelector('select[name="expenseType"]').value;
            const administrativeExpense = form.querySelector('select[name="administrative_expense"]').value;

            const queryParams = new URLSearchParams({
                expenseSector: expenseSector,
                expenseType: expenseType,
                administrative_expense: administrativeExpense
            }).toString();

            const exportUrl = "{{ route('expenditure.export') }}?" + queryParams;
            window.location.href = exportUrl;
        }
    </script>
@endsection
