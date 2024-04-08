@extends('website.users.investor.layout.investorlayout')
@section('agriofficer.dashboard')
    <section class="" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
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
                                        <td><strong>Project Name</strong></td>
                                        <td>{{ $cropproject->project_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description</strong></td>
                                        <td>{{ $cropproject->description }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Launch Date</strong></td>
                                        <td>{{ $cropproject->launch_date }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>End Date</strong></td>
                                        <td>{{ $cropproject->end_date }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Farm Size</strong></td>
                                        <td>{{ $cropproject->farm_size }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Crop Quality</strong></td>
                                        <td>{{ $cropproject->corp_quality }} KG</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pesticide Cost</strong></td>
                                        <td>{{ $cropproject->pesticide_cost }} TK</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Labour Cost</strong></td>
                                        <td>{{ $cropproject->labour_cost }} TK</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Expence</strong></td>
                                        <td>{{ $cropproject->labour_cost + $cropproject->pesticide_cost }} TK</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Funding Status</strong></td>
                                        <td>{{ $cropproject->funding_status ? 'Funded' : 'Not Funded' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Farmer</strong></td>
                                        <td><a href="#" data-toggle="modal"
                                                data-target="#farmerModal">{{ $cropproject->farmer_name }}</a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Crop</strong></td>
                                        <td>{{ $cropproject->crop_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created At</strong></td>
                                        <td>{{ $cropproject->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Updated At</strong></td>
                                        <td>{{ $cropproject->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="mb-3 p-3">
                            {{-- Back button --}}
                            <a href="{{ route('investor.cropproject.show') }}"
                                class="btn btn-secondary btn-lg mr-3">Back</a>

                            {{-- Invest button --}}
                            <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal"
                                data-target="#investModal">Invest</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--  show farmer info  --}}
        <div class="modal fade" id="farmerModal" tabindex="-1" role="dialog" aria-labelledby="farmerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="farmerModalLabel">Farmer Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li><strong>Name:</strong> {{ $cropproject->farmer_name }}</li>
                            <li><strong>Email:</strong> {{ $cropproject->farmer_email }}</li>
                            <li><strong>Phone:</strong> {{ $cropproject->farmer_phone }}</li>
                            <li><strong>Address:</strong> {{ $cropproject->farmer_address }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{--  Investing form  --}}
        <div class="modal fade" id="investModal" tabindex="-1" role="dialog" aria-labelledby="investModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="investModalLabel">Invest in Crop Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('investor.crop.invest', ['id' => $cropproject->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="investing_amount">Investing Amount:</label>
                                <input type="number" class="form-control" id="investing_amount" name="investing_amount"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="percentage_rate">Percentage Rate:</label>
                                <input type="number" class="form-control" id="percentage_rate" name="percentage_rate"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Invest</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
