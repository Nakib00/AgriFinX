@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Insurance Provider Organization</h2>
            </div>
            {{--  Table start  --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Insuranceroviders as $provider)
                            <tr>
                                <td><a href="{{ route('viewinsuranceprovider', $provider->id) }}"
                                        wire:navigate>{{ $provider->f_name }}
                                        {{ $provider->l_name }}</a></td>
                                <td>{{ $provider->address }}</td>
                                <td>{{ $provider->email }}</td>
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
                <h2> Insurance Application List</h2>
            </div>
            {{-- Table start --}}
            <div class="table-responsive">
                <div style="overflow-x: auto;">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Org Name</th>
                                <th>Insurance premium</th>
                                <th>Claim Amount</th>
                                <th>Crop Amount</th>
                                <th>Approval Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--  add insurance  --}}
                            @foreach ($insuApplications as $insu)
                                <tr>
                                    <td>{{ $insu->financial_group_name }}</td>
                                    <td>{{ $insu->insurance_premium }}</td>
                                    <td>{{ $insu->claim_amount }}</td>
                                    <td>{{ $insu->crop_amount }}</td>
                                    <td>{{ $insu->approvel_status == 1 ? 'Approved' : 'Not Approved' }}</td>
                                    <td><a href="{{ route('farmer.claiminsurance', ['id' => $insu->id]) }}"
                                            wire:navigate><button type="button" class="btn btn-primary btn-sm">Report Crop
                                                Loss</button>
                                        </a></td>
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
