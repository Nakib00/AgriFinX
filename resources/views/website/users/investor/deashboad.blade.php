@extends('website.users.investor.layout.investorlayout')
@section('agriofficer.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-content">
                    {{--  Insert data from sidebar button  --}}
                    @yield('agriofficer.dashboard')

                    {{--  Dashboaed containt  --}}
                    {{--  Title  --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Investment</h5>
                            <div class="d-flex align-items-center">
                                {{--  <!-- Total investment amount -->  --}}
                                <h1 class="display-4 mb-0">Total Investment: ৳50</h1>
                            </div>
                        </div>
                    </div>
                    {{--  crop investment chart  --}}
                    <canvas id="investmentChart" class="mt-3" width="500" height="200"></canvas>
                    {{--  chart of comparing  --}}
                    <canvas id="cropinvestmentChart" class="mt-3" width="500" height="200"></canvas>
                    {{--  chart of investing org  --}}
                    <canvas id="investingorginvestmentChart" class="mt-3" width="500" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>


    {{--  chart of comparing  --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch data for the chart
            // Replace the following example data with your actual data
            const cropProjectInvestmentData = [50]; // Example data for crop project investment
            const organizationInvestmentData = [60]; // Example data for organization investment
            const labels = ['Project 1']; // Example project names

            // Create the chart
            const ctx = document.getElementById('investmentChart').getContext('2d');
            const investmentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Crop Project Investment',
                        data: cropProjectInvestmentData,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Organization Investment',
                        data: organizationInvestmentData,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Crop Project and Organization Investment Comparison',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    {{--  crop investment chart  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch data for the chart
            // Replace the following example data with your actual data
            const cropProjectInvestmentData = [50, 70, 20, 90, 120]; // Example data for crop project investment
            const labels = ['Project 1', 'Project 2', 'Project 3', 'Project 4',
                'Project 5'
            ]; // Example project names

            // Create the chart
            const ctx = document.getElementById('cropinvestmentChart').getContext('2d');
            const investmentChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Crop Project Investment',
                        data: cropProjectInvestmentData,
                        fill: false,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                        pointBorderColor: 'rgba(255, 99, 132, 1)',
                        pointHoverBackgroundColor: 'rgba(255, 99, 132, 1)',
                        pointHoverBorderColor: 'rgba(255, 99, 132, 1)'
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Crop Project Investment Trend',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    {{--  crop investment chart  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch data for the chart
            // Replace the following example data with your actual data
            const cropProjectInvestmentData = [50000, 30000, 20000]; // Example data for crop project investment
            const labels = ['Zantech', 'Napver', '3d nap']; // Example project names

            // Create the chart
            const ctx = document.getElementById('investingorginvestmentChart').getContext('2d');
            const investmentChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Crop Project Investment',
                        data: cropProjectInvestmentData,
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointBorderColor: 'rgba(54, 162, 235, 1)',
                        pointHoverBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Investing Org Investment Trend',
                            font: {
                                size: 18
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
