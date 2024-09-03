@extends('admin.layouts.app')
@section('app')
    <div class="dash-content p-8 bg-gray-100 min-h-screen">
        <div class="overview">
            <div class="title mb-8">
                <h1 class="text-3xl font-bold text-gray-700">Dashboard</h1>
                <p class="text-gray-500">Welcome to your dashboard</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="box bg-gradient-to-r from-blue-400 to-blue-600 text-white p-6 rounded-lg shadow-lg flex items-center justify-between">
                    <i class="uil uil-thumbs-up text-5xl"></i>
                    <div class="text-right">
                        <span class="block text-lg">Total Likes</span>
                        <span class="block text-4xl font-bold">50,120</span>
                    </div>
                </div>
                <div class="box bg-gradient-to-r from-green-400 to-green-600 text-white p-6 rounded-lg shadow-lg flex items-center justify-between">
                    <i class="uil uil-comments text-5xl"></i>
                    <div class="text-right">
                        <span class="block text-lg">Comments</span>
                        <span class="block text-4xl font-bold">20,120</span>
                    </div>
                </div>
                <div class="box bg-gradient-to-r from-red-400 to-red-600 text-white p-6 rounded-lg shadow-lg flex items-center justify-between">
                    <i class="uil uil-share text-5xl"></i>
                    <div class="text-right">
                        <span class="block text-lg">Total Shares</span>
                        <span class="block text-4xl font-bold">10,120</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="activity mt-12">
            <div class="title mb-8">
                <h2 class="text-2xl font-bold text-gray-700">Recent Activity</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Activity Chart</h3>
                    <canvas id="activityChart"></canvas>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Comments Chart</h3>
                    <canvas id="commentsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx1 = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Activity',
                    data: [10, 30, 50, 20, 25, 44],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                }
            }
        });

        const ctx2 = document.getElementById('commentsChart').getContext('2d');
        const commentsChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Comments',
                    data: [15, 25, 40, 50, 35, 30],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    barThickness: 20
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                }
            }
        });
    </script>
@endsection
