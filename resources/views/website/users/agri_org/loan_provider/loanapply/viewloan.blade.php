@extends('website.users.agri_org.loan_provider.deashboad')
@section('scontent.dashboard')
    <div class="col-lg-12 col-12 text-center mb-4">
        <h2>View Loan application</h2>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Farmer Name</th>
                <th>Reason of taking loan</th>
                <th>Amount</th>
                <th>Interest Amount</th>
                <th>Installment Period</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="" data-toggle="modal"
                        data-target="#farmerModal{{ $microloan->id }}">{{ $microloan->farmer_name }}</a></td>
                <td>{{ $microloan->reason_of_taking_loan }}</td>
                <td>{{ $microloan->amount }}</td>
                <td>{{ $microloan->interest_rate }}</td>
                <td>{{ $microloan->installment_period }}</td>
            </tr>
        </tbody>
    </table>

    {{--  <!-- Farmer Info Modal -->  --}}
    <div class="modal fade" id="farmerModal{{ $microloan->id }}" tabindex="-1" role="dialog"
        aria-labelledby="farmerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="farmerModalLabel">{{ $microloan->farmer_name }} Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Email: {{ $microloan->email }}</p>
                    <p>Phone: {{ $microloan->phone }}</p>
                    <p>Address: {{ $microloan->address }}</p>
                </div>
            </div>
        </div>
    </div>

    {{--  <!-- Loan Approval Form -->  --}}
    <form action="{{ route('org.loanprovider.status', $microloan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="approval_status">Approval Status</label>
            <select class="form-control" id="approval_status" name="approval_status">
                <option value="1">Approved</option>
                <option value="0">Rejected</option>
            </select>
        </div>
        <div class="form-group">
            <label for="debt_repayment_date">Debt Repayment Date</label>
            <input type="date" class="form-control" id="debt_repayment_date" name="debt_repayment_date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
