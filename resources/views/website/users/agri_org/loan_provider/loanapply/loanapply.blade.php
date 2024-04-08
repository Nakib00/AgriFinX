@extends('website.users.agri_org.loan_provider.deashboad')
@section('scontent.dashboard')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-content">
                    <div class="row mt-3">
                        <div class="col-lg-12 col-12 text-center mb-4">
                            <h2>Loan application</h2>
                        </div>
                        {{--  Table start  --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Farmer Name</th>
                                        <th>Reason of taking loan</th>
                                        <th>Amount</th>
                                        <th>Interest Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($microloans as $microloan)
                                        <tr>
                                            <td>{{ $microloan->farmer_name }}</td>
                                            <td>{{ $microloan->reason_of_taking_loan }}</td>
                                            <td>{{ $microloan->amount }}</td>
                                            <td>{{ $microloan->interest_rate }}</td>
                                            <td>
                                                <a href="{{ route('org.loanprovider.loanview', $microloan->id) }}"
                                                    class="btn btn-primary">View Details</a>
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
    </div>
@endsection
