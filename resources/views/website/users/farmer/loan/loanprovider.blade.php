@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Microloan Provider Organization</h2>
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
                        @foreach ($loanProviders as $provider)
                            <tr>
                                <td><a href="{{ route('viewloanprovider', $provider->id) }}" wire:navigate>{{ $provider->f_name }}
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
                <h2>Loan application list</h2>
            </div>
            {{-- Table start --}}
            <div class="table-responsive">
                <div style="overflow-x: auto;">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Org Name</th>
                                <th>Reason for taking loan</th>
                                <th>Amount</th>
                                <th>Interest Rate</th>
                                <th>Approval Status</th>
                                <th>Loan Issue Date</th>
                                <th>Debt Repayment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loanApplications as $loanApplication)
                                <tr>
                                    <td>{{ $loanApplication->financial_group_name }}</td>
                                    <td>{{ $loanApplication->reason_of_taking_loan }}</td>
                                    <td>{{ $loanApplication->amount }}</td>
                                    <td>{{ $loanApplication->interest_rate }}</td>
                                    <td>{{ $loanApplication->approval_status == 1 ? 'Approved' : 'Not Approved' }}</td>
                                    <td>{{ $loanApplication->loan_issue_date }}</td>
                                    <td>{{ $loanApplication->debt_repayment_date }}</td>
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
