@extends('website.users.investor.layout.investorlayout')
@section('agriofficer.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-content">
                    {{--  Dashboaed containt  --}}
                    {{--  Title  --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Investment</h5>
                            <div class="d-flex align-items-center">
                                {{--  <!-- Total investment amount -->  --}}
                                <h1 class="display-4 mb-0">Total Investment:
                                    ৳{{ $totalCropInvestment + $totalOrgInvestment }}</h1>
                            </div>
                        </div>
                    </div>
                    {{--  chart of comparing  --}}
                    <canvas id="investmentChart" class="mt-3" width="500" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>


    {{--  chart of comparing  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch data for the chart
            const cropProjectInvestmentData = [{{ $totalCropInvestment }}]; // Total crop project investment amount
            const organizationInvestmentData = [{{ $totalOrgInvestment }}]; // Total organization investment amount
            const labels = ['Total Investment']; // Label for the total investment

            // Create the chart
            const ctx = document.getElementById('investmentChart').getContext('2d');
            const investmentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Crop Project Investment ৳',
                        data: cropProjectInvestmentData,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Organization Investment ৳',
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
@endsection
