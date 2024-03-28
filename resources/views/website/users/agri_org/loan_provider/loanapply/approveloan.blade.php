@extends('website.users.agri_org.loan_provider.deashboad')
@section('scontent.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-content">
                    <div class="row mt-3">
                        <div class="col-lg-12 col-12 text-center mb-4">
                            <h2>Approved Loans</h2>
                        </div>
                        {{--  Table start  --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Farmer Name</th>
                                        <th>Reason of taking loan</th>
                                        <th>Amount</th>
                                        <th>Interest</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvedLoans as $loan)
                                        <tr>
                                            <td>{{ $loan->farmer->f_name }} {{ $loan->farmer->l_name }}</td>
                                            <td>{{ $loan->reason_of_taking_loan }}</td>
                                            <td>{{ $loan->amount }}</td>
                                            <td>{{ $loan->interest_rate }}</td>
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
    </div>
@endsection
