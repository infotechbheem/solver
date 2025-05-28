
const pieCanvas = document.getElementById('myPieChart'); // Use getElementById
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
