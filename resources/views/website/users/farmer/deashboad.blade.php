@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-content">
                    {{--  Dashboaed containt  --}}
                    {{--  invested crop project  --}}
                    <div class="row mt-3">
                        <div class="col-lg-12 col-12 text-center mb-4">
                            <h2>Invested Crop Project</h2>
                        </div>
                        {{--  Table start  --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Investing Amount</th>
                                        <th>Investing Date</th>
                                        <th>Percentage Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($investedProjects as $investment)
                                        <tr>
                                            <td>{{ $investment->project->project_name }}</td>
                                            <td>{{ $investment->investing_amount }}</td>
                                            <td>{{ $investment->investing_date }}</td>
                                            <td>{{ $investment->percentage_rate }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </table>
                        </div>
                        {{--  end  --}}
                    </div>

                    <h2>Project Investment Chart</h2>
                    <canvas id="investmentChart" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{--  <!-- Bootstrap JS and Chart.js -->  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    {{--  line chart  --}}
    <script>
        // Extract project names and invested amounts from PHP variable
        var projectNames = [];
        var investedAmounts = [];
        @foreach ($investedProjects as $investment)
            projectNames.push("{{ $investment->project->project_name }}");
            investedAmounts.push({{ $investment->investing_amount }});
        @endforeach

        // Create the chart
        var ctx = document.getElementById('investmentChart').getContext('2d');
        var investmentChart = new Chart(ctx, {
            type: 'line', // Changed to line chart
            data: {
                labels: projectNames,
                datasets: [{
                    label: 'Invested Amount ($)',
                    data: investedAmounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
