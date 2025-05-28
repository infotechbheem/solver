<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.0"></script>

<canvas id="doubleBarChart" style="width: 100%; height: 400px;"></canvas>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof Chart === "undefined") {
            console.error("Chart.js failed to load.");
            return;
        }

        const ctx = document.getElementById('doubleBarChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Economic', 'Community', 'Health', 'Improvement', 'Education'],
                datasets: [{
                        label: 'Grant Required',
                        data: [5, 17, 13, 15, 18],
                        backgroundColor: '#587c50',
                        borderWidth: 1
                    },
                    {
                        label: 'Grant Declined',
                        data: [15, 19, 16, 17, 20],
                        backgroundColor: '#323F2F', // ✅ Corrected here
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    });
</script>
