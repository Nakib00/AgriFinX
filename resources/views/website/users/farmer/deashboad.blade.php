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

                    {{--  chart of comparing  --}}
                    <canvas id="investmentChart" class="mt-3" width="500" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
