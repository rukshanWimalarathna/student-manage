// Dashboard Pie Charts
document.addEventListener('DOMContentLoaded', function() {
    console.log('Dashboard charts script loaded');

    // Student Age Distribution Chart
    const studentAgeCtx = document.getElementById('studentAgeChart');
    if (studentAgeCtx) {
        console.log('Initializing Student Age Chart');
        new Chart(studentAgeCtx, {
            type: 'pie',
            data: {
                labels: ['Under 18', '18-25', '26-35', 'Over 35'],
                datasets: [{
                    data: window.dashboardData.studentAges || [0, 0, 0, 0],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                    title: {
                        display: true,
                        text: 'Student Age Distribution'
                    }
                }
            }
        });
    } else {
        console.log('Student Age Chart element not found');
    }

    // Teacher Subject Distribution Chart
    const teacherSubjectCtx = document.getElementById('teacherSubjectChart');
    if (teacherSubjectCtx) {
        console.log('Initializing Teacher Subject Chart');

        // Get data from global variable or use defaults
        const subjectLabels = window.dashboardData.subjectLabels || ['Mathematics', 'Science', 'English', 'Other'];
        const subjectData = window.dashboardData.subjectData || [1, 1, 1, 1];

        new Chart(teacherSubjectCtx, {
            type: 'pie',
            data: {
                labels: subjectLabels,
                datasets: [{
                    data: subjectData,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                    title: {
                        display: true,
                        text: 'Teacher Subject Distribution'
                    }
                }
            }
        });
    } else {
        console.log('Teacher Subject Chart element not found');
    }
});
