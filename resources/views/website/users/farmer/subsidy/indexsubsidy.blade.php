@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Agriculture officer</h2>
            </div>
            {{--  Table start  --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>Acction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agriofficer as $officer)
                            <tr>
                                <td>{{ $officer->f_name }}
                                    {{ $officer->l_name }}</td>
                                <td>{{ $officer->address }}</td>
                                <td>{{ $officer->email }}</td>

                                <td><a href="{{ route('farmer.subsidy.openapply', ['id' => $officer->id]) }}" wire:navigate><button
                                        type="button" class="btn btn-primary btn-sm">Apply Subsidy</button>
                                    </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{--  end  --}}
        </div>

        {{--  Loan application list  --}}
        <div class="row">
            <div class="col-lg-12 col-12 text-center mt-4">
                <h2>subsidy Application list</h2>
            </div>
            {{-- Table start --}}
            <div class="table-responsive">
                <div style="overflow-x: auto;">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Agri officer Name</th>
                                <th>Reason for taking loan</th>
                                <th>Amount</th>
                                <th>Fram size</th>
                                <th>Approval Status</th>
                                <th>Issue Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subsideApplications as $Application)
                                <tr>
                                    <td>{{ $Application->agri_officer_name }}</td>
                                    <td>{{ $Application->reason_of_taking_subsidies }}</td>
                                    <td>{{ $Application->amount }}</td>
                                    <td>{{ $Application->farm_size }}</td>
                                    <td>{{ $Application->approvel_status == 1 ? 'Approved' : 'Not Approved' }}</td>
                                    <td>{{ $Application->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- End --}}
        </div>
    </div>
@endsection
