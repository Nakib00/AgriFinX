@extends('website.users.agri_officer.layout.agriofficerlayout')
@section('agriofficer.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-lg-12 col-12 text-center mb-4">
                        <h2>Subsidy application</h2>
                    </div>
                    {{--  Table start  --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Farmer Name</th>
                                    <th>Reason of taking subsidy</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subsides as $subside)
                                    <tr>
                                        <td>{{ $subside->farmer_name }}</td>
                                        <td>{{ $subside->reason_of_taking_subsidies }}</td>
                                        <td>{{ $subside->amount }}</td>
                                        <td>
                                            @if ($subside->approvel_status == 1)
                                                <a
                                                    href="{{ route('subside.status.change', ['id' => $subside->id, 'status' => '0']) }}">
                                                    <h5><span class="badge badge-info">Active</span></h5>
                                                </a>
                                            @else
                                                <a
                                                    href="{{ route('subside.status.change', ['id' => $subside->id, 'status' => '1']) }}">
                                                    <h5><span class="badge badge-danger">Inactive</span></h5>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{--  end  --}}
                </div>
            </div>
        </div>
    </div>
@endsection
