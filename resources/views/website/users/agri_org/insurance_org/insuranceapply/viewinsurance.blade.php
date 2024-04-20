@extends('website.users.agri_org.insurance_org.deashboad')
@section('scontent.dashboard')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="card-title font-weight-bold">Insurance Application Details</h3>
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
                            <td>{{ $insurance->project_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Description</strong></td>
                            <td>{{ $insurance->description }}</td>
                        </tr>
                        <tr>
                            <td><strong>Launch Date</strong></td>
                            <td>{{ $insurance->launch_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>End Date</strong></td>
                            <td>{{ $insurance->end_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>Farm Size</strong></td>
                            <td>{{ $insurance->farm_size }}</td>
                        </tr>
                        <tr>
                            <td><strong>Crop Quality</strong></td>
                            <td>{{ $insurance->corp_quality }} KG</td>
                        </tr>
                        <tr>
                            <td><strong>Pesticide Cost</strong></td>
                            <td>{{ $insurance->pesticide_cost }} TK</td>
                        </tr>
                        <tr>
                            <td><strong>Labour Cost</strong></td>
                            <td>{{ $insurance->labour_cost }} TK</td>
                        </tr>
                        <tr>
                            <td><strong>Total Expence</strong></td>
                            <td>{{ $insurance->labour_cost + $insurance->pesticide_cost }} TK</td>
                        </tr>
                        <tr>
                            <td><strong>Funding Status</strong></td>
                            <td>{{ $insurance->funding_status ? 'Funded' : 'Not Funded' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Farmer</strong></td>
                            <td><a href="#" data-toggle="modal"
                                    data-target="#farmerModal">{{ $insurance->farmer_name }}</a></td>
                        </tr>
                        <tr>
                            <td><strong>Crop Amount</strong></td>
                            <td>{{ $insurance->crop_amount }} KG</td>
                        </tr>
                        <tr>
                            <td><strong>Insurance premium</strong></td>
                            <td>{{ $insurance->insurance_premium }} TK</td>
                        </tr>
                        <tr>
                            <td><strong>Total Project Cost</strong></td>
                            <td>{{ $insurance->claim_amount }} TK</td>
                        </tr>

                        <tr>
                            <td>
                                <strong>Status</strong>
                            </td>
                            <td>
                                @if ($insurance->approvel_status == 1)
                                    <a href="{{ route('insuranceloan.status.change', ['id' => $insurance_id, 'status' => '0']) }}">
                                        <h5><span class="badge badge-info">Active</span></h5>
                                    </a>
                                @else
                                    <a href="{{ route('insuranceloan.status.change', ['id' => $insurance_id, 'status' => '1']) }}">
                                        <h5><span class="badge badge-danger">Inactive</span></h5>
                                    </a>
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="mb-3 p-3">
                {{-- Back button --}}
                <a href="{{ route('org.insurance.insuranceshow') }}" class="btn btn-secondary ">Back</a>
            </div>
        </div>
    </div><br>

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
                        <li><strong>Name:</strong> {{ $insurance->farmer_name }}</li>
                        <li><strong>Email:</strong> {{ $insurance->email }}</li>
                        <li><strong>Phone:</strong> {{ $insurance->phone }}</li>
                        <li><strong>Address:</strong> {{ $insurance->address }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
