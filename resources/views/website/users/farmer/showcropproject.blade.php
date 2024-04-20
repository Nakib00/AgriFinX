@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title font-weight-bold">Crop Project Details</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 30%;">Project Information</th>
                                    <th>Values</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Project Name</td>
                                    <td>{{ $cropproject->project_name }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $cropproject->description }}</td>
                                </tr>
                                <tr>
                                    <td>Crop Name</td>
                                    <td>{{ $cropproject->name }}</td>
                                </tr>
                                <tr>
                                    <td>Launch Date</td>
                                    <td>{{ $cropproject->launch_date }}</td>
                                </tr>
                                <tr>
                                    <td>End Date</td>
                                    <td>{{ $cropproject->end_date }}</td>
                                </tr>
                                <tr>
                                    <td>Farm Size</td>
                                    <td>{{ $cropproject->farm_size }}</td>
                                </tr>
                                <tr>
                                    <td>Crop Quality</td>
                                    <td>{{ $cropproject->corp_quality }} KG</td>
                                </tr>
                                <tr>
                                    <td>Pesticide Cost</td>
                                    <td>{{ $cropproject->pesticide_cost }} TK</td>
                                </tr>
                                <tr>
                                    <td>Labour Cost</td>
                                    <td> {{ $cropproject->labour_cost }} TK</td>
                                </tr>
                                <tr>
                                    <td>Total Expence</td>
                                    <td> {{ $cropproject->labour_cost + $cropproject->pesticide_cost }} TK</td>
                                </tr>
                                <tr>
                                    @if (isset($cropproject->sells) && $cropproject->sells !== null)
                                        <td>Total Sells</td>
                                        <td>{{ $cropproject->sells * $cropproject->corp_quality }} TK</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Funding Status</td>
                                    <td>{{ $cropproject->funding_status ? 'Funded' : 'Not Funded' }}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{ $cropproject->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>{{ $cropproject->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{--  <!-- Sell Amount Button -->  --}}
                        <div class="text-center mb-4 mt-3">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                data-target="#sellAmountModal">
                                Sell Amount
                            </button>
                        </div>

                        {{--  Risk assment  --}}
                        <div class="card-header text-center">
                            <h3 class="card-title font-weight-bold">Risk assessment Details</h3>
                        </div>
                        <div class="mb-3"><br><br>
                            <strong class="pt-5">Cultavation Time feedback:</strong>
                            @if ($cropproject->cropStartMonthDay <= $cropproject->launchMonthDay && $cropproject->cropEndMonthDay >= $cropproject->endMonthDay)
                                <p style="text-align: center; color: green;">Start your crop project with confidence - our
                                    comprehensive risk assessment guarantees zero risk for your farm's success!</p>
                            @else
                                <p style="text-align: center; color: red;"><strong>The launch and end dates of the project
                                        do not
                                        match the cultivation start and end dates of the crop.</strong></p>
                            @endif

                        </div>

                        <div class="mb-3"><br>
                            <strong>Profit Analysis:</strong>
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Total Expence</th>
                                        <th>Total crop sells</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $cropproject->labour_cost + $cropproject->pesticide_cost }} TK</td>
                                        <td>{{ $cropproject->sells * $cropproject->corp_quality }} TK<i class="fa fa-tasks"
                                                aria-hidden="true"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($cropproject->labour_cost + $cropproject->pesticide_cost < $cropproject->sells * $cropproject->corp_quality)
                                <p style="text-align: center; color: green;"><strong>Congratulations! This crop project is
                                        expected
                                        to yield profit.</strong></p>
                            @else
                                <p style="text-align: center; color: red;"><strong>Unfortunately, this crop project is not
                                        projected
                                        to yield profit.</strong></p>
                            @endif

                        </div>
                        <div class="mb-3 mt-4"><br>
                            <strong>Price Comparison:</strong>

                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Crop Current Price</th>
                                        <th>Crop sell amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $cropproject->Current_Price }} TK</td>
                                        <td>{{ $cropproject->sells }} TK</td>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($cropproject->Current_Price < $cropproject->sells)
                                <p style="text-align: center; color: green;"><strong>Congratulations! This crop project is
                                        expected
                                        to yield profit.</strong></p>
                            @else
                                <p style="text-align: center; color: red;"><strong>Unfortunately, this crop project is not
                                        projected
                                        to yield profit.</strong></p>
                            @endif

                        </div><br>


                        {{--  Back button  --}}
                        <a href="{{ route('farmer.cropproject') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--  <!-- Sell Amount Modal -->  --}}
    <div class="modal fade" id="sellAmountModal" tabindex="-1" role="dialog" aria-labelledby="sellAmountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sellAmountModalLabel">Sell Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('farmer.sell.update', $cropproject_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="sellPrice">1kg Sell Price</label>
                            <input type="text" class="form-control" id="sellPrice" name="sell"
                                placeholder="Enter Sell Price">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
